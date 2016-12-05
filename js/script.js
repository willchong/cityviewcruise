$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
       if (st > lastScrollTop){
           $('nav').removeClass('active');
       } else {
          // upscroll code
           $('nav').addClass('active');
       }
       lastScrollTop = st;
    });
});

$(document).ready(function() {

  $('.navlink').on('click', function(event) {
      event.preventDefault();
      console.log($(this));
      var section = $(this).attr('href');
      var position = $(section).offset().top;
      $("html, body").animate({ scrollTop: position-64 });
  });

});
