import { localStorage, isLocalStorageAvailable } from './local-storage'

const _lsKey = 'read-info';
const readDuration = 1; // seconds

let windowFocused = true
window.addEventListener('focus', () => windowFocused = true)
window.addEventListener('blur', () => windowFocused = false)

function viewCounter ({ noteId, endpointUrl }) {
  if (!isLocalStorageAvailable) return

  const readInfo = JSON.parse(localStorage.getItem(_lsKey) || '[]')

  if (readInfo.indexOf(noteId) !== -1) return

  let secondsPassed = 0
  const checkingInterval = setInterval(() => {
    if (!windowFocused || noteId !== document.e2.currentNoteId) return

    if (++secondsPassed >= readDuration) {
      clearInterval(checkingInterval)
      sendReadStatus(saveReadStatus)
    }
  }, 1000)

  function sendReadStatus (cb, retryTimeout = 2) {
    const xhr = new XMLHttpRequest()


    xhr.open('GET', endpointUrl)

    xhr.onreadystatechange = () => {
      if(xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status !== 200) {
          setTimeout(() => { sendReadStatus(cb, retryTimeout + 2) }, retryTimeout * 1000)
        } else {
          cb()
        }
      }
    }

    xhr.send()
  }

  function saveReadStatus() {
    const readInfo = JSON.parse(localStorage.getItem(_lsKey) || '[]')

    readInfo.push(noteId)
    localStorage.setItem(_lsKey, JSON.stringify(readInfo))
  }
}

export default viewCounter
