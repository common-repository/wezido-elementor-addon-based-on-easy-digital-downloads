(function($) {
   "use strict";
   
   $( window ).on( 'elementor/frontend/init', function() {
       
        var wezedocounter = function (){
 

         $('.wez-statistic-counter').counterUp({
            delay: 10,
            time: 1000
        });
   
   };
   
   
   //BeforeAfter
        elementorFrontend.hooks.addAction( 'frontend/element_ready/wezido-counter.default', function($scope, $){
            wezedocounter();
        } );
   });

})(jQuery);