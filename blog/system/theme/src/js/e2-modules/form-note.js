import e2SpinningAnimationStartStop from '../e2-modules/e2SpinningAnimationStartStop'
import { isLocalStorageAvailable } from '../lib/local-storage'
import { bindKeys } from '../lib/keybindings'

import detect from '../lib/detect'
import e2Ajax from './e2Ajax'
import e2NiceError from './e2NiceError'

function initFormNote () {
  var $formNote = $('#form-note')

  if (!$formNote.length) return

  var $noteId = $formNote.find('#note-id')
  var $submitButton = $formNote.find('#submit-button')

  var initNoteId = $noteId.val()
  var initPO = getPageObject()
  var prevPO = initPO ? Object.assign({}, initPO) : getPageObject()
  var edited = false
  var changed = false
  var liveSaving = false
  // v3666
  // var stampMask = /^ *(\d{1,2})\.(\d{1,2})\.(\d{2}|\d{4}) +(\d{1,2}):(\d{1,2}):(\d{1,2}) *$/

  // refresh page if it loads from back-forward cache
  // more: https://developer.mozilla.org/en-US/docs/Working_with_BFCache
  $(window).bind('pageshow', function (event) {
    if (event.originalEvent.persisted) {
      window.location.reload()
    }
  })

  if (document.e2.localCopies.initLocalSaver && document.e2.localCopies.loadLocalCopy) {
    document.e2.localCopies.loadLocalCopy()
    document.e2.localCopies.initLocalSaver()
  }

  function e2AjaxSave (opts) {
    opts = opts || {}

    e2Ajax({
      url: $formNote.find('#e2-note-livesave-action').attr('href'),
      data: $formNote.serialize(),
      success: function (response) {
        if (typeof response['data'] === 'undefined' || typeof response['data']['status'] === 'undefined') {
          e2NiceError({
            message: 'er--js-server-error',
            debug: {
              message: 'Server response malformed',
              data: {
                response: response
              }
            }
          })
          return false
        }

        if (typeof opts.onAjaxSuccess === 'function') {
          opts.onAjaxSuccess()
        }

        if (response['data']['status'] === 'created') {
          if (window.history.replaceState) {
            window.history.replaceState(null, '', response['data']['note-edit-url'])
            $('.e2-admin-menu-new-selected').hide()
            $('.e2-admin-menu-new').show()
          }
          $noteId.val(response['data']['id'])

          removeLocalCopy()

          if (typeof opts.onCreated === 'function') {
            opts.onCreated(response)
          }

          initNoteId = null
        } else if (response['data']['status'] === 'saved') {
          $('#alias').val(response['data']['new-alias'])
          if (window.history.replaceState) {
            window.history.replaceState(null, '', response['data']['note-edit-url'])
          }

          removeLocalCopy()

          if (typeof opts.onSaved === 'function') {
            opts.onSaved(response)
          }

          initNoteId = null
        }
      },
      error: opts.onAjaxError,
      complete: opts.onAjaxComplete
    })
  }

  function e2UpdateSubmittability () {
    var stampOk = true

    // v3666
    // stampOk = !$('#stamp.goodyear-hidden-text').hasClass('goodyear-hidden-text-error')
    stampOk = true

    var shouldBeEnabled = (
      !/^ *$/.test($('#title').val()) &&
      !/^ *$/.test($('#text').val()) &&
      stampOk &&
      !liveSaving
    )

    $submitButton.prop('disabled', !shouldBeEnabled)
  }

  function e2LiveSaveError () {
    e2SpinningAnimationStartStop($('#livesaving'), 0)
    $('#livesaving').hide()
    $('#livesave-button, #livesave-button + .e2-unsaved-led').show()
  }

  function e2LiveSave () {
    if (liveSaving) return

    var currentPO = getPageObject()

    if (currentPO.text === '') return
    liveSaving = true
    e2UpdateSubmittability()
    if (currentPO.title === '') {
      var x
      var generatedTitle = currentPO.text
      if ((x = generatedTitle.indexOf('.')) >= 0) generatedTitle = generatedTitle.substr(0, x)
      if ((x = generatedTitle.indexOf(';')) >= 0) generatedTitle = generatedTitle.substr(0, x)
      if ((x = generatedTitle.indexOf(',')) >= 0) generatedTitle = generatedTitle.substr(0, x)
      if ((x = generatedTitle.indexOf(')')) >= 0) generatedTitle = generatedTitle.substr(0, x)
      if (generatedTitle.indexOf('((') === 0) generatedTitle = generatedTitle.substr(2)
      generatedTitle = generatedTitle.substr(0, 1).toUpperCase() + generatedTitle.substr(1)
      $('#title').val(generatedTitle).change()
    }
    $('#livesave-button, #livesave-button + .e2-unsaved-led').hide()
    $('#livesaving').fadeIn(333)
    e2SpinningAnimationStartStop($('#livesaving'), 1)

    e2AjaxSave({
      onCreated: function () {
        initPO = currentPO
        if ($('#e2-drafts') && $('#e2-drafts-item')) {
          $('#e2-drafts-item').fadeIn(333)
          $('<div class="e2-admin-menu-item-frame"></div>').css({
            'position': 'absolute',
            'left': $('#e2-note-form-wrapper').offset().left,
            'top': $('#e2-note-form-wrapper').offset().top,
            'width': $('#e2-note-form-wrapper').width(),
            'height': $('#e2-note-form-wrapper').height()
          }).appendTo('body').animate({
            'left': $('#e2-drafts').offset().left - 10,
            'top': $('#e2-drafts').offset().top - 5,
            'width': $('#e2-drafts').width() + 20,
            'height': $('#e2-drafts').height() + 10
          }, 667).fadeTo(333, 0.667).fadeOut(333)
          $('#e2-drafts-count').html($('#e2-drafts-count').html() * 1 + 1)
        }
      },
      onSaved: function () {
        initPO = currentPO
      },
      onError: e2LiveSaveError,
      onAjaxSuccess: function () {
        e2SpinningAnimationStartStop($('#livesaving'), 0)
        $('#livesaving').fadeOut(333)
      },
      onAjaxError: function (jqXHR, textStatus) {
        e2LiveSaveError(textStatus)
      },
      onAjaxComplete: function () {
        liveSaving = false

        e2UpdateSubmittability()
      }
    })
  }

  $formNote.on('submit', function (e) {
    e.preventDefault()

    var currentPO = getPageObject()

    liveSaving = true
    e2UpdateSubmittability()
    $('#submit-keyboard-shortcut').hide()
    e2SpinningAnimationStartStop($('#note-saving'), 1)
    $('#note-saving').show()

    e2AjaxSave({
      onCreated: goTo,
      onSaved: goTo,
      onError: handleError,
      onAjaxError: function (jqXHR, textStatus) {
        handleError(textStatus)
      },
      onAjaxComplete: function () {
        liveSaving = false
        e2UpdateSubmittability()
      }
    })

    function goTo (response) {
      initPO = currentPO
      e2SpinningAnimationStartStop($('#note-saving'), 0)
      $('#note-saving').hide()
      $('#note-saved').fadeIn(333)
      window.location.href = response['data']['note-url']
    }

    function handleError () {
      $formNote.trigger('ajaxError')
      e2SpinningAnimationStartStop($('#note-saving'), 0)
      $('#note-saving').hide()
      $('#submit-keyboard-shortcut').show()
    }
  })

  $('#title').on('input', function () {
    $('#alias').attr('placeholder', '')
  })

  var changesEventsList = 'change input keyup keydown keypress mouseup mousedown cut copy paste blur'
  var changesListener = function () {

    // v3666
    // if ($('#stamp').val()) {
    //   $('#stamp').toggleClass(
    //     'input-error',
    //     ($('#stamp').val().match(stampMask) === null)
    //   )
    // }

    e2UpdateSubmittability()

    var newPO = getPageObject()
    edited = !comparePageObjects(prevPO, newPO)
    changed = initPO ? !comparePageObjects(initPO, newPO) : true

    var $livesaveButton = $('#livesave-button, #livesave-button + .e2-unsaved-led')
    if (edited && changed && (newPO.text !== '')) {
      edited = false
      $('#livesaving').hide()
      document.e2.localCopies.initLocalSaver()
      $livesaveButton.fadeIn(333)
      prevPO = Object.assign({}, newPO)
    } else if (!changed) {
      changed = false
      removeLocalCopy()
      $livesaveButton.fadeOut(333)
      prevPO = Object.assign({}, newPO)
    }

    var title = newPO.title.trim()
    var text = newPO.text.trim()
    var $images = $('#e2-uploaded-images .e2-uploaded-image')

    if (!$images.length && !title && !text && $livesaveButton.is(':visible')) {
      $livesaveButton.fadeOut(333)
    }
  }
  $('#title').add('#tags').add('#text').add('#alias').add('#stamp').on(changesEventsList, changesListener)

  $('#tags').on('liszt:ready', function () {
    $('#tags_chzn .search-field').on(changesEventsList, changesListener)
  })

  $('#title').on('keydown', function (e) {
    if (e.which === 13) {
      $('#text').focus()
    }
  })

  $('#livesave-button').on('click', function () {
    e2LiveSave()
    return false
  })

  if (detect.mac) {
    bindKeys('Cmd+S', e2LiveSave, {prevent: true})
  } else {
    bindKeys('Ctrl+S', e2LiveSave, {prevent: true})
  }

  // if there is no autofocus on #text, let's move focus to #title
  if (!$('#text').is(':focus')) {
    $('#title')
      .attr('autofocus', true)
      .focus()
      .val($('#title').val()) // for prevent text selection in Safari
  }

  e2UpdateSubmittability()

  function removeLocalCopy () {
    if (!isLocalStorageAvailable) return

    if (initNoteId) {
      // if it's a new draft, it has id === 'new' before saving
      document.e2.localCopies.remove(initNoteId)
    } else {
      // ..and id === Number after
      document.e2.localCopies.remove($noteId.val())
    }

    document.e2.localCopies.destroyLocalSaver()
  }

  // returns object with form fields values
  function getPageObject () {
    return {
      title: $('#title').val(),
      tags: ($('#tags').val() || []).join(),
      text: $('#text').val(),
      alias: $('#alias').val(),
      stamp: $('#stamp').val()
    }
  }

  // returns true if objects are equal; else false
  function comparePageObjects (prevPO, newPO) {
    // 'cause all values of POs are strings, we can use JSON comparison
    return JSON.stringify(prevPO) === JSON.stringify(newPO)
  }
}

export default initFormNote
