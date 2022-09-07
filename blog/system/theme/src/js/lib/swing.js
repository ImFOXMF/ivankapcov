const swing = (function () {
  var timeouts = {}

  return function (el) {
    if (!el) {
      return
    }

    var swingIdKey = 'data-swing-id'
    var swingId = el.getAttribute(swingIdKey)

    if (!swingId) {
      swingId = 'swing-' + Math.floor(Math.random() * 100000)
      el.setAttribute(swingIdKey, swingId)
    }

    if (timeouts[swingId]) {
      clearTimeout(timeouts[swingId])
    }

    var m = 0
    var x = 0

    var nahStep = function (el) {
      var l = (1 / (Math.pow(x, 1.25) / 20 + 0.5) - 0.05) * Math.sin(x / 2)
      el.style.transform = 'translateX(' + (m + l * 100) + 'px)'
      x++
      if (x < 82) { timeouts[swingId] = setTimeout(nahStep.bind(null, el), 14) } else { el.style.transform = 'translateX(' + m + 'px)' }
    }

    nahStep(el)
  }
})()

export default swing
