import e2Ajax from './e2Ajax'
import e2NiceError from './e2NiceError'

/**
 * Upload options.file to options.url
 * @param {object}    options
 * @param {File|Blob} options.file
 * @param {string}    options.url
 * @param {function}  [options.progress]
 * @param {function}  [options.success]
 * @param {function}  [options.error]
 **/

function e2UploadFile (options) {
  if (window.FormData) {
    var data = new window.FormData()
    data.append('file', options.file)

    e2Ajax({
      url: options.url,
      data: data,
      timeout: 0,
      contentType: false,
      processData: false,
      xhr: function () {
        var myXhr = $.ajaxSettings.xhr()
        if (myXhr.upload && typeof options.progress === 'function') {
          myXhr.upload.addEventListener('progress', options.progress, false)
        }
        return myXhr
      },
      success: options.success,
      error: options.error
    })
  } else {
    e2NiceError({
      message: 'er--js-file-upload-not-supported',
    })
  }
}

export default e2UploadFile
