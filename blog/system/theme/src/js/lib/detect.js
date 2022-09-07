export default {
  mac: /Macintosh/.test(navigator.userAgent),
  iosdevice: /(iPad)|(iPhone)/.test(navigator.userAgent),
  touchdevice: (function () {
    if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
      return true
    }

    var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ')
    var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('')

    function mq (query) {
      if (typeof window.matchMedia === 'function') {
        return window.matchMedia(query).matches
      } else {
        return false
      }
    }

    return mq(query)
  }) ()
}
