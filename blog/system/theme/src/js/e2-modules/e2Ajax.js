import e2NiceError from './e2NiceError'

/**
 * Perform Ajax request to options.url with options.data
 * @param {object}    options
 * @param {string}    options.url
 * @param             options.data
 * @param {function}  [options.success]
 * @param {function}  [options.error]
 * @param {function}  [options.complete]
 * @param {function}  [options.abort]
 **/

function e2Ajax (options) {
  var defaultOptions = {
    type: 'post',
    timeout: 10000,
    dataType: 'json',
    cache: false
  }

  var onSuccess = options.success
  var onError = options.error
  var onComplete = options.complete
  var onAbort = options.abort

  delete options.success
  delete options.error
  delete options.complete
  delete options.abort

  var jqXHR = $.ajax($.extend(defaultOptions, options))

  jqXHR.done(function (response, textStatus, jqXHR) {
    if (typeof response === 'object') {
      if (response['success'] === true) {
        if (typeof onSuccess === 'function') {
          onSuccess(response, textStatus, jqXHR)
        }
      } else {
        if (typeof response['error'] === 'object') {
          if (typeof response['error']['message'] === 'string') {
            e2NiceError({
              message: response['error']['message'],
              debug: {
                data: {
                  requestData: options.data,
                  response: response
                }
              }
            })
          } else {
            e2NiceError({
              message: 'er--js-server-error',
              debug: {
                message: 'Server responce malformed: `response.error.message` is not available',
                data: {
                  requestData: options.data,
                  response: response
                }
              }
            })
          }
        } else {
          e2NiceError({
            message: 'er--js-server-error',
            debug: {
              message: 'Server responce malformed: `response.error` is not an object',
              data: {
                requestData: options.data,
                response: response
              }
            }
          })
        }
        if (typeof onError === 'function') {
          onError(jqXHR, textStatus)
        }
      }
    } else {
      e2NiceError({
        message: 'er--js-server-error',
        debug: {
          message: 'Server responce malformed: `response` is not an object',
          data: {
            requestData: options.data,
            response: response
          }
        }
      })
      if (typeof onError === 'function') {
        onError(jqXHR, textStatus)
      }
    }
  })

  jqXHR.fail(function (jqXHR, textStatus) {
    if (typeof jqXHR === 'object' && typeof jqXHR.status === 'number' && typeof textStatus === 'string') {
      if (jqXHR.status === 0) {
        if (textStatus === 'abort') {
          if (typeof onAbort === 'function') {
            onAbort(jqXHR, textStatus)
          }
          return false
        } else if (textStatus === 'timeout') {
          e2NiceError({
            message: 'er--js-connection-timeout'
          })
        } else {
          e2NiceError({
            message: 'er--js-appears-offline'
          })
        }
      } else if (jqXHR.status >= 400) {
        e2NiceError({
          message: 'er--js-server-error',
          debug: {
            message: 'Server responded with HTTP status code ' + jqXHR.status,
            data: {
              jqXHR: jqXHR
            }
          }
        })
      } else if (jqXHR.status === 200 && textStatus === 'parsererror') {
        e2NiceError({
          message: 'er--js-server-error',
          debug: {
            message: 'Server response is not JSON',
            data: {
              jqXHR: jqXHR
            }
          }
        })
      } else {
        e2NiceError({
          message: 'er--js-server-error',
          debug: {
            message: 'Unexpected server response HTTP status code ' + jqXHR.status,
            data: {
              jqXHR: jqXHR
            }
          }
        })
      }
    } else {
      e2NiceError({
        message: 'er--js-server-error',
        debug: {
          message: 'Server responce malformed: jqXHR is not an object or it does not contain required fields',
          data: {
            jqXHR: jqXHR
          }
        }
      })
    }
    if (typeof onError === 'function') {
      onError(jqXHR, textStatus)
    }
  })

  jqXHR.always(function () {
    if (typeof onComplete === 'function') {
      onComplete(arguments)
    }
  })

  return jqXHR
}

export default e2Ajax
