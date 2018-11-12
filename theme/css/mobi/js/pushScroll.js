/** Push Scroll Menu - Version 1.1

 The MIT License (MIT)

 * Copyright (c) 2014 Chris Divyak

 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
*/
;(function($){

 	$.fn.extend({

		//pass the options variable to the function
 		pushScroll: function(options) {


			//Set the default values, use comma to separate the settings, example:
			var defaults = {
				  menuID: "menu", //icon for mobile push menu
				  slideOut: '300' //Speed of slideout menuu
			}

			var options =  $.extend(defaults, options);

    		return this.each(function() {
				var o = options;

				$('#'+o.menuID+', #menuwrap').hide();

				//Open Menu
				$('#menu-open').click(function() {
			//		$('#menu-open').fadeOut(o.slideOut-100);
				    $('#'+o.menuID).delay(o.slideOut-100).animate({width: 'toggle'}, o.slideOut);
				    $('#menuwrap').delay(o.slideOut).fadeIn();
				});



				$('#close').click(function(){
					$('#menuwrap').fadeOut(o.slideOut-100);
					 $('#'+o.menuID).delay(o.slideOut-100).animate({width: 'toggle'}, o.slideOut);
					$('#menu-open').delay(o.slideOut).fadeIn(o.slideOut);
				});
			});

    	}
	});
})(jQuery);
