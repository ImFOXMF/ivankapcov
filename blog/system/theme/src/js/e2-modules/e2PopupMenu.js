import generateUUIDv4 from '../lib/generate-uuidv4'

function initAllPopupMenus () {
  var popupMenuOpenModifier = 'e2-popup-menu_open'
  var popupMenuVisibleModifier = 'e2-popup-menu_visible'
  var popupMenuBottomModifier = 'e2-popup-menu_widgetfrombottom'
  var popupMenuRightModifier = 'e2-popup-menu_widgetfromright'

  var initPopupMenu = function ($popupMenu) {
    if (!$popupMenu.length) return

    var thisId = generateUUIDv4()
    var $popupMenuWidget = $popupMenu.find(".e2-popup-menu-widget")

    var closePopupMenu = function () {
      $popupMenu.removeClass(popupMenuOpenModifier)
      $popupMenu.removeClass(popupMenuVisibleModifier)
      $popupMenu.removeClass(popupMenuBottomModifier)
      $popupMenu.removeClass(popupMenuRightModifier)
      $(document).off('click.' + popupMenuOpenModifier + '-' + thisId)
    }

    var openPopupMenu = function () {
      $(document).on('click.' + popupMenuOpenModifier + '-' + thisId, function (event) {
        if (event.target !== $popupMenu[0] && $popupMenu.has(event.target).length === 0) {
          closePopupMenu()
        }
      })
      $popupMenu.addClass(popupMenuOpenModifier)
      if ($popupMenu.offset().top + $popupMenuWidget.position().top + $popupMenuWidget.outerHeight() > Math.max($("html").outerHeight(), $(window).outerHeight())) {
        $popupMenu.addClass(popupMenuBottomModifier)
      }
      if ($popupMenu.offset().left + $popupMenuWidget.position().left + $popupMenuWidget.outerWidth() > $(window).outerWidth()) {
        $popupMenu.addClass(popupMenuRightModifier)
      }
      $popupMenu.addClass(popupMenuVisibleModifier)
    }

    $popupMenu.find('.e2-popup-menu-button').on('click.' + popupMenuOpenModifier + '-' + thisId, function () {
      if ($popupMenu.hasClass(popupMenuOpenModifier)) {
        closePopupMenu()
      } else {
        openPopupMenu()
      }
    })

    $popupMenu.find('.e2-popup-menu-widget-item').on('click', function () {
      var $item = $(this)
      if ($item.data('e2-popup-menu-action') === 'do-not-close-popup-menu') return true
      closePopupMenu()
    })
  }

  $('.e2-popup-menu').each(function () {
    initPopupMenu($(this))
  })

  $(document).on('E2_ADMIN_ITEM_WITH_POPUP_MENU_INIT', function (event, eventData) {
    if (!eventData.$popupMenu instanceof jQuery) return
    initPopupMenu(eventData.$popupMenu)
  })
}

export default initAllPopupMenus