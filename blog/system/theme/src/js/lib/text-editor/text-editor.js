// TODO: improve variable names. for example, 'str' for strings instead of value, text, line and all of them, that are used right now
// TODO: maybe we need to unify api of parsers / wrappers / unwrappers if it's possible
import { bindKeys, unbindKeys } from '../keybindings'

const inlineBinding = {
  type: 'inline',
  parse: inlineParse,
  wrap: inlineWrap,
  unwrap: inlineUnwrap,
}

const blockBinding = {
  type: 'block',
  parse: blockParse,
  wrap: blockWrap,
  unwrap: blockUnwrap,
}

const bindings = [
  {
    ...inlineBinding,
    name: 'bold',
    keys: 'Cmd+B',
    regexp: /\*\*([^\s]{0,2}|[^\s].*?[^\s])\*\*/g,
    prefix: '**',
    suffix: '**',
  },
  {
    ...inlineBinding,
    name: 'italic',
    keys: 'Cmd+I',
    regexp: /\/\/([^\s]{0,2}|[^\s].*?[^\s])\/\//g,
    prefix: '//',
    suffix: '//',
  },
  {
    ...inlineBinding,
    name: 'link',
    keys: 'Cmd+K',
    regexp: /\(\(\s*(.*?)\s*\)\)/g,
    prefix: '((',
    suffix: '))',
    wrap: linkWrap,
    unwrap: linkUnwrap,
  },
  {
    ...blockBinding,
    name: 'header',
    keys: 'Cmd+Alt+1',
    regexp: /^[^\S\n]*#[^\S\n]*([^#].*)$/g,
    prefix: '# ',
  },
  {
    ...blockBinding,
    name: 'subheader',
    keys: 'Cmd+Alt+2',
    regexp: /^[^\S\n]*##[^\S\n]*([^#].*)$/g,
    prefix: '## ',
  },
  {
    ...blockBinding,
    name: 'remove headers',
    keys: 'Cmd+Alt+0',
    regexp: /^[^\S\n]*#{1,2}[^\S\n]*([^#].*)$/g,
    wrap: blockUnwrap,
  },
  {
    ...blockBinding,
    name: 'increase quote level',
    keys: 'Cmd+]',
    regexp: /^[^\S\n]*>[^\S\n]*(.*)$/g,
    prefix: '> ',
    nextPrefix: '>',
    unwrap: blockWrap,
  },
  {
    ...blockBinding,
    name: 'decrease quote level',
    keys: 'Cmd+[',
    regexp: /^[^\S\n]*>[^\S\n]*(.*)$/g,
    prefix: '> ',
    wrap () {}
  }
]

const URL_REGEX = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=+$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=+$,\w]+@)[A-Za-z0-9.-]+)((?:\/[+~%/.\w-_]*)?\??(?:[-+=&;%@.\w_]*)#?(?:[.!/\\\w]*))?)/

function textEditorInitNew () {
  let elem = this
  const head = document.head || document.getElementsByTagName('head')[0]
  const undoHandlerStyleNode = document.createElement('style')

  undoHandlerStyleNode.type = 'text/css'
  undoHandlerStyleNode.appendChild(document.createTextNode('::selection { background: transparent; }'))

  bindings.forEach(({ name, keys, type, regexp, parse, prefix, nextPrefix, suffix, wrap, unwrap }) => {
    bindKeys(keys, fn, { target: elem, prevent: true })

    function fn () {
      const start = elem.selectionStart
      const end = elem.selectionEnd
      const undoKeys = ['Cmd+Z', 'Ctrl+Z']

      if (type === 'inline' && elem.value.substring(start, end).indexOf('\n') !== -1) return

      // TODO: why we dont use 'regexp' for pattern variable name?
      const parsed = parse({ name, pattern: regexp, text: elem.value, start, end, isConsequent: true })
      console.log(parsed)

      if (parsed.isWrapped) {
        unwrap({ name, pattern: regexp, elem, start, end, parsed, prefix, nextPrefix, suffix })
      } else {
        wrap({ name, pattern: regexp, elem, start, end, parsed, prefix, nextPrefix, suffix })
      }

      bindKeys(undoKeys, handleUndo, { target: elem })

      $(elem).on('input', function () {
        unbindKeys(undoKeys, handleUndo, { target: elem })
      })

      function handleUndo () {
        // here we change selection color, 'cause in Safari we can't beat whole text selection
        // and undo causes blinks of selection: cmd+Z → whole text selected → word selected ('cause we select it)

        head.appendChild(undoHandlerStyleNode)

        setTimeout(resetUndoSelection, 10)
        unbindKeys(undoKeys, handleUndo, { target: elem })

        function resetUndoSelection () {
          elem.selectionStart = start
          elem.selectionEnd = end

          head.removeChild(undoHandlerStyleNode)
        }
      }
    }
  })
}

function insertText ({ elem, text, start, end, nextStart, nextEnd }) {
  elem.selectionStart = start
  elem.selectionEnd = end

  document.execCommand('insertText', false, text)
  $(elem).trigger('input')

  elem.selectionStart = nextStart
  elem.selectionEnd = nextEnd
}

function inlineParse ({ pattern, text, start, end, isConsequent }) {
  const { value: line, start: lineStart } = getLineInfo({ text, start, end })
  const res = getSubstrInfoByPatternAndCursorPosition({
    text: line,
    start: start - lineStart,
    end: end - lineStart,
    pattern,
    isConsequent
  })

  if (!res) return { isWrapped: false }

  const affixes = res.value.split(res.unwrappedValue)

  return {
    ...res,
    isWrapped: true,
    realStart: res.start + lineStart,
    realEnd: res.end + lineStart,
    prefixLength: affixes[0].length,
    suffixLength: affixes[1].length,
  }
}

function inlineWrap ({ elem, start, end, prefix, suffix }) {
  const word = getWordByCursorPosition({ elem, start, end })

  insertText({
    elem,
    text: `${prefix}${word.value}${suffix}`,
    start: word.start,
    end: word.end,
    nextStart: start + prefix.length,
    nextEnd: end + prefix.length
  })
}

function inlineUnwrap ({ elem, start, end, parsed: { realStart, realEnd, unwrappedValue, prefixLength, suffixLength } }) {
  if (!unwrappedValue.length) {
    insertText({
      elem,
      text: unwrappedValue,
      start: realStart,
      end: realEnd,
      nextStart: realStart,
      nextEnd: realStart,
    })

    return
  }

  const unwrappedStart = realStart + prefixLength
  const unwrappedEnd = realEnd - suffixLength

  let diffStart = start - unwrappedStart
  let diffEnd = end - unwrappedEnd

  if (diffStart < 0) {
    diffEnd -= diffStart
    diffStart = 0
  }

  if (diffEnd > 0) diffEnd = 0

  const nextRealStart = realStart
  const nextRealEnd = realStart + unwrappedValue.length

  const nextStart = nextRealStart + diffStart
  const nextEnd = nextRealEnd + diffEnd

  insertText({
    elem,
    text: unwrappedValue,
    start: realStart,
    end: realEnd,
    nextStart,
    nextEnd,
  })
}

function linkWrap ({ elem, start, end, prefix, suffix }) {
  const word = getWordByCursorPosition({ elem, start, end })
  let wrapped = word.value
  let cursorPosition

  if (!word.value) {
    wrapped = `${prefix} ${suffix}`
    cursorPosition = start + prefix.length
  } else if (URL_REGEX.test(word.value)) {
    wrapped = `${prefix}${word.value} ${suffix}`
    cursorPosition = word.end + prefix.length + 1 // set cursor after the url; + 1 for space added after the url
  } else {
    wrapped = `${prefix} ${word.value}${suffix}`
    cursorPosition = word.start + prefix.length // set cursor after the prefix, because word isn't a url (and user wants to add it)
  }

  insertText({
    elem,
    text: wrapped,
    start: word.start,
    end: word.end,
    nextStart: cursorPosition,
    nextEnd: cursorPosition
  })
}

function linkUnwrap ({ elem, start, end, parsed }) {
  const { realStart, unwrappedValue, prefixLength } = parsed;
  const valueParts = unwrappedValue.split(' ')
  const startUrlPosition = realStart + prefixLength

  if (valueParts.length > 1 && URL_REGEX.test(valueParts[0])) {
    elem.selectionStart = startUrlPosition
    elem.selectionEnd = startUrlPosition + valueParts[0].length
  } else {
    inlineUnwrap({ elem, start, end, parsed })
  }
}

function blockParse ({ text, start, end, pattern}) {
  const blockBindings = bindings.filter(x => x.type === 'block')
  const parsed = text
    .split('\n')
    .reduce((acc, line) => {
      const lineStart = acc.lastIndex
      const lineEnd = lineStart + line.length
      const isLineInSelection = lineStart <= start && lineEnd >= start || lineStart >= start && lineEnd <= end || lineStart <= end && lineEnd >= end

      if (!isLineInSelection) {
        return {
          ...acc,
          lastIndex: lineEnd + 1
        }
      }

      const match = blockBindings.reduce((acc, binding) => {
        if (acc) return acc

        binding.regexp.lastIndex = 0 // reset previous execs
        const match = binding.regexp.exec(line)

        if (match) {
          const value = match[0]
          const unwrappedValue = match[1];
          const startSubstr = match.index
          const endSubstr = match.index + value.length

          return {
            value,
            wrappedBy: binding.name,
            unwrappedValue,
            prefixLength: value.length - unwrappedValue.length,
            start: startSubstr + lineStart,
            end: endSubstr + lineStart
          }
        }
      }, null)

      const res = match ? match : {
        value: line,
        start: lineStart,
        end: lineEnd,
      };

      pattern.lastIndex = 0

      return {
        lines: [
          ...acc.lines,
          res
        ],
        lastIndex: lineEnd + 1,
        isWrapped: acc.isWrapped && pattern.test(res.value)
      }
    }, { lines: [], lastIndex: 0, isWrapped: true })

  delete parsed.lastIndex

  return parsed
}

function blockWrap({ elem, start, end, prefix, pattern, nextPrefix, parsed: { lines } }) {
  const nextText = lines
    .reduce((acc, line) => {
      let nextValue = `${prefix}${line.value}`

      pattern.lastIndex = 0
      if (pattern.test(line.value) && nextPrefix) {
        nextValue = `${nextPrefix}${line.value}`
      } else if (line.unwrappedValue) {
        nextValue = `${prefix}${line.unwrappedValue}`
      }

      return [
        ...acc,
        nextValue
      ]
    }, [])
    .join('\n')

  const realStart = lines[0].start
  const realEnd = lines[lines.length - 1].end

  let diffStart = start - realStart
  let diffEnd = end - realEnd

  if (diffEnd < (realStart - realEnd)) diffEnd += (realStart - realEnd - diffEnd)

  const nextRealStart = realStart
  const nextRealEnd = realStart + nextText.length

  const nextStart = nextRealStart + diffStart + prefix.length
  const nextEnd = nextRealEnd + diffEnd

  insertText({
    elem,
    text: nextText,
    start: realStart,
    end: realEnd,
    nextStart,
    nextEnd,
  })
}

function blockUnwrap({ elem, start, end, pattern, parsed: { lines } }) {
  const nextText = lines
    .reduce((acc, line) => {
      pattern.lastIndex = 0

      return [
        ...acc,
        pattern.test(line.value) ? line.unwrappedValue : line.value
      ]
    }, [])
    .join('\n')

  const realStart = lines[0].start
  const realEnd = lines[lines.length - 1].end

  // TODO: but what would happen if we started selection from unmatched lines?
  // should we check it?
  const unwrappedStart = realStart + lines[0].prefixLength
  const unwrappedEnd = realEnd

  let diffStart = start - unwrappedStart
  let diffEnd = end - unwrappedEnd

  if (diffStart < 0) diffStart = 0
  if (diffEnd < (unwrappedStart - unwrappedEnd)) diffEnd += (unwrappedStart - unwrappedEnd - diffEnd)

  const nextRealStart = realStart
  const nextRealEnd = realStart + nextText.length

  const nextStart = nextRealStart + diffStart
  const nextEnd = nextRealEnd + diffEnd

  insertText({
    elem,
    text: nextText,
    start: realStart,
    end: realEnd,
    nextStart,
    nextEnd,
  })
}

function getSubstrInfoByPatternAndCursorPosition({ text, start, end, pattern, isConsequent }) {
  let match
  let results = []
  console.log(text, start, end)

  pattern.lastIndex = 0 // reset previous execs

  while ((match = pattern.exec(text)) !== null) {
    console.log(match)
    const value = match[0]
    const unwrappedValue = match[1];
    const startSubstr = match.index
    const endSubstr = match.index + value.length

    if (startSubstr <= start && endSubstr >= end) {
      // if current cursor position is inside of matched value, let's save it to the array
      // because it's possible that searched value is a smaller part in this value
      results.push({
        value,
        unwrappedValue,
        start: startSubstr,
        end: endSubstr
      })
    }

    // TODO: it does not smell good
    if (isConsequent) {
      // we need to start exact after founded value, because it's possible to get situation like this:
      // str: ((http://google.com asdasd asd asdasd)) asd //asd// asd asd asdas
      // regex: /\/\/([^\s]{0,2}|[^\s].*?[^\s])\/\//g,
      // after first match we get `//google.com asdasd asd asdasd)) asd //asd//` and there is no second match,
      // because next search will be started after founded value (i.e. after ...//asd//)
      pattern.lastIndex = match.index + 1
    }
  }

  if (results.length) {
    results.sort((a, b) => a.value.length - b.value.length)
    return results[0]
  }

  return null
}

function getLineInfo({ text, start, end }) {
  start = start - 1 // start checking from previous symbol

  while (text[start] !== '\n' && start > 0) start--

  if (start !== 0) start++ // start !== 0 means that text[start] === '\n', but we need to get the next symbol

  while (text[end] !== '\n' && end < text.length) end++

  return { value: text.substring(start, end), start, end }
}

function getWordByCursorPosition ({ elem, start, end }) {
  let realStart = start
  let realEnd = end
  let value = elem.value.substr(start, end - start)

  if (start === end) {
    const { value: line, start: lineStart } = getLineInfo({ text: elem.value, start, end })
    const wordInfo = getSubstrInfoByPatternAndCursorPosition({
      text: line,
      start: start - lineStart,
      end: end - lineStart,
      pattern: /[^\s]+/g // TODO: we need to improve this; it hasn't to match )), ((, [[, ** and so on
    })

    if (wordInfo) {
      realStart = wordInfo.start + lineStart
      realEnd = wordInfo.end + lineStart
      value = wordInfo.value
    }
  }

  return {
    start: realStart,
    end: realEnd,
    value,
  }
}

export default textEditorInitNew
