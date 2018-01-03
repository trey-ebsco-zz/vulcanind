// JavaScript Document



// button hovers

jQuery(document).ready(function(){
jQuery("img.a").hover(
function() {
jQuery(this).stop().animate({"opacity": "0"}, "slow");
},
function() {
jQuery(this).stop().animate({"opacity": "1"}, "slow");
});
 
});




jQuery(document).ready(function(){
jQuery("form input[type=submit]").hover(
function() {
jQuery(this).stop().animate({"opacity": "0"}, "slow");
},
function() {
jQuery(this).stop().animate({"opacity": "1"}, "slow");
});
 
});




jQuery(document).ready(function(){
jQuery(".formx input[type=submit]").hover(
function() {
jQuery(this).stop().animate({"opacity": "1"}, "slow");
},
function() {
jQuery(this).stop().animate({"opacity": "1"}, "slow");
});
 
});





// our capabilities

 jQuery(document).ready(function () {
            jQuery('#design_target').hide();
            jQuery('a#design_trigger, a#design_trigger2, a#design_trigger3').click(function (e) {
            jQuery('#design_target').toggle(400);
			e.preventDefault();
			
            });
        });
    
 
  
        jQuery(document).ready(function () {
            jQuery('#engineering_target').hide();
            jQuery('a#engineering_trigger, a#engineering_trigger2, a#engineering_trigger3').click(function (e) {
            jQuery('#engineering_target').toggle(400);
			e.preventDefault();
            });
        });
     


        jQuery(document).ready(function () {
            jQuery('#sampleshop_target').hide();
            jQuery('a#sampleshop_trigger, a#sampleshop_trigger2, a#sampleshop_trigger3').click(function (e) {
            jQuery('#sampleshop_target').toggle(400);
			e.preventDefault();
            });
        });
      
    
 

        jQuery(document).ready(function () {
            jQuery('#production_target').hide();
            jQuery('a#production_trigger, a#production_trigger2 ,a#production_trigger3').click(function (e) {
            jQuery('#production_target').toggle(400);
			e.preventDefault();
            });
        });
   



        jQuery(document).ready(function () {
            jQuery('#projectmanagement_target').hide();
            jQuery('a#projectmanagement_trigger, a#projectmanagement_trigger2, a#projectmanagement_trigger3').click(function (e) {
            jQuery('#projectmanagement_target').toggle(400);
			e.preventDefault();
            });
        });
  
    
    

        jQuery(document).ready(function (e) {
            jQuery('#logisticsanddistribution_target').hide();
            jQuery('a#logisticsanddistribution_trigger, a#logisticsanddistribution_trigger2, a#logisticsanddistribution_trigger3').click(function (e) { 
            jQuery('#logisticsanddistribution_target').toggle(400);
			e.preventDefault();
            });
        });
          


        jQuery(document).ready(function () {
            jQuery('#customerservice_target').hide();
            jQuery('a#customerservice_trigger, a#customerservice_trigger2, a#customerservice_trigger3').click(function (e) {
            jQuery('#customerservice_target').toggle(400);
			e.preventDefault();
            });
        });
       
        
		
// our creative process
		
		
	
        jQuery(document).ready(function () {
            jQuery('#listen_target').hide();
            jQuery('a#listen_trigger, a#listen_trigger2, a#listen_trigger3').click(function (e) {
            jQuery('#listen_target').toggle(400);
			e.preventDefault();
            });
        });
     


        jQuery(document).ready(function () {
            jQuery('#create_target').hide();
            jQuery('a#create_trigger, a#create_trigger2, a#create_trigger3').click(function (e) {
            jQuery('#create_target').toggle(400);
			e.preventDefault();
            });
        });
   
    
 

        jQuery(document).ready(function () {
            jQuery('#deliver_target').hide();
            jQuery('a#deliver_trigger, a#deliver_trigger2 ,a#deliver_trigger3').click(function (e) {
            jQuery('#deliver_target').toggle(400);
			e.preventDefault();
            });
        });
      
    		








// replacement text

	jQuery(document).ready(function(){
    jQuery('input[type=text], textarea').placeholder();
	});


/**
 * Allows text inputs to display a placeholder message until it gets focus, at which point the input
 * is set to empty.
 *
 * This simulated the placeholder attribute in html5.
 * http://dev.w3.org/html5/spec/Overview.html#the-placeholder-attribute
 *
 * @copyright Clock Limited 2010
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 * @author Paul Serby <paul.serby@clock.co.uk>
 */
(function (jQuery) {
	jQuery.fn.placeholder = function (text) {

	return this.each(function () {

			var
				context = jQuery(this),
				placeholderText,
				nativePlaceholderSupport = ('placeholder' in document.createElement('input'));

			function onBlur(event) {
				checkIfEmpty(jQuery(event.target));
			}

			function checkIfEmpty() {
				if (context.val() === '') {
					if (context.attr('type') === 'password') {
						try {
							context.attr('type', 'text', 'email');
						} catch(e) {
							return false;
						}
					}
					context.val(placeholderText);
					context.addClass('ui-placeholder');
				}
			}

			function onFocus(event) {
				context.removeClass('ui-placeholder');
				if (context.val() === placeholderText) {
					context.val('');
				}
			}

			if (text === undefined) {
				placeholderText = jQuery(this).attr('placeholder');
			} else {
				placeholderText = text;
			}

			if (!nativePlaceholderSupport) {
				checkIfEmpty(context.blur(onBlur).focus(onFocus).addClass('ui-placeholder'));
				context.parents('form').submit(function(event) {
					if (context.val() === placeholderText) {
						context.val('');
					}
				});
			} else {
				context.attr('placeholder', placeholderText);
			}
		});
	};
})(jQuery);