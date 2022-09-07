import e2Ajax from './e2Ajax'

/**
 * Delete options.file to options.url
 * @param {object}    options
 * @param {string}    options.file
 * @param {function}  [options.success]
 * @param {function}  [options.error]
 * @param {function}  [options.complete]
 * @param {function}  [options.abort]
 **/

function e2Delfiles (options) {
  var url = $('#e2-file-remove-action').attr('href') + '?'

  if ($('#form-note').length) {
    url += 'entity=note&entity-id=' + $('#note-id').val()
  } else if ($('#form-tag').length) {
    url += 'entity=tag&entity-id=' + $('#tag-id').val()
  } else {
    return false
  }

  return e2Ajax({
    url: url,
    data: {'file': options.file},
    success: options.success,
    error: options.error,
    complete: options.complete,
    abort: options.abort
  })
}

export default e2Delfiles
