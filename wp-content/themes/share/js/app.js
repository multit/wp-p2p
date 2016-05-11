  'use strict';



var app = (function(document, $) {
	var docElem = document.documentElement,
		_userAgentInit = function() {
			docElem.setAttribute('data-useragent', navigator.userAgent);
		},
		_init = function() {

      //console.info(Modernizr);

			$(document).foundation();
      // needed to use joyride
      // doc: http://foundation.zurb.com/docs/components/joyride.html

      $(document).on('click', '#start-jr', function () {
          $(document).foundation('joyride', 'start');
      });
			_userAgentInit();

      // Modernizr  SVG  ! SVG Filter
			// SVG / PNG sostituisce i svg con PNG per i browser più vecchi
			// Per ora abbiamo solo il logo 
      if ( typeof Modernizr != 'undefined' ) {
  			 if(!Modernizr.svg) {
  			    $('img[src*="svg"]').attr('src', function () {
  			    return $(this).attr('src').replace('.svg', '.png');
  			  });
  			}
      }      

      $(window).load(function() {       
        var tl = new TimelineLite();        
        tl.to('#ajax-loader', 0.4, {delay:1,rotation:720, scale:0, ease:Cubic.easeOut})                
        .to('#loader', 0.3, {autoAlpha:0});
      });



/*
 ######   #######  ##        #######  ########  #### 
##    ## ##     ## ##       ##     ## ##     ##  ##  
##       ##     ## ##       ##     ## ##     ##  ##  
##       ##     ## ##       ##     ## ########   ##  
##       ##     ## ##       ##     ## ##   ##    ##  
##    ## ##     ## ##       ##     ## ##    ##   ##  
 ######   #######  ########  #######  ##     ## #### 
*/

      // Colora gli elementi del menu fullscreen
      $('li.fs-mega-map').each(function(index, el) {
              $(this).hover(function() {
                /* Stuff to do when the mouse enters the element */
                var bgcolor = $(this).attr('bgc');
                $(this).css('backgroundColor', bgcolor);
              }, function() {
                /* Stuff to do when the mouse leaves the element */
                $(this).css('backgroundColor', 'transparent');
              });
      });


      // Colora titolini in maniera random per singola lettera
      $( '.random_colored' ).each(function( index ) {            
            var message = $( this ).text();
            var lun_message = message.length;
            var colors = new Array('#88101D','#AC9865','#615931','#25545D','#C89B67','#AC502A','#008173','#735079','#8A8444','#956F3E');
            var lun_colors = colors.length;
            var newHtml = '';

            for (var i = 0; i < lun_message; i++) {
                var randomnumber=Math.floor(Math.random()*lun_colors);              
                newHtml += '<span style="color:' + colors[randomnumber] + ';">' + message[i] + '</span>';              
            }
            $( this ).html(newHtml) ;
      });

      // Colora titolini in maniera random (un solo colore random)
      $( '.random_color' ).each(function( index ) {            
            var message = $( this ).text();
            var lun_message = message.length;
            var colors = new Array('#88101D','#AC9865','#615931','#25545D','#C89B67','#AC502A','#008173','#735079','#8A8444','#956F3E');
            var lun_colors = colors.length;
            var randomnumber=Math.floor(Math.random()*lun_colors); 
            $(this).css('color', colors[randomnumber]);            
      });


      // Colora backgound in maniera random (un solo colore random)
      $( '.random_colored_backgr' ).each(function( index ) {            
            var message = $( this ).text();
            var lun_message = message.length;
            var colors = new Array('#88101D','#AC9865','#615931','#25545D','#C89B67','#AC502A','#008173','#735079','#8A8444','#956F3E');
            var lun_colors = colors.length;
            var randomnumber=Math.floor(Math.random()*lun_colors); 
            $(this).css('background-color', colors[randomnumber]); 
            $(this).css('color', '#FFFFFF');            
      });            

/* 
##    ## ######## ##      ##  ######  
###   ## ##       ##  ##  ## ##    ## 
####  ## ##       ##  ##  ## ##       
## ## ## ######   ##  ##  ##  ######  
##  #### ##       ##  ##  ##       ## 
##   ### ##       ##  ##  ## ##    ## 
##    ## ########  ###  ###   ######  
*/


$('.info-expander').click(function(event) {
  /* Act on the event */
  var panel = $(this).next();
  if ( $(panel).css('height') == '0px' ) {
    $(panel).css('height', 'auto');
  } else {
    $(panel).css('height',0)
  }
  
});


/*
##     ## ######## ##    ## ##     ## 
###   ### ##       ###   ## ##     ## 
#### #### ##       ####  ## ##     ## 
## ### ## ######   ## ## ## ##     ## 
##     ## ##       ##  #### ##     ## 
##     ## ##       ##   ### ##     ## 
##     ## ######## ##    ##  #######  
*/

      $('.HPscroller').click(function(event) {
        /* Act on the event */
        event.preventDefault();
        var tgt = $(this).attr('section');            
        $('html, body').animate({ scrollTop: $(tgt).offset().top - 300 }, 2000);
      });
      
      $('.fast-scroller').click(function(event) {
        /* Act on the event */
        event.preventDefault();
        var tgt = $(this).attr('section');            
        $('html, body').animate({ scrollTop: $(tgt).offset().top - 300 }, 800);
      });


      $('.menuAnimated').click(function(event) {
        var tl = new TimelineLite();
        tl.to($(this), 0.1, {'margin-top':10}).to($(this), 0.3, {'margin-top':0});
      });

     // Inattiva i menu principali
      $('li.menu-item-has-children>a').each(function(index, el) {
        $(this).removeAttr('href');
        $(this).addClass('inactive-menu-a')
      });
      
      // Mostra la mappa full screen del sito

      $('.fullscreen-map-toggler').click(function(event) {
          event.preventDefault();          
          toggleFullscreenMap();                
      });      

      function toggleFullscreenMap() {

        //var scrollNow = $(window).scrollTop();
        //$('#fullscreen-mega-map').css('top', scrollNow );
        TweenMax.to( $(".fullscreen-mega-map-active"), 0.6, { css:{className:"fullscreen-mega-map-inactive"} });    
        TweenMax.to( $(".fullscreen-mega-map-inactive"), 0.2, { css:{className:"fullscreen-mega-map-active"} });    
        // // Se non è visibile
        //   if ($('#fullscreen-mega-map').css('display') === 'none') {
        //     $('body').css('overflow', 'hidden');
        //     $(this).parent().css('backgroundColor', '#EFEFE8');
        //     $('#fullscreen-mega-map').css('overflow', 'auto');
        //     TweenLite.fromTo ('#fullscreen-mega-map' , 0.3, {opacity:0}, {opacity:1,display:'block', top:$(window).scrollTop()});
        //     $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-up" style="display:inline"></i>' );         
        //   } 
        //   // Se invece è il menu è aperto
        //   else{
        //     TweenMax.to('#fullscreen-mega-map', 0.6, {opacity:0, display:'none'});
        //     $(this).parent().css('backgroundColor', 'transparent');
        //     $('body').css('overflow', 'auto');
        //     $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-down" style="display:inline"></i>' );
        //   }    
      };

      // Chiude la mappa fullscreen cliccandoci sopra ma i link continuano a funzionare
      $('#fullscreen-mega-map').click(function(event) {        
          toggleFullscreenMap();         
      });   














  },   // end init function


      _animazione_logo = function() {

            // variabili altezza maassima di scrollspay e dimensioni CSS iniziali e finali
            var scrollspy_max = 570;

            var endVal = {
              'hb' : parseInt( $('.share-logo').css('background-size') , 10),
              'pt' : parseInt( $('.share-logo').css('padding-top') , 10),
              'mt' : parseInt( $('#logo-animato').css('margin-top') , 10),
              'bm' : parseInt( $('#logo-spacer.animated').css('height') , 10)
            };

            var beginVal = {
              'hb' : 300,  // Dimensione iniziale logo
              'pt' : 100  ,
              'mt' : 40,
              'bm' : 323  // Altezza del logo-spacer.animated
            };      
            
            // Imposta lo stato iniziale

            if ( $(window).scrollTop() < scrollspy_max) {

              $('#logo-spacer.animated').css('height', beginVal.bm );
              $('.share-logo.animated').css({
                  height: beginVal.hb,
                  paddingTop: beginVal.pt
              });
              TweenMax.to('.share-logo h1',0.6,{ 'font-size': '11em', 'margin-bottom': -5 });
              
            }
          

            var calcola_percent = function (begin,end,perc) {
                var diff = begin - end;
                var percentuale = (diff / 100) * perc;
                return percentuale;
            };

            var revolvingMenuHeight = -($('div.menudue').height());
            $('div.menudue').css({
              top: revolvingMenuHeight,
            });

            $(window).scrollspy({ 
                 min: 0 ,
                 max: scrollspy_max,

                 onEnter: function(element, position) {
                    var menuHeight = -($('div.menudue').height());
                    TweenMax.to('div.menudue',0.8,{ 'top': menuHeight });
                    TweenMax.to('div#logo-area',0.8,{ 'top': 67 });                    

                 },
                 onLeave: function(element, position) {
                   
                   TweenMax.to('div.menudue',0.8,{ 'top': 0 });

                    // $('div.logo_large.animated').css({ 'padding-top':endVal.pt, 'background-size':endVal.hb, 'margin-top':endVal.mt });
                    // $('#logo-spacer.animated').css({'height': endVal.bm});
                    // $('#menutop-logo.animated').css({
                    //   width: endVal.issW,
                    //   height: endVal.issW
                    // });                    
                    TweenMax.to('div#logo-area',0.8,{ 'top': -250 });

                 },
                 onTick: function(element, position) {
                    var perc = 100 * position.top / scrollspy_max;
                    perc = perc.toFixed(0);  // Percentuale dal top
                    var bgdiff_abs =  beginVal.hb - calcola_percent( beginVal.hb,endVal.hb,perc ).toFixed(0);
                    var ptdiff_abs =  beginVal.pt - calcola_percent( beginVal.pt,endVal.pt,perc ).toFixed(0);
                    var mtdiff_abs =  beginVal.mt - calcola_percent( beginVal.mt,endVal.mt,perc ).toFixed(0);
                    var bmdiff_abs =  beginVal.bm - calcola_percent( beginVal.bm,endVal.bm,perc ).toFixed(0);

                    TweenMax.to('.share-logo.animated',0.4,{ 'padding-top':ptdiff_abs, 'margin-top':mtdiff_abs });
                    //TweenMax.to('div.logo_large.animated',0.4,{ 'padding-top':ptdiff_abs, 'background-size':bgdiff_abs, 'margin-top':mtdiff_abs });
                    TweenMax.to('#logo-spacer.animated',0.8,{'height': bmdiff_abs });

                    //var issWdiff_abs =  beginVal.issW - calcola_percent( beginVal.issW,endVal.issW,perc ).toFixed(0);
                    //var issHdiff_abs =  beginVal.issH - calcola_percent( beginVal.issH,endVal.issH,perc ).toFixed(0);
                    //TweenMax.to('#menutop-logo.animated',0.8,{'width': issWdiff_abs, 'height':issHdiff_abs });


                 }
           });

      };  // end animazione minore
	return {
		init: _init,
    animazioneLogo: _animazione_logo
	};

})(document, jQuery);



(function() {
	  app.init();
    app.animazioneLogo();
})();

