import { isLocalStorageAvailable } from '../lib/local-storage'

function initNotes () {
  const $notes = $('.e2-note')

  if ($notes.length && isLocalStorageAvailable) {
    checkCopies($notes)
  }

  function checkCopies ($notes) {
    for (let i = 0; i < $notes.length; i++) {
      const id = $notes.eq(i).data('note-id').toString()

      if (document.e2.localCopies.doesCopyExist(id)) {
        $(`.e2-note[data-note-id="${id}"] .e2-unsaved-led`).show()
      }
    }
  }
}

export default initNotes
