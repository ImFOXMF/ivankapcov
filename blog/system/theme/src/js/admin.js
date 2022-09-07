import { isLocalStorageAvailable } from './lib/local-storage'
import initLocalCopies from './lib/local-copies'
import getTransitionEvent from './lib/getTransitionEvent'
import e2Ajax from './e2-modules/e2Ajax'
import e2ShowUploadProgressInArc from './e2-modules/e2ShowUploadProgressInArc'
import e2SpinningAnimationStartStop from './e2-modules/e2SpinningAnimationStartStop'
import initNotes from './e2-modules/notes'
import initFormNoteLocalCopy from './e2-modules/form-note-local-copy'
import initFormNote from './e2-modules/form-note'
import initFormNotePublish from './e2-modules/form-note-publish'
import initFormPreferences from './e2-modules/form-preferences'
import initFormTag from './e2-modules/form-tag'
import e2UploadFile from './e2-modules/e2UploadFile'
import initTextWithFileUpload from './e2-modules/text-with-file-upload'
import e2NiceError from './e2-modules/e2NiceError'
import e2CanUploadThisFile from './e2-modules/e2CanUploadThisFile'

/* First init modules */
initLocalCopies()
initFormNoteLocalCopy()
initNotes()
initFormNote()
initTextWithFileUpload()
initFormNotePublish()
initFormPreferences()
initFormTag()

/* Second init obsolete functions */
function initObsoleteFunction () {
  /* Drops */
  function initDrops () {
    $('.e2-external-drop-target').on('dragover dragenter', dragEnter).on('dragleave drop', dragLeave)

    function dragEnter (event) {
      var dt = event.originalEvent.dataTransfer
      if (!dt) return

      // FF
      if (dt.types.contains && !dt.types.contains('Files')) return

      // Chrome
      if (dt.types.indexOf && dt.types.indexOf('Files') === -1) return
      if (dt.dropEffect) dt.dropEffect = 'copy'

      var $this = $(this)

      $this.addClass('e2-external-drop-target-dragover')
      if ($this.hasClass('e2-external-drop-target-altable') && event.altKey) {
        $this.addClass('e2-external-drop-target-dragover-alt')
      } else {
        $this.removeClass('e2-external-drop-target-dragover-alt')
      }

      return false
    }

    function dragLeave () {
      var $this = $(this)

      $this.removeClass('e2-external-drop-target-dragover e2-external-drop-target-dragover-alt')

      return false
    }
  }

  function initUserPic () {
    var transitionEvent = getTransitionEvent()

    var $dropZones = $('.e2-user-picture-container')

    var dropZoneEmptyModificator = 'e2-user-picture-container_empty'
    var dropZoneUploadingModificator = 'e2-user-picture-container_uploading'
    var dropZoneShowSpinnerModificator = 'e2-user-picture-container_showspinner'
    var dropZoneDeletingModificator = 'e2-user-picture-container_deleting'
    var dropZoneDeletedModificator = 'e2-user-picture-container_deleted'

    var isUserpicLoaded = !$dropZones.eq(0).hasClass(dropZoneEmptyModificator)

    $dropZones.on('drop', dropUserPic)
    $dropZones.on('change', '.e2-user-picture-input', selectUserPic)
    $dropZones.on('click', '.e2-user-picture-remove', removeUserPic)

    function dropUserPic (event) {
      var file
      var dt = event.originalEvent.dataTransfer

      if (!dt || !dt.files) {
        e2NiceError({
          message: 'er--js-no-files-to-upload',
          debug: {
            data: {
              event: event,
              dataTransfer: dt
            }
          }
        })
        return false
      } else if (dt.files.length > 1) {
        e2NiceError({
          message: 'er--js-can-upload-only-one-file',
          debug: {
            data: {
              event: event,
              files: dt.files
            }
          }
        })
        return false
      }

      file = dt.files[0]

      if (!e2CanUploadThisFile(file.name, /^gif|jpe?g|png$/i)) {
        e2NiceError({
          message: 'er--supported-only-png-jpg-gif',
          debug: {
            data: {
              file: file
            }
          }
        })
        return false
      }

      uploadUserPic($(this), file)
    }

    function selectUserPic (event) {
      if (!event.target.files.length) {
        return false
      }

      uploadUserPic($(event.delegateTarget), event.target.files[0])

      return false
    }

    function uploadUserPic ($currentDropZone, file) {
      var uploadHref = $currentDropZone.data('href')

      isUserpicLoaded = !$currentDropZone.hasClass(dropZoneEmptyModificator)

      $dropZones.each(function () {
        var $dropZone = $(this)
        var $link = $dropZone.find('.e2-user-picture-container-link')
        var $transitionedElement = isUserpicLoaded ? $dropZone.find('.e2-user-picture-image') : $dropZone.find('.e2-user-picture-placeholder')
        var $spinner = $dropZone.find('.e2-user-picture-spinner')

        if ($dropZone[0] === $currentDropZone[0]) {
          if (transitionEvent) {
            $transitionedElement.off(transitionEvent + '.uploadUserPic').one(transitionEvent + '.uploadUserPic', function () {
              if ($dropZone.hasClass(dropZoneUploadingModificator)) {
                $dropZone.addClass(dropZoneShowSpinnerModificator)
                e2SpinningAnimationStartStop($spinner, 1)
              }
            })
            $dropZone.addClass(dropZoneUploadingModificator)
          } else {
            if ($dropZone.hasClass(dropZoneUploadingModificator)) {
              $dropZone.addClass(dropZoneShowSpinnerModificator)
              e2SpinningAnimationStartStop($spinner, 1)
            }
          }
        } else {
          $dropZone.addClass(dropZoneUploadingModificator)
        }

        $link.attr('data-href', $link.attr('href')).removeAttr('href')
      })

      e2UploadFile({
        file: file,
        url: uploadHref,
        progress: function (event) {
          if (event.lengthComputable) {
            $dropZones.each(function () {
              var $dropZone = $(this)
              var $progress = $dropZone.find('circle.e2-progress')

              if ($dropZone[0] === $currentDropZone[0]) {
                e2ShowUploadProgressInArc($progress, event.loaded / event.total)
              }
            })
          }
        },
        success: function (response) {
          $dropZones.each(function () {
            var $dropZone = $(this)
            var $link = $dropZone.find('.e2-user-picture-container-link')
            var $spinner = $dropZone.find('.e2-user-picture-spinner')

            if (typeof response.data === 'undefined' || typeof response.data['new-image-src'] === 'undefined') {
              $dropZone.removeClass(dropZoneUploadingModificator)
              $link.attr('href', $link.attr('data-href')).removeAttr('data-href')

              if ($dropZone[0] === $currentDropZone[0]) {
                $dropZone.removeClass(dropZoneShowSpinnerModificator)
                e2SpinningAnimationStartStop($spinner, 0)
              }
            }
          })

          if (typeof response.data === 'undefined' || typeof response.data['new-image-src'] === 'undefined') {
            e2NiceError({
              message: 'er--js-server-error',
              debug: {
                message: 'Server responce malformed',
                data: {
                  response: response
                }
              }
            })
            return false
          }

          isUserpicLoaded = true

          var $imgToLoad
          $dropZones.each(function () {
            var $dropZone = $(this)
            var $link = $dropZone.find('.e2-user-picture-container-link')
            var $img = $dropZone.find('img')
            var $spinner = $dropZone.find('.e2-user-picture-spinner')

            if (typeof $imgToLoad === 'undefined') {
              $img.one('load', function () {
                $dropZone.removeClass(dropZoneEmptyModificator).removeClass(dropZoneUploadingModificator)
                $link.attr('href', $link.attr('data-href')).removeAttr('data-href')

                if ($dropZone[0] === $currentDropZone[0]) {
                  $dropZone.removeClass(dropZoneShowSpinnerModificator)
                  e2SpinningAnimationStartStop($spinner, 0)
                }
              })

              $img.attr('src', response.data['new-image-src'] + '?' + Date.now())

              $imgToLoad = $img
            } else {
              $imgToLoad.one('load', function () {
                $img.attr('src', $imgToLoad.attr('src'))

                $dropZone.removeClass(dropZoneEmptyModificator).removeClass(dropZoneUploadingModificator)
                $link.attr('href', $link.attr('data-href')).removeAttr('data-href')

                if ($dropZone[0] === $currentDropZone[0]) {
                  $dropZone.removeClass(dropZoneShowSpinnerModificator)
                  e2SpinningAnimationStartStop($spinner, 0)
                }
              })
            }
          })
        },
        error: function () {
          $dropZones.each(function () {
            var $dropZone = $(this)
            var $link = $dropZone.find('.e2-user-picture-container-link')
            var $spinner = $dropZone.find('.e2-user-picture-spinner')

            $dropZone.removeClass(dropZoneUploadingModificator)
            $link.attr('href', $link.attr('data-href')).removeAttr('data-href')

            if ($dropZone[0] === $currentDropZone[0]) {
              $dropZone.removeClass(dropZoneShowSpinnerModificator)
              e2SpinningAnimationStartStop($spinner, 0)
            }
          })
        }
      })
    }

    function removeUserPic (event) {
      var $currentDropZone = $(event.delegateTarget)
      var href = $(event.currentTarget).attr('data-href')

      $dropZones.each(function () {
        var $dropZone = $(this)
        var $link = $dropZone.find('.e2-user-picture-container-link')

        if ($currentDropZone[0] === $dropZone[0]) {
          $dropZone.addClass(dropZoneDeletingModificator)
        }

        $link.attr('data-href', $link.attr('href')).removeAttr('href')
      })

      e2Ajax({
        url: href,
        success: function () {
          isUserpicLoaded = false

          $dropZones.each(function () {
            var $dropZone = $(this)
            var $link = $dropZone.find('.e2-user-picture-container-link')
            var $img = $dropZone.find('img')

            function showDefaultState () {
              $dropZone.addClass(dropZoneEmptyModificator).removeClass(dropZoneDeletedModificator).removeClass(dropZoneDeletingModificator)
              $img.attr('src', '')
              $link.attr('href', $link.attr('data-href')).removeAttr('data-href')
            }

            if (transitionEvent) {
              $dropZone.off(transitionEvent + '.removeUserPic').one(transitionEvent + '.removeUserPic', function () {
                showDefaultState()
              })
              $dropZone.addClass(dropZoneDeletedModificator)
            } else {
              showDefaultState()
            }
          })
        },
        error: function () {
          $dropZones.each(function () {
            var $dropZone = $(this)
            var $link = $dropZone.find('.e2-user-picture-container-link')

            $dropZone.removeClass(dropZoneDeletingModificator)
            $link.attr('href', $link.attr('data-href')).removeAttr('data-href')
          })
        }
      })
    }
  }

  /* Local copy indicators */
  function initLocalCopyIndicators () {
    if (!isLocalStorageAvailable || !document.e2.localCopies) return

    const $draftsLink = $('#e2-drafts-item')
    const $draftsUnsavedLed = $draftsLink.find('.e2-unsaved-led')
    const $newNoteUnsavedLed = $('#e2-new-note-item .e2-unsaved-led')
    const $notesUnsaved = $('#e2-notes-unsaved')
    const $formNote = $('#form-note')

    const localCopiesList = document.e2.localCopies.getList()
    const isNewLocalCopyAvailable = document.e2.localCopies.doesCopyExist('new')
    const noteId = $formNote ? $('#note-id').val() : null
    const isNoteLocalCopyAvailable = noteId !== 'new' ? document.e2.localCopies.doesCopyExist(noteId) : false

    let localCopiesCount = Object.keys(localCopiesList).length

    if (isNewLocalCopyAvailable) localCopiesCount--
    if (isNoteLocalCopyAvailable) localCopiesCount--

    // indicator near the drafts button
    if ($draftsUnsavedLed && localCopiesCount > 0) {
      $draftsLink.show()
      $draftsUnsavedLed.show()
    }

    // indicator near the new note button
    if ($newNoteUnsavedLed && isNewLocalCopyAvailable) {
      $newNoteUnsavedLed.show()
    }

    // indicators on the drafts page
    if ($notesUnsaved) {
      const newName = document.e2.localCopies.getName('new')

      if (Object.prototype.hasOwnProperty.call(localCopiesList, newName)) {
        delete localCopiesList[newName]
      }

      // show indicators near the drafts if they have local copies
      for (const key in localCopiesList) {
        if (localCopiesList[key].isPublished === 'false') {
          $('#e2-draft-' + key + ' .e2-unsaved-led').show()
          delete localCopiesList[key]
        }
      }

      if (Object.keys(localCopiesList).length) {
        for (const lc in localCopiesList) {
          const copy = document.e2.localCopies.get(lc)

          if (!copy) continue // if smth goes wrong we just get out of here

          const $link = $('#e2-unsaved-note-prototype').clone(true)
          $link.attr('id', null)
          $('.e2-admin-link', $link).attr('href', copy.link)
          $('u', $link).html(copy.title)
          $link.attr('style', '')

          $notesUnsaved.append($link)
        }

        $notesUnsaved.show()
      }
    }
  }

  initDrops()
  initUserPic()
  initLocalCopyIndicators()
}

initObsoleteFunction()

/* Third init admin items and couple items */
function initAllAdminItems () {
  var toggleThinkingStatus = function ($link, status) {
    if (status) {
      $link.addClass('e2-admin-item_thinking')
      e2SpinningAnimationStartStop($link, 1)
    } else {
      e2SpinningAnimationStartStop($link, 0)
      $link.removeClass('e2-admin-item_thinking')
    }
  }

  var toggleDisabledStatus = function ($link, status) {
    if (status) {
      $link.addClass('e2-admin-item_disabled e2-popup-menu-widget-item_disabled')
    } else {
      $link.removeClass('e2-admin-item_disabled e2-popup-menu-widget-item_disabled')
    }
  }

  var makeAjaxRequest = function ($link, functionWhenToggleOn, functionWhenToggleOff) {
    $link.blur()

    if ($link.hasClass('e2-admin-item_disabled')) return true
    if ($link.hasClass('e2-popup-menu-widget-item_disabled')) return true

    var beforeAjaxState = $link.hasClass('e2-admin-item_on') ? 'on' : 'off'
    var isCoupleTrigger = typeof $link.data('e2-js-action') !== 'undefined' && $link.data('e2-js-action').indexOf('couple-trigger') >= 0

    $link.removeClass('e2-admin-item_on')

    toggleThinkingStatus($link, 1)
    toggleDisabledStatus($link, 1)

    e2Ajax({
      url: $link.attr('href'),
      data: 'result=ajaxresult',
      success: function (response) {
        if (typeof response.data === 'undefined' || typeof response.data['flag-now-on'] === 'undefined') {
          e2NiceError({
            message: 'er--js-server-error',
            debug: {
              message: 'Server responce malformed',
              data: {
                response: response
              }
            }
          })
          if (beforeAjaxState === 'on') {
            $link.addClass('e2-admin-item_on')
          }
          return false
        }

        if (response.data['flag-now-on']) {
          $link.addClass('e2-admin-item_on')
          functionWhenToggleOn($link, response.data['new-href'])
        } else {
          $link.removeClass('e2-admin-item_on')
          functionWhenToggleOff($link, response.data['new-href'])
        }
      },
      error: function () {
        if (beforeAjaxState === 'on') {
          $link.addClass('e2-admin-item_on')
        }
        if (isCoupleTrigger) {
          $link.trigger('E2_ADMIN_COUPLE_CHANGE_ITEM')
        }
      },
      complete: function () {
        toggleThinkingStatus($link, 0)
        toggleDisabledStatus($link, 0)
      }
    })
  }

  var onClick = function ($link) {
    var actionsVocabulary = {
      'toggle-favourite': function () {
        makeAjaxRequest(
          $link,
          function ($link, newHref) {
            $link.attr('href', newHref).parents('.e2-note').addClass('e2-note-favourite')
          },
          function ($link, newHref) {
            $link.attr('href', newHref).parents('.e2-note').removeClass('e2-note-favourite')
          }
        )
      },
      'toggle-pinned': function () {
        makeAjaxRequest(
          $link,
          function ($link, newHref) {
            $link.attr('href', newHref)
          },
          function ($link, newHref) {
            $link.attr('href', newHref)
          }
        )
      },
      'toggle-important': function () {
        makeAjaxRequest(
          $link,
          function ($link, newHref) {
            $link.attr('href', newHref).parents('.e2-comment, .e2-comment-form-meta-area').find('.e2-comment-piece-markable').addClass('e2-comment-piece-marked')
          },
          function ($link, newHref) {
            $link.attr('href', newHref).parents('.e2-comment, .e2-comment-form-meta-area').find('.e2-comment-piece-markable').removeClass('e2-comment-piece-marked')
          }
        )
      },
      'removed-href': function () {
        makeAjaxRequest(
          $link,
          function ($link, newHref) {},
          function ($link, newHref) {
            var $comment = $link.parents('.e2-comment')

            $comment.find('.e2-comment-author').addClass('e2-comment-author-removed')
            $comment.find('.e2-comment-meta, .e2-comment-content').slideUp(333)

            if (!$comment.hasClass('.e2-reply')) {
              $comment.siblings('.e2-reply').slideUp(333)
            }

            $link.trigger('E2_ADMIN_COUPLE_CHANGE_ITEM', { response: 'removed' })
          }
        )
      },
      'replaced-href': function () {
        makeAjaxRequest(
          $link,
          function ($link, newHref) {
            var $comment = $link.parents('.e2-comment')

            $comment.find('.e2-comment-content, .e2-comment-meta').slideDown(333)
            $comment.find('.e2-comment-author').removeClass('e2-comment-author-removed')

            if (!$comment.hasClass('.e2-reply')) {
              $comment.siblings('.e2-reply').slideDown(333)
            }

            $link.trigger('E2_ADMIN_COUPLE_CHANGE_ITEM', { response: 'recovered' })
          },
          function ($link, newHref) {}
        )
      },
      'couple-trigger': function () {
        $link.trigger('E2_ADMIN_COUPLE_WILL_THINK')
      }
    }

    var returnValue = true
    var dataJsAction = $link.data('e2-js-action')

    if (dataJsAction) {
      $.each(dataJsAction.split(','), function (index, action) {
        if (typeof actionsVocabulary[action] === 'function') {
          returnValue = false
          actionsVocabulary[action]()
        }
      })
    }

    return returnValue
  }

  $('.e2-admin-item').add('.e2-popup-menu-widget-item').on('click', function () {
    return onClick($(this))
  })
}

initAllAdminItems()

function initAllAdminCouples () {
  var coupleItemHiddenModifier = 'e2-admin-couple-item_hidden'
  var coupleThinkingModifier = 'e2-admin-couple_thinking'

  var initAdminCouple = function ($couple) {
    if (!$couple.length) return

    var $coupleItems = $couple.find('.e2-admin-couple-item')

    $couple.find('[data-e2-js-action*="couple-trigger"]')
      .on('E2_ADMIN_COUPLE_CHANGE_ITEM', function (event, eventData) {
        e2SpinningAnimationStartStop($couple.find('.e2-admin-couple-spinner'), 0)

        if (typeof eventData === 'object' && typeof eventData.response === 'string') {
          $coupleItems.addClass(coupleItemHiddenModifier)
          $couple.find('.e2-admin-couple-item_' + eventData.response).removeClass(coupleItemHiddenModifier)
        }

        $couple.removeClass(coupleThinkingModifier)
      })
      .on('E2_ADMIN_COUPLE_WILL_THINK', function () {
        e2SpinningAnimationStartStop($couple.find('.e2-admin-couple-spinner'), 1)
        $couple.addClass(coupleThinkingModifier)
      })
  }

  $('.e2-admin-couple').each(function () {
    initAdminCouple($(this))
  })

  $(document).on('E2_ADMIN_COUPLE_INIT', function (event, eventData) {
    if (typeof eventData.$couple === 'undefined') return
    initAdminCouple(eventData.$couple)
  })
}

initAllAdminCouples()
