import e2ShowUploadProgressInArc from './e2ShowUploadProgressInArc'

function e2SpinningAnimationStartStop ($container, start) {
  const $thinkingAnimation = $container.find('animateTransform')
  const $progress = $container.find('circle.e2-progress')

  if (!$thinkingAnimation.length) {
    return
  }

  if (start) {
    if (($thinkingAnimation[0].getAttribute('repeatCount') !== 'indefinite')) {
      $thinkingAnimation[0].setAttribute('repeatCount', 'indefinite')
      $thinkingAnimation[0].beginElement()
    }
  } else {
    $thinkingAnimation[0].setAttribute('repeatCount', '1')
  }

  if ($progress.length) {
    e2ShowUploadProgressInArc($progress, 0, true)
  }
}

export default e2SpinningAnimationStartStop
