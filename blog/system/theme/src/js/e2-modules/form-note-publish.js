function initFormNotePublish () {

  if (!$('#form-note-publish').length) return

  $('.e2-schedule-controls-revealer').on('click', function () {
    $('.e2-publish-now-controls').hide()
    $('.e2-schedule-controls').show()

    $('.e2-post-time-control').slideDown(333, function () {
      $('.e2-schedule-controls button').prop('disabled', false)
    })

    if ($('#stamp').val() === '') {
      var today = new Date()
      var day = today.getDate()
      if (day < 10) day = '0' + day
      var month = today.getMonth() + 1
      if (month < 10) month = '0' + month
      var year = today.getFullYear()
      var hours = today.getHours()
      var minutes = today.getMinutes()
      hours += 1
      if (minutes === 59) hours += 1
      if (hours < 10) hours = '0' + hours
      $('#stamp').val(day + '.' + month + '.' + year + ' ' + hours + ':00:00')
      $('#stamp').trigger('change')
    }

    return false
  })

  $('.e2-schedule-controls-unrevealer').on('click', function () {
    $('.e2-schedule-controls').hide()
    $('.e2-schedule-controls button').prop('disabled', true)
    $('.e2-post-time-control').slideUp(333)
    $('.e2-publish-now-controls').show()
    return false
  })
}

export default initFormNotePublish
