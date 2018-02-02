jQuery(document).ready(function($){
  //you can now use $ as your jQuery object.
  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    navText: ["<img src='../wp-content/themes/clm/assets/img/arrow-prev.png'>","<img src='../wp-content/themes/clm/assets/img/arrow-next.png'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
  });

  $('.story .hideme').eq(0).addClass('story-aux');


  /* Every time the window is scrolled ... */
    $(window).scroll( function(){

        /* Check the location of each desired element */
        $('.hideme').each( function(i){

            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();

            if( (bottom_of_window - 200) > (top_of_object) ){

                $(this).animate({'opacity':'1', 'top': '0'},500);

            }

        });

    });

});
