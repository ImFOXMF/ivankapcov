import getTransitionEvent from '../lib/getTransitionEvent'
import e2SpinningAnimationStartStop from '../e2-modules/e2SpinningAnimationStartStop'
import e2ShowUploadProgressInArc from '../e2-modules/e2ShowUploadProgressInArc'
import e2CanUploadThisFile from './e2CanUploadThisFile'
import e2PastePic from './e2PastePic'
import e2UploadFile from './e2UploadFile'
import e2Delfiles from './e2Delfiles'
import e2NiceError from './e2NiceError'

function initTextWithFileUpload () {
  if (!$('#form-tag').length && !$('#form-note').length) return

  if ($('.e2-upload-controls-attach').length > 0) {
    $(document.body).addClass(
      'e2-external-drop-target e2-external-drop-target-body e2-external-drop-target-altable'
    )
  }

  var transitionEvent = getTransitionEvent()

  var filesToUpload = []
  var listedThumbnails = []

  var completedUploadSize = 0
  var totalUploadSize = 0

  var $uploadedImages = $('.e2-uploaded-images')
  var $uploadedImagesInstances = $uploadedImages.find('.e2-uploaded-image')

  var $uploadControls = $('.e2-upload-controls')
  var $uploadButtonWrapper = $uploadControls.find('.e2-upload-controls-attach')
  var $uploadButton = $uploadButtonWrapper.find('.e2-upload-controls-attach-input')
  var $uploadSpinner = $uploadControls.find('.e2-upload-controls-uploading')

  var uploadControlsHiddenModifier = 'e2-upload-controls_hidden'
  var uploadButtonWrapperHiddenModifier = 'e2-upload-controls-attach_hidden'
  var uploadSpinnerHiddenModifier = 'e2-upload-controls-uploading_hidden'

  function $e2AddPasteableImage (imageThumb, imageFull, imageFilesize, imageWidth, imageHeight) {
    var $newImage = $('#e2-uploaded-image-prototype').clone(true)
    var $innerGood = $newImage.find('.e2-uploaded-image-inner_good')
    var $innerGoodImg = $innerGood.find('img')
    var $innerBad = $newImage.find('.e2-uploaded-image-inner_bad')
    var $innerBadNoImage = $innerBad.find('.e2-uploaded-image-noimage')
    var $popupMenu = $newImage.find('.e2-popup-menu')

    $newImage
      .removeAttr('id')
      .attr('style', '')
      .data('file', imageFull)
      .css('width', '')

    $popupMenu.find('.e2-image-popup-menu-filename').text(imageFull).attr('title', imageFull)

    if (imageWidth && imageHeight) { // picture is available on server
      $innerBad.remove()
      $innerGoodImg
        .attr('src', imageThumb + '?' + new Date().getTime())
        .attr('alt', imageFull)
        .attr('width', imageWidth)
        .attr('height', imageHeight)

      $popupMenu.find('.e2-image-popup-menu-filesize').text(imageFilesize)
    } else { // picture is not available on server
      $newImage.addClass('e2-uploaded-image_broken')
      $innerGood.remove()
      $innerBadNoImage.attr('data-src', imageThumb)

      $popupMenu
        .find('.e2-popup-menu-widget-item').filter(':not(.e2-popup-menu-widget-item_info):not(.e2-popup-menu-widget-item_remove)')
        .addClass('e2-popup-menu-widget-item_disabled')
    }

    $(document).trigger('E2_ADMIN_ITEM_WITH_POPUP_MENU_INIT', {
      $popupMenu: $popupMenu
    })

    if ($.inArray(imageFull, listedThumbnails) === -1) {
     listedThumbnails.push(imageFull)
    }

    return $newImage
  }

  function e2ClearUploadBuffer () {
    if (filesToUpload.length) {
      var $progress = $uploadSpinner.find('circle.e2-progress')
      var file = filesToUpload.shift()
      var url = $('#e2-file-upload-action').attr('href') + '?'

      if (!e2CanUploadThisFile(file.name, /^gif|jpe?g|png|svg|mp3|mp4|mov$/i)) {
        e2NiceError({
          message: 'er--unsupported-file',
          debug: {
            data: {
              file: file
            }
          }
        })
        return false
      }

      if (typeof $('#note-id').val() !== 'undefined') {
        url += 'entity=note&entity-id=' + $('#note-id').val()
      } else if (typeof $('#tag-id').val() !== 'undefined') {
        url += 'entity=tag&entity-id=' + $('#tag-id').val()
      } else {
        url = null
      }
      if (url && file.e2AltKeyPressed) {
        url += '&overwrite'
      }

      e2SpinningAnimationStartStop($uploadSpinner, 1)

      $uploadSpinner.removeClass(uploadSpinnerHiddenModifier)
      $uploadButtonWrapper.addClass(uploadButtonWrapperHiddenModifier)

      e2UploadFile({
        file: file,
        url: url,
        progress: function (event) {
          if (event.lengthComputable) {
            e2ShowUploadProgressInArc($progress, (completedUploadSize + event.loaded) / totalUploadSize)
          }
        },
        success: function (response) {
          completedUploadSize += file.size

          var $thumbToUpdate = $(
            '#e2-uploaded-images img[src="' + response['data']['thumb'] + '"], ' +
            '#e2-uploaded-images img[src^="' + response['data']['thumb'] + '?"], ' +
            '#e2-uploaded-images .e2-uploaded-image-noimage[data-src="' + response['data']['thumb'] + '"], ' +
            '#e2-uploaded-images .e2-uploaded-image-noimage[data-src^="' + response['data']['thumb'] + '?"]'
          )
          var $thumbToUpdateParent = $thumbToUpdate.parents('.e2-uploaded-image')

          if (response['data']['overwrite']) {
            if (!filesToUpload.length) {
              e2SpinningAnimationStartStop($uploadSpinner, 0)
              $uploadSpinner.addClass(uploadSpinnerHiddenModifier)
              $uploadButtonWrapper.removeClass(uploadButtonWrapperHiddenModifier)
            }

            if ($thumbToUpdate.length) {
              $e2AddPasteableImage(
                response['data']['thumb'],
                response['data']['new-name'],
                response['data']['filesize'],
                response['data']['width'],
                response['data']['height']
              ).insertAfter($thumbToUpdateParent)
              $thumbToUpdateParent.remove()
            }
          } else {
            if (file.e2DroppedIntoTextarea) e2PastePic(response['data']['new-name'])

            var alreadyListed = ($.inArray(response['data']['new-name'], listedThumbnails) !== -1)

            if (!alreadyListed) {
              $e2AddPasteableImage(
                response['data']['thumb'],
                response['data']['new-name'],
                response['data']['filesize'],
                response['data']['width'],
                response['data']['height']
              ).appendTo($uploadedImages).show(333, function () {
                if (!filesToUpload.length) {
                  e2SpinningAnimationStartStop($uploadSpinner, 0)
                  $uploadSpinner.addClass(uploadSpinnerHiddenModifier)
                  $uploadButtonWrapper.removeClass(uploadButtonWrapperHiddenModifier)
                }
              })
            } else {
              if (!filesToUpload.length) {
                e2SpinningAnimationStartStop($uploadSpinner, 0)
                $uploadSpinner.addClass(uploadSpinnerHiddenModifier)
                $uploadButtonWrapper.removeClass(uploadButtonWrapperHiddenModifier)
              }
              if ($thumbToUpdate.length) {
                $e2AddPasteableImage(
                  response['data']['thumb'],
                  response['data']['new-name'],
                  response['data']['filesize'],
                  response['data']['width'],
                  response['data']['height']
                ).insertAfter($thumbToUpdateParent)
                $thumbToUpdateParent.remove()
              }
            }
          }

          e2ClearUploadBuffer()
        },
        error: function () {
          if (!filesToUpload.length) {
            e2SpinningAnimationStartStop($uploadSpinner, 0)
            $uploadSpinner.addClass(uploadSpinnerHiddenModifier)
            $uploadButtonWrapper.removeClass(uploadButtonWrapperHiddenModifier)
          }

          e2ClearUploadBuffer()
        },
        complete: function() {
          e2ShowUploadProgressInArc($progress, 0)
        }
      })

      return false
    } else {
      totalUploadSize = 0
      completedUploadSize = 0

      return true
    }
  }

  function e2LoadImagesFromDrop (e) {
    var dt = e.originalEvent.dataTransfer
    if (!dt || !dt.files) return

    var e2DroppedIntoTextarea = $(e.target).attr('id') === 'text'

    filesToUpload.length = 0

    for (var i = 0; i < dt.files.length; i++) {
      dt.files[i].e2AltKeyPressed = e.altKey
      dt.files[i].e2DroppedIntoTextarea = e2DroppedIntoTextarea
      filesToUpload.push(dt.files[i])
      // completedUploadSize = 0
      totalUploadSize += dt.files[i].size
    }

    e2ClearUploadBuffer()

    return false
  }

  function e2LoadImagesFromInput (e) {
    if (!e.target.files.length) return false

    filesToUpload.length = 0

    for (var i = 0; i < e.target.files.length; i++) {
      filesToUpload.push(e.target.files[i])
      // completedUploadSize = 0
      totalUploadSize += e.target.files[i].size
    }

    e2ClearUploadBuffer()

    return false
  }

  function e2MakeImageFilename (now) {
    var month = now.getMonth()
    month = month < 10 ? '0'+month : month;
    var day = now.getDate()
    day = day < 10 ? '0'+day : day;
    var hours = now.getHours()
    hours = hours < 10 ? '0'+hours : hours;
    var minutes = now.getMinutes()
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var seconds = now.getSeconds()
    seconds = seconds < 10 ? '0'+seconds : seconds;
    return (
      'image-' + now.getFullYear() + month + day +
      '-' + hours + minutes + seconds +
      '.png'
    )
  }

  function e2LoadImagesFromPaste (e) {
    const files = ((e.clipboardData || e.originalEvent.clipboardData).files || []);
    
    if (!files.length) return;

    filesToUpload.length = 0
    
    for (let i = 0; i < files.length; i++) {
      var e2File = files[i]
      var now = new Date()

      if ((e2File.lastModified === now.getTime()) && (e2File.name === 'image.png')) {
        // must be an image pasted directly from clipboard, not a file with a name
        // e2File = new File ([files[i]], e2MakeImageFilename (now), {
        e2File = new File ([files[i]], $uploadControls.data('e2FilenamePrefix') + '.png', {
          lastModified: files[i].lastModified,
          size: files[i].size,
          type: files[i].type,
          webkitRelativePath: files[i].webkitRelativePath,
        })
      }

      // set e2DroppedIntoTextarea to true to “emulate” dropping 
      // for auto pasting filename into the text field
      e2File.e2DroppedIntoTextarea = true

      filesToUpload.push(e2File)
      // completedUploadSize = 0
      totalUploadSize += e2File.size
    }

    e2ClearUploadBuffer()

    return false
  }

  function e2ChangeImagesToPasteableImages () {
    var imagesArray = []

    $uploadedImagesInstances.each(function () {
      var $this = $(this)
      var $img = $this.find('img')
      var $noimage = $this.find('.e2-uploaded-image-noimage')

      var imageThumb
      var imageFull
      var imageFilesize
      var imageWidth
      var imageHeight

      if ($img.length) {
        imageThumb = $img.attr('src')
        imageFull = $img.data('filename')
        imageFilesize = $img.data('filesize')
        imageWidth = $img.attr('width')
        imageHeight = $img.attr('height')
      } else {
        imageThumb = $noimage.data('src')
        imageFull = $noimage.data('filename')
      }

      imagesArray.push($e2AddPasteableImage(imageThumb, imageFull, imageFilesize, imageWidth, imageHeight))
    })

    return imagesArray
  }

  $uploadedImages
    .on('click', '[data-e2-js-action*="remove-image"]', function (event) {
      var $picToDelete = $(event.currentTarget).parents('.e2-uploaded-image')
      var picToDeleteFile = $picToDelete.data('file')

      var picToDeleteDeletingModifier = 'e2-uploaded-image_deleting'
      var picToDeleteDeletedModifier = 'e2-uploaded-image_deleted'

      $picToDelete.addClass(picToDeleteDeletingModifier)

      e2Delfiles({
        file: picToDeleteFile,
        success: function () {
          listedThumbnails.splice($.inArray(picToDeleteFile, listedThumbnails), 1)

          if (transitionEvent) {
            $picToDelete.off(transitionEvent + '.e2Delfiles').on(transitionEvent + '.e2Delfiles', function () {
              $picToDelete.remove()
            })
            $picToDelete.addClass(picToDeleteDeletedModifier)
          } else {
            $picToDelete.remove()
          }
        },
        error: function () {
          $picToDelete.removeClass(picToDeleteDeletingModifier)
        }
      })

      return false
    })
    .on('click', '[data-e2-js-action*="paste-image"]', function (event) {
      var $this = $(event.currentTarget)
      e2PastePic($this.parents('.e2-uploaded-image').data('file'))
      return false
    })

  if ($uploadedImagesInstances.length) {
    $uploadedImages.html(e2ChangeImagesToPasteableImages())
  }

  $uploadControls.removeClass(uploadControlsHiddenModifier)
  $uploadButton.on('change', e2LoadImagesFromInput)

  $('.e2-external-drop-target-body, .e2-external-drop-target-textarea')
    .on('drop', e2LoadImagesFromDrop)
    .on('paste', e2LoadImagesFromPaste)
}

export default initTextWithFileUpload
