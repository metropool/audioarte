// $Id$

/**
 *  @file xmenu.js
 *  Xmenu javascript controller.
 */

/**
 *  ImageThumbnailsController class.
 */
function ImageThumbnailsController ($parent) {
  // Add image tag for previewing medium-sized images.
  var $preview = jQuery('<img src="" />');
  jQuery('.image-thumbnails-preview', $parent).prepend($preview);
  // Get module settings
  var settings = Drupal.settings.thumbnails;
  // Grab popup link
  $popupLink = jQuery('a.ctools-use-modal', $parent);
  
  // Select thumbnails anchors and
  jQuery('ul.image-thumbnails-thumbnails li a.thumb', $parent)
    // 1) prevent multiple events binding
    .not('.image-thumbnails-processed')
    .addClass('.image-thumbnails-processed')
    // 2) attach our click handler (returning false)
    .click(thumbnailClickHandler)
    // 3) preload each preview-sized image to browser cache
    .each(function () {
      preloadImage(this.href);
    }
  );

  // Show first image after page has loaded.
  changePreviewImage(jQuery('ul.image-thumbnails-thumbnails li a:first'));

  /**
   *  Handles changing preview image when thumbnail is clicked. Returns false to prevent default link click handling.
   */
  function thumbnailClickHandler() {
    changePreviewImage(jQuery(this));
    return false;
  }

  /**
   *  Extracts link's href attribute.
   *
   *  @param $link
   *    Thumbnail anchor with href pointing to
   */
  function getThumbnailSrc($link) {
    return $link.attr('href');
  }

  /**
   *  Changes preview image.
   *
   *  @param src
   *    New image src.
   */
  function changePreviewImage($link) {
    // We're going to take title and alt from this.
    var thumbnail = jQuery('img', $link);
    // Extract filename from image src.
    var src = getThumbnailSrc($link);
    var filename = src.split('/').pop();
    // Get url pattern from settings.
    var pattern = settings.modal_path;
    // Replace tokens in pattern.
    $popupLink.attr('href', pattern.replace('**FILENAME**', filename).replace('**STYLENAME**', settings.popup_style));
    // Let ctools modal process the link again.
    $popupLink.unbind();
    $popupLink.removeClass('ctools-use-modal-processed');
    Drupal.behaviors.ZZCToolsModal.attach($parent);
    // Finally change the image.
    $preview.attr({
      'src': src,
      'alt': thumbnail.attr('alt'),
      'title': thumbnail.attr('title')
    });
  }

  /**
   *  Handles preloading images to browser cache so they are ready to use.
   */
  function preloadImage(src) {
    var $img = jQuery('<img />').attr('src', src).css('display', 'none');
    jQuery('body').append($img);
  }
}

Drupal.behaviors.thumbnails = {
  attach: function (context) {
    var controllers = new Array();
    var i = 0;
    
    jQuery('.image-thumbnails', context)
      .not('.image-thumbnails-processed')
      .addClass('image-thumbnails-processed')
      .each(function () {
        // Create a controller for every formatter instance.
        controllers[i++] = new ImageThumbnailsController(jQuery(this));
      }
    );

    var onMouseOutOpacity = 0.67;
    jQuery('ul.image-thumbnails-thumbnails li a').opacityrollover({
      mouseOutOpacity:   onMouseOutOpacity,
      mouseOverOpacity:  1.0,
      fadeSpeed:         'fast',
      exemptionSelector: '.selected'
    });
  }
}