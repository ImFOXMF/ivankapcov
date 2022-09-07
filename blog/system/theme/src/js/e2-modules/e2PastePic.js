function e2PastePic (pic) {
  // if (alt = $ ('#title').val ()) alt = ' ' + alt
  var alt = ''
  var text = ''
  if ($('#formatter-id').val() === 'neasden') text = pic + alt
  if (!text) return
  var field = document.getElementById('text')
  field.focus()
  if (field.selectionStart || field.selectionStart === '0') {
    var selStart = field.selectionStart
    var selEnd = field.selectionEnd
    var textToPaste = text

    if (selStart === selEnd) {
      while ((field.value.charAt(selStart) !== '\r') && (field.value.charAt(selStart) !== '\n') && (selStart > 0)) {
        selStart -= 1
      }
      while ((field.value.charAt(selStart) === '\r') || (field.value.charAt(selStart) === '\n')) {
        selStart += 1
      }
      textToPaste = textToPaste + '\n\n'
      selEnd = selStart
    }

    field.value = field.value.substring(0, selStart) + textToPaste +
      field.value.substring(selEnd, field.value.length)

    field.selectionStart = // selStart
      field.selectionEnd = selStart + textToPaste.length - 2
  } else {
    field.value += '\r\n\r\n' + text
  }

  // make onchange event to update submittability
  if ('createEvent' in document) {
    var evt = document.createEvent('HTMLEvents')
    evt.initEvent('change', false, true)
    field.dispatchEvent(evt)
  } else {
    field.fireEvent('onchange')
  }

  field.focus()
}

export default e2PastePic
