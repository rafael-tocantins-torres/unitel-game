
jQuery(document).ready(function () {

    // SLIDER SLICK FUNCTION

    // Nav function

    var trigger = jQuery('.hamburger'),
        overlay = jQuery('.overlay'),
       isClosed = false;
  
      trigger.click(function () {
        hamburger_cross();      
      });
  
      function hamburger_cross() {
  
        if (isClosed == true) {          
          overlay.hide();
          trigger.removeClass('is-open');
          trigger.addClass('is-closed');
          isClosed = false;
        } else {   
          overlay.show();
          trigger.removeClass('is-closed');
          trigger.addClass('is-open');
          isClosed = true;
        }
    }
    
    $('[data-toggle="offcanvas"]').click(function () {
          $('#wrapper').toggleClass('toggled');
    }); 
    




  $(window).on('load', function() { 
        
    $('.preload').fadeOut("slow");   
    
});

window.goBack = function (e){
    var defaultLocation = "http://unitel-games";
    var oldHash = window.location.hash;

    history.back(); // Try to go back

    var newHash = window.location.hash;



    /* Se a página não for carregada dentro de um certo limite de tempo 
    * (neste cado 1000ms) o utilizador será redireccionado pela localização default
    * acima descrita
    *
    * 
    */
  

    if(
        newHash === oldHash &&
        (typeof(document.referrer) !== "string" || document.referrer  === "")
    ){
        window.setTimeout(function(){
            // redirect 
            window.location.href = defaultLocation;
        },1000); 
    }
    if(e){
        if(e.preventDefault)
            e.preventDefault();
        if(e.preventPropagation)
            e.preventPropagation();
    }
    return false; // parar propapagação 
}

// Vai para página anterior no click

$('.go_back').on('click', function(){
    goBack();
});

$('.close-btn-rft').on('click', function(){
        $('.search-page').css('transform', 'scale(0)');
});

$('.rft-search').on('click', function(){
    
        $('.search-page').css('transform', 'scale(1)');
   
        
        
})

});