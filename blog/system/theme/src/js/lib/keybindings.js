import detect from './detect'

const bindings = {}

function bindKeys (shortcut, fn, options) {
  let keyFunc
  const defaultOptions = {
    event: 'keydown',
    target: document,
    prevent: false
  }
  options = extend(options, defaultOptions)

  if (Array.isArray(shortcut)) {
    keyFunc = []

    if (!detect.mac) {
      shortcut = shortcut.map(x => x.replace('Cmd', 'Ctrl'))
    }

    shortcut.forEach(x => keyFunc.push(eventHandlerBuilder(x, fn, options)))
  } else {
    if (!detect.mac) {
      shortcut = shortcut.replace('Cmd', 'Ctrl')
    }

    keyFunc = eventHandlerBuilder(shortcut, fn, options)
  }

  const elem = typeof options.target === 'string' ? document.querySelector(options.target) : options.target

  if (Array.isArray(keyFunc)) {
    keyFunc.forEach((f, i) => {
      if (!bindings[shortcut[i]]) bindings[shortcut[i]] = []

      elem.addEventListener(options.event, f, false)
      bindings[shortcut[i]].push({ event: options.event, elem, fn, realFn: f })
    })
  } else {
    if (!bindings[shortcut]) bindings[shortcut] = []

    elem.addEventListener(options.event, keyFunc, false)
    bindings[shortcut].push({ event: options.event, elem, fn, realFn: keyFunc })
  }
}

function unbindKeys (shortcut, fn, options) {
  options = options || {}

  // TODO: we can use [].concat(param) to convert any param to array and remove these checks
  if (Array.isArray(shortcut)) {
    shortcut.forEach(remove)
  } else {
    remove(shortcut)
  }

  function remove (key) {
    if (bindings[key]) {
      bindings[key].slice().reverse().forEach((obj, i, arr) => {
        if (obj.fn !== fn || (options.target && obj.elem !== options.target)) return

        obj.elem.removeEventListener(obj.event, obj.realFn, false)
        arr.splice(arr.length - 1 - i, 1)
      })
    }
  }
}

function eventHandlerBuilder (shortcut, fn, options) {
  shortcut = normalizeKey(shortcut).split('+')

  return e => {
    if (isShortcutFired(e, shortcut)) {
      fn(e)

      if (options.prevent) {
        e.preventDefault()
        e.stopPropagation()
      }
    }
  }
}

function isShortcutFired (e, keys) {
  const char = getCharByCode(e.keyCode)
  const specialKeys = { enter: 13 }
  const modifiers = {}
  const modifiersArray = ['shift', 'ctrl', 'alt', 'cmd']
  let keysCounter = 0

  modifiersArray.forEach(mod => {
    modifiers[mod] = {
      wanted: false,
      pressed: false
    }
  })

  if (e.shiftKey) modifiers.shift.pressed = true
  if (e.ctrlKey) modifiers.ctrl.pressed = true
  if (e.altKey) modifiers.alt.pressed = true
  if (e.metaKey) modifiers.cmd.pressed = true

  for (let i = 0; i < keys.length; i++) {
    const k = keys[i]

    if (modifiersArray.indexOf(k) > -1) {
      keysCounter++
      modifiers[k].wanted = true
    } else if ((k.length > 1 && specialKeys[k] === e.keyCode) || (char === k)) {
      keysCounter++
    }
  }

  return (keys.length === keysCounter) && Object.keys(modifiers).reduce((prev, cur) => {
    return prev && (modifiers[cur].wanted === modifiers[cur].pressed)
  }, true)
}

function getCharByCode (code) {
  switch (code) {
    case 91:
    case 93:
      return 'MetaKey' // for prevent wrong '[' / ']' detection
    case 188:
      return ','
    case 190:
      return '.'
    case 219:
      return '['
    case 221:
      return ']'
    default:
      return String.fromCharCode(code).toLowerCase()
  }
}

function normalizeKey (key) {
  return key.toLowerCase().replace(/\s/g, '')
}

function extend (object, defaultObject) {
  if (!object) {
    return defaultObject
  } else {
    for (let key in defaultObject) {
      if (typeof object[key] === 'undefined') {
        object[key] = defaultObject[key]
      }
    }

    return object
  }
}

export { bindKeys, unbindKeys }
