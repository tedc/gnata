/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {

        $(document).ready(function () {
            $('.menu-item-has-children').each(function() {
              var a = $(this).find('a:first'),
                  submenu = $(this).find('.sub-menu:first');
                  a.on('click', function(e) {
                    e.preventDefault()
                    submenu.toggleClass('active');
                  })

            })
            // Inietta svg in immagine
            var mySVGsToInject = document.querySelectorAll('img.svg-inject');
            new SVGInjector(mySVGsToInject);

            // Menu responsive
            $(function(){
              var home = $('.header__logo > a').attr('href');
              $('#header-navigation').slicknav({
                prependTo: '.mobile-header',
                brand: '<a href="'+home+'">Home</a>' 
              });
            });

            // Aggiungi classe per i Blocchi Contenuto del Flex Content
            $(".focus").filter(function(index, element){
            return index % 2 == 1;
            }).addClass("focus--inverted");

            $(".shift").filter(function(index, element){
            return index % 2 == 1;
            }).addClass("shift--inverted");

            $('.shift__slider, .focus__slider').each(function() {
              var dir = ($('html').attr('dir') == 'rtl') ? true : false;
              var responsive = ($(this).parent().hasClass('flex__slider--split')) ? [{"breakpoint" : 640,"settings" : { "adaptiveHeight" : true}}] : [];
              $(this).slick({
                "fade":true,"slidesToShow":1,"autoplay":true,"autoplaySpeed":5000,"dots":false,"infinite":true,"rtl": dir, "responsive" : responsive
              });
            })

            // Conta dei bottoncioni
            // var lis = $('.bottoncione');
            //   var count = $('.bottoncione').length;

            //   switch (count)
            //   {
            //       case 2:
            //           lis.addClass('bottoncione--half');
            //           break;
            //       case 3:
            //           lis.addClass('bottoncione--third');
            //           break;
            //   }

            //   Aggiungi classe ai paragrafi nella lista marcatrici
              // $('.lista-marcatrici__paragrafo').each(function () {

              //     var self = $(this);
              //     $(this).waypoint({
              //         handler: function () {
              //             self.addClass('active');
              //         }, offset: '200px'
              //     });
              // })

             //   Aggiungi classe ai paragrafi di testo
              // $('.paragrafo h4').each(function () {

              //     var self = $(this);
              //     $(this).waypoint({
              //         handler: function () {
              //             self.addClass('is-visible');
              //         }, offset: '450px'
              //     });
              // })

              // //   Aggiungi classe ai paragrafi di testo
              // $('.paragrafo p').each(function () {

              //     var self = $(this);
              //     $(this).waypoint({
              //         handler: function () {
              //             self.addClass('is-visible');
              //         }, offset: '450px'
              //     });
              // });

            //   Fai comparire la call to action
            $(window).scroll(function() {    
                var scroll = $(window).scrollTop();
                if (scroll >= 70) {
                    $(".calltoaction").addClass("is-visible");
                }
            });

            // Cambio step
            $('.cf7mls_next').on('click', function () {
                var stepOne = $('.stepone');
                var stepTwo = $('.steptwo');
                var step = $('.steptxt');

                stepOne.toggleClass('stepped');
                stepTwo.toggleClass('stepped');
                step.html('Step 2');
            })

            $('.cf7mls_back').on('click', function () {
                var stepOne = $('.stepone');
                var stepTwo = $('.steptwo');
                var step = $('.steptxt');

                stepOne.addClass('stepped');
                stepTwo.removeClass('stepped');
                step.html('Step 1');
            })

            // Video per il focus affiancato
            $('.focus__playcontainer').click(function (e) { 
                e.preventDefault();
                var questo = $(this);
                var filmato = questo.prev('video');

                filmato[0].play();
                questo.fadeOut("slow");

                filmato.on('timeupdate', function(){
                    if( filmato[0].ended){
                        $(this).next('.focus__playcontainer').fadeIn("slow");
                    }
                });
            });

            $('.input-container').click(function(e) {
              e.stopPropagation();
              var target = $(this);
              var targetInput = $(this).find('input,textarea');
              var targetSelect = $(this).find('select');
              var styledSelect = $(this).find('.newSelect');
              var baseText = target.find('.placeholder').text();
              if($(this).find('.input:first').hasClass('selectbox')) {
                $('.inner-wrapper, .calltoaction').toggleClass('overflow');
              }
              target.toggleClass('active');
              setTimeout(function() {
                targetInput.focus();
                targetInput.trigger('focus');
              }, 50);
              targetInput.change(function() {
                var inputValue = ($(this).val().trim()!='') ? $(this).val() : baseText;
                var placeholder = target.find('.placeholder')
                target.removeClass('active');
                placeholder.html(inputValue);
                if(inputValue!=baseText) {
                  target.addClass('filled');
                  target.removeClass('error');
                } else {
                  target.removeClass('filled');
                  $(this).removeAttr('value');
                }
              });
              $('input, textarea').each(function() {
                $(this).on('click', function(e) {
                  e.stopPropagation();
                })
              })
              // targetSelect.change(function() {
              //   var inputValue = $(this).val();
              //   var placeholder = target.find('.placeholder')
              //   target.removeClass('active');
              //   placeholder.html(inputValue);
              // });
              styledSelect.click(function() {
                var target = $(this);
                setTimeout(function() {
                  target.parent().parent().parent().removeClass('active');
                }, 10);
              });
            });

            // style selects

            // Create the new select
            var select = $('.fancy-select');
            select.wrap('<div class="newSelect"></div>');
            $('.newSelect').prepend('<div class="newOptions"></div>');

            //populate the new select
            select.each(function() {
              var selectOption = $(this).find('option');
              var target = $(this).parent().find('.newOptions');
              var name = $(this).attr('name').replace('-select', '');
              selectOption.each(function() {
                var optionContents = $(this).html();
                var optionValue = $(this).attr('value');
                target.append('<div class="newOption" data-value="' + optionValue + '" data-input="'+name+'">' + optionContents + '</div>')
              });
            });

            $('.selectbox').perfectScrollbar();
            // new select functionality
            var newSelect = $('.newSelect');
            var newOption = $('.newOption');
            // update based on selection 
            newOption.on('mouseup', function() {
              var OptionInUse = $(this);
              var siblingOptions = $(this).parent().parent().find('.newOption');
              var newValue = $(this).attr('data-value');
              var name = $(this).attr('data-input');
              var selectOption = $(this).parent().parent().find('select option');
              // style selected option
              siblingOptions.removeClass('selected');
              OptionInUse.addClass('selected');
              $('input[name="'+name+'"]').val(newValue).trigger('change');
              var target = $(this).closest('.input-container');
              var placeholder = target.find('.placeholder');
              target.removeClass('active');
              placeholder.html(newValue); 
              if(newValue!='') {
                target.addClass('filled');
              } else {
                target.removeClass('filled');
              }
              // update the actual input
            });
            // newSelect.click(function() {
            //   var target = $(this);
            //   target.parent().find('select').change();
            // });
            $('.wpcf7').on('wpcf7invalid', function() {
              $('.input-container').each(function() {
              if($(this).find('.wpcf7-not-valid').length > 0) {
                $(this).addClass('error')
              } else {
                $(this).removeClass('error')
              }
              if($(this).find('.wpcf7-not-valid').val()=='') {
                $(this).removeAttr('value');
              }
            })
            });
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },


    // Home page
    'home': {
      init: function() {

        $(document).ready(function () {
            
            // Cambio header quando sorpasso i bottoncioni
            $('.bottoncioni-container').waypoint(function(){
              $('.header').toggleClass('header--home');
              $('.header__logo-home').toggleClass('header__logo-home--blu');
            },{
              offset: '70px'
            });

            // Video

            //return a DOM object
            var video = $('#thevideo');

            $('.video-hero__button').on('click', function(){
                video[0].currentTime = 0;
                video[0].play();
            });

            $(document).on('closing', '.video__container', function (e) {
                video[0].pause();
            });

            //Play/Pause control clicked
            $('.playbutton').on('click', function() {
                if(video[0].paused) {
                    video[0].play();
                }
                return false;
            });

            $('.stopbutton').on('click', function() {
                if(video[0].play) {
                    video[0].pause();
                }
                return false;
            });

            //get HTML5 video time duration
            video.on('loadedmetadata', function() {
                $('.duration').text(video[0].duration);
            });

            //update HTML5 video current play time
            video.on('timeupdate', function() {
                var currentPos = video[0].currentTime; //Get currenttime
                var maxduration = video[0].duration; //Get video duration
                var percentage = 100 * currentPos / maxduration; //in %
                $('.timeBar').css('width', percentage+'%');
            });

            // Seekable bar
            var timeDrag = false;   /* Drag status */
            $('.progressBar').mousedown(function(e) {
                timeDrag = true;
                updatebar(e.pageX);
            });
            $(document).mouseup(function(e) {
                if(timeDrag) {
                    timeDrag = false;
                    updatebar(e.pageX);
                }
            });
            $(document).mousemove(function(e) {
                if(timeDrag) {
                    updatebar(e.pageX);
                }
            });

            //update Progress Bar control
            var updatebar = function(x) {
                var progress = $('.progressBar');
                var maxduration = video[0].duration; //Video duraiton
                var position = x - progress.offset().left; //Click pos
                var percentage = 100 * position / progress.width();

                //Check within range
                if(percentage > 100) {
                    percentage = 100;
                }
                if(percentage < 0) {
                    percentage = 0;
                }

                //Update progress bar and video currenttime
                $('.timeBar').css('width', percentage+'%');
                video[0].currentTime = maxduration * percentage / 100;
            };

            $('.basso').click(function (){
              video[0].volume = 0.0;
              $(this).addClass('is-selected');
              $('.medio').removeClass('is-selected');
              $('.alto').removeClass('is-selected');
            });

            $('.medio').click(function (){
              video[0].volume = 0.5;
              $(this).addClass('is-selected');
              $('.basso').addClass('is-selected');
              $('.alto').removeClass('is-selected');
            });

            $('.alto').click(function (){
              video[0].volume = 1;
              $(this).addClass('is-selected');
              $('.medio').addClass('is-selected');
              $('.basso').addClass('is-selected');
            });

        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },


    // Pagina macchina
    'page_template_template_macchina': {
      
      init: function() {

          mediaCheck({
            media: '(min-width: 40em)',
            entry: function() {
              $(document).ready(function () {
                  $(".macchina__visual").stick_in_parent();
                  $('.macchina__zoomwrapper, .macchina__wrapper-riduttore').stick_in_parent(
                      {
                          offset_top: 100
                      }
                  );
              });
            },
            exit: function() {
              $(document).ready(function () {
                  $(".macchina__visual").trigger("sticky_kit:detach");
              });
            },
          });
        
        $(document).ready(function () {
            
            //   Inizializzo panzoom
            $("img.macchina__img").panzoom({
              $zoomIn: $('.macchina__zoomplus'),
              $zoomOut: $('.macchina__zoomminus'),
              increment: 0.1,
              minScale: 1,
              maxScale: 2,
              contain: 'invert',
            });

            $('.macchina__riduttore').click(function () { 
              $('.macchina__desc').toggleClass('macchina__desc--closed');
              $(this).toggleClass('macchina__riduttore--triggered');
              $('.macchina__wrapper-riduttore').toggleClass('is-sliding');
            });

            $('.tabella').waypoint(function (){
                $('.tabella').addClass('is-visible');
            },{offset: '80%'})

        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },

    // Post Singolo
    'single_post': {
      init: function() {
        
        $(document).ready(function () {
            
            // Inizializzo la gallery della news
            $('.lanews__gallery').slick({
              dots: true
            });

        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },

    // Pagina faq
    'page_template_template_faq': {
      init: function() {
        
        $(document).ready(function () {
            
            //   Inizializzo accordion
            $('.accordion').accordion({
              "transitionSpeed": 400
            });

        });

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },

    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },

    // Pagina contatti
    'page_template_template_contatti': {
      init: function () {

        $(document).ready(function () {
            
            //   Zoom per la mappa
            function ZoomControl(controlDiv, map) {

              // Creating divs & styles for custom zoom control
              controlDiv.style.padding = '5px';

              // Set CSS for the control wrapper
              var controlWrapper = document.createElement('div');
              controlWrapper.className = 'zoomwrapper';
              controlDiv.appendChild(controlWrapper);

              // Set CSS for the zoomIn
              var zoomInButton = document.createElement('div');
              zoomInButton.className = 'zoomwrapper__plus';
              controlWrapper.appendChild(zoomInButton);

              // Set CSS for the zoomOut
              var zoomOutButton = document.createElement('div');
              zoomOutButton.className = 'zoomwrapper__minus'
              controlWrapper.appendChild(zoomOutButton);

              // Setup the click event listener - zoomIn
              google.maps.event.addDomListener(zoomInButton, 'click', function() {
                map.setZoom(map.getZoom() + 1);
              });

              // Setup the click event listener - zoomOut
              google.maps.event.addDomListener(zoomOutButton, 'click', function() {
                map.setZoom(map.getZoom() - 1);
              });  

            }

            // Fine zoom mappa

            var templateUrl = object_name.templateUrl;
            // Google Maps
            // ==========================================================================
            /* jshint ignore:start */
            google.maps.event.addDomListener(window, 'load', init);
            var map;

            function init() {
              var mapOptions = {
                center: new google.maps.LatLng(mapCoords.lat, mapCoords.lng),
                zoom: 14,
                zoomControl: false,
                zoomControlOptions: {
                  style: google.maps.ZoomControlStyle.SMALL,
                },
                disableDoubleClickZoom: true,
                mapTypeControl: false,
                scaleControl: false,
                scrollwheel: false,
                panControl: true,
                // zoomControl: true,
                streetViewControl: false,
                draggable: true,
                overviewMapControl: true,
                overviewMapControlOptions: {
                  opened: false,
                },
                // zoomControlOptions: {
                //   position: google.maps.ControlPosition.BOTTOM_LEFT
                // },
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.natural",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.natural.landcover",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f8f9f9"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.natural.terrain",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#0efefe"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "color": "#052366"
                            },
                            {
                                "saturation": "-70"
                            },
                            {
                                "lightness": "85"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "lightness": "-53"
                            },
                            {
                                "weight": "1.00"
                            },
                            {
                                "gamma": "0.98"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "saturation": "-18"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#0266ad"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            }
                        ]
                    }
                ],
              }
              var mapElement = document.getElementById('mappa');
              var map = new google.maps.Map(mapElement, mapOptions);
              var sposta = ($(window).width() / 4);
              map.panBy(sposta, 0);
              var locations = [
                ['Gnata', 'undefined', 'undefined', 'undefined', 'undefined', mapCoords.lat, mapCoords.lng, templateUrl + '/dist/images/marker.png']
              ];
              for (i = 0; i < locations.length; i++) {
                if (locations[i][1] == 'undefined') {
                  description = '';
                } else {
                  description = locations[i][1];
                }
                if (locations[i][2] == 'undefined') {
                  telephone = '';
                } else {
                  telephone = locations[i][2];
                }
                if (locations[i][3] == 'undefined') {
                  email = '';
                } else {
                  email = locations[i][3];
                }
                if (locations[i][4] == 'undefined') {
                  web = '';
                } else {
                  web = locations[i][4];
                }
                if (locations[i][7] == 'undefined') {
                  markericon = '';
                } else {
                  markericon = locations[i][7];
                }
                marker = new google.maps.Marker({
                  icon: markericon,
                  size: new google.maps.Size(34, 48),
                  position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                  map: map,
                  title: locations[i][0],
                  desc: description,
                  tel: telephone,
                  email: email,
                  web: web
                });
                link = '';
              }

              var zoomControlDiv = document.createElement('div');
              zoomControlDiv.className = 'superwrapper';
              var zoomControl = new ZoomControl(zoomControlDiv, map);

              zoomControlDiv.index = 1;
              map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(zoomControlDiv);
              google.maps.event.addDomListener(window, 'resize', function() {
                  var center = map.getCenter()
                  google.maps.event.trigger(map, 'resize');
                  map.setCenter(center);
                  // var sposta = ($(window).width()>740) ? ($(window).width() / 4) : 0
                  // map.panBy(sposta, 0);
             
              });

            }
            /* jshint ignore:end */

        });

      } // Fine function init
    } // Fine pagina contatti

  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.


