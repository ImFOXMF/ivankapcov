function e2AutosizeTextFields () {
  var $element = $(this)

  $element.on('input change resize', e2SetSizeTextField)

  e2SetSizeTextField.call(this)
}

function e2SetSizeTextField () {
  var element = this
  var $element = $(element)

  if ($element.hasClass('e2-textarea-autosize_off')) {
    return
  }

  var myHeight = parseInt(element.clientHeight)
  var lastHeight

  if (element.scrollHeight > myHeight) {
    element.style.height = (element.scrollHeight) + 'px'
  } else {
    var $clonedElement = $element.clone()
    $clonedElement.css('visibility', 'hidden').css('position', 'absolute').css('width', $element.width())
    $element.before($clonedElement)

    while (parseInt($clonedElement[0].scrollHeight) === myHeight) {
      myHeight -= 50
      $clonedElement[0].style.height = myHeight + 'px'
      lastHeight = parseInt($clonedElement[0].scrollHeight)
      $clonedElement[0].style.height = lastHeight + 'px'
    }

    $clonedElement.remove()
    element.style.height = lastHeight + 'px'
  }

  $element.trigger('autosized')
}

export default e2AutosizeTextFields
