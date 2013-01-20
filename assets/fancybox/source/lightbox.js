$(document).ready(function() {

	$(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
      padding : 0,
        beforeShow: function () {
          /* Disable right click */
          $.fancybox.wrap.bind("contextmenu", function (e) {
                 return false; 
          });
        }
     });

// $(".fancybox").fancybox();
    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
 	$("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using  so that a Lightbox Gallery exists
    	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();
    // Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
//    $(".video").fancybox({
//    maxWidth        : 800,
//    maxHeight       : 600,
//    fitToView       : false,
//    width           : '70%',
//    height          : '70%',
//    autoSize        : false,
//    closeClick      : false,
//   openEffect      : 'none',
//    closeEffect     : 'none'
    });

