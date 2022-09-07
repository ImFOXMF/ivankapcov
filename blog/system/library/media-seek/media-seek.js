;($ && $(function() {
  const CONTROL_TYPES = {
    YOUTUBE: 'youtube',
    VIMEO: 'vimeo',
    PLAIN: 'plain',
  };

  initVideoSeek();

  function initVideoSeek() {
    const controlledVideos = getControlledVideos();

    if (!controlledVideos.length) return;

    const youtubeControls = controlledVideos.filter(c => c.type === CONTROL_TYPES.YOUTUBE);
    initYoutubeControls(youtubeControls);

    const vimeoControls = controlledVideos.filter(c => c.type === CONTROL_TYPES.VIMEO);
    initVimeoControls(vimeoControls);

    const plainControls = controlledVideos.filter(c => c.type === CONTROL_TYPES.PLAIN);
    initPlainControls(plainControls);
  }

  function initYoutubeControls(videos) {
    if (!videos.length) return;

    loadYoutubeAPI(() => {
      videos.forEach(({ controls, videoNode }) => {
        new YT.Player(videoNode, {
          events: {
            onReady: (event) => {
              controls.forEach(({ controlNode, seconds }) => {
                initControlNode(controlNode, () => {
                  event.target.seekTo(seconds, true);
                });
              });
            },
          }
        });
      });
    });
  }

  function initVimeoControls(videos) {
    if (!videos.length) return;

    loadVimeoAPI(() => {
      videos.forEach(({ controls, videoNode }) => {
        const player = new Vimeo.Player(videoNode);
        player.on('loaded', () => {
          controls.forEach(({ controlNode, seconds }) => {
            initControlNode(controlNode, () => {
              player.setCurrentTime(seconds);
              player.play().catch(e => {
                if (e.name === 'NotAllowedError') {
                  // some browsers do not allow to play video if user haven't
                  // interacted with them yet. we just ignore it. c'est la vie.
                  return;
                }

                // otherwise print the error because it's weird
                console.error(e);
              });
            });
          });
        });
      });
    });
  }

  function initPlainControls(videos) {
    if (!videos.length) return;

    videos.forEach(({ controls, videoNode }) => {
      videoNode.addEventListener('loadeddata', () => {
        controls.forEach(({ controlNode, seconds }) => {
          initControlNode(controlNode, () => {
            videoNode.currentTime = seconds;
            videoNode.play();
          });
        });
      });
    });
  }

  function initControlNode(node, onClick) {
    return $(node)
      .addClass('is-interactive')
      .on('mouseover', e => {
        if ($(e.target).closest('a').length) return;
        $(node).addClass('isolatedHover');
      })
      .on('mouseout', e => {
        $(node).removeClass('isolatedHover');
      })
      .on('click', e => {
        if ($(e.target).closest('a').length) return;
        onClick();
      });
  }

  function getControlledVideos() {
    return $('.e2-media-control[data-type="seek"]')
      .get()
      .reduce((acc, controlNode) => {
        const controlType = controlNode.dataset.type;
        const seekTo = controlNode.dataset.to;
        const href = controlNode.dataset.href;

        if (controlType !== 'seek') {
          // console.log('Dropped', href, 'because type is not seek, it is', controlType);
          return acc;
        }

        if (typeof seekTo !== 'string') {
          // console.log('Dropped', href, 'because', seekTo, 'is not string');
          return acc;
        }

        const seconds = timeStringToSeconds(seekTo);

        // is nan?
        if (seconds !== seconds) {
          // console.log('Dropped', href, 'because', seekTo, 'is not valid seek');
          return acc;
        }

        const { type, selector } = getControlMetadataByHref(href);
        const videoNode = findControlledVideo(controlNode, selector);

        if (!videoNode) {
          // console.log('Dropped', href, 'because controlled video was not found');
          return acc;
        }

        const videoDataIndex = acc.findIndex(x => x.videoNode === videoNode);
        if (videoDataIndex > -1) {
          acc[videoDataIndex].controls.push({ controlNode, seconds });
          return acc;
        }

        return acc.concat({
          type,
          videoNode,
          controls: [{ controlNode, seconds }],
        });
      }, []);
  }

  function getControlMetadataByHref(href) {
    const youtubeId = getYoutubeIdFromUrl(href);

    if (youtubeId) {
      return {
        type: CONTROL_TYPES.YOUTUBE,
        selector: `iframe[src^="https://www.youtube.com/embed/${youtubeId}"]`,
      }
    }

    const vimeoId = getVimeoIdFromUrl(href);
    if (vimeoId) {
      return {
        type: CONTROL_TYPES.VIMEO,
        selector: `iframe[src^="https://player.vimeo.com/video/${vimeoId}"]`,
      }
    }

    return {
      type: CONTROL_TYPES.PLAIN,
      selector: `video[src$="${href}"]`,
    }
  }

  function findControlledVideo(control, selector) {
    const noteSelector = getNoteSelectorByChildElement(control);
    const videoSelector = `${noteSelector} ${selector}`;
    const $video = $(videoSelector).first();

    return $video.get()[0];
  }

  function getNoteSelectorByChildElement(elem) {
    const $note = $(elem).closest('.e2-note');

    if (!$note.length) return null;

    return `.e2-note[data-note-id="${$note.data('note-id')}"]`;
  }

  function getYoutubeIdFromUrl(url) {
    const match = url.match(/^https?:\/\/(www\.)?(youtube\.com\/watch\?v=|youtu.be\/)([^#&?]*)/);
    return (match && match[3].length === 11) ? match[3] : null;
  }

  function getVimeoIdFromUrl(url) {
    const match = url.match(/^https?:\/\/(www\.)?vimeo\.com\/(\d*)/);
    return (match && match[2].length > 0) ? match[2] : null;
  }

  function timeStringToSeconds(str) {
    const [seconds = 0, minutes = 0, hours = 0] = str.split(':').reverse().map(x => +x);
    return seconds + minutes * 60 + hours * 60 * 60;
  }

  function loadYoutubeAPI(callback) {
    const tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';

    document.getElementsByTagName('head')[0].append(tag);

    // https://developers.google.com/youtube/iframe_api_reference#Requirements
    window.onYouTubeIframeAPIReady = () => {
      // console.log('YouTube Iframe API Ready');
      callback()
    };
  }

  function loadVimeoAPI(callback) {
    const tag = document.createElement('script');
    tag.src = 'https://player.vimeo.com/api/player.js';

    document.getElementsByTagName('head')[0].append(tag);

    // it would be great to you some onInit fn here, but Vimeo does not have one:
    // https://github.com/vimeo/player.js/issues/473
    tag.onload = () => {
      // console.log('Vimeo Iframe API Ready');
      callback()
    };
  }
}));
