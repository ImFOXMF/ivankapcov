function initFormTag () {
  var $formTag = $('#form-tag')

  if (!$formTag.length) return

  var $submitButton = $formTag.find('#submit-button')
  $('#tag').on('keydown', function (e) {
    if (e.which === 13) {
      $('#urlname').focus()
    }
  })

  $('#urlname').on('keydown', function (e) {
    if (e.which === 13) {
      $('#page-title').focus()
    }
  })

  $('#page-title').on('keydown', function (e) {
    if (e.which === 13) {
      $('#text').focus()
    }
  })

  $('.required').bind('input blur cut copy paste keypress', updateSubmittability)
  updateSubmittability()

  function updateSubmittability () {
    const shouldBeDisabled = /^ *$/.test($('#tag').val()) || /^ *$/.test($('#urlname').val())

    if (shouldBeDisabled) {
      $submitButton.prop('disabled', true)
    } else {
      $submitButton.prop('disabled', false)
    }
  }
}

export default initFormTag
