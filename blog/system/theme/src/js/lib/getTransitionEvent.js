function getTransitionEvent () {
  var t
  var el = document.createElement('div')
  var transitions = {
    'transition': 'transitionend',
    'OTransition': 'oTransitionEnd',
    'MozTransition': 'transitionend',
    'MSTransition' : 'msTransitionEnd',
    'WebkitTransition': 'webkitTransitionEnd'
  }

  for (t in transitions) {
    if (typeof el.style[t] !== 'undefined') {
      return transitions[t]
    }
  }

  return false
}

export default getTransitionEvent
