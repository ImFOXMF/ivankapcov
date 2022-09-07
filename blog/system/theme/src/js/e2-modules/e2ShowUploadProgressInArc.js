function e2ShowUploadProgressInArc ($arc, progressPercent, noTransition) {
  if (typeof progressPercent !== 'number') {
    return
  }

  const maxDash = 245
  const fakeProgress = Math.max(Math.min(progressPercent, 0.9), 0.1)

  if (noTransition) {
    $arc.attr('class', 'e2-progress e2-progress_notransition') // jQuery < 3 can’t add and remove classes in svg elements
  }

  $arc[0].style.strokeDashoffset = Math.floor(maxDash - fakeProgress * maxDash)

  if (noTransition) {
    $arc.attr('class', 'e2-progress')
  }
}

export default e2ShowUploadProgressInArc
