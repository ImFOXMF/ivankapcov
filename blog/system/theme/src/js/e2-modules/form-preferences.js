import textEditorInit from '../lib/text-editor'

function initFormPreferences () {
  if (!$('#form-preferences').length) return

  $('#blog-title').on('input blur cut copy paste keypress', function () {
    var $title = $('#e2-blog-title')
    var titleDefault = $('#e2-blog-title-default').val()

    if ($title.length) {
      $title.text(this.value ? this.value : titleDefault)
    }
  })

  $('#blog-author').on('input blur cut copy paste keypress', function () {
    var $author = $('#e2-blog-author')
    var authorDefault = $('#e2-blog-author-default').val()

    if ($author.length) {
      $author.text(this.value ? this.value : authorDefault)
    }
  })

  $('#notes-per-page').on('change blur focusout', function () {
    var defaultValue = 10
    var minValue = 3
    var maxValue = 100

    // is this.value === NaN then use 10 as default value
    if (parseInt(this.value) !== parseInt(this.value)) {
      this.value = defaultValue
    }
    this.value = Math.min(Math.max(this.value, minValue), maxValue)
  })

  $('#email-notify').on('change', function () {
    if ($(this).is(':checked')) {
      $('#email').focus()
    }
  })

  $('.e2-template-preview-link').addClass('e2-template-preview-link_visible')

  $('#e2-template-selector').addClass('e2-template-selector_interactive').find('.e2-template-preview__input').on('change', function () {
    var $this = $(this)
    var $label = $this.parents('.e2-template-preview')

    $('.e2-template-preview_current').removeClass('e2-template-preview_current')
    $label.addClass('e2-template-preview_current')

    $('.e2-template-preview-link').attr('href', $this.data('preview-url'))

    if ($this.data('supports-dark-mode')) {
      $('#respond-to-dark-mode').parents('.form-element').eq(0).slideDown(333)
    } else {
      $('#respond-to-dark-mode').parents('.form-element').eq(0).slideUp(333)
    }
  })
}

export default initFormPreferences
