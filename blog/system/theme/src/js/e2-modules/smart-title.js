function initSmartTitle () {
  // live updates window title

  var originalTitle = document.title

  $('input.e2-smart-title').on('input', function () {
    if (this.value) document.title = this.value
    else if (originalTitle) document.title = originalTitle
  })

  // retitle on scrolling

  var e2UpdateWindowTitleFromScrollPosition = function () {
    var y = $(window).scrollTop()
    var title = originalTitle
    var currentNoteId
    if (y > 0) {
      $('.e2-smart-title').each (function () {
        if ($(this).position().top > y + window.innerHeight) return false
        title = $(this).text()
        currentNoteId = $(this).closest('.e2-note').data('note-id').toString()
        if ($(this).position().top > y) return false
      })
    }
    document.title = title
    document.e2.currentNoteId = currentNoteId
  }

  if ($('.e2-smart-title').length > 1) {
    $(window).on ('scroll resize', e2UpdateWindowTitleFromScrollPosition)
    e2UpdateWindowTitleFromScrollPosition()
  } else if ($('.e2-smart-title:not(input)').length === 1) {
    document.e2.currentNoteId = $('.e2-smart-title:not(input)').closest('.e2-note').data('note-id').toString()
  }
}

export default initSmartTitle
