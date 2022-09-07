import { isLocalStorageAvailable } from '../lib/local-storage'

function initFormNoteLocalCopy () {
  const $formNote = $('#form-note')

  if (!isLocalStorageAvailable || !$formNote) return

  const $noteId = $('#note-id')
  const $isNotePublished = $('#is-note-published')
  const $liveSaveButon = $('#livesave-button')
  const $copyIndicator = $('#livesave-button + .e2-unsaved-led')
  const $title = $('#title')
  const $text = $('#text')
  const $tags = $('#tags')
  const $alias = $('#alias')
  const $stamp = $('#stamp')
  const $summary = $('#summary')
  const $uploadedImages = $('#e2-uploaded-images')
  const draftTimestamp = +$('#note-timestamp').val() * 1000 // because php returns timestamp in secs, but we need ms
  const serverTime = +$('#server-time').val() * 1000
  const initNoteId = $noteId.val()

  let prevLiveSaveButtonVisibility = $liveSaveButon.is(':visible')
  let caretPosition = null
  let localSaverInited = false
  let localSaverInterval = null

  document.e2.localCopies.loadLocalCopy = loadLocalCopy
  document.e2.localCopies.initLocalSaver = initLocalSaver
  document.e2.localCopies.destroyLocalSaver = destroyLocalSaver

  function initLocalSaver () {
    if (localSaverInited) return

    // remove listener if it was attached
    // TODO: why we first remove and then set it again?
    $formNote.off('ajaxError', initLocalSaver)

    localSaverInterval = setInterval(saveLocalCopy, 3000)
    window.addEventListener('beforeunload', saveLocalCopy)

    // remove beforeunload on pagehide, 'cause if not it will be run AFTER page loaded from back-forward cache
    // and if so it may remove local copy
    window.addEventListener('pagehide', removeBeforeUnloadListener)

    $formNote
      .on('submit', destroyLocalSaver)
      .on('ajaxError', initLocalSaver)
    $text.on('input', saveCaretPosition)

    localSaverInited = true
  }

  function destroyLocalSaver () {
    clearInterval(localSaverInterval)
    removeBeforeUnloadListener()
    window.removeEventListener('pagehide', removeBeforeUnloadListener)

    $formNote.off('submit', destroyLocalSaver)
    $text.off('input', saveCaretPosition)

    localSaverInited = false
  }

  function removeBeforeUnloadListener () {
    window.removeEventListener('beforeunload', saveLocalCopy)
  }

  function saveCaretPosition () {
    if ($text[0].selectionEnd) {
      caretPosition = $text[0].selectionEnd
    }
  }

  function loadLocalCopy () {
    const copy = document.e2.localCopies.get($noteId.val(), draftTimestamp, serverTime)

    if (!copy) return

    if (copy.caretPosition) {
      // when we paste new text, textarea will be autosized, so we subscribe to `autosized` event
      // and scroll page after that
      $text.one('autosized', function () {
        if (typeof window.getCaretCoordinates !== 'function') return

        const caretCoords = window.getCaretCoordinates($text[0], copy.caretPosition)
        const offsetTop = 15 // offset from the top edge of browser to caret in the $text

        window.scrollTo(0, $text.position().top + caretCoords.top - offsetTop)
      })
    }

    // restore title & text with trying to save undo/redo queue
    if (document.queryCommandSupported('insertText')) {
      $title.focus().select()
      document.execCommand('insertText', false, copy.title)
      $title.trigger('input')

      $text.addClass('e2-textarea-autosize_off').focus().select()
      document.execCommand('insertText', false, copy.text)
      $text.removeClass('e2-textarea-autosize_off').trigger('input')
    } else {
      $title.val(copy.title).trigger('input')
      $text.val(copy.text).trigger('input')
    }

    // here we need to check, does select contain all tags, or some of them were added locally
    const tags = copy.tags ? copy.tags.slice() : []

    if (tags.length) {
      $tags.find('option').each((i, option) => {
        const index = tags.indexOf(option.text)

        if (index > -1) {
          tags.splice(index, 1)
        }
      })
    }

    // if some tags are brand new, let's add them to the select
    if (tags.length) {
      // current version of chosen doesn't have event for full ready
      // liszt:ready emmited before listeners registration
      // so we just wait for .chzn-done on root node (and we don't use MutationObserver for more compatibility)
      let waitForFullReady
      const loadTags = () => {
        if (!$tags.hasClass('chzn-done')) {
          waitForFullReady = setTimeout(loadTags, 500)
          return
        }

        clearTimeout(waitForFullReady)

        const $input = $('#tags_chzn .search-field input')

        tags.forEach(item => {
          $input.val(item + ',')

          // 191 (/) instead of 188 (,) 'cause of chosen listener internals
          // if we trigger event with 188 it opens tags select, but we want to keep it closed
          $input.trigger({type: 'keyup', which: 191})
        })
      }

      waitForFullReady = setTimeout(loadTags, 500)
    }

    // and only then we change value of the select
    $tags.val(copy.tags).trigger('input')
    
    $summary.val(copy.summary)

    $uploadedImages
      .empty()
      .html(copy.images.reduce((result, image) => {
        if (typeof image.src === 'undefined' || !image.src) return ''
        return `${result}<div class="e2-uploaded-image"><div class="e2-uploaded-image-inner"><img src="${image.src}" alt="${image.alt}" width="${image.width}" height="${image.height}"></div></div>`
      }, ''))

    if ((copy.alias && $alias.val() !== copy.alias) || $stamp.val() !== copy.stamp) {
      $alias.val(copy.alias).trigger('change')
      $stamp.val(copy.stamp).trigger('change')

      $('.e2-note-time-and-url').slideToggle()
    }

    $liveSaveButon.show()
    $copyIndicator.show()

    if (copy.caretPosition) {
      $text.focus()
      $text[0].selectionStart = $text[0].selectionEnd = caretPosition = copy.caretPosition
    }
  }

  function saveLocalCopy () {
    const liveSaveButtonVisibility = $liveSaveButon.is(':visible')

    if (liveSaveButtonVisibility || prevLiveSaveButtonVisibility) {
      prevLiveSaveButtonVisibility = liveSaveButtonVisibility

      const stamp = getStamp()

      if (!stamp.images.length && !stamp.title.trim() && !stamp.text.trim()) {
        document.e2.localCopies.remove(stamp.id)
        return
      }

      document.e2.localCopies.save(stamp.id, stamp)
    }
  }

  function getStamp () {
    const previews = $uploadedImages.find('.e2-uploaded-image')
    const id = $noteId.val()
    const title = $title.val()
    const text = $text.val()
    const images = []

    let $img

    for (let i = 0; i < previews.length; i++) {
      $img = previews.eq(i).find('img')
      images.push({
        src: $img.attr('src'),
        alt: $img.attr('alt'),
        width: $img.width(),
        height: $img.height()
      })
    }

    return {
      id,
      title,
      text,
      tags: $tags.val(),
      images,
      // when user press ⌘ S in a new note, note's id changes, but alias field does not appear
      // so we shouldn't save alias if it's a form of a new note
      alias: initNoteId === 'new' ? false : $alias.val(),
      stamp: $stamp.val(),
      summary: $summary.val(),
      timestamp: (new Date()).getTime(),
      link: window.location.pathname,
      isPublished: $isNotePublished.val(),
      caretPosition
    }
  }
}

export default initFormNoteLocalCopy
