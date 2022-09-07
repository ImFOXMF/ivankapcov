function e2CanUploadThisFile (filename, mask) {
  var ext = ''
  var dot = filename.lastIndexOf('.')
  var extensionMask = typeof mask === 'object' ? mask : /^gif|jpe?g|png|svg|mp3$/i;

  if (dot !== -1) ext = filename.substr(dot + 1)

  return extensionMask.test(ext)
}

export default e2CanUploadThisFile
