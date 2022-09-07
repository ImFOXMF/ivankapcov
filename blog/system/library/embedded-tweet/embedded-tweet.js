window.addEventListener('load', function () {
  document.querySelectorAll('.e2-embedded-tweet').forEach(function (tweetEl) {
    tweetEl.innerHTML = ''
    twttr.widgets.createTweet(tweetEl.dataset.tweetId, tweetEl)
  });
})