$(document).ready(function() {
  $('.primery-header').after('<div class="nav-space"/>')
  $(window).scroll(function() {

      if ($(window).scrollTop() > 1) {
          $('.nav-space').css('height', $('.navbar').height());
          $('.primery-header').addClass('fixed-header');

      } else {

          $('.primery-header').removeClass('fixed-header');
          $('.nav-space').css('height', '0');
      }

    });

  $(".navbar-toggle").click(function() {
      $(this).toggleClass('toggle-icon');
      $(".navbar-default .navbar-nav").slideToggle();
  });

// Custom js here


$(".mainNav").mCustomScrollbar({
  theme:"light-thin",
   setHeight: 550
});


 $('.tab-link li').click(function(){
    $('.tab-link li').removeClass('active');
    $(this).addClass('active');
    var get_id = $(this).data('tab');
    $('.repeat-row').removeClass('active');
    
    $('#' + get_id).addClass('active');

  });



     $(".menubtnopen,.menubtnclse").click(function(){
     $(".menubox").toggleClass("menu-open");

    });


  AOS.init({
  easing: 'ease-out-back',
  duration: 1000
  });

  
 window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
  header.classList.add("sticky");
  } else {
  header.classList.remove("sticky");
  }
}


//Accordion Nav
  jQuery('.mainNav').navAccordion({
    expandButtonText: '<i class="fa fa-angle-down"></i>',  //Text inside of buttons can be HTML
    collapseButtonText: '<i class="fa fa-angle-up"></i>'
  }, 
  function(){
    console.log('Callback')
});



  $('.lagencycaro').owlCarousel({
  loop: true,
  margin: 10,
  dots:false,
  autoplay:true,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
    items: 1,
    nav: true
    },
    600: {
    items: 3,
    nav: false
    },
    1000: {
    items: 4,
    nav: true,
    loop: true,
    margin: 15
    }
  }
  });

  $('.testimonal').owlCarousel({
  loop: true,
  dots:false,
  nav: true,
  autoplay:true,
  autoplayTimeout:5000,
  autoplayHoverPause:true,
  margin: 10,
  items: 1,
  responsiveClass: true
  });

  $('.productslider').owlCarousel({
  loop: true,
  margin: 10,
  dots:false,
  autoplay:false,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
    items: 1,
    nav: true
    },
    600: {
    items: 2,
    nav: false
    },
    1000: {
    items: 3,
    nav: true,
    loop: true,
    margin: 15
    }
  }
  });

  $('.exlporeblog').owlCarousel({
  loop: true,
  margin: 10,
  dots:false,
  autoplay:true,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
    items: 1,
    nav: true
    },
    600: {
    items: 2,
    nav: false
    },
    1000: {
    items: 3,
    nav: true,
    loop: true,
    margin: 15
    }
  }
  });

  $('.whtvideo').owlCarousel({
  center: true,
  dots:false,
  nav:true,
  items: 2,
  loop: true,
  margin: 10,
  responsive: {
    600: {
    items: 3
    }
  }
  });


           
$('.back-top a').hide();
   $(window).scroll(function(){
     if ($(this).scrollTop() > 100) {
         $('.back-top a').fadeIn();
     } else {
         $('.back-top a').fadeOut();
     }
 });
 $('.back-top a').click(function(){
     $("html, body").animate({ scrollTop: 0 }, 800);
     return false;
 });



var scrollLink = $('.scroll');

// Smooth scrolling
scrollLink.click(function(e) {
  e.preventDefault();
  $('body,html').animate({
    scrollTop: $(this.hash).offset().top
  }, 1000 );
});

// Active link switching
$(window).scroll(function() {
  var scrollbarLocation = $(this).scrollTop();
  
  scrollLink.each(function() {
    
    var sectionOffset = $(this.hash).offset().top ;
    
    if ( sectionOffset <= scrollbarLocation ) {
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');
    }
  })
  
});

  $(window).scroll(function(){
     if ($(this).scrollTop() > 100) {
	$('.scrollup').fadeIn();
	} else {
	$('.scrollup').fadeOut();
	}
	});			
	$('.scrollup').click(function(){
	$("html, body").animate({ scrollTop: 0 }, 600);
	return false;
   }); 

   $('#fadeandscale').popup({
        transition: 'all 0.3s',
        blur: true,
        escape: true,
        scrolllock: true,
    });

$('.accordion-con ul li h5').click(function() {

  if ($(this).parent().hasClass('active')) {
      $(this).parent().removeClass('active');
      $(this).siblings('.drop-box').slideUp();
      return;
  }
  $('.accordion-con ul li.active .drop-box').slideUp();
  $('.accordion-con ul li.active').removeClass('active');
  
  $(this).next().slideDown();
  $(this).parent().toggleClass('active');
  
});

});