$(document).ready(function() {

  // only small screens
  if($(window).width() <= 600){
    // show menu on swipe to right
    $(document).on('swiperight', function(e) {
      e.preventDefault();
      $('#leftMenu').animate({
        left: '0'
      });
    });
    // hide menu on swipe to left
    $(document).on('swipeleft',function(e){
      e.preventDefault();
      $('#leftMenu').animate({
        left: '-100%'
      });
    });
  }
    
$("#login").click(function(){
        $("#loginform").slideToggle(400);
    });

});

