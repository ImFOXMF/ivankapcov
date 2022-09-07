import getTransitionEvent from '../lib/getTransitionEvent'

/**
 * Show beautiful error message
 * @param {object}    error
 * @param {string}    [error.message]
 * @param {object}    [error.debug]
 * @param {string}    [error.debug.message]
 * @param {object}    [error.debug.data]
 **/

function e2NiceError (error) {
  var $element = $('.e2-nice-error')
  var $inner = $element.find('.e2-nice-error-inner')
  var hiddenModificator = 'e2-nice-error_hidden'

  var stringLocalizations = {
    'en': {
      'er--js-server-error': 'Server error',
      'er--js-appears-offline': 'The connection appears to be offline',
      'er--js-connection-timeout': 'Server does not respond for too long',
      'er--js-file-upload-not-supported': 'The browser does not support file upload',
      'er--js-no-files-to-upload': 'No files to upload',
      'er--js-can-upload-only-one-file': 'Only one file may be uploaded here',
      'er--supported-only-png-jpg-gif': 'Only png, jpg, & gif images are supported',
      'er--unsupported-file': 'Only png, jpg, gif, & svg images, mp4 & mov videos, and mp3 audio files are supported',
    },
    'ru': {
      'er--js-server-error': 'Ошибка на сервере',
      'er--js-appears-offline': 'Похоже, что нет интернета',
      'er--js-connection-timeout': 'Сервер не отвечает слишком долго',
      'er--js-file-upload-not-supported': 'Браузер не поддерживает загрузку файлов',
      'er--js-no-files-to-upload': 'Нет файлов для загрузки',
      'er--js-can-upload-only-one-file': 'Можно загрузить только одно изображение',
      'er--supported-only-png-jpg-gif': 'Поддерживаются только изображения png, jpg и gif',
      'er--unsupported-file': 'Поддерживаются только изображения png, jpg, gif и svg, видео mp4 и mov и аудиофайлы mp3',
    },
    'fr': {
      'er--js-server-error': 'Erreur sur le serveur',
      'er--js-appears-offline': 'La connexion semble être hors ligne',
      'er--js-connection-timeout': 'Le serveur ne répond pas trop longtemps',
      'er--js-file-upload-not-supported': 'Le navigateur ne prend pas en charge le téléchargement de fichiers',
      'er--js-no-files-to-upload': 'Aucun fichier à télécharger',
      'er--js-can-upload-only-one-file': 'Un seul fichier peut être téléchargé ici',
      'er--supported-only-png-jpg-gif': 'Seules les images png, jpg et gif sont prises en charge',
      'er--unsupported-file': 'Seuls les images png, jpg, gif et svg, vidéos mp4 et mov et les fichiers audio mp3 sont pris en charge',
    },
    'be': {
      'er--js-server-error': 'Памылка на серверы',
      'er--js-appears-offline': 'Падобна на тое, што няма інтэрнэту',
      'er--js-connection-timeout': 'Сервер не адказвае занадта доўга',
      'er--js-file-upload-not-supported': 'Браўзэр не падтрымлівае загрузку файлаў',
      'er--js-no-files-to-upload': 'Няма файлаў для загрузкі',
      'er--js-can-upload-only-one-file': 'Можна загрузіць толькі адна выява',
      'er--supported-only-png-jpg-gif': 'Падтрымлiваюцца толькi выявы png, jpg i gif',
      'er--unsupported-file': 'Падтрымлiваюцца толькi выявы png, jpg, gif i svg, відэа mp4 і mov i аудыёфайлы mp3',
    },
    'uk': {
      'er--js-server-error': 'Помилка на сервері',
      'er--js-appears-offline': 'Схоже, що немає інтернету',
      'er--js-connection-timeout': 'Сервер не відповідає занадто довго',
      'er--js-file-upload-not-supported': 'Браузер не підтримує завантаження файлів',
      'er--js-no-files-to-upload': 'Немає файлів для завантаження',
      'er--js-can-upload-only-one-file': 'Можна завантажити лише одне зображення',
      'er--supported-only-png-jpg-gif': 'Підтримуються лише зображення png, jpg і gif',
      'er--unsupported-file': 'Підтримуються лише зображення png, jpg, gif і svg, відео mp4 і mov і аудіофайли mp3',
    }
  }

  var transitionEvent = getTransitionEvent()

  function showMessage () {
    var errorText = error.message ? error.message : ''
    var lang = $('html').attr('lang') || 'en'

    if (errorText) {
      if (typeof stringLocalizations[lang][error.message] !== 'undefined') {
        errorText = stringLocalizations[lang][error.message]
      } else if (typeof stringLocalizations['en'][error.message] !== 'undefined') {
        errorText = stringLocalizations['en'][error.message]
      }

      if ($element.hasClass(hiddenModificator)) {
        $inner.html(errorText).promise().done(function () {
          $element.removeClass(hiddenModificator)
          $(document).on('mousedown.e2NiceError keydown.e2NiceError', function () {
            $(document).off('.e2NiceError')
            hideMessage()
          })
        })
      } else {
        hideMessage(function () {
          $inner.html(errorText).promise().done(function () {
            $element.removeClass(hiddenModificator)
            $(document).on('mousedown.e2NiceError keydown.e2NiceError', function () {
              $(document).off('.e2NiceError')
              hideMessage()
            })
          })
        })
      }
    }

    if (typeof error.debug === 'object' && typeof console === 'object') {
      var errorColor;
      var backgroundColor;

      if (typeof window.getComputedStyle === 'function' && typeof window.getComputedStyle(document.documentElement).getPropertyValue === 'function') {
        errorColor = window.getComputedStyle(document.documentElement).getPropertyValue('--errorColor')
        backgroundColor = window.getComputedStyle(document.documentElement).getPropertyValue('--backgroundColor')
      }

      if (typeof console.log === 'function') {
        if (typeof error.debug.message === 'string') {
          console.log('%c ' + error.debug.message + ' ', 'background: ' + (errorColor ? errorColor : '#D20D19') + '; color: ' + (backgroundColor ? backgroundColor : '#fff') + ';')
        } else if (typeof errorText === 'string') {
          console.log('%c ' + errorText + ' ', 'background: ' + (errorColor ? errorColor : '#D20D19') + '; color: ' + (backgroundColor ? backgroundColor : '#fff') + ';')
        }
      }

      if (typeof console.dir === 'function' && typeof console.log === 'function') {
        if (typeof error.debug.data === 'object') {
          $.each(error.debug.data, function(debugDataKey, debugDataValue) {
            if (typeof debugDataValue === 'object' && debugDataValue instanceof FormData && typeof debugDataValue.entries === 'function') {
              console.log(debugDataKey)
              for (var formDataObject of debugDataValue.entries()) {
                console.dir(formDataObject[1]);
              }
            } else {
              console.log(debugDataKey)
              console.dir(debugDataValue)
            }
          })
        }
      }
    }
  }

  function hideMessage (callbackFunction) {
    if (typeof callbackFunction === 'function') {
      if (transitionEvent) {
        $element.off(transitionEvent + '.e2NiceError').on(transitionEvent + '.e2NiceError', function () {
          $element.off(transitionEvent + '.e2NiceError')
          callbackFunction()
        })
        $element.addClass(hiddenModificator)
      } else {
        $element.addClass(hiddenModificator)
        callbackFunction()
      }
    } else {
      $element.addClass(hiddenModificator)
    }
  }

  showMessage()
}

export default e2NiceError
