/*
* touchSwipe - jQuery Plugin
* https://github.com/mattbryson/TouchSwipe-Jquery-Plugin
* http://labs.skinkers.com/touchSwipe/
* http://plugins.jquery.com/project/touchSwipe
*
* Copyright (c) 2010 Matt Bryson (www.skinkers.com)
* Dual licensed under the MIT or GPL Version 2 licenses.
*
* $version: 1.3.3
*/

(function(g){function P(c){if(c&&void 0===c.allowPageScroll&&(void 0!==c.swipe||void 0!==c.swipeStatus))c.allowPageScroll=G;c||(c={});c=g.extend({},g.fn.swipe.defaults,c);return this.each(function(){var b=g(this),f=b.data(w);f||(f=new W(this,c),b.data(w,f))})}function W(c,b){var f,p,r,s;function H(a){var a=a.originalEvent,c,Q=n?a.touches[0]:a;d=R;n?h=a.touches.length:a.preventDefault();i=0;j=null;k=0;!n||h===b.fingers||b.fingers===x?(r=f=Q.pageX,s=p=Q.pageY,y=(new Date).getTime(),b.swipeStatus&&(c= l(a,d))):t(a);if(!1===c)return d=m,l(a,d),c;e.bind(I,J);e.bind(K,L)}function J(a){a=a.originalEvent;if(!(d===q||d===m)){var c,e=n?a.touches[0]:a;f=e.pageX;p=e.pageY;u=(new Date).getTime();j=S();n&&(h=a.touches.length);d=z;var e=a,g=j;if(b.allowPageScroll===G)e.preventDefault();else{var o=b.allowPageScroll===T;switch(g){case v:(b.swipeLeft&&o||!o&&b.allowPageScroll!=M)&&e.preventDefault();break;case A:(b.swipeRight&&o||!o&&b.allowPageScroll!=M)&&e.preventDefault();break;case B:(b.swipeUp&&o||!o&&b.allowPageScroll!= N)&&e.preventDefault();break;case C:(b.swipeDown&&o||!o&&b.allowPageScroll!=N)&&e.preventDefault()}}h===b.fingers||b.fingers===x||!n?(i=U(),k=u-y,b.swipeStatus&&(c=l(a,d,j,i,k)),b.triggerOnTouchEnd||(e=!(b.maxTimeThreshold?!(k>=b.maxTimeThreshold):1),!0===D()?(d=q,c=l(a,d)):e&&(d=m,l(a,d)))):(d=m,l(a,d));!1===c&&(d=m,l(a,d))}}function L(a){a=a.originalEvent;a.preventDefault();u=(new Date).getTime();i=U();j=S();k=u-y;if(b.triggerOnTouchEnd||!1===b.triggerOnTouchEnd&&d===z)if(d=q,(h===b.fingers||b.fingers=== x||!n)&&0!==f){var c=!(b.maxTimeThreshold?!(k>=b.maxTimeThreshold):1);if((!0===D()||null===D())&&!c)l(a,d);else if(c||!1===D())d=m,l(a,d)}else d=m,l(a,d);else d===z&&(d=m,l(a,d));e.unbind(I,J,!1);e.unbind(K,L,!1)}function t(){y=u=p=f=s=r=h=0}function l(a,c){var d=void 0;b.swipeStatus&&(d=b.swipeStatus.call(e,a,c,j||null,i||0,k||0,h));if(c===m&&b.click&&(1===h||!n)&&(isNaN(i)||0===i))d=b.click.call(e,a,a.target);if(c==q)switch(b.swipe&&(d=b.swipe.call(e,a,j,i,k,h)),j){case v:b.swipeLeft&&(d=b.swipeLeft.call(e, a,j,i,k,h));break;case A:b.swipeRight&&(d=b.swipeRight.call(e,a,j,i,k,h));break;case B:b.swipeUp&&(d=b.swipeUp.call(e,a,j,i,k,h));break;case C:b.swipeDown&&(d=b.swipeDown.call(e,a,j,i,k,h))}(c===m||c===q)&&t(a);return d}function D(){return null!==b.threshold?i>=b.threshold:null}function U(){return Math.round(Math.sqrt(Math.pow(f-r,2)+Math.pow(p-s,2)))}function S(){var a;a=Math.atan2(p-s,r-f);a=Math.round(180*a/Math.PI);0>a&&(a=360-Math.abs(a));return 45>=a&&0<=a?v:360>=a&&315<=a?v:135<=a&&225>=a? A:45<a&&135>a?C:B}function V(){e.unbind(E,H);e.unbind(F,t);e.unbind(I,J);e.unbind(K,L)}var O=n||!b.fallbackToMouseEvents,E=O?"touchstart":"mousedown",I=O?"touchmove":"mousemove",K=O?"touchend":"mouseup",F="touchcancel",i=0,j=null,k=0,e=g(c),d="start",h=0,y=p=f=s=r=0,u=0;try{e.bind(E,H),e.bind(F,t)}catch(P){g.error("events not supported "+E+","+F+" on jQuery.swipe")}this.enable=function(){e.bind(E,H);e.bind(F,t);return e};this.disable=function(){V();return e};this.destroy=function(){V();e.data(w,null); return e}}var v="left",A="right",B="up",C="down",G="none",T="auto",M="horizontal",N="vertical",x="all",R="start",z="move",q="end",m="cancel",n="ontouchstart"in window,w="TouchSwipe";g.fn.swipe=function(c){var b=g(this),f=b.data(w);if(f&&"string"===typeof c){if(f[c])return f[c].apply(this,Array.prototype.slice.call(arguments,1));g.error("Method "+c+" does not exist on jQuery.swipe")}else if(!f&&("object"===typeof c||!c))return P.apply(this,arguments);return b};g.fn.swipe.defaults={fingers:1,threshold:75, maxTimeThreshold:null,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,click:null,triggerOnTouchEnd:!0,allowPageScroll:"auto",fallbackToMouseEvents:!0};g.fn.swipe.phases={PHASE_START:R,PHASE_MOVE:z,PHASE_END:q,PHASE_CANCEL:m};g.fn.swipe.directions={LEFT:v,RIGHT:A,UP:B,DOWN:C};g.fn.swipe.pageScroll={NONE:G,HORIZONTAL:M,VERTICAL:N,AUTO:T};g.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:x}})(jQuery);;
/*! Copyright (c) 2010 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.4
 * 
 * Requires: 1.2.2+
 */

(function($) {

var types = ['DOMMouseScroll', 'mousewheel'];

$.event.special.mousewheel = {
    setup: function() {
        if ( this.addEventListener ) {
            for ( var i=types.length; i; ) {
                this.addEventListener( types[--i], handler, false );
            }
        } else {
            this.onmousewheel = handler;
        }
    },
    
    teardown: function() {
        if ( this.removeEventListener ) {
            for ( var i=types.length; i; ) {
                this.removeEventListener( types[--i], handler, false );
            }
        } else {
            this.onmousewheel = null;
        }
    }
};

$.fn.extend({
    mousewheel: function(fn) {
        return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel");
    },
    
    unmousewheel: function(fn) {
        return this.unbind("mousewheel", fn);
    }
});


function handler(event) {
    var orgEvent = event || window.event, args = [].slice.call( arguments, 1 ), delta = 0, returnValue = true, deltaX = 0, deltaY = 0;
    event = $.event.fix(orgEvent);
    event.type = "mousewheel";
    
    // Old school scrollwheel delta
    if ( event.wheelDelta ) { delta = event.wheelDelta/120; }
    if ( event.detail     ) { delta = -event.detail/3; }
    
    // New school multidimensional scroll (touchpads) deltas
    deltaY = delta;
    
    // Gecko
    if ( orgEvent.axis !== undefined && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
        deltaY = 0;
        deltaX = -1*delta;
    }
    
    // Webkit
    if ( orgEvent.wheelDeltaY !== undefined ) { deltaY = orgEvent.wheelDeltaY/120; }
    if ( orgEvent.wheelDeltaX !== undefined ) { deltaX = -1*orgEvent.wheelDeltaX/120; }
    
    // Add event and delta to the front of the arguments
    args.unshift(event, delta, deltaX, deltaY);
    
    return $.event.handle.apply(this, args);
}

})(jQuery);;
/*
 *	jQuery carouFredSel 6.2.1
 *	Demo's and documentation:
 *	caroufredsel.dev7studios.com
 *
 *	Copyright (c) 2013 Fred Heusschen
 *	www.frebsite.nl
 *
 *	Dual licensed under the MIT and GPL licenses.
 *	http://en.wikipedia.org/wiki/MIT_License
 *	http://en.wikipedia.org/wiki/GNU_General_Public_License
 */


(function($) {


	//	LOCAL

	if ( $.fn.carouFredSel )
	{
		return;
	}

	$.fn.caroufredsel = $.fn.carouFredSel = function(options, configs)
	{

		//	no element
		if (this.length == 0)
		{
			debug( true, 'No element found for "' + this.selector + '".' );
			return this;
		}

		//	multiple elements
		if (this.length > 1)
		{
			return this.each(function() {
				$(this).carouFredSel(options, configs);
			});
		}


		var $cfs = this,
			$tt0 = this[0],
			starting_position = false;

		if ($cfs.data('_cfs_isCarousel'))
		{
			starting_position = $cfs.triggerHandler('_cfs_triggerEvent', 'currentPosition');
			$cfs.trigger('_cfs_triggerEvent', ['destroy', true]);
		}

		var FN = {};

		FN._init = function(o, setOrig, start)
		{
			o = go_getObject($tt0, o);

			o.items = go_getItemsObject($tt0, o.items);
			o.scroll = go_getScrollObject($tt0, o.scroll);
			o.auto = go_getAutoObject($tt0, o.auto);
			o.prev = go_getPrevNextObject($tt0, o.prev);
			o.next = go_getPrevNextObject($tt0, o.next);
			o.pagination = go_getPaginationObject($tt0, o.pagination);
			o.swipe = go_getSwipeObject($tt0, o.swipe);
			o.mousewheel = go_getMousewheelObject($tt0, o.mousewheel);

			if (setOrig)
			{
				opts_orig = $.extend(true, {}, $.fn.carouFredSel.defaults, o);
			}

			opts = $.extend(true, {}, $.fn.carouFredSel.defaults, o);
			opts.d = cf_getDimensions(opts);

			crsl.direction = (opts.direction == 'up' || opts.direction == 'left') ? 'next' : 'prev';

			var	a_itm = $cfs.children(),
				avail_primary = ms_getParentSize($wrp, opts, 'width');

			if (is_true(opts.cookie))
			{
				opts.cookie = 'caroufredsel_cookie_' + conf.serialNumber;
			}

			opts.maxDimension = ms_getMaxDimension(opts, avail_primary);

			//	complement items and sizes
			opts.items = in_complementItems(opts.items, opts, a_itm, start);
			opts[opts.d['width']] = in_complementPrimarySize(opts[opts.d['width']], opts, a_itm);
			opts[opts.d['height']] = in_complementSecondarySize(opts[opts.d['height']], opts, a_itm);

			//	primary size not set for a responsive carousel
			if (opts.responsive)
			{
				if (!is_percentage(opts[opts.d['width']]))
				{
					opts[opts.d['width']] = '100%';
				}
			}

			//	primary size is percentage
			if (is_percentage(opts[opts.d['width']]))
			{
				crsl.upDateOnWindowResize = true;
				crsl.primarySizePercentage = opts[opts.d['width']];
				opts[opts.d['width']] = ms_getPercentage(avail_primary, crsl.primarySizePercentage);
				if (!opts.items.visible)
				{
					opts.items.visibleConf.variable = true;
				}
			}

			if (opts.responsive)
			{
				opts.usePadding = false;
				opts.padding = [0, 0, 0, 0];
				opts.align = false;
				opts.items.visibleConf.variable = false;
			}
			else
			{
				//	visible-items not set
				if (!opts.items.visible)
				{
					opts = in_complementVisibleItems(opts, avail_primary);
				}

				//	primary size not set -> calculate it or set to "variable"
				if (!opts[opts.d['width']])
				{
					if (!opts.items.visibleConf.variable && is_number(opts.items[opts.d['width']]) && opts.items.filter == '*')
					{
						opts[opts.d['width']] = opts.items.visible * opts.items[opts.d['width']];
						opts.align = false;
					}
					else
					{
						opts[opts.d['width']] = 'variable';
					}
				}
				//	align not set -> set to center if primary size is number
				if (is_undefined(opts.align))
				{
					opts.align = (is_number(opts[opts.d['width']]))
						? 'center'
						: false;
				}
				//	set variabe visible-items
				if (opts.items.visibleConf.variable)
				{
					opts.items.visible = gn_getVisibleItemsNext(a_itm, opts, 0);
				}
			}

			//	set visible items by filter
			if (opts.items.filter != '*' && !opts.items.visibleConf.variable)
			{
				opts.items.visibleConf.org = opts.items.visible;
				opts.items.visible = gn_getVisibleItemsNextFilter(a_itm, opts, 0);
			}

			opts.items.visible = cf_getItemsAdjust(opts.items.visible, opts, opts.items.visibleConf.adjust, $tt0);
			opts.items.visibleConf.old = opts.items.visible;

			if (opts.responsive)
			{
				if (!opts.items.visibleConf.min)
				{
					opts.items.visibleConf.min = opts.items.visible;
				}
				if (!opts.items.visibleConf.max)
				{
					opts.items.visibleConf.max = opts.items.visible;
				}
				opts = in_getResponsiveValues(opts, a_itm, avail_primary);
			}
			else
			{
				opts.padding = cf_getPadding(opts.padding);

				if (opts.align == 'top')
				{
					opts.align = 'left';
				}
				else if (opts.align == 'bottom')
				{
					opts.align = 'right';
				}

				switch (opts.align)
				{
					//	align: center, left or right
					case 'center':
					case 'left':
					case 'right':
						if (opts[opts.d['width']] != 'variable')
						{
							opts = in_getAlignPadding(opts, a_itm);
							opts.usePadding = true;
						}
						break;

					//	padding
					default:
						opts.align = false;
						opts.usePadding = (
							opts.padding[0] == 0 && 
							opts.padding[1] == 0 && 
							opts.padding[2] == 0 && 
							opts.padding[3] == 0
						) ? false : true;
						break;
				}
			}

			if (!is_number(opts.scroll.duration))
			{
				opts.scroll.duration = 500;
			}
			if (is_undefined(opts.scroll.items))
			{
				opts.scroll.items = (opts.responsive || opts.items.visibleConf.variable || opts.items.filter != '*') 
					? 'visible'
					: opts.items.visible;
			}

			opts.auto = $.extend(true, {}, opts.scroll, opts.auto);
			opts.prev = $.extend(true, {}, opts.scroll, opts.prev);
			opts.next = $.extend(true, {}, opts.scroll, opts.next);
			opts.pagination = $.extend(true, {}, opts.scroll, opts.pagination);
			//	swipe and mousewheel extend later on, per direction

			opts.auto = go_complementAutoObject($tt0, opts.auto);
			opts.prev = go_complementPrevNextObject($tt0, opts.prev);
			opts.next = go_complementPrevNextObject($tt0, opts.next);
			opts.pagination = go_complementPaginationObject($tt0, opts.pagination);
			opts.swipe = go_complementSwipeObject($tt0, opts.swipe);
			opts.mousewheel = go_complementMousewheelObject($tt0, opts.mousewheel);

			if (opts.synchronise)
			{
				opts.synchronise = cf_getSynchArr(opts.synchronise);
			}


			//	DEPRECATED
			if (opts.auto.onPauseStart)
			{
				opts.auto.onTimeoutStart = opts.auto.onPauseStart;
				deprecated('auto.onPauseStart', 'auto.onTimeoutStart');
			}
			if (opts.auto.onPausePause)
			{
				opts.auto.onTimeoutPause = opts.auto.onPausePause;
				deprecated('auto.onPausePause', 'auto.onTimeoutPause');
			}
			if (opts.auto.onPauseEnd)
			{
				opts.auto.onTimeoutEnd = opts.auto.onPauseEnd;
				deprecated('auto.onPauseEnd', 'auto.onTimeoutEnd');
			}
			if (opts.auto.pauseDuration)
			{
				opts.auto.timeoutDuration = opts.auto.pauseDuration;
				deprecated('auto.pauseDuration', 'auto.timeoutDuration');
			}
			//	/DEPRECATED


		};	//	/init


		FN._build = function() {
			$cfs.data('_cfs_isCarousel', true);

			var a_itm = $cfs.children(),
				orgCSS = in_mapCss($cfs, ['textAlign', 'float', 'position', 'top', 'right', 'bottom', 'left', 'zIndex', 'width', 'height', 'marginTop', 'marginRight', 'marginBottom', 'marginLeft']),
				newPosition = 'relative';

			switch (orgCSS.position)
			{
				case 'absolute':
				case 'fixed':
					newPosition = orgCSS.position;
					break;
			}

			if (conf.wrapper == 'parent')
			{
				sz_storeOrigCss($wrp);
			}
			else
			{
				$wrp.css(orgCSS);
			}
			$wrp.css({
				'overflow'		: 'hidden',
				'position'		: newPosition
			});

			sz_storeOrigCss($cfs);
			$cfs.data('_cfs_origCssZindex', orgCSS.zIndex);
			$cfs.css({
				'textAlign'		: 'left',
				'float'			: 'none',
				'position'		: 'absolute',
				'top'			: 0,
				'right'			: 'auto',
				'bottom'		: 'auto',
				'left'			: 0,
				'marginTop'		: 0,
				'marginRight'	: 0,
				'marginBottom'	: 0,
				'marginLeft'	: 0
			});

			sz_storeMargin(a_itm, opts);
			sz_storeOrigCss(a_itm);
			if (opts.responsive)
			{
				sz_setResponsiveSizes(opts, a_itm);
			}

		};	//	/build


		FN._bind_events = function() {
			FN._unbind_events();


			//	stop event
			$cfs.bind(cf_e('stop', conf), function(e, imm) {
				e.stopPropagation();

				//	button
				if (!crsl.isStopped)
				{
					if (opts.auto.button)
					{
						opts.auto.button.addClass(cf_c('stopped', conf));
					}
				}

				//	set stopped
				crsl.isStopped = true;

				if (opts.auto.play)
				{
					opts.auto.play = false;
					$cfs.trigger(cf_e('pause', conf), imm);
				}
				return true;
			});


			//	finish event
			$cfs.bind(cf_e('finish', conf), function(e) {
				e.stopPropagation();
				if (crsl.isScrolling)
				{
					sc_stopScroll(scrl);
				}
				return true;
			});


			//	pause event
			$cfs.bind(cf_e('pause', conf), function(e, imm, res) {
				e.stopPropagation();
				tmrs = sc_clearTimers(tmrs);

				//	immediately pause
				if (imm && crsl.isScrolling)
				{
					scrl.isStopped = true;
					var nst = getTime() - scrl.startTime;
					scrl.duration -= nst;
					if (scrl.pre)
					{
						scrl.pre.duration -= nst;
					}
					if (scrl.post)
					{
						scrl.post.duration -= nst;
					}
					sc_stopScroll(scrl, false);
				}

				//	update remaining pause-time
				if (!crsl.isPaused && !crsl.isScrolling)
				{
					if (res)
					{
						tmrs.timePassed += getTime() - tmrs.startTime;
					}
				}

				//	button
				if (!crsl.isPaused)
				{
					if (opts.auto.button)
					{
						opts.auto.button.addClass(cf_c('paused', conf));
					}
				}

				//	set paused
				crsl.isPaused = true;

				//	pause pause callback
				if (opts.auto.onTimeoutPause)
				{
					var dur1 = opts.auto.timeoutDuration - tmrs.timePassed,
						perc = 100 - Math.ceil( dur1 * 100 / opts.auto.timeoutDuration );

					opts.auto.onTimeoutPause.call($tt0, perc, dur1);
				}
				return true;
			});


			//	play event
			$cfs.bind(cf_e('play', conf), function(e, dir, del, res) {
				e.stopPropagation();
				tmrs = sc_clearTimers(tmrs);

				//	sort params
				var v = [dir, del, res],
					t = ['string', 'number', 'boolean'],
					a = cf_sortParams(v, t);

				dir = a[0];
				del = a[1];
				res = a[2];

				if (dir != 'prev' && dir != 'next')
				{
					dir = crsl.direction;
				}
				if (!is_number(del))
				{
					del = 0;
				}
				if (!is_boolean(res))
				{
					res = false;
				}

				//	stopped?
				if (res)
				{
					crsl.isStopped = false;
					opts.auto.play = true;
				}
				if (!opts.auto.play)
				{
					e.stopImmediatePropagation();
					return debug(conf, 'Carousel stopped: Not scrolling.');
				}

				//	button
				if (crsl.isPaused)
				{
					if (opts.auto.button)
					{
						opts.auto.button.removeClass(cf_c('stopped', conf));
						opts.auto.button.removeClass(cf_c('paused', conf));
					}
				}

				//	set playing
				crsl.isPaused = false;
				tmrs.startTime = getTime();

				//	timeout the scrolling
				var dur1 = opts.auto.timeoutDuration + del;
					dur2 = dur1 - tmrs.timePassed;
					perc = 100 - Math.ceil(dur2 * 100 / dur1);

				if (opts.auto.progress)
				{
					tmrs.progress = setInterval(function() {
						var pasd = getTime() - tmrs.startTime + tmrs.timePassed,
							perc = Math.ceil(pasd * 100 / dur1);
						opts.auto.progress.updater.call(opts.auto.progress.bar[0], perc);
					}, opts.auto.progress.interval);
				}

				tmrs.auto = setTimeout(function() {
					if (opts.auto.progress)
					{
						opts.auto.progress.updater.call(opts.auto.progress.bar[0], 100);
					}
					if (opts.auto.onTimeoutEnd)
					{
						opts.auto.onTimeoutEnd.call($tt0, perc, dur2);
					}
					if (crsl.isScrolling)
					{
						$cfs.trigger(cf_e('play', conf), dir);
					}
					else
					{
						$cfs.trigger(cf_e(dir, conf), opts.auto);
					}
				}, dur2);

				//	pause start callback
				if (opts.auto.onTimeoutStart)
				{
					opts.auto.onTimeoutStart.call($tt0, perc, dur2);
				}

				return true;
			});


			//	resume event
			$cfs.bind(cf_e('resume', conf), function(e) {
				e.stopPropagation();
				if (scrl.isStopped)
				{
					scrl.isStopped = false;
					crsl.isPaused = false;
					crsl.isScrolling = true;
					scrl.startTime = getTime();
					sc_startScroll(scrl, conf);
				}
				else
				{
					$cfs.trigger(cf_e('play', conf));
				}
				return true;
			});


			//	prev + next events
			$cfs.bind(cf_e('prev', conf)+' '+cf_e('next', conf), function(e, obj, num, clb, que) {
				e.stopPropagation();

				//	stopped or hidden carousel, don't scroll, don't queue
				if (crsl.isStopped || $cfs.is(':hidden'))
				{
					e.stopImmediatePropagation();
					return debug(conf, 'Carousel stopped or hidden: Not scrolling.');
				}

				//	not enough items
				var minimum = (is_number(opts.items.minimum)) ? opts.items.minimum : opts.items.visible + 1;
				if (minimum > itms.total)
				{
					e.stopImmediatePropagation();
					return debug(conf, 'Not enough items ('+itms.total+' total, '+minimum+' needed): Not scrolling.');
				}

				//	get config
				var v = [obj, num, clb, que],
					t = ['object', 'number/string', 'function', 'boolean'],
					a = cf_sortParams(v, t);

				obj = a[0];
				num = a[1];
				clb = a[2];
				que = a[3];

				var eType = e.type.slice(conf.events.prefix.length);

				if (!is_object(obj))
				{
					obj = {};
				}
				if (is_function(clb))
				{
					obj.onAfter = clb;
				}
				if (is_boolean(que))
				{
					obj.queue = que;
				}
				obj = $.extend(true, {}, opts[eType], obj);

				//	test conditions callback
				if (obj.conditions && !obj.conditions.call($tt0, eType))
				{
					e.stopImmediatePropagation();
					return debug(conf, 'Callback "conditions" returned false.');
				}

				if (!is_number(num))
				{
					if (opts.items.filter != '*')
					{
						num = 'visible';
					}
					else
					{
						var arr = [num, obj.items, opts[eType].items];
						for (var a = 0, l = arr.length; a < l; a++)
						{
							if (is_number(arr[a]) || arr[a] == 'page' || arr[a] == 'visible') {
								num = arr[a];
								break;
							}
						}
					}
					switch(num) {
						case 'page':
							e.stopImmediatePropagation();
							return $cfs.triggerHandler(cf_e(eType+'Page', conf), [obj, clb]);
							break;

						case 'visible':
							if (!opts.items.visibleConf.variable && opts.items.filter == '*')
							{
								num = opts.items.visible;
							}
							break;
					}
				}

				//	resume animation, add current to queue
				if (scrl.isStopped)
				{
					$cfs.trigger(cf_e('resume', conf));
					$cfs.trigger(cf_e('queue', conf), [eType, [obj, num, clb]]);
					e.stopImmediatePropagation();
					return debug(conf, 'Carousel resumed scrolling.');
				}

				//	queue if scrolling
				if (obj.duration > 0)
				{
					if (crsl.isScrolling)
					{
						if (obj.queue)
						{
							if (obj.queue == 'last')
							{
								queu = [];
							}
							if (obj.queue != 'first' || queu.length == 0)
							{
								$cfs.trigger(cf_e('queue', conf), [eType, [obj, num, clb]]);
							}
						}
						e.stopImmediatePropagation();
						return debug(conf, 'Carousel currently scrolling.');
					}
				}

				tmrs.timePassed = 0;
				$cfs.trigger(cf_e('slide_'+eType, conf), [obj, num]);

				//	synchronise
				if (opts.synchronise)
				{
					var s = opts.synchronise,
						c = [obj, num];

					for (var j = 0, l = s.length; j < l; j++) {
						var d = eType;
						if (!s[j][2])
						{
							d = (d == 'prev') ? 'next' : 'prev';
						}
						if (!s[j][1])
						{
							c[0] = s[j][0].triggerHandler('_cfs_triggerEvent', ['configuration', d]);
						}
						c[1] = num + s[j][3];
						s[j][0].trigger('_cfs_triggerEvent', ['slide_'+d, c]);
					}
				}
				return true;
			});


			//	prev event
			$cfs.bind(cf_e('slide_prev', conf), function(e, sO, nI) {
				e.stopPropagation();
				var a_itm = $cfs.children();

				//	non-circular at start, scroll to end
				if (!opts.circular)
				{
					if (itms.first == 0)
					{
						if (opts.infinite)
						{
							$cfs.trigger(cf_e('next', conf), itms.total-1);
						}
						return e.stopImmediatePropagation();
					}
				}

				sz_resetMargin(a_itm, opts);

				//	find number of items to scroll
				if (!is_number(nI))
				{
					if (opts.items.visibleConf.variable)
					{
						nI = gn_getVisibleItemsPrev(a_itm, opts, itms.total-1);
					}
					else if (opts.items.filter != '*')
					{
						var xI = (is_number(sO.items)) ? sO.items : gn_getVisibleOrg($cfs, opts);
						nI = gn_getScrollItemsPrevFilter(a_itm, opts, itms.total-1, xI);
					}
					else
					{
						nI = opts.items.visible;
					}
					nI = cf_getAdjust(nI, opts, sO.items, $tt0);
				}

				//	prevent non-circular from scrolling to far
				if (!opts.circular)
				{
					if (itms.total - nI < itms.first)
					{
						nI = itms.total - itms.first;
					}
				}

				//	set new number of visible items
				opts.items.visibleConf.old = opts.items.visible;
				if (opts.items.visibleConf.variable)
				{
					var vI = cf_getItemsAdjust(gn_getVisibleItemsNext(a_itm, opts, itms.total-nI), opts, opts.items.visibleConf.adjust, $tt0);
					if (opts.items.visible+nI <= vI && nI < itms.total)
					{
						nI++;
						vI = cf_getItemsAdjust(gn_getVisibleItemsNext(a_itm, opts, itms.total-nI), opts, opts.items.visibleConf.adjust, $tt0);
					}
					opts.items.visible = vI;
				}
				else if (opts.items.filter != '*')
				{
					var vI = gn_getVisibleItemsNextFilter(a_itm, opts, itms.total-nI);
					opts.items.visible = cf_getItemsAdjust(vI, opts, opts.items.visibleConf.adjust, $tt0);
				}

				sz_resetMargin(a_itm, opts, true);

				//	scroll 0, don't scroll
				if (nI == 0)
				{
					e.stopImmediatePropagation();
					return debug(conf, '0 items to scroll: Not scrolling.');
				}
				debug(conf, 'Scrolling '+nI+' items backward.');


				//	save new config
				itms.first += nI;
				while (itms.first >= itms.total)
				{
					itms.first -= itms.total;
				}

				//	non-circular callback
				if (!opts.circular)
				{
					if (itms.first == 0 && sO.onEnd)
					{
						sO.onEnd.call($tt0, 'prev');
					}
					if (!opts.infinite)
					{
						nv_enableNavi(opts, itms.first, conf);
					}
				}

				//	rearrange items
				$cfs.children().slice(itms.total-nI, itms.total).prependTo($cfs);
				if (itms.total < opts.items.visible + nI)
				{
					$cfs.children().slice(0, (opts.items.visible+nI)-itms.total).clone(true).appendTo($cfs);
				}

				//	the needed items
				var a_itm = $cfs.children(),
					i_old = gi_getOldItemsPrev(a_itm, opts, nI),
					i_new = gi_getNewItemsPrev(a_itm, opts),
					i_cur_l = a_itm.eq(nI-1),
					i_old_l = i_old.last(),
					i_new_l = i_new.last();

				sz_resetMargin(a_itm, opts);

				var pL = 0,
					pR = 0;

				if (opts.align)
				{
					var p = cf_getAlignPadding(i_new, opts);
					pL = p[0];
					pR = p[1];
				}
				var oL = (pL < 0) ? opts.padding[opts.d[3]] : 0;

				//	hide items for fx directscroll
				var hiddenitems = false,
					i_skp = $();
				if (opts.items.visible < nI)
				{
					i_skp = a_itm.slice(opts.items.visibleConf.old, nI);
					if (sO.fx == 'directscroll')
					{
						var orgW = opts.items[opts.d['width']];
						hiddenitems = i_skp;
						i_cur_l = i_new_l;
						sc_hideHiddenItems(hiddenitems);
						opts.items[opts.d['width']] = 'variable';
					}
				}

				//	save new sizes
				var $cf2 = false,
					i_siz = ms_getTotalSize(a_itm.slice(0, nI), opts, 'width'),
					w_siz = cf_mapWrapperSizes(ms_getSizes(i_new, opts, true), opts, !opts.usePadding),
					i_siz_vis = 0,
					a_cfs = {},
					a_wsz = {},
					a_cur = {},
					a_old = {},
					a_new = {},
					a_lef = {},
					a_lef_vis = {},
					a_dur = sc_getDuration(sO, opts, nI, i_siz);

				switch(sO.fx)
				{
					case 'cover':
					case 'cover-fade':
						i_siz_vis = ms_getTotalSize(a_itm.slice(0, opts.items.visible), opts, 'width');
						break;
				}

				if (hiddenitems)
				{
					opts.items[opts.d['width']] = orgW;
				}

				sz_resetMargin(a_itm, opts, true);
				if (pR >= 0)
				{
					sz_resetMargin(i_old_l, opts, opts.padding[opts.d[1]]);
				}
				if (pL >= 0)
				{
					sz_resetMargin(i_cur_l, opts, opts.padding[opts.d[3]]);
				}

				if (opts.align)
				{
					opts.padding[opts.d[1]] = pR;
					opts.padding[opts.d[3]] = pL;
				}

				a_lef[opts.d['left']] = -(i_siz - oL);
				a_lef_vis[opts.d['left']] = -(i_siz_vis - oL);
				a_wsz[opts.d['left']] = w_siz[opts.d['width']];

				//	scrolling functions
				var _s_wrapper = function() {},
					_a_wrapper = function() {},
					_s_paddingold = function() {},
					_a_paddingold = function() {},
					_s_paddingnew = function() {},
					_a_paddingnew = function() {},
					_s_paddingcur = function() {},
					_a_paddingcur = function() {},
					_onafter = function() {},
					_moveitems = function() {},
					_position = function() {};

				//	clone carousel
				switch(sO.fx)
				{
					case 'crossfade':
					case 'cover':
					case 'cover-fade':
					case 'uncover':
					case 'uncover-fade':
						$cf2 = $cfs.clone(true).appendTo($wrp);
						break;
				}
				switch(sO.fx)
				{
					case 'crossfade':
					case 'uncover':
					case 'uncover-fade':
						$cf2.children().slice(0, nI).remove();
						$cf2.children().slice(opts.items.visibleConf.old).remove();
						break;

					case 'cover':
					case 'cover-fade':
						$cf2.children().slice(opts.items.visible).remove();
						$cf2.css(a_lef_vis);
						break;
				}

				$cfs.css(a_lef);

				//	reset all scrolls
				scrl = sc_setScroll(a_dur, sO.easing, conf);

				//	animate / set carousel
				a_cfs[opts.d['left']] = (opts.usePadding) ? opts.padding[opts.d[3]] : 0;

				//	animate / set wrapper
				if (opts[opts.d['width']] == 'variable' || opts[opts.d['height']] == 'variable')
				{
					_s_wrapper = function() {
						$wrp.css(w_siz);
					};
					_a_wrapper = function() {
						scrl.anims.push([$wrp, w_siz]);
					};
				}

				//	animate / set items
				if (opts.usePadding)
				{
					if (i_new_l.not(i_cur_l).length)
					{
			 			a_cur[opts.d['marginRight']] = i_cur_l.data('_cfs_origCssMargin');

						if (pL < 0)
						{
							i_cur_l.css(a_cur);
						}
						else
						{
							_s_paddingcur = function() {
								i_cur_l.css(a_cur);
							};
							_a_paddingcur = function() {
								scrl.anims.push([i_cur_l, a_cur]);
							};
						}
					}
					switch(sO.fx)
					{
						case 'cover':
						case 'cover-fade':
							$cf2.children().eq(nI-1).css(a_cur);
							break;
					}

					if (i_new_l.not(i_old_l).length)
					{
						a_old[opts.d['marginRight']] = i_old_l.data('_cfs_origCssMargin');
						_s_paddingold = function() {
							i_old_l.css(a_old);
						};
						_a_paddingold = function() {
							scrl.anims.push([i_old_l, a_old]);
						};
					}

					if (pR >= 0)
					{
						a_new[opts.d['marginRight']] = i_new_l.data('_cfs_origCssMargin') + opts.padding[opts.d[1]];
						_s_paddingnew = function() {
							i_new_l.css(a_new);
						};
						_a_paddingnew = function() {
							scrl.anims.push([i_new_l, a_new]);
						};
					}
				}

				//	set position
				_position = function() {
					$cfs.css(a_cfs);
				};


				var overFill = opts.items.visible+nI-itms.total;

				//	rearrange items
				_moveitems = function() {
					if (overFill > 0)
					{
						$cfs.children().slice(itms.total).remove();
						i_old = $( $cfs.children().slice(itms.total-(opts.items.visible-overFill)).get().concat( $cfs.children().slice(0, overFill).get() ) );
					}
					sc_showHiddenItems(hiddenitems);

					if (opts.usePadding)
					{
						var l_itm = $cfs.children().eq(opts.items.visible+nI-1);
						l_itm.css(opts.d['marginRight'], l_itm.data('_cfs_origCssMargin'));
					}
				};


				var cb_arguments = sc_mapCallbackArguments(i_old, i_skp, i_new, nI, 'prev', a_dur, w_siz);

				//	fire onAfter callbacks
				_onafter = function() {
					sc_afterScroll($cfs, $cf2, sO);
					crsl.isScrolling = false;
					clbk.onAfter = sc_fireCallbacks($tt0, sO, 'onAfter', cb_arguments, clbk);
					queu = sc_fireQueue($cfs, queu, conf);

					if (!crsl.isPaused)
					{
						$cfs.trigger(cf_e('play', conf));
					}
				};

				//	fire onBefore callback
				crsl.isScrolling = true;
				tmrs = sc_clearTimers(tmrs);
				clbk.onBefore = sc_fireCallbacks($tt0, sO, 'onBefore', cb_arguments, clbk);

				switch(sO.fx)
				{
					case 'none':
						$cfs.css(a_cfs);
						_s_wrapper();
						_s_paddingold();
						_s_paddingnew();
						_s_paddingcur();
						_position();
						_moveitems();
						_onafter();
						break;

					case 'fade':
						scrl.anims.push([$cfs, { 'opacity': 0 }, function() {
							_s_wrapper();
							_s_paddingold();
							_s_paddingnew();
							_s_paddingcur();
							_position();
							_moveitems();
							scrl = sc_setScroll(a_dur, sO.easing, conf);
							scrl.anims.push([$cfs, { 'opacity': 1 }, _onafter]);
							sc_startScroll(scrl, conf);
						}]);
						break;

					case 'crossfade':
						$cfs.css({ 'opacity': 0 });
						scrl.anims.push([$cf2, { 'opacity': 0 }]);
						scrl.anims.push([$cfs, { 'opacity': 1 }, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingnew();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					case 'cover':
						scrl.anims.push([$cf2, a_cfs, function() {
							_s_paddingold();
							_s_paddingnew();
							_s_paddingcur();
							_position();
							_moveitems();
							_onafter();
						}]);
						_a_wrapper();
						break;

					case 'cover-fade':
						scrl.anims.push([$cfs, { 'opacity': 0 }]);
						scrl.anims.push([$cf2, a_cfs, function() {
							_s_paddingold();
							_s_paddingnew();
							_s_paddingcur();
							_position();
							_moveitems();
							_onafter();
						}]);
						_a_wrapper();
						break;

					case 'uncover':
						scrl.anims.push([$cf2, a_wsz, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingnew();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					case 'uncover-fade':
						$cfs.css({ 'opacity': 0 });
						scrl.anims.push([$cfs, { 'opacity': 1 }]);
						scrl.anims.push([$cf2, a_wsz, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingnew();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					default:
						scrl.anims.push([$cfs, a_cfs, function() {
							_moveitems();
							_onafter();
						}]);
						_a_wrapper();
						_a_paddingold();
						_a_paddingnew();
						_a_paddingcur();
						break;
				}

				sc_startScroll(scrl, conf);
				cf_setCookie(opts.cookie, $cfs, conf);

				$cfs.trigger(cf_e('updatePageStatus', conf), [false, w_siz]);

				return true;
			});


			//	next event
			$cfs.bind(cf_e('slide_next', conf), function(e, sO, nI) {
				e.stopPropagation();
				var a_itm = $cfs.children();

				//	non-circular at end, scroll to start
				if (!opts.circular)
				{
					if (itms.first == opts.items.visible)
					{
						if (opts.infinite)
						{
							$cfs.trigger(cf_e('prev', conf), itms.total-1);
						}
						return e.stopImmediatePropagation();
					}
				}

				sz_resetMargin(a_itm, opts);

				//	find number of items to scroll
				if (!is_number(nI))
				{
					if (opts.items.filter != '*')
					{
						var xI = (is_number(sO.items)) ? sO.items : gn_getVisibleOrg($cfs, opts);
						nI = gn_getScrollItemsNextFilter(a_itm, opts, 0, xI);
					}
					else
					{
						nI = opts.items.visible;
					}
					nI = cf_getAdjust(nI, opts, sO.items, $tt0);
				}

				var lastItemNr = (itms.first == 0) ? itms.total : itms.first;

				//	prevent non-circular from scrolling to far
				if (!opts.circular)
				{
					if (opts.items.visibleConf.variable)
					{
						var vI = gn_getVisibleItemsNext(a_itm, opts, nI),
							xI = gn_getVisibleItemsPrev(a_itm, opts, lastItemNr-1);
					}
					else
					{
						var vI = opts.items.visible,
							xI = opts.items.visible;
					}

					if (nI + vI > lastItemNr)
					{
						nI = lastItemNr - xI;
					}
				}

				//	set new number of visible items
				opts.items.visibleConf.old = opts.items.visible;
				if (opts.items.visibleConf.variable)
				{
					var vI = cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(a_itm, opts, nI, lastItemNr), opts, opts.items.visibleConf.adjust, $tt0);
					while (opts.items.visible-nI >= vI && nI < itms.total)
					{
						nI++;
						vI = cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(a_itm, opts, nI, lastItemNr), opts, opts.items.visibleConf.adjust, $tt0);
					}
					opts.items.visible = vI;
				}
				else if (opts.items.filter != '*')
				{
					var vI = gn_getVisibleItemsNextFilter(a_itm, opts, nI);
					opts.items.visible = cf_getItemsAdjust(vI, opts, opts.items.visibleConf.adjust, $tt0);
				}

				sz_resetMargin(a_itm, opts, true);

				//	scroll 0, don't scroll
				if (nI == 0)
				{
					e.stopImmediatePropagation();
					return debug(conf, '0 items to scroll: Not scrolling.');
				}
				debug(conf, 'Scrolling '+nI+' items forward.');


				//	save new config
				itms.first -= nI;
				while (itms.first < 0)
				{
					itms.first += itms.total;
				}

				//	non-circular callback
				if (!opts.circular)
				{
					if (itms.first == opts.items.visible && sO.onEnd)
					{
						sO.onEnd.call($tt0, 'next');
					}
					if (!opts.infinite)
					{
						nv_enableNavi(opts, itms.first, conf);
					}
				}

				//	rearrange items
				if (itms.total < opts.items.visible+nI)
				{
					$cfs.children().slice(0, (opts.items.visible+nI)-itms.total).clone(true).appendTo($cfs);
				}

				//	the needed items
				var a_itm = $cfs.children(),
					i_old = gi_getOldItemsNext(a_itm, opts),
					i_new = gi_getNewItemsNext(a_itm, opts, nI),
					i_cur_l = a_itm.eq(nI-1),
					i_old_l = i_old.last(),
					i_new_l = i_new.last();

				sz_resetMargin(a_itm, opts);

				var pL = 0,
					pR = 0;

				if (opts.align)
				{
					var p = cf_getAlignPadding(i_new, opts);
					pL = p[0];
					pR = p[1];
				}

				//	hide items for fx directscroll
				var hiddenitems = false,
					i_skp = $();
				if (opts.items.visibleConf.old < nI)
				{
					i_skp = a_itm.slice(opts.items.visibleConf.old, nI);
					if (sO.fx == 'directscroll')
					{
						var orgW = opts.items[opts.d['width']];
						hiddenitems = i_skp;
						i_cur_l = i_old_l;
						sc_hideHiddenItems(hiddenitems);
						opts.items[opts.d['width']] = 'variable';
					}
				}

				//	save new sizes
				var $cf2 = false,
					i_siz = ms_getTotalSize(a_itm.slice(0, nI), opts, 'width'),
					w_siz = cf_mapWrapperSizes(ms_getSizes(i_new, opts, true), opts, !opts.usePadding),
					i_siz_vis = 0,
					a_cfs = {},
					a_cfs_vis = {},
					a_cur = {},
					a_old = {},
					a_lef = {},
					a_dur = sc_getDuration(sO, opts, nI, i_siz);

				switch(sO.fx)
				{
					case 'uncover':
					case 'uncover-fade':
						i_siz_vis = ms_getTotalSize(a_itm.slice(0, opts.items.visibleConf.old), opts, 'width');
						break;
				}

				if (hiddenitems)
				{
					opts.items[opts.d['width']] = orgW;
				}

				if (opts.align)
				{
					if (opts.padding[opts.d[1]] < 0)
					{
						opts.padding[opts.d[1]] = 0;
					}
				}
				sz_resetMargin(a_itm, opts, true);
				sz_resetMargin(i_old_l, opts, opts.padding[opts.d[1]]);

				if (opts.align)
				{
					opts.padding[opts.d[1]] = pR;
					opts.padding[opts.d[3]] = pL;
				}

				a_lef[opts.d['left']] = (opts.usePadding) ? opts.padding[opts.d[3]] : 0;

				//	scrolling functions
				var _s_wrapper = function() {},
					_a_wrapper = function() {},
					_s_paddingold = function() {},
					_a_paddingold = function() {},
					_s_paddingcur = function() {},
					_a_paddingcur = function() {},
					_onafter = function() {},
					_moveitems = function() {},
					_position = function() {};

				//	clone carousel
				switch(sO.fx)
				{
					case 'crossfade':
					case 'cover':
					case 'cover-fade':
					case 'uncover':
					case 'uncover-fade':
						$cf2 = $cfs.clone(true).appendTo($wrp);
						$cf2.children().slice(opts.items.visibleConf.old).remove();
						break;
				}
				switch(sO.fx)
				{
					case 'crossfade':
					case 'cover':
					case 'cover-fade':
						$cfs.css('zIndex', 1);
						$cf2.css('zIndex', 0);
						break;
				}

				//	reset all scrolls
				scrl = sc_setScroll(a_dur, sO.easing, conf);

				//	animate / set carousel
				a_cfs[opts.d['left']] = -i_siz;
				a_cfs_vis[opts.d['left']] = -i_siz_vis;

				if (pL < 0)
				{
					a_cfs[opts.d['left']] += pL;
				}

				//	animate / set wrapper
				if (opts[opts.d['width']] == 'variable' || opts[opts.d['height']] == 'variable')
				{
					_s_wrapper = function() {
						$wrp.css(w_siz);
					};
					_a_wrapper = function() {
						scrl.anims.push([$wrp, w_siz]);
					};
				}

				//	animate / set items
				if (opts.usePadding)
				{
					var i_new_l_m = i_new_l.data('_cfs_origCssMargin');

					if (pR >= 0)
					{
						i_new_l_m += opts.padding[opts.d[1]];
					}
					i_new_l.css(opts.d['marginRight'], i_new_l_m);

					if (i_cur_l.not(i_old_l).length)
					{
						a_old[opts.d['marginRight']] = i_old_l.data('_cfs_origCssMargin');
					}
					_s_paddingold = function() {
						i_old_l.css(a_old);
					};
					_a_paddingold = function() {
						scrl.anims.push([i_old_l, a_old]);
					};

					var i_cur_l_m = i_cur_l.data('_cfs_origCssMargin');
					if (pL > 0)
					{
						i_cur_l_m += opts.padding[opts.d[3]];
					}

					a_cur[opts.d['marginRight']] = i_cur_l_m;

					_s_paddingcur = function() {
						i_cur_l.css(a_cur);
					};
					_a_paddingcur = function() {
						scrl.anims.push([i_cur_l, a_cur]);
					};
				}

				//	set position
				_position = function() {
					$cfs.css(a_lef);
				};


				var overFill = opts.items.visible+nI-itms.total;

				//	rearrange items
				_moveitems = function() {
					if (overFill > 0)
					{
						$cfs.children().slice(itms.total).remove();
					}
					var l_itm = $cfs.children().slice(0, nI).appendTo($cfs).last();
					if (overFill > 0)
					{
						i_new = gi_getCurrentItems(a_itm, opts);
					}
					sc_showHiddenItems(hiddenitems);

					if (opts.usePadding)
					{
						if (itms.total < opts.items.visible+nI) {
							var i_cur_l = $cfs.children().eq(opts.items.visible-1);
							i_cur_l.css(opts.d['marginRight'], i_cur_l.data('_cfs_origCssMargin') + opts.padding[opts.d[1]]);
						}
						l_itm.css(opts.d['marginRight'], l_itm.data('_cfs_origCssMargin'));
					}
				};


				var cb_arguments = sc_mapCallbackArguments(i_old, i_skp, i_new, nI, 'next', a_dur, w_siz);

				//	fire onAfter callbacks
				_onafter = function() {
					$cfs.css('zIndex', $cfs.data('_cfs_origCssZindex'));
					sc_afterScroll($cfs, $cf2, sO);
					crsl.isScrolling = false;
					clbk.onAfter = sc_fireCallbacks($tt0, sO, 'onAfter', cb_arguments, clbk);
					queu = sc_fireQueue($cfs, queu, conf);
					
					if (!crsl.isPaused)
					{
						$cfs.trigger(cf_e('play', conf));
					}
				};

				//	fire onBefore callbacks
				crsl.isScrolling = true;
				tmrs = sc_clearTimers(tmrs);
				clbk.onBefore = sc_fireCallbacks($tt0, sO, 'onBefore', cb_arguments, clbk);

				switch(sO.fx)
				{
					case 'none':
						$cfs.css(a_cfs);
						_s_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_position();
						_moveitems();
						_onafter();
						break;

					case 'fade':
						scrl.anims.push([$cfs, { 'opacity': 0 }, function() {
							_s_wrapper();
							_s_paddingold();
							_s_paddingcur();
							_position();
							_moveitems();
							scrl = sc_setScroll(a_dur, sO.easing, conf);
							scrl.anims.push([$cfs, { 'opacity': 1 }, _onafter]);
							sc_startScroll(scrl, conf);
						}]);
						break;

					case 'crossfade':
						$cfs.css({ 'opacity': 0 });
						scrl.anims.push([$cf2, { 'opacity': 0 }]);
						scrl.anims.push([$cfs, { 'opacity': 1 }, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					case 'cover':
						$cfs.css(opts.d['left'], $wrp[opts.d['width']]());
						scrl.anims.push([$cfs, a_lef, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_moveitems();
						break;

					case 'cover-fade':
						$cfs.css(opts.d['left'], $wrp[opts.d['width']]());
						scrl.anims.push([$cf2, { 'opacity': 0 }]);
						scrl.anims.push([$cfs, a_lef, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_moveitems();
						break;

					case 'uncover':
						scrl.anims.push([$cf2, a_cfs_vis, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					case 'uncover-fade':
						$cfs.css({ 'opacity': 0 });
						scrl.anims.push([$cfs, { 'opacity': 1 }]);
						scrl.anims.push([$cf2, a_cfs_vis, _onafter]);
						_a_wrapper();
						_s_paddingold();
						_s_paddingcur();
						_position();
						_moveitems();
						break;

					default:
						scrl.anims.push([$cfs, a_cfs, function() {
							_position();
							_moveitems();
							_onafter();
						}]);
						_a_wrapper();
						_a_paddingold();
						_a_paddingcur();
						break;
				}

				sc_startScroll(scrl, conf);
				cf_setCookie(opts.cookie, $cfs, conf);

				$cfs.trigger(cf_e('updatePageStatus', conf), [false, w_siz]);

				return true;
			});


			//	slideTo event
			$cfs.bind(cf_e('slideTo', conf), function(e, num, dev, org, obj, dir, clb) {
				e.stopPropagation();

				var v = [num, dev, org, obj, dir, clb],
					t = ['string/number/object', 'number', 'boolean', 'object', 'string', 'function'],
					a = cf_sortParams(v, t);

				obj = a[3];
				dir = a[4];
				clb = a[5];

				num = gn_getItemIndex(a[0], a[1], a[2], itms, $cfs);

				if (num == 0)
				{
					return false;
				}
				if (!is_object(obj))
				{
					obj = false;
				}

				if (dir != 'prev' && dir != 'next')
				{
					if (opts.circular)
					{
						dir = (num <= itms.total / 2) ? 'next' : 'prev';
					}
					else
					{
						dir = (itms.first == 0 || itms.first > num) ? 'next' : 'prev';
					}
				}

				if (dir == 'prev')
				{
					num = itms.total-num;
				}
				$cfs.trigger(cf_e(dir, conf), [obj, num, clb]);

				return true;
			});


			//	prevPage event
			$cfs.bind(cf_e('prevPage', conf), function(e, obj, clb) {
				e.stopPropagation();
				var cur = $cfs.triggerHandler(cf_e('currentPage', conf));
				return $cfs.triggerHandler(cf_e('slideToPage', conf), [cur-1, obj, 'prev', clb]);
			});


			//	nextPage event
			$cfs.bind(cf_e('nextPage', conf), function(e, obj, clb) {
				e.stopPropagation();
				var cur = $cfs.triggerHandler(cf_e('currentPage', conf));
				return $cfs.triggerHandler(cf_e('slideToPage', conf), [cur+1, obj, 'next', clb]);
			});


			//	slideToPage event
			$cfs.bind(cf_e('slideToPage', conf), function(e, pag, obj, dir, clb) {
				e.stopPropagation();
				if (!is_number(pag))
				{
					pag = $cfs.triggerHandler(cf_e('currentPage', conf));
				}
				var ipp = opts.pagination.items || opts.items.visible,
					max = Math.ceil(itms.total / ipp)-1;

				if (pag < 0)
				{
					pag = max;
				}
				if (pag > max)
				{
					pag = 0;
				}
				return $cfs.triggerHandler(cf_e('slideTo', conf), [pag*ipp, 0, true, obj, dir, clb]);
			});

			//	jumpToStart event
			$cfs.bind(cf_e('jumpToStart', conf), function(e, s) {
				e.stopPropagation();
				if (s)
				{
					s = gn_getItemIndex(s, 0, true, itms, $cfs);
				}
				else
				{
					s = 0;
				}

				s += itms.first;
				if (s != 0)
				{
					if (itms.total > 0)
					{
						while (s > itms.total)
						{
							s -= itms.total;
						}
					}
					$cfs.prepend($cfs.children().slice(s, itms.total));
				}
				return true;
			});


			//	synchronise event
			$cfs.bind(cf_e('synchronise', conf), function(e, s) {
				e.stopPropagation();
				if (s)
				{
					s = cf_getSynchArr(s);
				}
				else if (opts.synchronise)
				{
					s = opts.synchronise;
				}
				else
				{
					return debug(conf, 'No carousel to synchronise.');
				}

				var n = $cfs.triggerHandler(cf_e('currentPosition', conf)),
					x = true;

				for (var j = 0, l = s.length; j < l; j++)
				{
					if (!s[j][0].triggerHandler(cf_e('slideTo', conf), [n, s[j][3], true]))
					{
						x = false;
					}
				}
				return x;
			});


			//	queue event
			$cfs.bind(cf_e('queue', conf), function(e, dir, opt) {
				e.stopPropagation();
				if (is_function(dir))
				{
					dir.call($tt0, queu);
				}
				else if (is_array(dir))
				{
					queu = dir;
				}
				else if (!is_undefined(dir))
				{
					queu.push([dir, opt]);
				}
				return queu;
			});


			//	insertItem event
			$cfs.bind(cf_e('insertItem', conf), function(e, itm, num, org, dev) {
				e.stopPropagation();

				var v = [itm, num, org, dev],
					t = ['string/object', 'string/number/object', 'boolean', 'number'],
					a = cf_sortParams(v, t);

				itm = a[0];
				num = a[1];
				org = a[2];
				dev = a[3];

				if (is_object(itm) && !is_jquery(itm))
				{ 
					itm = $(itm);
				}
				else if (is_string(itm))
				{
					itm = $(itm);
				}
				if (!is_jquery(itm) || itm.length == 0)
				{
					return debug(conf, 'Not a valid object.');
				}

				if (is_undefined(num))
				{
					num = 'end';
				}

				sz_storeMargin(itm, opts);
				sz_storeOrigCss(itm);

				var orgNum = num,
					before = 'before';

				if (num == 'end')
				{
					if (org)
					{
						if (itms.first == 0)
						{
							num = itms.total-1;
							before = 'after';
						}
						else
						{
							num = itms.first;
							itms.first += itm.length;
						}
						if (num < 0)
						{
							num = 0;
						}
					}
					else
					{
						num = itms.total-1;
						before = 'after';
					}
				}
				else
				{
					num = gn_getItemIndex(num, dev, org, itms, $cfs);
				}

				var $cit = $cfs.children().eq(num);
				if ($cit.length)
				{
					$cit[before](itm);
				}
				else
				{
					debug(conf, 'Correct insert-position not found! Appending item to the end.');
					$cfs.append(itm);
				}

				if (orgNum != 'end' && !org)
				{
					if (num < itms.first)
					{
						itms.first += itm.length;
					}
				}
				itms.total = $cfs.children().length;
				if (itms.first >= itms.total)
				{
					itms.first -= itms.total;
				}

				$cfs.trigger(cf_e('updateSizes', conf));
				$cfs.trigger(cf_e('linkAnchors', conf));

				return true;
			});


			//	removeItem event
			$cfs.bind(cf_e('removeItem', conf), function(e, num, org, dev) {
				e.stopPropagation();

				var v = [num, org, dev],
					t = ['string/number/object', 'boolean', 'number'],
					a = cf_sortParams(v, t);

				num = a[0];
				org = a[1];
				dev = a[2];

				var removed = false;

				if (num instanceof $ && num.length > 1)
				{
					$removed = $();
					num.each(function(i, el) {
						var $rem = $cfs.trigger(cf_e('removeItem', conf), [$(this), org, dev]);
						if ( $rem ) 
						{
							$removed = $removed.add($rem);
						}
					});
					return $removed;
				}

				if (is_undefined(num) || num == 'end')
				{
					$removed = $cfs.children().last();
				}
				else
				{
					num = gn_getItemIndex(num, dev, org, itms, $cfs);
					var $removed = $cfs.children().eq(num);
					if ( $removed.length )
					{
						if (num < itms.first)
						{
							itms.first -= $removed.length;
						}
					}
				}
				if ( $removed && $removed.length )
				{
					$removed.detach();
					itms.total = $cfs.children().length;
					$cfs.trigger(cf_e('updateSizes', conf));
				}

				return $removed;
			});


			//	onBefore and onAfter event
			$cfs.bind(cf_e('onBefore', conf)+' '+cf_e('onAfter', conf), function(e, fn) {
				e.stopPropagation();
				var eType = e.type.slice(conf.events.prefix.length);
				if (is_array(fn))
				{
					clbk[eType] = fn;
				}
				if (is_function(fn))
				{
					clbk[eType].push(fn);
				}
				return clbk[eType];
			});


			//	currentPosition event
			$cfs.bind(cf_e('currentPosition', conf), function(e, fn) {
				e.stopPropagation();
				if (itms.first == 0)
				{
					var val = 0;
				}
				else
				{
					var val = itms.total - itms.first;
				}
				if (is_function(fn))
				{
					fn.call($tt0, val);
				}
				return val;
			});


			//	currentPage event
			$cfs.bind(cf_e('currentPage', conf), function(e, fn) {
				e.stopPropagation();
				var ipp = opts.pagination.items || opts.items.visible,
					max = Math.ceil(itms.total/ipp-1),
					nr;
				if (itms.first == 0)
				{
					nr = 0;
				}
				else if (itms.first < itms.total % ipp)
				{
					nr = 0;
				}
				else if (itms.first == ipp && !opts.circular)
				{
					nr = max;
				}
				else 
				{
					 nr = Math.round((itms.total-itms.first)/ipp);
				}
				if (nr < 0)
				{
					nr = 0;
				}
				if (nr > max)
				{
					nr = max;
				}
				if (is_function(fn))
				{
					fn.call($tt0, nr);
				}
				return nr;
			});


			//	currentVisible event
			$cfs.bind(cf_e('currentVisible', conf), function(e, fn) {
				e.stopPropagation();
				var $i = gi_getCurrentItems($cfs.children(), opts);
				if (is_function(fn))
				{
					fn.call($tt0, $i);
				}
				return $i;
			});


			//	slice event
			$cfs.bind(cf_e('slice', conf), function(e, f, l, fn) {
				e.stopPropagation();

				if (itms.total == 0)
				{
					return false;
				}

				var v = [f, l, fn],
					t = ['number', 'number', 'function'],
					a = cf_sortParams(v, t);

				f = (is_number(a[0])) ? a[0] : 0;
				l = (is_number(a[1])) ? a[1] : itms.total;
				fn = a[2];

				f += itms.first;
				l += itms.first;

				if (items.total > 0)
				{
					while (f > itms.total)
					{
						f -= itms.total;
					}
					while (l > itms.total)
					{
						l -= itms.total;
					}
					while (f < 0)
					{
						f += itms.total;
					}
					while (l < 0)
					{
						l += itms.total;
					}
				}
				var $iA = $cfs.children(),
					$i;

				if (l > f)
				{
					$i = $iA.slice(f, l);
				}
				else
				{
					$i = $( $iA.slice(f, itms.total).get().concat( $iA.slice(0, l).get() ) );
				}

				if (is_function(fn))
				{
					fn.call($tt0, $i);
				}
				return $i;
			});


			//	isPaused, isStopped and isScrolling events
			$cfs.bind(cf_e('isPaused', conf)+' '+cf_e('isStopped', conf)+' '+cf_e('isScrolling', conf), function(e, fn) {
				e.stopPropagation();
				var eType = e.type.slice(conf.events.prefix.length),
					value = crsl[eType];
				if (is_function(fn))
				{
					fn.call($tt0, value);
				}
				return value;
			});


			//	configuration event
			$cfs.bind(cf_e('configuration', conf), function(e, a, b, c) {
				e.stopPropagation();
				var reInit = false;

				//	return entire configuration-object
				if (is_function(a))
				{
					a.call($tt0, opts);
				}
				//	set multiple options via object
				else if (is_object(a))
				{
					opts_orig = $.extend(true, {}, opts_orig, a);
					if (b !== false) reInit = true;
					else opts = $.extend(true, {}, opts, a);

				}
				else if (!is_undefined(a))
				{

					//	callback function for specific option
					if (is_function(b))
					{
						var val = eval('opts.'+a);
						if (is_undefined(val))
						{
							val = '';
						}
						b.call($tt0, val);
					}
					//	set individual option
					else if (!is_undefined(b))
					{
						if (typeof c !== 'boolean') c = true;
						eval('opts_orig.'+a+' = b');
						if (c !== false) reInit = true;
						else eval('opts.'+a+' = b');
					}
					//	return value for specific option
					else
					{
						return eval('opts.'+a);
					}
				}
				if (reInit)
				{
					sz_resetMargin($cfs.children(), opts);
					FN._init(opts_orig);
					FN._bind_buttons();
					var sz = sz_setSizes($cfs, opts);
					$cfs.trigger(cf_e('updatePageStatus', conf), [true, sz]);
				}
				return opts;
			});


			//	linkAnchors event
			$cfs.bind(cf_e('linkAnchors', conf), function(e, $con, sel) {
				e.stopPropagation();

				if (is_undefined($con))
				{
					$con = $('body');
				}
				else if (is_string($con))
				{
					$con = $($con);
				}
				if (!is_jquery($con) || $con.length == 0)
				{
					return debug(conf, 'Not a valid object.');
				}
				if (!is_string(sel))
				{
					sel = 'a.caroufredsel';
				}

				$con.find(sel).each(function() {
					var h = this.hash || '';
					if (h.length > 0 && $cfs.children().index($(h)) != -1)
					{
						$(this).unbind('click').click(function(e) {
							e.preventDefault();
							$cfs.trigger(cf_e('slideTo', conf), h);
						});
					}
				});
				return true;
			});


			//	updatePageStatus event
			$cfs.bind(cf_e('updatePageStatus', conf), function(e, build, sizes) {
				e.stopPropagation();
				if (!opts.pagination.container)
				{
					return;
				}

				var ipp = opts.pagination.items || opts.items.visible,
					pgs = Math.ceil(itms.total/ipp);

				if (build)
				{
					if (opts.pagination.anchorBuilder)
					{
						opts.pagination.container.children().remove();
						opts.pagination.container.each(function() {
							for (var a = 0; a < pgs; a++)
							{
								var i = $cfs.children().eq( gn_getItemIndex(a*ipp, 0, true, itms, $cfs) );
								$(this).append(opts.pagination.anchorBuilder.call(i[0], a+1));
							}
						});
					}
					opts.pagination.container.each(function() {
						$(this).children().unbind(opts.pagination.event).each(function(a) {
							$(this).bind(opts.pagination.event, function(e) {
								e.preventDefault();
								$cfs.trigger(cf_e('slideTo', conf), [a*ipp, -opts.pagination.deviation, true, opts.pagination]);
							});
						});
					});
				}

				var selected = $cfs.triggerHandler(cf_e('currentPage', conf)) + opts.pagination.deviation;
				if (selected >= pgs)
				{
					selected = 0;
				}
				if (selected < 0)
				{
					selected = pgs-1;
				}
				opts.pagination.container.each(function() {
					$(this).children().removeClass(cf_c('selected', conf)).eq(selected).addClass(cf_c('selected', conf));
				});
				return true;
			});


			//	updateSizes event
			$cfs.bind(cf_e('updateSizes', conf), function(e) {
				var vI = opts.items.visible,
					a_itm = $cfs.children(),
					avail_primary = ms_getParentSize($wrp, opts, 'width');

				itms.total = a_itm.length;

				if (crsl.primarySizePercentage)
				{
					opts.maxDimension = avail_primary;
					opts[opts.d['width']] = ms_getPercentage(avail_primary, crsl.primarySizePercentage);
				}
				else
				{
					opts.maxDimension = ms_getMaxDimension(opts, avail_primary);
				}

				if (opts.responsive)
				{
					opts.items.width = opts.items.sizesConf.width;
					opts.items.height = opts.items.sizesConf.height;
					opts = in_getResponsiveValues(opts, a_itm, avail_primary);
					vI = opts.items.visible;
					sz_setResponsiveSizes(opts, a_itm);
				}
				else if (opts.items.visibleConf.variable)
				{
					vI = gn_getVisibleItemsNext(a_itm, opts, 0);
				}
				else if (opts.items.filter != '*')
				{
					vI = gn_getVisibleItemsNextFilter(a_itm, opts, 0);
				}

				if (!opts.circular && itms.first != 0 && vI > itms.first) {
					if (opts.items.visibleConf.variable)
					{
						var nI = gn_getVisibleItemsPrev(a_itm, opts, itms.first) - itms.first;
					}
					else if (opts.items.filter != '*')
					{
						var nI = gn_getVisibleItemsPrevFilter(a_itm, opts, itms.first) - itms.first;
					}
					else
					{
						var nI = opts.items.visible - itms.first;
					}
					debug(conf, 'Preventing non-circular: sliding '+nI+' items backward.');
					$cfs.trigger(cf_e('prev', conf), nI);
				}

				opts.items.visible = cf_getItemsAdjust(vI, opts, opts.items.visibleConf.adjust, $tt0);
				opts.items.visibleConf.old = opts.items.visible;
				opts = in_getAlignPadding(opts, a_itm);

				var sz = sz_setSizes($cfs, opts);
				$cfs.trigger(cf_e('updatePageStatus', conf), [true, sz]);
				nv_showNavi(opts, itms.total, conf);
				nv_enableNavi(opts, itms.first, conf);

				return sz;
			});


			//	destroy event
			$cfs.bind(cf_e('destroy', conf), function(e, orgOrder) {
				e.stopPropagation();
				tmrs = sc_clearTimers(tmrs);

				$cfs.data('_cfs_isCarousel', false);
				$cfs.trigger(cf_e('finish', conf));
				if (orgOrder)
				{
					$cfs.trigger(cf_e('jumpToStart', conf));
				}
				sz_restoreOrigCss($cfs.children());
				sz_restoreOrigCss($cfs);
				FN._unbind_events();
				FN._unbind_buttons();
				if (conf.wrapper == 'parent')
				{
					sz_restoreOrigCss($wrp);
				}
				else
				{
					$wrp.replaceWith($cfs);
				}

				return true;
			});


			//	debug event
			$cfs.bind(cf_e('debug', conf), function(e) {
				debug(conf, 'Carousel width: ' + opts.width);
				debug(conf, 'Carousel height: ' + opts.height);
				debug(conf, 'Item widths: ' + opts.items.width);
				debug(conf, 'Item heights: ' + opts.items.height);
				debug(conf, 'Number of items visible: ' + opts.items.visible);
				if (opts.auto.play)
				{
					debug(conf, 'Number of items scrolled automatically: ' + opts.auto.items);
				}
				if (opts.prev.button)
				{
					debug(conf, 'Number of items scrolled backward: ' + opts.prev.items);
				}
				if (opts.next.button)
				{
					debug(conf, 'Number of items scrolled forward: ' + opts.next.items);
				}
				return conf.debug;
			});


			//	triggerEvent, making prefixed and namespaced events accessible from outside
			$cfs.bind('_cfs_triggerEvent', function(e, n, o) {
				e.stopPropagation();
				return $cfs.triggerHandler(cf_e(n, conf), o);
			});
		};	//	/bind_events


		FN._unbind_events = function() {
			$cfs.unbind(cf_e('', conf));
			$cfs.unbind(cf_e('', conf, false));
			$cfs.unbind('_cfs_triggerEvent');
		};	//	/unbind_events


		FN._bind_buttons = function() {
			FN._unbind_buttons();
			nv_showNavi(opts, itms.total, conf);
			nv_enableNavi(opts, itms.first, conf);

			if (opts.auto.pauseOnHover)
			{
				var pC = bt_pauseOnHoverConfig(opts.auto.pauseOnHover);
				$wrp.bind(cf_e('mouseenter', conf, false), function() { $cfs.trigger(cf_e('pause', conf), pC);	})
					.bind(cf_e('mouseleave', conf, false), function() { $cfs.trigger(cf_e('resume', conf));		});
			}

			//	play button
			if (opts.auto.button)
			{
				opts.auto.button.bind(cf_e(opts.auto.event, conf, false), function(e) {
					e.preventDefault();
					var ev = false,
						pC = null;

					if (crsl.isPaused)
					{
						ev = 'play';
					}
					else if (opts.auto.pauseOnEvent)
					{
						ev = 'pause';
						pC = bt_pauseOnHoverConfig(opts.auto.pauseOnEvent);
					}
					if (ev)
					{
						$cfs.trigger(cf_e(ev, conf), pC);
					}
				});
			}

			//	prev button
			if (opts.prev.button)
			{
				opts.prev.button.bind(cf_e(opts.prev.event, conf, false), function(e) {
					e.preventDefault();
					$cfs.trigger(cf_e('prev', conf));
				});
				if (opts.prev.pauseOnHover)
				{
					var pC = bt_pauseOnHoverConfig(opts.prev.pauseOnHover);
					opts.prev.button.bind(cf_e('mouseenter', conf, false), function() { $cfs.trigger(cf_e('pause', conf), pC);	})
									.bind(cf_e('mouseleave', conf, false), function() { $cfs.trigger(cf_e('resume', conf));		});
				}
			}

			//	next butotn
			if (opts.next.button)
			{
				opts.next.button.bind(cf_e(opts.next.event, conf, false), function(e) {
					e.preventDefault();
					$cfs.trigger(cf_e('next', conf));
				});
				if (opts.next.pauseOnHover)
				{
					var pC = bt_pauseOnHoverConfig(opts.next.pauseOnHover);
					opts.next.button.bind(cf_e('mouseenter', conf, false), function() { $cfs.trigger(cf_e('pause', conf), pC); 	})
									.bind(cf_e('mouseleave', conf, false), function() { $cfs.trigger(cf_e('resume', conf));		});
				}
			}

			//	pagination
			if (opts.pagination.container)
			{
				if (opts.pagination.pauseOnHover)
				{
					var pC = bt_pauseOnHoverConfig(opts.pagination.pauseOnHover);
					opts.pagination.container.bind(cf_e('mouseenter', conf, false), function() { $cfs.trigger(cf_e('pause', conf), pC);	})
											 .bind(cf_e('mouseleave', conf, false), function() { $cfs.trigger(cf_e('resume', conf));	});
				}
			}

			//	prev/next keys
			if (opts.prev.key || opts.next.key)
			{
				$(document).bind(cf_e('keyup', conf, false, true, true), function(e) {
					var k = e.keyCode;
					if (k == opts.next.key)
					{
						e.preventDefault();
						$cfs.trigger(cf_e('next', conf));
					}
					if (k == opts.prev.key)
					{
						e.preventDefault();
						$cfs.trigger(cf_e('prev', conf));
					}
				});
			}

			//	pagination keys
			if (opts.pagination.keys)
			{
				$(document).bind(cf_e('keyup', conf, false, true, true), function(e) {
					var k = e.keyCode;
					if (k >= 49 && k < 58)
					{
						k = (k-49) * opts.items.visible;
						if (k <= itms.total)
						{
							e.preventDefault();
							$cfs.trigger(cf_e('slideTo', conf), [k, 0, true, opts.pagination]);
						}
					}
				});
			}

			//	swipe
			if ($.fn.swipe)
			{
				var isTouch = 'ontouchstart' in window;
				if ((isTouch && opts.swipe.onTouch) || (!isTouch && opts.swipe.onMouse))
				{
					var scP = $.extend(true, {}, opts.prev, opts.swipe),
						scN = $.extend(true, {}, opts.next, opts.swipe),
						swP = function() { $cfs.trigger(cf_e('prev', conf), [scP]) },
						swN = function() { $cfs.trigger(cf_e('next', conf), [scN]) };

					switch (opts.direction)
					{
						case 'up':
						case 'down':
							opts.swipe.options.swipeUp = swN;
							opts.swipe.options.swipeDown = swP;
							break;
						default:
							opts.swipe.options.swipeLeft = swN;
							opts.swipe.options.swipeRight = swP;
					}
					if (crsl.swipe)
					{
						$cfs.swipe('destroy');
					}
					$wrp.swipe(opts.swipe.options);
					$wrp.css('cursor', 'move');
					crsl.swipe = true;
				}
			}

			//	mousewheel
			if ($.fn.mousewheel)
			{

				if (opts.mousewheel)
				{
					var mcP = $.extend(true, {}, opts.prev, opts.mousewheel),
						mcN = $.extend(true, {}, opts.next, opts.mousewheel);

					if (crsl.mousewheel)
					{
						$wrp.unbind(cf_e('mousewheel', conf, false));
					}
					$wrp.bind(cf_e('mousewheel', conf, false), function(e, delta) { 
						e.preventDefault();
						if (delta > 0)
						{
							$cfs.trigger(cf_e('prev', conf), [mcP]);
						}
						else
						{
							$cfs.trigger(cf_e('next', conf), [mcN]);
						}
					});
					crsl.mousewheel = true;
				}
			}

			if (opts.auto.play)
			{
				$cfs.trigger(cf_e('play', conf), opts.auto.delay);
			}

			if (crsl.upDateOnWindowResize)
			{
				var resizeFn = function(e) {
					$cfs.trigger(cf_e('finish', conf));
					if (opts.auto.pauseOnResize && !crsl.isPaused)
					{
						$cfs.trigger(cf_e('play', conf));
					}
					sz_resetMargin($cfs.children(), opts);
					$cfs.trigger(cf_e('updateSizes', conf));
				};

				var $w = $(window),
					onResize = null;

				if ($.debounce && conf.onWindowResize == 'debounce')
				{
					onResize = $.debounce(200, resizeFn);
				}
				else if ($.throttle && conf.onWindowResize == 'throttle')
				{
					onResize = $.throttle(300, resizeFn);
				}
				else
				{
					var _windowWidth = 0,
						_windowHeight = 0;

					onResize = function() {
						var nw = $w.width(),
							nh = $w.height();

						if (nw != _windowWidth || nh != _windowHeight)
						{
							resizeFn();
							_windowWidth = nw;
							_windowHeight = nh;
						}
					};
				}
				$w.bind(cf_e('resize', conf, false, true, true), onResize);
			}
		};	//	/bind_buttons


		FN._unbind_buttons = function() {
			var ns1 = cf_e('', conf),
				ns2 = cf_e('', conf, false);
				ns3 = cf_e('', conf, false, true, true);

			$(document).unbind(ns3);
			$(window).unbind(ns3);
			$wrp.unbind(ns2);

			if (opts.auto.button)
			{
				opts.auto.button.unbind(ns2);
			}
			if (opts.prev.button)
			{
				opts.prev.button.unbind(ns2);
			}
			if (opts.next.button)
			{
				opts.next.button.unbind(ns2);
			}
			if (opts.pagination.container)
			{
				opts.pagination.container.unbind(ns2);
				if (opts.pagination.anchorBuilder)
				{
					opts.pagination.container.children().remove();
				}
			}
			if (crsl.swipe)
			{
				$cfs.swipe('destroy');
				$wrp.css('cursor', 'default');
				crsl.swipe = false;
			}
			if (crsl.mousewheel)
			{
				crsl.mousewheel = false;
			}

			nv_showNavi(opts, 'hide', conf);
			nv_enableNavi(opts, 'removeClass', conf);

		};	//	/unbind_buttons



		//	START

		if (is_boolean(configs))
		{
			configs = {
				'debug': configs
			};
		}

		//	set vars
		var crsl = {
				'direction'		: 'next',
				'isPaused'		: true,
				'isScrolling'	: false,
				'isStopped'		: false,
				'mousewheel'	: false,
				'swipe'			: false
			},
			itms = {
				'total'			: $cfs.children().length,
				'first'			: 0
			},
			tmrs = {
				'auto'			: null,
				'progress'		: null,
				'startTime'		: getTime(),
				'timePassed'	: 0
			},
			scrl = {
				'isStopped'		: false,
				'duration'		: 0,
				'startTime'		: 0,
				'easing'		: '',
				'anims'			: []
			},
			clbk = {
				'onBefore'		: [],
				'onAfter'		: []
			},
			queu = [],
			conf = $.extend(true, {}, $.fn.carouFredSel.configs, configs),
			opts = {},
			opts_orig = $.extend(true, {}, options),
			$wrp = (conf.wrapper == 'parent')
				? $cfs.parent()
				: $cfs.wrap('<'+conf.wrapper.element+' class="'+conf.wrapper.classname+'" />').parent();


		conf.selector		= $cfs.selector;
		conf.serialNumber	= $.fn.carouFredSel.serialNumber++;

		conf.transition = (conf.transition && $.fn.transition) ? 'transition' : 'animate';

		//	create carousel
		FN._init(opts_orig, true, starting_position);
		FN._build();
		FN._bind_events();
		FN._bind_buttons();

		//	find item to start
		if (is_array(opts.items.start))
		{
			var start_arr = opts.items.start;
		}
		else
		{
			var start_arr = [];
			if (opts.items.start != 0)
			{
				start_arr.push(opts.items.start);
			}
		}
		if (opts.cookie)
		{
			start_arr.unshift(parseInt(cf_getCookie(opts.cookie), 10));
		}

		if (start_arr.length > 0)
		{
			for (var a = 0, l = start_arr.length; a < l; a++)
			{
				var s = start_arr[a];
				if (s == 0)
				{
					continue;
				}
				if (s === true)
				{
					s = window.location.hash;
					if (s.length < 1)
					{
						continue;
					}
				}
				else if (s === 'random')
				{
					s = Math.floor(Math.random()*itms.total);
				}
				if ($cfs.triggerHandler(cf_e('slideTo', conf), [s, 0, true, { fx: 'none' }]))
				{
					break;
				}
			}
		}
		var siz = sz_setSizes($cfs, opts),
			itm = gi_getCurrentItems($cfs.children(), opts);

		if (opts.onCreate)
		{
			opts.onCreate.call($tt0, {
				'width': siz.width,
				'height': siz.height,
				'items': itm
			});
		}

		$cfs.trigger(cf_e('updatePageStatus', conf), [true, siz]);
		$cfs.trigger(cf_e('linkAnchors', conf));

		if (conf.debug)
		{
			$cfs.trigger(cf_e('debug', conf));
		}

		return $cfs;
	};



	//	GLOBAL PUBLIC

	$.fn.carouFredSel.serialNumber = 1;
	$.fn.carouFredSel.defaults = {
		'synchronise'	: false,
		'infinite'		: true,
		'circular'		: true,
		'responsive'	: false,
		'direction'		: 'left',
		'items'			: {
			'start'			: 0
		},
		'scroll'		: {
			'easing'		: 'swing',
			'duration'		: 500,
			'pauseOnHover'	: false,
			'event'			: 'click',
			'queue'			: false
		}
	};
	$.fn.carouFredSel.configs = {
		'debug'			: false,
		'transition'	: false,
		'onWindowResize': 'throttle',
		'events'		: {
			'prefix'		: '',
			'namespace'		: 'cfs'
		},
		'wrapper'		: {
			'element'		: 'div',
			'classname'		: 'caroufredsel_wrapper'
		},
		'classnames'	: {}
	};
	$.fn.carouFredSel.pageAnchorBuilder = function(nr) {
		return '<a href="#"><span>'+nr+'</span></a>';
	};
	$.fn.carouFredSel.progressbarUpdater = function(perc) {
		$(this).css('width', perc+'%');
	};

	$.fn.carouFredSel.cookie = {
		get: function(n) {
			n += '=';
			var ca = document.cookie.split(';');
			for (var a = 0, l = ca.length; a < l; a++)
			{
				var c = ca[a];
				while (c.charAt(0) == ' ')
				{
					c = c.slice(1);
				}
				if (c.indexOf(n) == 0)
				{
					return c.slice(n.length);
				}
			}
			return 0;
		},
		set: function(n, v, d) {
			var e = "";
			if (d)
			{
				var date = new Date();
				date.setTime(date.getTime() + (d * 24 * 60 * 60 * 1000));
				e = "; expires=" + date.toGMTString();
			}
			document.cookie = n + '=' + v + e + '; path=/';
		},
		remove: function(n) {
			$.fn.carouFredSel.cookie.set(n, "", -1);
		}
	};


	//	GLOBAL PRIVATE

	//	scrolling functions
	function sc_setScroll(d, e, c) {
		if (c.transition == 'transition')
		{
			if (e == 'swing')
			{
				e = 'ease';
			}
		}
		return {
			anims: [],
			duration: d,
			orgDuration: d,
			easing: e,
			startTime: getTime()
		};
	}
	function sc_startScroll(s, c) {
		for (var a = 0, l = s.anims.length; a < l; a++)
		{
			var b = s.anims[a];
			if (!b)
			{
				continue;
			}
			b[0][c.transition](b[1], s.duration, s.easing, b[2]);
		}
	}
	function sc_stopScroll(s, finish) {
		if (!is_boolean(finish))
		{
			finish = true;
		}
		if (is_object(s.pre))
		{
			sc_stopScroll(s.pre, finish);
		}
		for (var a = 0, l = s.anims.length; a < l; a++)
		{
			var b = s.anims[a];
			b[0].stop(true);
			if (finish)
			{
				b[0].css(b[1]);
				if (is_function(b[2]))
				{
					b[2]();
				}
			}
		}
		if (is_object(s.post))
		{
			sc_stopScroll(s.post, finish);
		}
	}
	function sc_afterScroll( $c, $c2, o ) {
		if ($c2)
		{
			$c2.remove();
		}

		switch(o.fx) {
			case 'fade':
			case 'crossfade':
			case 'cover-fade':
			case 'uncover-fade':
				$c.css('opacity', 1);
				$c.css('filter', '');
				break;
		}
	}
	function sc_fireCallbacks($t, o, b, a, c) {
		if (o[b])
		{
			o[b].call($t, a);
		}
		if (c[b].length)
		{
			for (var i = 0, l = c[b].length; i < l; i++)
			{
				c[b][i].call($t, a);
			}
		}
		return [];
	}
	function sc_fireQueue($c, q, c) {

		if (q.length)
		{
			$c.trigger(cf_e(q[0][0], c), q[0][1]);
			q.shift();
		}
		return q;
	}
	function sc_hideHiddenItems(hiddenitems) {
		hiddenitems.each(function() {
			var hi = $(this);
			hi.data('_cfs_isHidden', hi.is(':hidden')).hide();
		});
	}
	function sc_showHiddenItems(hiddenitems) {
		if (hiddenitems)
		{
			hiddenitems.each(function() {
				var hi = $(this);
				if (!hi.data('_cfs_isHidden'))
				{
					hi.show();
				}
			});
		}
	}
	function sc_clearTimers(t) {
		if (t.auto)
		{
			clearTimeout(t.auto);
		}
		if (t.progress)
		{
			clearInterval(t.progress);
		}
		return t;
	}
	function sc_mapCallbackArguments(i_old, i_skp, i_new, s_itm, s_dir, s_dur, w_siz) {
		return {
			'width': w_siz.width,
			'height': w_siz.height,
			'items': {
				'old': i_old,
				'skipped': i_skp,
				'visible': i_new
			},
			'scroll': {
				'items': s_itm,
				'direction': s_dir,
				'duration': s_dur
			}
		};
	}
	function sc_getDuration( sO, o, nI, siz ) {
		var dur = sO.duration;
		if (sO.fx == 'none')
		{
			return 0;
		}
		if (dur == 'auto')
		{
			dur = o.scroll.duration / o.scroll.items * nI;
		}
		else if (dur < 10)
		{
			dur = siz / dur;
		}
		if (dur < 1)
		{
			return 0;
		}
		if (sO.fx == 'fade')
		{
			dur = dur / 2;
		}
		return Math.round(dur);
	}

	//	navigation functions
	function nv_showNavi(o, t, c) {
		var minimum = (is_number(o.items.minimum)) ? o.items.minimum : o.items.visible + 1;
		if (t == 'show' || t == 'hide')
		{
			var f = t;
		}
		else if (minimum > t)
		{
			debug(c, 'Not enough items ('+t+' total, '+minimum+' needed): Hiding navigation.');
			var f = 'hide';
		}
		else
		{
			var f = 'show';
		}
		var s = (f == 'show') ? 'removeClass' : 'addClass',
			h = cf_c('hidden', c);

		if (o.auto.button)
		{
			o.auto.button[f]()[s](h);
		}
		if (o.prev.button)
		{
			o.prev.button[f]()[s](h);
		}
		if (o.next.button)
		{
			o.next.button[f]()[s](h);
		}
		if (o.pagination.container)
		{
			o.pagination.container[f]()[s](h);
		}
	}
	function nv_enableNavi(o, f, c) {
		if (o.circular || o.infinite) return;
		var fx = (f == 'removeClass' || f == 'addClass') ? f : false,
			di = cf_c('disabled', c);

		if (o.auto.button && fx)
		{
			o.auto.button[fx](di);
		}
		if (o.prev.button)
		{
			var fn = fx || (f == 0) ? 'addClass' : 'removeClass';
			o.prev.button[fn](di);
		}
		if (o.next.button)
		{
			var fn = fx || (f == o.items.visible) ? 'addClass' : 'removeClass';
			o.next.button[fn](di);
		}
	}

	//	get object functions
	function go_getObject($tt, obj) {
		if (is_function(obj))
		{
			obj = obj.call($tt);
		}
		else if (is_undefined(obj))
		{
			obj = {};
		}
		return obj;
	}
	function go_getItemsObject($tt, obj) {
		obj = go_getObject($tt, obj);
		if (is_number(obj))
		{
			obj	= {
				'visible': obj
			};
		}
		else if (obj == 'variable')
		{
			obj = {
				'visible': obj,
				'width': obj, 
				'height': obj
			};
		}
		else if (!is_object(obj))
		{
			obj = {};
		}
		return obj;
	}
	function go_getScrollObject($tt, obj) {
		obj = go_getObject($tt, obj);
		if (is_number(obj))
		{
			if (obj <= 50)
			{
				obj = {
					'items': obj
				};
			}
			else
			{
				obj = {
					'duration': obj
				};
			}
		}
		else if (is_string(obj))
		{
			obj = {
				'easing': obj
			};
		}
		else if (!is_object(obj))
		{
			obj = {};
		}
		return obj;
	}
	function go_getNaviObject($tt, obj) {
		obj = go_getObject($tt, obj);
		if (is_string(obj))
		{
			var temp = cf_getKeyCode(obj);
			if (temp == -1)
			{
				obj = $(obj);
			}
			else
			{
				obj = temp;
			}
		}
		return obj;
	}

	function go_getAutoObject($tt, obj) {
		obj = go_getNaviObject($tt, obj);
		if (is_jquery(obj))
		{
			obj = {
				'button': obj
			};
		}
		else if (is_boolean(obj))
		{
			obj = {
				'play': obj
			};
		}
		else if (is_number(obj))
		{
			obj = {
				'timeoutDuration': obj
			};
		}
		if (obj.progress)
		{
			if (is_string(obj.progress) || is_jquery(obj.progress))
			{
				obj.progress = {
					'bar': obj.progress
				};
			}
		}
		return obj;
	}
	function go_complementAutoObject($tt, obj) {
		if (is_function(obj.button))
		{
			obj.button = obj.button.call($tt);
		}
		if (is_string(obj.button))
		{
			obj.button = $(obj.button);
		}
		if (!is_boolean(obj.play))
		{
			obj.play = true;
		}
		if (!is_number(obj.delay))
		{
			obj.delay = 0;
		}
		if (is_undefined(obj.pauseOnEvent))
		{
			obj.pauseOnEvent = true;
		}
		if (!is_boolean(obj.pauseOnResize))
		{
			obj.pauseOnResize = true;
		}
		if (!is_number(obj.timeoutDuration))
		{
			obj.timeoutDuration = (obj.duration < 10)
				? 2500
				: obj.duration * 5;
		}
		if (obj.progress)
		{
			if (is_function(obj.progress.bar))
			{
				obj.progress.bar = obj.progress.bar.call($tt);
			}
			if (is_string(obj.progress.bar))
			{
				obj.progress.bar = $(obj.progress.bar);
			}
			if (obj.progress.bar)
			{
				if (!is_function(obj.progress.updater))
				{
					obj.progress.updater = $.fn.carouFredSel.progressbarUpdater;
				}
				if (!is_number(obj.progress.interval))
				{
					obj.progress.interval = 50;
				}
			}
			else
			{
				obj.progress = false;
			}
		}
		return obj;
	}

	function go_getPrevNextObject($tt, obj) {
		obj = go_getNaviObject($tt, obj);
		if (is_jquery(obj))
		{
			obj = {
				'button': obj
			};
		}
		else if (is_number(obj))
		{
			obj = {
				'key': obj
			};
		}
		return obj;
	}
	function go_complementPrevNextObject($tt, obj) {
		if (is_function(obj.button))
		{
			obj.button = obj.button.call($tt);
		}
		if (is_string(obj.button))
		{
			obj.button = $(obj.button);
		}
		if (is_string(obj.key))
		{
			obj.key = cf_getKeyCode(obj.key);
		}
		return obj;
	}

	function go_getPaginationObject($tt, obj) {
		obj = go_getNaviObject($tt, obj);
		if (is_jquery(obj))
		{
			obj = {
				'container': obj
			};
		}
		else if (is_boolean(obj))
		{
			obj = {
				'keys': obj
			};
		}
		return obj;
	}
	function go_complementPaginationObject($tt, obj) {
		if (is_function(obj.container))
		{
			obj.container = obj.container.call($tt);
		}
		if (is_string(obj.container))
		{
			obj.container = $(obj.container);
		}
		if (!is_number(obj.items))
		{
			obj.items = false;
		}
		if (!is_boolean(obj.keys))
		{
			obj.keys = false;
		}
		if (!is_function(obj.anchorBuilder) && !is_false(obj.anchorBuilder))
		{
			obj.anchorBuilder = $.fn.carouFredSel.pageAnchorBuilder;
		}
		if (!is_number(obj.deviation))
		{
			obj.deviation = 0;
		}
		return obj;
	}

	function go_getSwipeObject($tt, obj) {
		if (is_function(obj))
		{
			obj = obj.call($tt);
		}
		if (is_undefined(obj))
		{
			obj = {
				'onTouch': false
			};
		}
		if (is_true(obj))
		{
			obj = {
				'onTouch': obj
			};
		}
		else if (is_number(obj))
		{
			obj = {
				'items': obj
			};
		}
		return obj;
	}
	function go_complementSwipeObject($tt, obj) {
		if (!is_boolean(obj.onTouch))
		{
			obj.onTouch = true;
		}
		if (!is_boolean(obj.onMouse))
		{
			obj.onMouse = false;
		}
		if (!is_object(obj.options))
		{
			obj.options = {};
		}
		if (!is_boolean(obj.options.triggerOnTouchEnd))
		{
			obj.options.triggerOnTouchEnd = false;
		}
		return obj;
	}
	function go_getMousewheelObject($tt, obj) {
		if (is_function(obj))
		{
			obj = obj.call($tt);
		}
		if (is_true(obj))
		{
			obj = {};
		}
		else if (is_number(obj))
		{
			obj = {
				'items': obj
			};
		}
		else if (is_undefined(obj))
		{
			obj = false;
		}
		return obj;
	}
	function go_complementMousewheelObject($tt, obj) {
		return obj;
	}

	//	get number functions
	function gn_getItemIndex(num, dev, org, items, $cfs) {
		if (is_string(num))
		{
			num = $(num, $cfs);
		}

		if (is_object(num))
		{
			num = $(num, $cfs);
		}
		if (is_jquery(num))
		{
			num = $cfs.children().index(num);
			if (!is_boolean(org))
			{
				org = false;
			}
		}
		else
		{
			if (!is_boolean(org))
			{
				org = true;
			}
		}
		if (!is_number(num))
		{
			num = 0;
		}
		if (!is_number(dev))
		{
			dev = 0;
		}

		if (org)
		{
			num += items.first;
		}
		num += dev;
		if (items.total > 0)
		{
			while (num >= items.total)
			{
				num -= items.total;
			}
			while (num < 0)
			{
				num += items.total;
			}
		}
		return num;
	}

	//	items prev
	function gn_getVisibleItemsPrev(i, o, s) {
		var t = 0,
			x = 0;

		for (var a = s; a >= 0; a--)
		{
			var j = i.eq(a);
			t += (j.is(':visible')) ? j[o.d['outerWidth']](true) : 0;
			if (t > o.maxDimension)
			{
				return x;
			}
			if (a == 0)
			{
				a = i.length;
			}
			x++;
		}
	}
	function gn_getVisibleItemsPrevFilter(i, o, s) {
		return gn_getItemsPrevFilter(i, o.items.filter, o.items.visibleConf.org, s);
	}
	function gn_getScrollItemsPrevFilter(i, o, s, m) {
		return gn_getItemsPrevFilter(i, o.items.filter, m, s);
	}
	function gn_getItemsPrevFilter(i, f, m, s) {
		var t = 0,
			x = 0;

		for (var a = s, l = i.length; a >= 0; a--)
		{
			x++;
			if (x == l)
			{
				return x;
			}

			var j = i.eq(a);
			if (j.is(f))
			{
				t++;
				if (t == m)
				{
					return x;
				}
			}
			if (a == 0)
			{
				a = l;
			}
		}
	}

	function gn_getVisibleOrg($c, o) {
		return o.items.visibleConf.org || $c.children().slice(0, o.items.visible).filter(o.items.filter).length;
	}

	//	items next
	function gn_getVisibleItemsNext(i, o, s) {
		var t = 0,
			x = 0;

		for (var a = s, l = i.length-1; a <= l; a++)
		{
			var j = i.eq(a);

			t += (j.is(':visible')) ? j[o.d['outerWidth']](true) : 0;
			if (t > o.maxDimension)
			{
				return x;
			}

			x++;
			if (x == l+1)
			{
				return x;
			}
			if (a == l)
			{
				a = -1;
			}
		}
	}
	function gn_getVisibleItemsNextTestCircular(i, o, s, l) {
		var v = gn_getVisibleItemsNext(i, o, s);
		if (!o.circular)
		{
			if (s + v > l)
			{
				v = l - s;
			}
		}
		return v;
	}
	function gn_getVisibleItemsNextFilter(i, o, s) {
		return gn_getItemsNextFilter(i, o.items.filter, o.items.visibleConf.org, s, o.circular);
	}
	function gn_getScrollItemsNextFilter(i, o, s, m) {
		return gn_getItemsNextFilter(i, o.items.filter, m+1, s, o.circular) - 1;
	}
	function gn_getItemsNextFilter(i, f, m, s, c) {
		var t = 0,
			x = 0;

		for (var a = s, l = i.length-1; a <= l; a++)
		{
			x++;
			if (x >= l)
			{
				return x;
			}

			var j = i.eq(a);
			if (j.is(f))
			{
				t++;
				if (t == m)
				{
					return x;
				}
			}
			if (a == l)
			{
				a = -1;
			}
		}
	}

	//	get items functions
	function gi_getCurrentItems(i, o) {
		return i.slice(0, o.items.visible);
	}
	function gi_getOldItemsPrev(i, o, n) {
		return i.slice(n, o.items.visibleConf.old+n);
	}
	function gi_getNewItemsPrev(i, o) {
		return i.slice(0, o.items.visible);
	}
	function gi_getOldItemsNext(i, o) {
		return i.slice(0, o.items.visibleConf.old);
	}
	function gi_getNewItemsNext(i, o, n) {
		return i.slice(n, o.items.visible+n);
	}

	//	sizes functions
	function sz_storeMargin(i, o, d) {
		if (o.usePadding)
		{
			if (!is_string(d))
			{
				d = '_cfs_origCssMargin';
			}
			i.each(function() {
				var j = $(this),
					m = parseInt(j.css(o.d['marginRight']), 10);
				if (!is_number(m)) 
				{
					m = 0;
				}
				j.data(d, m);
			});
		}
	}
	function sz_resetMargin(i, o, m) {
		if (o.usePadding)
		{
			var x = (is_boolean(m)) ? m : false;
			if (!is_number(m))
			{
				m = 0;
			}
			sz_storeMargin(i, o, '_cfs_tempCssMargin');
			i.each(function() {
				var j = $(this);
				j.css(o.d['marginRight'], ((x) ? j.data('_cfs_tempCssMargin') : m + j.data('_cfs_origCssMargin')));
			});
		}
	}
	function sz_storeOrigCss(i) {
		i.each(function() {
			var j = $(this);
			j.data('_cfs_origCss', j.attr('style') || '');
		});
	}
	function sz_restoreOrigCss(i) {
		i.each(function() {
			var j = $(this);
			j.attr('style', j.data('_cfs_origCss') || '');
		});
	}
	function sz_setResponsiveSizes(o, all) {
		var visb = o.items.visible,
			newS = o.items[o.d['width']],
			seco = o[o.d['height']],
			secp = is_percentage(seco);

		all.each(function() {
			var $t = $(this),
				nw = newS - ms_getPaddingBorderMargin($t, o, 'Width');

			$t[o.d['width']](nw);
			if (secp)
			{
				$t[o.d['height']](ms_getPercentage(nw, seco));
			}
		});
	}
	function sz_setSizes($c, o) {
		var $w = $c.parent(),
			$i = $c.children(),
			$v = gi_getCurrentItems($i, o),
			sz = cf_mapWrapperSizes(ms_getSizes($v, o, true), o, false);

		$w.css(sz);

		if (o.usePadding)
		{
			var p = o.padding,
				r = p[o.d[1]];

			if (o.align && r < 0)
			{
				r = 0;
			}
			var $l = $v.last();
			$l.css(o.d['marginRight'], $l.data('_cfs_origCssMargin') + r);
			$c.css(o.d['top'], p[o.d[0]]);
			$c.css(o.d['left'], p[o.d[3]]);
		}

		$c.css(o.d['width'], sz[o.d['width']]+(ms_getTotalSize($i, o, 'width')*2));
		$c.css(o.d['height'], ms_getLargestSize($i, o, 'height'));
		return sz;
	}

	//	measuring functions
	function ms_getSizes(i, o, wrapper) {
		return [ms_getTotalSize(i, o, 'width', wrapper), ms_getLargestSize(i, o, 'height', wrapper)];
	}
	function ms_getLargestSize(i, o, dim, wrapper) {
		if (!is_boolean(wrapper))
		{
			wrapper = false;
		}
		if (is_number(o[o.d[dim]]) && wrapper)
		{
			return o[o.d[dim]];
		}
		if (is_number(o.items[o.d[dim]]))
		{
			return o.items[o.d[dim]];
		}
		dim = (dim.toLowerCase().indexOf('width') > -1) ? 'outerWidth' : 'outerHeight';
		return ms_getTrueLargestSize(i, o, dim);
	}
	function ms_getTrueLargestSize(i, o, dim) {
		var s = 0;

		for (var a = 0, l = i.length; a < l; a++)
		{
			var j = i.eq(a);

			var m = (j.is(':visible')) ? j[o.d[dim]](true) : 0;
			if (s < m)
			{
				s = m;
			}
		}
		return s;
	}

	function ms_getTotalSize(i, o, dim, wrapper) {
		if (!is_boolean(wrapper))
		{
			wrapper = false;
		}
		if (is_number(o[o.d[dim]]) && wrapper)
		{
			return o[o.d[dim]];
		}
		if (is_number(o.items[o.d[dim]]))
		{
			return o.items[o.d[dim]] * i.length;
		}

		var d = (dim.toLowerCase().indexOf('width') > -1) ? 'outerWidth' : 'outerHeight',
			s = 0;

		for (var a = 0, l = i.length; a < l; a++)
		{
			var j = i.eq(a);
			s += (j.is(':visible')) ? j[o.d[d]](true) : 0;
		}
		return s;
	}
	function ms_getParentSize($w, o, d) {
		var isVisible = $w.is(':visible');
		if (isVisible)
		{
			$w.hide();
		}
		var s = $w.parent()[o.d[d]]();
		if (isVisible)
		{
			$w.show();
		}
		return s;
	}
	function ms_getMaxDimension(o, a) {
		return (is_number(o[o.d['width']])) ? o[o.d['width']] : a;
	}
	function ms_hasVariableSizes(i, o, dim) {
		var s = false,
			v = false;

		for (var a = 0, l = i.length; a < l; a++)
		{
			var j = i.eq(a);

			var c = (j.is(':visible')) ? j[o.d[dim]](true) : 0;
			if (s === false)
			{
				s = c;
			}
			else if (s != c)
			{
				v = true;
			}
			if (s == 0)
			{
				v = true;
			}
		}
		return v;
	}
	function ms_getPaddingBorderMargin(i, o, d) {
		return i[o.d['outer'+d]](true) - i[o.d[d.toLowerCase()]]();
	}
	function ms_getPercentage(s, o) {
		if (is_percentage(o))
		{
			o = parseInt( o.slice(0, -1), 10 );
			if (!is_number(o))
			{
				return s;
			}
			s *= o/100;
		}
		return s;
	}

	//	config functions
	function cf_e(n, c, pf, ns, rd) {
		if (!is_boolean(pf))
		{
			pf = true;
		}
		if (!is_boolean(ns))
		{
			ns = true;
		}
		if (!is_boolean(rd))
		{
			rd = false;
		}

		if (pf)
		{
			n = c.events.prefix + n;
		}
		if (ns)
		{
			n = n +'.'+ c.events.namespace;
		}
		if (ns && rd)
		{
			n += c.serialNumber;
		}

		return n;
	}
	function cf_c(n, c) {
		return (is_string(c.classnames[n])) ? c.classnames[n] : n;
	}
	function cf_mapWrapperSizes(ws, o, p) {
		if (!is_boolean(p))
		{
			p = true;
		}
		var pad = (o.usePadding && p) ? o.padding : [0, 0, 0, 0];
		var wra = {};

		wra[o.d['width']] = ws[0] + pad[1] + pad[3];
		wra[o.d['height']] = ws[1] + pad[0] + pad[2];

		return wra;
	}
	function cf_sortParams(vals, typs) {
		var arr = [];
		for (var a = 0, l1 = vals.length; a < l1; a++)
		{
			for (var b = 0, l2 = typs.length; b < l2; b++)
			{
				if (typs[b].indexOf(typeof vals[a]) > -1 && is_undefined(arr[b]))
				{
					arr[b] = vals[a];
					break;
				}
			}
		}
		return arr;
	}
	function cf_getPadding(p) {
		if (is_undefined(p))
		{
			return [0, 0, 0, 0];
		}
		if (is_number(p))
		{
			return [p, p, p, p];
		}
		if (is_string(p))
		{
			p = p.split('px').join('').split('em').join('').split(' ');
		}

		if (!is_array(p))
		{
			return [0, 0, 0, 0];
		}
		for (var i = 0; i < 4; i++)
		{
			p[i] = parseInt(p[i], 10);
		}
		switch (p.length)
		{
			case 0:
				return [0, 0, 0, 0];
			case 1:
				return [p[0], p[0], p[0], p[0]];
			case 2:
				return [p[0], p[1], p[0], p[1]];
			case 3:
				return [p[0], p[1], p[2], p[1]];
			default:
				return [p[0], p[1], p[2], p[3]];
		}
	}
	function cf_getAlignPadding(itm, o) {
		var x = (is_number(o[o.d['width']])) ? Math.ceil(o[o.d['width']] - ms_getTotalSize(itm, o, 'width')) : 0;
		switch (o.align)
		{
			case 'left': 
				return [0, x];
			case 'right':
				return [x, 0];
			case 'center':
			default:
				return [Math.ceil(x/2), Math.floor(x/2)];
		}
	}
	function cf_getDimensions(o) {
		var dm = [
				['width'	, 'innerWidth'	, 'outerWidth'	, 'height'	, 'innerHeight'	, 'outerHeight'	, 'left', 'top'	, 'marginRight'	, 0, 1, 2, 3],
				['height'	, 'innerHeight'	, 'outerHeight'	, 'width'	, 'innerWidth'	, 'outerWidth'	, 'top'	, 'left', 'marginBottom', 3, 2, 1, 0]
			];

		var dl = dm[0].length,
			dx = (o.direction == 'right' || o.direction == 'left') ? 0 : 1;

		var dimensions = {};
		for (var d = 0; d < dl; d++)
		{
			dimensions[dm[0][d]] = dm[dx][d];
		}
		return dimensions;
	}
	function cf_getAdjust(x, o, a, $t) {
		var v = x;
		if (is_function(a))
		{
			v = a.call($t, v);

		}
		else if (is_string(a))
		{
			var p = a.split('+'),
				m = a.split('-');

			if (m.length > p.length)
			{
				var neg = true,
					sta = m[0],
					adj = m[1];
			}
			else
			{
				var neg = false,
					sta = p[0],
					adj = p[1];
			}

			switch(sta)
			{
				case 'even':
					v = (x % 2 == 1) ? x-1 : x;
					break;
				case 'odd':
					v = (x % 2 == 0) ? x-1 : x;
					break;
				default:
					v = x;
					break;
			}
			adj = parseInt(adj, 10);
			if (is_number(adj))
			{
				if (neg)
				{
					adj = -adj;
				}
				v += adj;
			}
		}
		if (!is_number(v) || v < 1)
		{
			v = 1;
		}
		return v;
	}
	function cf_getItemsAdjust(x, o, a, $t) {
		return cf_getItemAdjustMinMax(cf_getAdjust(x, o, a, $t), o.items.visibleConf);
	}
	function cf_getItemAdjustMinMax(v, i) {
		if (is_number(i.min) && v < i.min)
		{
			v = i.min;
		}
		if (is_number(i.max) && v > i.max)
		{
			v = i.max;
		}
		if (v < 1)
		{
			v = 1;
		}
		return v;
	}
	function cf_getSynchArr(s) {
		if (!is_array(s))
		{
			s = [[s]];
		}
		if (!is_array(s[0]))
		{
			s = [s];
		}
		for (var j = 0, l = s.length; j < l; j++)
		{
			if (is_string(s[j][0]))
			{
				s[j][0] = $(s[j][0]);
			}
			if (!is_boolean(s[j][1]))
			{
				s[j][1] = true;
			}
			if (!is_boolean(s[j][2]))
			{
				s[j][2] = true;
			}
			if (!is_number(s[j][3]))
			{
				s[j][3] = 0;
			}
		}
		return s;
	}
	function cf_getKeyCode(k) {
		if (k == 'right')
		{
			return 39;
		}
		if (k == 'left')
		{
			return 37;
		}
		if (k == 'up')
		{
			return 38;
		}
		if (k == 'down')
		{
			return 40;
		}
		return -1;
	}
	function cf_setCookie(n, $c, c) {
		if (n)
		{
			var v = $c.triggerHandler(cf_e('currentPosition', c));
			$.fn.carouFredSel.cookie.set(n, v);
		}
	}
	function cf_getCookie(n) {
		var c = $.fn.carouFredSel.cookie.get(n);
		return (c == '') ? 0 : c;
	}

	//	init function
	function in_mapCss($elem, props) {
		var css = {};
		for (var p = 0, l = props.length; p < l; p++)
		{
			css[props[p]] = $elem.css(props[p]);
		}
		return css;
	}
	function in_complementItems(obj, opt, itm, sta) {
		if (!is_object(obj.visibleConf))
		{
			obj.visibleConf = {};
		}
		if (!is_object(obj.sizesConf))
		{
			obj.sizesConf = {};
		}

		if (obj.start == 0 && is_number(sta))
		{
			obj.start = sta;
		}

		//	visible items
		if (is_object(obj.visible))
		{
			obj.visibleConf.min = obj.visible.min;
			obj.visibleConf.max = obj.visible.max;
			obj.visible = false;
		}
		else if (is_string(obj.visible))
		{
			//	variable visible items
			if (obj.visible == 'variable')
			{
				obj.visibleConf.variable = true;
			}
			//	adjust string visible items
			else
			{
				obj.visibleConf.adjust = obj.visible;
			}
			obj.visible = false;
		}
		else if (is_function(obj.visible))
		{
			obj.visibleConf.adjust = obj.visible;
			obj.visible = false;
		}

		//	set items filter
		if (!is_string(obj.filter))
		{
			obj.filter = (itm.filter(':hidden').length > 0) ? ':visible' : '*';
		}

		//	primary item-size not set
		if (!obj[opt.d['width']])
		{
			//	responsive carousel -> set to largest
			if (opt.responsive)
			{
				debug(true, 'Set a '+opt.d['width']+' for the items!');
				obj[opt.d['width']] = ms_getTrueLargestSize(itm, opt, 'outerWidth');
			}
			//	 non-responsive -> measure it or set to "variable"
			else
			{
				obj[opt.d['width']] = (ms_hasVariableSizes(itm, opt, 'outerWidth')) 
					? 'variable' 
					: itm[opt.d['outerWidth']](true);
			}
		}

		//	secondary item-size not set -> measure it or set to "variable"
		if (!obj[opt.d['height']])
		{
			obj[opt.d['height']] = (ms_hasVariableSizes(itm, opt, 'outerHeight')) 
				? 'variable' 
				: itm[opt.d['outerHeight']](true);
		}

		obj.sizesConf.width = obj.width;
		obj.sizesConf.height = obj.height;
		return obj;
	}
	function in_complementVisibleItems(opt, avl) {
		//	primary item-size variable -> set visible items variable
		if (opt.items[opt.d['width']] == 'variable')
		{
			opt.items.visibleConf.variable = true;
		}
		if (!opt.items.visibleConf.variable) {
			//	primary size is number -> calculate visible-items
			if (is_number(opt[opt.d['width']]))
			{
				opt.items.visible = Math.floor(opt[opt.d['width']] / opt.items[opt.d['width']]);
			}
			//	measure and calculate primary size and visible-items
			else
			{
				opt.items.visible = Math.floor(avl / opt.items[opt.d['width']]);
				opt[opt.d['width']] = opt.items.visible * opt.items[opt.d['width']];
				if (!opt.items.visibleConf.adjust)
				{
					opt.align = false;
				}
			}
			if (opt.items.visible == 'Infinity' || opt.items.visible < 1)
			{
				debug(true, 'Not a valid number of visible items: Set to "variable".');
				opt.items.visibleConf.variable = true;
			}
		}
		return opt;
	}
	function in_complementPrimarySize(obj, opt, all) {
		//	primary size set to auto -> measure largest item-size and set it
		if (obj == 'auto')
		{
			obj = ms_getTrueLargestSize(all, opt, 'outerWidth');
		}
		return obj;
	}
	function in_complementSecondarySize(obj, opt, all) {
		//	secondary size set to auto -> measure largest item-size and set it
		if (obj == 'auto')
		{
			obj = ms_getTrueLargestSize(all, opt, 'outerHeight');
		}
		//	secondary size not set -> set to secondary item-size
		if (!obj)
		{
			obj = opt.items[opt.d['height']];
		}
		return obj;
	}
	function in_getAlignPadding(o, all) {
		var p = cf_getAlignPadding(gi_getCurrentItems(all, o), o);
		o.padding[o.d[1]] = p[1];
		o.padding[o.d[3]] = p[0];
		return o;
	}
	function in_getResponsiveValues(o, all, avl) {

		var visb = cf_getItemAdjustMinMax(Math.ceil(o[o.d['width']] / o.items[o.d['width']]), o.items.visibleConf);
		if (visb > all.length)
		{
			visb = all.length;
		}

		var newS = Math.floor(o[o.d['width']]/visb);

		o.items.visible = visb;
		o.items[o.d['width']] = newS;
		o[o.d['width']] = visb * newS;
		return o;
	}


	//	buttons functions
	function bt_pauseOnHoverConfig(p) {
		if (is_string(p))
		{
			var i = (p.indexOf('immediate') > -1) ? true : false,
				r = (p.indexOf('resume') 	> -1) ? true : false;
		}
		else
		{
			var i = r = false;
		}
		return [i, r];
	}
	function bt_mousesheelNumber(mw) {
		return (is_number(mw)) ? mw : null
	}

	//	helper functions
	function is_null(a) {
		return (a === null);
	}
	function is_undefined(a) {
		return (is_null(a) || typeof a == 'undefined' || a === '' || a === 'undefined');
	}
	function is_array(a) {
		return (a instanceof Array);
	}
	function is_jquery(a) {
		return (a instanceof jQuery);
	}
	function is_object(a) {
		return ((a instanceof Object || typeof a == 'object') && !is_null(a) && !is_jquery(a) && !is_array(a) && !is_function(a));
	}
	function is_number(a) {
		return ((a instanceof Number || typeof a == 'number') && !isNaN(a));
	}
	function is_string(a) {
		return ((a instanceof String || typeof a == 'string') && !is_undefined(a) && !is_true(a) && !is_false(a));
	}
	function is_function(a) {
		return (a instanceof Function || typeof a == 'function');
	}
	function is_boolean(a) {
		return (a instanceof Boolean || typeof a == 'boolean' || is_true(a) || is_false(a));
	}
	function is_true(a) {
		return (a === true || a === 'true');
	}
	function is_false(a) {
		return (a === false || a === 'false');
	}
	function is_percentage(x) {
		return (is_string(x) && x.slice(-1) == '%');
	}


	function getTime() {
		return new Date().getTime();
	}

	function deprecated( o, n ) {
		debug(true, o+' is DEPRECATED, support for it will be removed. Use '+n+' instead.');
	}
	function debug(d, m) {
		if (!is_undefined(window.console) && !is_undefined(window.console.log))
		{
			if (is_object(d))
			{
				var s = ' ('+d.selector+')';
				d = d.debug;
			}
			else
			{
				var s = '';
			}
			if (!d)
			{
				return false;
			}
	
			if (is_string(m))
			{
				m = 'carouFredSel'+s+': ' + m;
			}
			else
			{
				m = ['carouFredSel'+s+':', m];
			}
			window.console.log(m);
		}
		return false;
	}



	//	EASING FUNCTIONS
	$.extend($.easing, {
		'quadratic': function(t) {
			var t2 = t * t;
			return t * (-t2 * t + 4 * t2 - 6 * t + 4);
		},
		'cubic': function(t) {
			return t * (4 * t * t - 9 * t + 6);
		},
		'elastic': function(t) {
			var t2 = t * t;
			return t * (33 * t2 * t2 - 106 * t2 * t + 126 * t2 - 67 * t + 15);
		}
	});


})(jQuery);;
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */;
/**
 * jQuery Skitter Slideshow
 * @name jquery.skitter.js
 * @description Slideshow
 * @author Thiago Silva Ferreira - http://thiagosf.net
 * @version 4.2.1
 * @date August 04, 2010
 * @update April 25, 2013
 * @copyright (c) 2010 Thiago Silva Ferreira - http://thiagosf.net
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 * @example http://thiagosf.net/projects/jquery/skitter/
 */
;eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(q($){f 2P=0,5G=[];$.2o.3G=q(D){Z c.3H(q(){l($(c).5H(\'5I\')==1W){$(c).5H(\'5I\',2P);5G.5J(2K $3e(c,D,2P));++2P}})};f 5K={1f:1,2L:8d,47:\'\',48:S,49:S,2z:S,N:\'\',k:1w,8e:1w,1m:1w,1s:1w,1N:1w,3f:1w,3g:\'4V\',B:1w,O:1w,1y:1,19:R,2X:R,4a:1w,5L:R,4b:R,3h:R,4c:R,4d:R,2p:R,4e:R,3i:R,3I:R,3J:1w,2q:0.75,2a:1L,2r:2Q,4W:1w,4X:1w,8f:20,4Y:\'r\',3j:R,2M:R,2R:R,4Z:\'4f\',2Y:R,51:\'4f\',1E:R,2s:{},2A:R,3k:R,3l:R,4g:0,2b:0,2Z:S,5M:R,4h:[],5N:1w,5O:1w,3K:S,4i:\'4j\',52:1w,5P:\'<a 1O="#" 1u="2c">8g</a>\'+\'<a 1O="#" 1u="23">8h</a>\'+\'<2S 1u="1B"></2S>\'+\'<1p 1u="4k">\'+\'<1p 1u="1K">\'+\'<a 1O=""><P 1u="1a" /></a>\'+\'<1p 1u="2t"></1p>\'+\'</1p>\'+\'</1p>\'};$.3G=q(3L,D,5Q){c.k=$(3L);c.31=1w;c.g=$.1P({},5K,D||{});c.2P=5Q;c.5R()};f $3e=$.3G;$3e.2o=$3e.53={};$3e.2o.1P=$.1P;$3e.2o.1P({5R:q(){f h=c;l(c.g.4e){f C=$(32).C();f H=$(32).H();c.k.C(C).H(H);c.k.w({\'2B\':\'54\',\'s\':0,\'r\':0,\'z-5S\':5T});c.g.2Z=R;$(\'55\').w({\'8i\':\'8j\'})}c.g.B=3m(c.k.w(\'C\'));c.g.O=3m(c.k.w(\'H\'));l(!c.g.B||!c.g.O){8k.8l(\'8m 5U H 4l 5V 1w! - 8n 8o\');Z R}l(c.g.52){c.k.3n(\'3G-\'+c.g.52)}c.k.1F(c.g.5P);c.g.N=c.5W(c.g.L);l(c.g.1f>=2)c.g.1f=1.3;l(c.g.1f<=0)c.g.1f=1;c.k.j(\'.1B\').1q();c.k.j(\'.2t\').1q();c.k.j(\'.2c\').1q();c.k.j(\'.23\').1q();c.k.j(\'.4k\').C(c.g.B);c.k.j(\'.4k\').H(c.g.O);f 3J=c.g.3J?c.g.3J:c.g.B;c.k.j(\'.2t\').C(3J);f 4m=\' 33\',u=0;c.g.1m=2K 4n();f 56=q(2T,W,24,2z,26){h.g.1m.5J([W,2T,24,2z,26]);l(h.g.4b){f 4o=\'\';l(h.g.B>h.g.O){4o=\'H="1v"\'}13{4o=\'C="1v"\'}h.k.j(\'.1B\').1F(\'<2S 1u="1X\'+4m+\'" 3o="\'+(u-1)+\'" 4p="57\'+u+\'58\'+h.2P+\'">\'+\'<P W="\'+W+\'" \'+4o+\' />\'+\'</2S> \')}13{h.k.j(\'.1B\').1F(\'<2S 1u="1X\'+4m+\'" 3o="\'+(u-1)+\'" 4p="57\'+u+\'58\'+h.2P+\'">\'+u+\'</2S> \')}4m=\'\'};l(c.g.3i){$.8p({4q:\'8q\',5X:c.g.3i,8r:R,8s:\'3i\',8t:q(3i){f 2C=$(\'<2C></2C>\');$(3i).j(\'3G 8u\').3H(q(){++u;f 2T=($(c).j(\'2T\').3p())?$(c).j(\'2T\').3p():\'#\';f W=$(c).j(\'1K\').3p();f 24=$(c).j(\'1K\').U(\'4q\');f 2z=$(c).j(\'2z\').3p();f 26=($(c).j(\'26\').3p())?$(c).j(\'26\').3p():\'4V\';56(2T,W,24,2z,26)})}})}13 l(c.g.8v){}13{c.k.j(\'2C 3q\').3H(q(){++u;f 2T=($(c).j(\'a\').1z)?$(c).j(\'a\').U(\'1O\'):\'#\';f W=$(c).j(\'P\').U(\'W\');f 24=$(c).j(\'P\').U(\'1u\');f 2z=$(c).j(\'.8w\').34();f 26=($(c).j(\'a\').1z&&$(c).j(\'a\').U(\'26\'))?$(c).j(\'a\').U(\'26\'):\'4V\';56(2T,W,24,2z,26)})}l(h.g.4b&&!h.g.4e){h.g.3h={V:0.3};h.g.4c={V:0.5};h.g.4d={V:1};h.k.j(\'.1B\').3n(\'2N\');f 4r=(u+1)*h.k.j(\'.2N .1X\').C();h.k.j(\'.2N\').C(4r);h.k.w({H:h.k.H()+h.k.j(\'.1B\').H()});h.k.1F(\'<1p 1u="5Y"></1p>\');f 5Z=h.k.j(\'.1B\').8x();h.k.j(\'.1B\').28();h.k.j(\'.5Y\').C(h.g.B).1F(5Z);f 59=0,B=c.g.B,O=c.g.O,3M=0,2N=h.k.j(\'.2N\'),5a=0,60=h.k.3r().s;2N.j(\'.1X\').3H(q(){59+=$(c).8y()});2N.C(59+\'11\');3M=2N.C();4s=c.g.B;4s=B-1v;l(4r>h.g.B){h.k.8z(q(e){5a=h.k.3r().r+90;f x=e.8A,y=e.8B,35=0;x=x-5a;y=y-60;61=3M-4s;35=-((61*x)/4s);l(35>0)35=0;l(35<-(3M-B))35=-(3M-B);l(y>O){2N.w({r:35})}})}h.k.j(\'.8C\').w({\'r\':10});l(4r<h.g.B){h.k.j(\'.1B\').C(\'36\');h.k.j(\'.8D\').1q();f 1Q=\'.1B\';2D(h.g.4Y){J\'4f\':f 18=(h.g.B-h.k.j(1Q).C())/2;h.k.j(1Q).w({\'r\':18});K;J\'2d\':h.k.j(1Q).w({\'r\':\'36\',\'2d\':\'-8E\'});K;J\'r\':h.k.j(1Q).w({\'r\':\'8F\'});K}}}13{f 1Q=\'.1B\';l(h.g.3I){h.k.j(\'.1B\').3n(\'5b\').5c(\'1B\');1Q=\'.5b\'}2D(h.g.4Y){J\'4f\':f 18=(h.g.B-h.k.j(1Q).C())/2;h.k.j(1Q).w({\'r\':18});K;J\'2d\':h.k.j(1Q).w({\'r\':\'36\',\'2d\':\'62\'});K;J\'r\':h.k.j(1Q).w({\'r\':\'62\'});K}l(!h.g.3I){l(h.k.j(\'.1B\').H()>20){h.k.j(\'.1B\').1q()}}}c.k.j(\'2C\').1q();l(c.g.5L)c.g.1m.63(q(a,b){Z E.1n()-0.5});c.g.1s=c.g.1m[0][0];c.g.1N=c.g.1m[0][1];c.g.3f=c.g.1m[0][3];c.g.3g=c.g.1m[0][4];l(c.g.1m.1z>1){c.k.j(\'.2c\').2O(q(){l(h.g.19==R){h.g.1y-=2;l(h.g.1y==-2){h.g.1y=h.g.1m.1z-2}13 l(h.g.1y==-1){h.g.1y=h.g.1m.1z-1}h.4t(h.g.1y)}Z R});c.k.j(\'.23\').2O(q(){h.4t(h.g.1y);Z R});h.k.j(\'.23, .2c\').4u(\'5d\',h.g.5N);h.k.j(\'.23, .2c\').4u(\'64\',h.g.5O);c.k.j(\'.1X\').3s(q(){l($(c).U(\'1u\')!=\'1X 33\'){l(h.g.4c){$(c).1R().I(h.g.4c,2Q)}}},q(){l($(c).U(\'1u\')!=\'1X 33\'){l(h.g.3h){$(c).1R().I(h.g.3h,1S)}}});c.k.j(\'.1X\').2O(q(){l($(c).U(\'1u\')!=\'1X 33\'){f 4v=3t($(c).U(\'3o\'));h.4t(4v)}Z R});l(h.g.3h){c.k.j(\'.1X\').w(h.g.3h)}l(h.g.4d){c.k.j(\'.1X:8G(0)\').w(h.g.4d)}l(h.g.3j&&h.g.3I){f 3j=$(\'<1p 1u="4w"><2C></2C></1p>\');1h(f i=0;i<c.g.1m.1z;i++){f 3q=$(\'<3q></3q>\');f P=$(\'<P />\');P.U(\'W\',c.g.1m[i][0]);3q.1F(P);3j.j(\'2C\').1F(3q)}f 65=3t(c.g.1m.1z*1v);3j.j(\'2C\').C(65);$(1Q).1F(3j);h.k.j(1Q).j(\'.1X\').8H(q(){f 66=3m(h.k.j(1Q).3r().r);f 67=3m($(c).3r().r);f 68=(67-66)-43;f 3o=3t($(c).U(\'3o\'));f 8I=h.k.j(\'.8J P\').U(\'W\');f 69=-(3o*1v);h.k.j(\'.4w\').j(\'2C\').I({r:69},{4x:1L,3N:R,L:\'6a\'});h.k.j(\'.4w\').1T(1,1).I({r:68},{4x:1L,3N:R})});h.k.j(1Q).64(q(){$(\'.4w\').I({V:\'1q\'},{4x:1L,3N:R})})}}l(h.g.2M){h.6b()}l(h.g.2Y){h.6c()}l(h.g.1E&&h.g.3K){h.6d()}l(h.g.2p){h.2p()}l(h.g.5M){h.6e()}c.6f()},6f:q(){f h=c;f 2E=$(\'<1p 1u="2E">8K</1p>\');c.k.1F(2E);f t=c.g.1m.1z;f u=0;$.3H(c.g.1m,q(i){f 6g=c;f 2E=$(\'<2S 1u="4y"></2S>\');2E.w({2B:\'54\',s:\'-8L\'});h.k.1F(2E);f P=2K 8M();$(P).8N(q(){++u;l(u==t){h.k.j(\'.2E\').28();h.k.j(\'.4y\').28();h.6h()}}).8O(q(){h.k.j(\'.2E, .4y, .1X, .23, .2c\').28();h.k.34(\'<p 2e="8P:8Q;4z:8R;">8S 2E 6i. 8T 5U 8U 6i 8V 8W 8X.</p>\')}).U(\'W\',6g[0])})},6h:q(){f h=c;f 5e=R;l(c.g.48||c.g.4b)c.k.j(\'.1B\').3O(1S);l(c.g.3I)c.k.j(\'.5b\').3O(1S);l(c.g.2z)c.k.j(\'.2t\').T();l(c.g.49){c.k.j(\'.2c\').3O(1S);c.k.j(\'.23\').3O(1S)}l(h.g.3K){h.3P()}h.6j();h.1Y();h.k.j(\'.1K a P\').U({\'W\':h.g.1s});4A=h.k.j(\'.1K a\');4A=h.4B(4A);4A.j(\'P\').3O(8Y);h.3Q();h.5f();l(h.g.3K){h.6k()}f 5g=q(){l(h.g.2Z){5e=S;h.g.2X=S;h.2F(S);h.5h()}};h.k.5d(5g);h.k.j(\'.23\').5d(5g);l(h.g.1m.1z>1&&!5e){l(h.g.3K){h.31=3R(q(){h.4C()},h.g.2L)}}13{h.k.j(\'.2E, .4y, .1X, .23, .2c\').28()}l($.6l(h.g.4W))h.g.4W(h)},4t:q(4v){l(c.g.19==R){c.g.2b=0;c.k.j(\'.n\').1R();c.2F(S);c.g.1y=E.6m(4v);c.k.j(\'.1K a\').U({\'1O\':c.g.1N});c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.n\').28();c.4C()}},4C:q(){f h=c;3S=[\'6n\',\'6o\',\'6p\',\'6q\',\'6r\',\'6s\',\'6t\',\'6u\',\'6v\',\'6w\',\'6x\',\'6y\',\'6z\',\'6A\',\'6B\',\'6C\',\'6D\',\'6E\',\'6F\',\'6G\',\'6H\',\'6I\',\'6J\',\'6K\',\'6L\',\'6M\',\'6N\',\'6O\',\'6P\',\'6Q\',\'6R\',\'6S\',\'6T\',\'6U\',\'6V\'];l(h.g.1E)h.6W();24=(c.g.47==\'\'&&c.g.1m[c.g.1y][2])?c.g.1m[c.g.1y][2]:(c.g.47==\'\'?\'3a\':c.g.47);l(24==\'8Z\'){l(!c.g.4a){3S.63(q(){Z 0.5-E.1n()});c.g.4a=3S}24=c.g.4a[c.g.1y]}13 l(24==\'1n\'){f 6X=3t(E.1n()*3S.1z);24=3S[6X]}13 l(h.g.4h.1z>0){f 6Y=h.g.4h.1z;l(c.g.3u==1W){c.g.3u=0}24=h.g.4h[c.g.3u];++c.g.3u;l(c.g.3u>=6Y)c.g.3u=0}2D(24){J\'6n\':c.5i();K;J\'6o\':c.5i({1n:S});K;J\'6p\':c.6Z();K;J\'6q\':c.5j();K;J\'6r\':c.5j({1n:S});K;J\'6s\':c.71();K;J\'6t\':c.72();K;J\'6u\':c.73();K;J\'6v\':c.5k();K;J\'6w\':c.5k({1n:S});K;J\'6x\':c.5l();K;J\'6y\':c.74();K;J\'6z\':c.76();K;J\'6A\':c.77();K;J\'6B\':c.78();K;J\'6C\':c.5m({H:S});K;J\'6D\':c.5m({H:R,F:2u,1b:50});K;J\'6E\':c.3T({2v:\'s\'});K;J\'6F\':c.3T({2v:\'3b\'});K;J\'6G\':c.3T({2v:\'2d\',t:5});K;J\'6H\':c.3T({2v:\'r\',t:5});K;J\'6I\':c.79();K;J\'91\':c.7a();K;J\'6J\':c.7b();K;J\'6K\':c.7c();K;J\'6L\':c.7d();K;J\'6M\':c.7e();K;J\'6N\':c.7f();K;J\'6O\':c.7g();K;J\'6P\':c.5n({2v:\'s\'});K;J\'6Q\':c.5n({2v:\'3b\'});K;J\'6R\':c.7h();K;J\'6S\':c.5o();K;J\'6T\':c.5o({L:\'5p\'});K;J\'6U\':c.7i();K;J\'6V\':c.7j();K;3a:c.5l();K}},5i:q(D){f h=c;f D=$.1P({},{1n:R},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=c.g.O+1L;f 1g=c.g.O+1L;f X=0;f 14=0;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X)+(X*5q);f 18=-h.g.B;f 1r=-(A*X);f 1o=-(v*14);f Y=(A*X);f 17=(v*14);f n=c.1x();n.1q();f G=50*(i);l(D.1n){G=40*(14);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A})}13{F=1S;n.w({r:(c.g.B)+(v*i),s:c.g.O+(A*i),C:v,H:A})}c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.T().1b(G).I({s:Y+\'11\',r:17+\'11\'},F,L,Q);l(D.1n){n.j(\'P\').w({r:1o+1v,s:1r+50});n.j(\'P\').1b(G+(F/2)).I({r:1o,s:1r},5T,\'5p\')}13{n.j(\'P\').w({r:1o,s:1r});n.j(\'P\').1b(G+(F/2)).1T(1v,0.5).1T(2Q,1)}X++;l(X==1j){X=0;14++}}},6Z:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=1S/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/15));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1x();n.w({r:c.g.B+1v,s:0,C:v,H:A});n.j(\'P\').w({r:-(v*i)});c.1d(n);f G=80*(i);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.T().1b(G).I({s:Y,r:17},F,L);n.j(\'P\').1q().1b(G+1v).I({V:\'T\'},F+2Q,L,Q)}},5j:q(D){f h=c;f D=$.1P({},{1n:R},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=2Q/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.B/8));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 1G=c.g.B/16;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-1G;f 17=18-1G;f n=c.1U(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.T();f G=50*i;l(D.1n){F=(2u*(h.3V(2)+1))/c.g.1f;Y=1c;17=18;G=E.M(30*h.3V(30))}l(D.1n&&i==(t-1)){F=2u*3;G=30*30}f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\',s:Y+\'11\',r:17+\'11\'},F,L,Q);X++;l(X==1j){X=0;14++}}},71:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=1S/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-50;f 17=18-50;f n=c.1U(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.T();f G=50*i;G=(i==(t-1))?(t*50):G;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\'},F,L,Q);X++;l(X==1j){X=0;14++}}},7a:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'7k\':c.g.N;f F=2Q/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f u=-1;1h(i=0;i<t;i++){l(14%2!=0){l(X==0){u=u+1j+1}u--}13{l(14>0&&X==0){u=u+2}u++}1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-50;f 17=18-50;f n=c.1U(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.T();f G=(50*i);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({C:\'+=2G\',H:\'+=2G\',s:\'-=7l\',r:\'-=7l\',V:\'1q\'},F,L,Q);X++;l(X==1j){X=0;14++}}},72:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'3d\':c.g.N;f F=7m/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/3));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 1G=E.M(c.g.B/6);1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c-1G;f 17=18-1G;f n=c.1U(1i);n.w({r:18,s:1c,C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.T();f G=50*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'1q\',C:\'1q\',H:\'1q\',s:1c+(v*1.5),r:18+(A*1.5)},F,L,Q);X++;l(X==1j){X=0;14++}}},73:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/7));f v=(c.g.B);f A=E.M(c.g.O/t);1h(i=0;i<t;i++){f 17=(i%2==0?\'\':\'\')+v;f Y=(i*A);f n=c.1x();n.w({r:17+\'11\',s:Y+\'11\',C:v,H:A});n.j(\'P\').w({r:0,s:-Y});c.1d(n);f G=90*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'T\',s:Y,r:0},F,L,Q)}},5k:q(D){f h=c;f D=$.1P({},{1n:R},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=2u/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1x();n.w({r:17,s:Y-50,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);l(D.1n){f 1n=c.3V(t);f G=50*1n;G=(i==(t-1))?(50*t):G}13{f G=70*(i);F=F-(i*2)}f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\'},F,L,Q)}},5l:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'7n\':c.g.N;f F=7m/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f Y=0;f 1c=A;f 5r=v*i;f n=c.1x();n.w({r:5r,s:1c,H:A,C:v});n.j(\'P\').w({r:-(5r)});c.1d(n);f 1n=c.3V(t);f G=30*1n;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.T().1b(G).I({s:Y},F,L,Q)}},74:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=7o/c.g.1f;c.1l();f v=c.g.B;f A=c.g.O;f t=2;1h(i=0;i<t;i++){f 1c=0;f 18=0;f n=c.1x();n.w({r:18,s:1c,C:v,H:A});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.I({V:\'T\',r:0,s:0},F,L,Q)}},76:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=1S/c.g.1f;c.1l();f v=c.g.B;f A=c.g.O;f t=4;1h(i=0;i<t;i++){l(i==0){f 1c=\'-2G\';f 18=\'-2G\'}13 l(i==1){f 1c=\'-2G\';f 18=\'2G\'}13 l(i==2){f 1c=\'2G\';f 18=\'-2G\'}13 l(i==3){f 1c=\'2G\';f 18=\'2G\'}f n=c.1x();n.w({r:18,s:1c,C:v,H:A});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.I({V:\'T\',r:0,s:0},F,L,Q)}},77:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=2u/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1x();n.w({r:17,s:Y-c.g.O,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G;l(i<=((t/2)-1)){G=7p-(i*1L)}13 l(i>((t/2)-1)){G=((i-(t/2))*1L)}G=G/2.5;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:Y+\'11\',r:17+\'11\',V:\'T\'},F,L,Q)}},78:q(D){f h=c;f D=$.1P({},{H:R},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=2u/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1x();n.w({r:17,s:Y,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G;l(!D.H){l(i<=((t/2)-1)){G=7p-(i*1L)}13 l(i>((t/2)-1)){G=((i-(t/2))*1L)}f Q=(i==(t-1))?q(){h.1k()}:\'\'}13{l(i<=((t/2)-1)){G=1L+(i*1L)}13 l(i>((t/2)-1)){G=(((t/2)-i)*1L)+(t*1v)}f Q=(i==(t/2))?q(){h.1k()}:\'\'}G=G/2.5;l(!D.H){n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\',C:\'T\'},F,L,Q)}13{F=F+(i*2);f L=\'1M\';n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\',H:\'T\'},F,L,Q)}}},5m:q(D){f h=c;f D=$.1P({},{H:S,F:1S,1b:1v},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=D.F/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/16));f v=E.M(c.g.B/t);f A=c.g.O;1h(i=0;i<t;i++){f 17=(v*(i));f Y=0;f n=c.1x();n.w({r:17,s:Y,C:v,H:A});n.j(\'P\').w({r:-(v*i),s:0});c.1d(n);f G=D.1b*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';l(!D.H){n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\',C:\'T\'},F,L,Q)}13{f L=\'1M\';n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\',H:\'T\'},F,L,Q)}}},3T:q(D){f h=c;f D=$.1P({},{2v:\'s\',4E:\'4F\',t:7},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'4G\':c.g.N;f F=92/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=D.t;1h(i=0;i<t;i++){2D(D.2v){3a:J\'s\':f v=E.M(c.g.B/t);f A=c.g.O;f 1Z=0;f 1C=(v*i);f 3v=-A;f 2U=1C;f 3w=A;f 3x=1C;f 3y=0;f 3z=1C;f 1r=0;f 1o=-1C;K;J\'3b\':f v=E.M(c.g.B/t);f A=c.g.O;f 1Z=0;f 1C=(v*i);f 3v=A;f 2U=1C;f 3w=-A;f 3x=1C;f 3y=0;f 3z=1C;f 1r=0;f 1o=-1C;K;J\'2d\':f v=c.g.B;f A=E.M(c.g.O/t);f 1Z=(A*i);f 1C=0;f 3v=1Z;f 2U=v;f 3w=1Z;f 3x=-2U;f 3y=1Z;f 3z=0;f 1r=-1Z;f 1o=0;K;J\'r\':f v=c.g.B;f A=E.M(c.g.O/t);f 1Z=(A*i);f 1C=0;f 3v=1Z;f 2U=-v;f 3w=1Z;f 3x=-2U;f 3y=1Z;f 3z=0;f 1r=-1Z;f 1o=0;K}2D(D.4E){J\'7q\':3a:f G=(i%2==0)?0:5q;K;J\'1n\':f G=30*(E.1n()*30);K;J\'4F\':f G=i*1v;K}f n=c.1U(1i);n.j(\'P\').w({r:1o,s:1r});n.w({s:1Z,r:1C,C:v,H:A});c.1d(n);n.T();n.1b(G).I({s:3v,r:2U},F,L);f 2f=c.1x();2f.j(\'P\').w({r:1o,s:1r});2f.w({s:3w,r:3x,C:v,H:A});c.1d(2f);2f.T();f Q=(i==(t-1))?q(){h.1k()}:\'\';2f.1b(G).I({s:3y,r:3z},F,L,Q)}},79:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=3U/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.B/8));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 1e=0;f 1g=0;f X=0;f 14=0;f 4H=2K 4n;f 3A=2K 4n;1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));4H[i]=[1c,18];X++;l(X==1j){X=0;14++}}X=0;14=0;1h(i=0;i<t;i++){3A[i]=i};f 3A=h.7r(3A);1h(i=0;i<t;i++){1e=(i%2==0)?1e:-1e;1g=(i%2==0)?1g:-1g;f 1c=1e+(A*X);f 18=(1g+(v*14));f 1r=-(A*X);f 1o=-(v*14);f Y=1c;f 17=18;1c=4H[3A[i]][0];18=4H[3A[i]][1];f n=c.1x();n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);f G=30*(E.1n()*30);l(i==(t-1))G=30*30;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({V:\'T\',s:Y+\'11\',r:17+\'11\'},F,L,Q);X++;l(X==1j){X=0;14++}}},7b:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=1S/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10))*2;f v=E.M(c.g.B/t)*2;f A=(c.g.O)/2;f 14=0;1h(i=0;i<t;i++){4I=(i%2)==0?S:R;f 1H=(v*(14));f 1I=(4I)?-h.g.O:h.g.O;f 2g=(v*(14));f 1G=(4I)?0:(A);f 17=-(v*14);f Y=(4I)?0:-(A);f G=93*14;f n=c.1x();n.w({r:1H,s:1I,C:v,H:A});n.j(\'P\').w({r:17+(v/1.5),s:Y}).1b(G).I({r:17,s:Y},(F*1.9),\'1M\');c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.T().1b(G).I({s:1G,r:2g},F,L,Q);l((i%2)!=0)14++}},7c:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'3c\':c.g.N;f F=3U/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f v=E.M(c.g.B/t);f A=(c.g.O);1h(i=0;i<t;i++){f 1H=(v*(i));f 1I=0;f 2g=(v*(i));f 1G=0;f 17=-(v*(i));f Y=0;f G=1v*i;f n=c.1x();n.w({r:1H,s:1I,C:v,H:A});n.j(\'P\').w({r:17+(v/1.5),s:Y}).1b(G).I({r:17,s:Y},(F*1.1),\'3d\');c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1G,r:2g,V:\'T\'},F,L,Q)}},7d:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=1S/c.g.1f;c.1l();f t=E.M(c.g.B/(c.g.B/10));f 1A=1v;f 1D=E.5s(E.3B((c.g.B),2)+E.3B((c.g.O),2));f 1D=E.M(1D);1h(i=0;i<t;i++){f 1H=(h.g.B/2)-(1A/2);f 1I=(h.g.O/2)-(1A/2);f 2g=1H;f 1G=1I;f n=1w;n=c.4J({1K:h.g.1s,r:1H,s:1I,C:1A,H:1A,2B:{s:-1I,r:-1H}}).3W({\'4K-1D\':1D+\'11\'});1A+=1v;c.1d(n);f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1G,r:2g,V:\'T\'},F,L,Q)}},7e:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'4D\':c.g.N;f F=1S/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=E.M(c.g.B/(c.g.B/10));f 1D=E.5s(E.3B((c.g.B),2)+E.3B((c.g.O),2));f 1D=E.M(1D);f 1A=1D;1h(i=0;i<t;i++){f 1H=(h.g.B/2)-(1A/2);f 1I=(h.g.O/2)-(1A/2);f 2g=1H;f 1G=1I;f n=1w;n=c.4J({1K:1i,r:1H,s:1I,C:1A,H:1A,2B:{s:-1I,r:-1H}}).3W({\'4K-1D\':1D+\'11\'});1A-=1v;c.1d(n);n.T();f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1G,r:2g,V:\'1q\'},F,L,Q)}},7f:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=1S/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=E.M(c.g.B/(c.g.B/10));f 1D=E.5s(E.3B((c.g.B),2)+E.3B((c.g.O),2));f 1D=E.M(1D);f 1A=1D;1h(i=0;i<t;i++){f 1H=(h.g.B/2)-(1A/2);f 1I=(h.g.O/2)-(1A/2);f 2g=1H;f 1G=1I;f n=1w;l($.94.95){n=c.1U(1i);n.w({r:1H,s:1I,C:1A,H:1A}).3W({\'4K-1D\':1D+\'11\'});n.j(\'P\').w({r:-1H,s:-1I})}13{n=c.4J({1K:1i,r:1H,s:1I,C:1A,H:1A,2B:{s:-1I,r:-1H}}).3W({\'4K-1D\':1D+\'11\'})}1A-=1v;c.1d(n);n.T();f G=1v*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';f 7s=(i%2==0)?\'7t\':\'-7t\';n.1b(G).I({s:1G,r:2g,V:\'1q\',2h:7s},F,L,Q)}},7g:q(D){f h=c;c.g.19=S;f L=(c.g.N==\'\')?\'1M\':c.g.N;f F=2u/c.g.1f;c.1l();f 1t=E.M(c.g.B/(c.g.B/8));f 1j=E.M(c.g.O/(c.g.O/4));f t=1t*1j;f v=E.M(c.g.B/1t);f A=E.M(c.g.O/1j);f 96=R;f Y=0;f 17=0;f 3X=0;f 14=0;1h(i=0;i<t;i++){Y=A*3X;17=v*14;f G=30*(i);f n=c.1x();n.w({r:17,s:Y,C:v,H:A}).1q();n.j(\'P\').w({r:-17,s:-Y});c.1d(n);f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({C:\'T\',H:\'T\'},F,L,Q);3X++;l(3X==1j){3X=0;14++}}},5n:q(D){f h=c;f D=$.1P({},{2v:\'s\'},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'3d\':c.g.N;f F=2u/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f t=12;f v=E.M(c.g.B/t);f A=c.g.O;f 1G=(D.2v==\'s\')?-A:A;1h(i=0;i<t;i++){f 1c=0;f 18=(v*i);f 1r=0;f 1o=-(v*i);f n=c.1U(1i);n.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});n.j(\'P\').w({r:1o,s:1r});c.1d(n);n.T();f G=70*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({s:1G},F,L,Q)}},7h:q(D){f h=c;f D=$.1P({},{1n:R},D||{});c.g.19=S;f L=(c.g.N==\'\')?\'5t\':c.g.N;f F=3U/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});f 1t=E.M(c.g.B/(c.g.B/10));f t=1t;f v=E.M(c.g.B/1t);f A=c.g.O;1h(i=0;i<t;i++){f 1c=0;f 18=v*i;f 1r=0;f 1o=-(v*i);f 2g=\'+=\'+v;f n=c.1U(1i);n.w({r:0,s:0,C:v,H:A});n.j(\'P\').w({r:1o,s:1r});f 3Y=c.1U(1i);3Y.w({r:18+\'11\',s:1c+\'11\',C:v,H:A});3Y.34(n);c.1d(3Y);n.T();3Y.T();f G=50*i;f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({r:2g},F,L,Q)}},5o:q(D){f h=c;f D=$.1P({},{2v:\'s\',4E:\'4F\',t:7,L:\'5t\'},D||{});c.g.19=S;f L=(c.g.N==\'\')?D.L:c.g.N;f F=1S/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=D.t;1h(i=0;i<t;i++){f v=E.M(c.g.B/t);f A=c.g.O;f 1Z=0;f 1C=(v*i);f 3v=-A;f 2U=1C+v;f 3w=A;f 3x=1C;f 3y=0;f 3z=1C;f 1r=0;f 1o=-1C;2D(D.4E){J\'7q\':3a:f G=(i%2==0)?0:5q;K;J\'1n\':f G=30*(E.1n()*30);K;J\'4F\':f G=i*1v;K}f n=c.1U(1i);n.j(\'P\').w({r:1o,s:0});n.w({s:0,r:0,C:v,H:A});f 2f=c.1x();2f.j(\'P\').w({r:1o,s:0});2f.w({s:0,r:-v,C:v,H:A});f 3Z=c.1x();3Z.34(\'\').1F(n).1F(2f);3Z.w({s:0,r:1C,C:v,H:A});c.1d(3Z);3Z.T();n.T();2f.T();f Q=(i==(t-1))?q(){h.1k()}:\'\';n.1b(G).I({r:v},F,L);2f.1b(G).I({r:0},F,L,Q)}},7i:q(D){f h=c;f D=$.1P({},{2H:\'3d\',2I:\'1M\'},D||{});c.g.19=S;f 2H=(c.g.N==\'\')?D.2H:c.g.N;f 2I=(c.g.N==\'\')?D.2I:c.g.N;f F=7o/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=2;f v=c.g.B;f A=E.M(c.g.O/t);f 21=c.1U(1i),22=c.1U(1i);21.j(\'P\').w({r:0,s:0});21.w({s:0,r:0,C:v,H:A});22.j(\'P\').w({r:0,s:-A});22.w({s:A,r:0,C:v,H:A});f 2i=c.1x(),2j=c.1x();2i.j(\'P\').w({r:0,s:A});2i.w({s:0,r:0,C:v,H:A});2j.j(\'P\').w({r:0,s:-(A*t)});2j.w({s:A,r:0,C:v,H:A});c.1d(2i);c.1d(2j);c.1d(21);c.1d(22);21.T();22.T();2i.T();2j.T();f Q=q(){h.1k()};21.j(\'P\').I({s:A},F,2H,q(){21.28()});22.j(\'P\').I({s:-(A*t)},F,2H,q(){22.28()});2i.j(\'P\').I({s:0},F,2I);2j.j(\'P\').I({s:-A},F,2I,Q)},7j:q(D){f h=c;f D=$.1P({},{2H:\'4G\',2I:\'4G\'},D||{});c.g.19=S;f 2H=(c.g.N==\'\')?D.2H:c.g.N;f 2I=(c.g.N==\'\')?D.2I:c.g.N;f F=97/c.g.1f;f 1i=c.k.j(\'.1a\').U(\'W\');c.1l();c.1Y();c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1a\').1q();f t=2;f v=c.g.B;f A=E.M(c.g.O/t);f 21=c.1U(1i),22=c.1U(1i);21.j(\'P\').w({r:0,s:0});21.w({s:0,r:0,C:v,H:A});22.j(\'P\').w({r:0,s:-A});22.w({s:A,r:0,C:v,H:A});f 2i=c.1x(),2j=c.1x();2i.j(\'P\').w({r:0,s:0});2i.w({s:0,r:v,C:v,H:A});2j.j(\'P\').w({r:0,s:-A});2j.w({s:A,r:-v,C:v,H:A});c.1d(2i);c.1d(2j);c.1d(21);c.1d(22);21.T();22.T();2i.T();2j.T();f Q=q(){h.1k()};21.I({r:-v},F,2H,q(){21.28()});22.I({r:v},F,2H,q(){22.28()});2i.I({r:0},F,2I);2j.I({r:0},F,2I,Q)},1k:q(D){f h=c;c.k.j(\'.1a\').T();c.5f();c.g.19=R;c.k.j(\'.1a\').U({\'W\':c.g.1s});c.k.j(\'.1K a\').U({\'1O\':c.g.1N});l(!c.g.2X&&!c.g.2A&&!c.g.3k){c.31=3R(q(){h.41()},c.g.2L)}h.3P()},41:q(){c.2F(S);c.k.j(\'.n\').28();l(!c.g.2A&&!c.g.3k)c.4C()},1l:q(){l($.6l(c.g.4X))c.g.4X(c.g.1y,c);c.7u();c.7v();c.7w();c.7x()},7u:q(){f 7y=c.g.1m[c.g.1y][0];f 7z=c.g.1m[c.g.1y][1];f 7A=c.g.1m[c.g.1y][3];f 7B=c.g.1m[c.g.1y][4];c.g.1s=7y;c.g.1N=7z;c.g.3f=7A;c.g.3g=7B},7v:q(){f h=c;c.k.j(\'.33\').5c(\'33\');$(\'#57\'+(c.g.1y+1)+\'58\'+h.2P).3n(\'33\')},7x:q(){c.g.1y++;l(c.g.1y==c.g.1m.1z){c.g.1y=0}},1x:q(){l(c.g.1N!=\'#\'){f 1V=$(\'<a 1O="\'+c.g.1N+\'"><P W="\'+c.g.1s+\'" /></a>\');1V.U({\'26\':c.g.3g})}13{f 1V=$(\'<P W="\'+c.g.1s+\'" />\')}1V=c.4B(1V);f n=$(\'<1p 1u="n"></1p>\');n.1F(1V);Z n},1U:q(1i){l(c.g.1N!=\'#\'){f 1V=$(\'<a 1O="\'+c.g.1N+\'"><P W="\'+1i+\'" /></a>\');1V.U({\'26\':c.g.3g})}13{f 1V=$(\'<P W="\'+1i+\'" />\')}1V=c.4B(1V);f n=$(\'<1p 1u="n"></1p>\');n.1F(1V);Z n},4B:q(1V){l(c.g.4e){1V.j(\'P\').H(c.g.O)}Z 1V},1d:q(n){c.k.j(\'.4k\').1F(n)},5W:q(L){f 7C=[\'4D\',\'1M\',\'3d\',\'99\',\'9a\',\'9b\',\'9c\',\'9d\',\'9e\',\'9f\',\'9g\',\'9h\',\'9i\',\'6a\',\'9j\',\'9k\',\'3c\',\'4G\',\'9l\',\'5t\',\'9m\',\'9n\',\'7n\',\'9o\',\'7k\',\'5p\',\'9p\',\'9q\',\'9r\',\'9s\',];l(4L.9t(L,7C)>0){Z L}13{Z\'\'}},3V:q(i){Z E.6m(E.1n()*i)},3Q:q(){c.k.j(\'.2t\').34(c.g.3f)},5f:q(){f h=c;l(c.g.3f!=1W&&c.g.3f!=\'\'&&h.g.2z){2D(h.g.4i){J\'4j\':3a:h.k.j(\'.2t\').9u(2u);K;J\'r\':J\'2d\':h.k.j(\'.2t\').I({r:0},2u,\'3d\');K;J\'7D\':K}}},7w:q(){f h=c;2D(h.g.4i){J\'4j\':3a:c.k.j(\'.2t\').4j(1L,q(){h.3Q()});K;J\'r\':J\'2d\':f 2w=(h.g.4i==\'r\')?-(h.k.j(\'.2t\').C()):(h.k.j(\'.2t\').C());h.k.j(\'.2t\').I({r:2w},2u,\'3d\',q(){h.3Q()});K;J\'7D\':h.3Q();K}},6k:q(){f h=c;l(h.g.2Z){h.k.3s(q(){l(h.g.2Z)h.g.2X=S;l(!h.g.3l){h.4M()}h.42(\'3s\');h.2F(S)},q(){l(h.g.2Z)h.g.2X=R;l(h.g.2b==0&&!h.g.19&&!h.g.2A){h.3P()}13 l(!h.g.2A){h.44()}h.42(\'7E\');h.2F(S);l(!h.g.19&&h.g.1m.1z>1){h.31=3R(q(){h.41()},h.g.2L-h.g.2b);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1K a\').U({\'1O\':h.g.1N})}})}13{h.k.3s(q(){h.42(\'3s\')},q(){h.42(\'7E\')})}},42:q(4q){f h=c;f 2q=h.g.2q;f 2a=h.g.2a;f 2r=h.g.2r;l(4q==\'3s\'){l(h.g.2p){l(h.g.48){h.k.j(\'.1B\').T().w({V:0}).I({V:2q},2a)}l(h.g.49){h.k.j(\'.2c, .23\').T().w({V:0}).I({V:2q},2a)}l(h.g.2M&&!h.g.2R){h.k.j(\'.29\').1R().T().w({V:0}).I({V:2q},2a)}l(h.g.2Y){h.k.j(\'.2x\').1R().T().w({V:0}).I({V:2q},2a)}}l(h.g.2M&&!h.g.2R&&!h.g.2p){h.k.j(\'.29\').1R().I({V:1},2a)}l(h.g.2Y&&!h.g.2p){h.k.j(\'.2x\').1R().I({V:1},2a)}}13{l(h.g.2p){l(h.g.48){h.k.j(\'.1B\').3N("2k",[]).T().w({V:2q}).I({V:0},2r)}l(h.g.49){h.k.j(\'.2c, .23\').3N("2k",[]).T().w({V:2q}).I({V:0},2r)}l(h.g.2M&&!h.g.2R){h.k.j(\'.29\').1R().w({V:2q}).I({V:0},2r)}l(h.g.2Y){h.k.j(\'.2x\').1R().w({V:2q}).I({V:0},2r)}}l(h.g.2M&&!h.g.2R&&!h.g.2p){h.k.j(\'.29\').1R().I({V:0.3},2r)}l(h.g.2Y&&!h.g.2p){h.k.j(\'.2x\').1R().I({V:0.3},2r)}}},2F:q(9v){f h=c;9w(h.31)},1Y:q(){l(c.g.1N!=\'#\'&&c.g.1N!=\'\'){c.k.j(\'.1K a\').U({\'1O\':c.g.1N,\'26\':c.g.3g})}13{c.k.j(\'.1K a\').9x(\'1O\')}},2p:q(){c.k.j(\'.1B\').1T(0,0);c.k.j(\'.2c\').1T(0,0);c.k.j(\'.23\').1T(0,0);c.k.j(\'.29\').1T(0,0);c.k.j(\'.2x\').1T(0,0)},6b:q(){f h=c;f 29=$(\'<a 1O="#" 1u="29">2M</a>\');h.k.1F(29);f 2w=(h.g.B-29.C())/2;f 3C=0;l(h.g.2Y)2w-=25;l(h.g.51==h.g.4Z)3C=29.C()+5;f 2l={r:2w};2D(h.g.4Z){J\'7F\':2l={r:5+3C,s:30};K;J\'7G\':2l={2d:5+3C,s:30};K;J\'7H\':2l={r:5+3C,3b:5,s:\'36\'};K;J\'7I\':2l={2d:5+3C,3b:5,s:\'36\'};K}29.w(2l).I({V:0.3},h.g.2a);$(5u).9y(q(e){f 7J=(e.3D?e.3D:e.9z);l(7J==27)$(\'#4N\').5v(\'2O\')});f 5w=$(\'.k\').3r().s;f 2w=$(\'.k\').3r().r;h.k.j(\'.29\').2O(q(){l(h.g.2R)Z R;h.g.2R=S;$(c).1R().I({V:0},h.g.2r);f 1p=$(\'<1p 4p="4N"></1p>\').H($(5u).H()).1q().1T(h.g.2a,0.98);f 7K=(($(32).H()-$(\'.k\').H())/2)+$(5u).9A();f 7L=($(32).C()-$(\'.k\').C())/2;h.k.7M(\'<1p 4p="4O"></1p>\');$(\'55\').7N(1p);$(\'55\').7N(h.k);h.k.w({\'s\':5w,\'r\':2w,\'2B\':\'54\',\'z-5S\':9B}).I({\'s\':7K,\'r\':7L},9C,\'3c\');$(\'#4O\').C($(\'.k\').C()).H($(\'.k\').H()).w({\'4z\':\'4P\'}).1T(2Q,0.3);Z R});$(\'#4N\').9D(\'2O\',q(){l($(c).9E(\'7O\'))Z R;h.g.2R=R;$(c).3n(\'7O\');l(!h.g.2p)h.k.j(\'.29\').I({V:0.3},1L);h.k.1R().I({\'s\':5w,\'r\':2w},1L,\'3c\',q(){$(\'#4O\').7M(h.k);$(c).w({\'2B\':\'9F\',\'s\':0,\'r\':0});$(\'#4O\').28()});$(\'#4N\').1T(h.g.2r,0,q(){$(c).28()});Z R})},6c:q(){f h=c;f 2x=$(\'<a 1O="#" 1u="2x">7P</a>\');h.k.1F(2x);f 2w=(h.g.B-2x.C())/2;l(h.g.2M)2w+=25;f 2l={r:2w};2D(h.g.51){J\'7F\':2l={r:5,s:30};K;J\'7G\':2l={2d:5,s:30};K;J\'7H\':2l={r:5,3b:5,s:\'36\'};K;J\'7I\':2l={2d:5,3b:5,s:\'36\'};K}2x.w(2l).I({V:0.3},h.g.2a);2x.2O(q(){l(!h.g.2A){$(c).34(\'9G\');$(c).1T(1v,0.5).1T(1v,1);$(c).3n(\'7Q\');h.4M();h.g.2A=S;h.2F(S)}13{l(!h.g.19&&!h.k.j(\'.1E\').5V(\':9H\')){h.g.2b=0}13{h.44()}l(!h.g.1E)h.44();h.g.2A=R;$(c).34(\'7P\');$(c).1T(1v,0.5).1T(1v,1);$(c).5c(\'7Q\');l(!h.g.2Z){h.2F(S);l(!h.g.19&&h.g.1m.1z>1){h.31=3R(q(){h.41()},h.g.2L-h.g.2b);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1K a\').U({\'1O\':h.g.1N})}}}Z R})},5x:q(3L){f 4l=0,5y;1h(5y 7R 3L){l(3L.9I(5y))4l++}Z 4l},6d:q(){f h=c;f 1E=$(\'<1p 1u="1E"></1p>\');h.k.1F(1E);l(h.5x(h.g.2s)==0){l(3t(1E.w(\'C\'))>0){h.g.2s.C=3t(1E.w(\'C\'))}13{h.g.2s={C:h.g.B,H:5}}}l(h.5x(h.g.2s)>0&&h.g.2s.C==1W){h.g.2s.C=h.g.B}1E.w(h.g.2s).1q()},7S:q(){f h=c;l(h.g.2X||h.g.2A||h.g.3k||!h.g.1E)Z R;h.k.j(\'.1E\').1q().7T().C(h.g.2s.C).I({C:\'T\'},h.g.2L,\'7U\')},5h:q(){f h=c;l(!h.g.19){h.k.j(\'.1E\').1R()}},7V:q(){f h=c;l(h.g.2X||h.g.2A||!h.g.1E)Z R;h.k.j(\'.1E\').7T().I({C:h.g.2s.C},(h.g.2L-h.g.2b),\'7U\')},6W:q(){f h=c;l(!h.g.1E)Z R;h.k.j(\'.1E\').1R().9J(2Q,q(){$(c).C(h.g.2s.C)})},3P:q(){f h=c;h.g.3l=R;f 3E=2K 5z();h.g.2b=0;h.g.4g=3E.5A();h.7S()},4M:q(){f h=c;l(h.g.3l)Z R;h.g.3l=S;f 3E=2K 5z();h.g.2b+=3E.5A()-h.g.4g;h.5h()},44:q(){f h=c;h.g.3l=R;f 3E=2K 5z();h.g.4g=3E.5A();h.7V()},6e:q(){f h=c;$(32).9K(q(e){l(e.3D==39||e.3D==40){h.k.j(\'.23\').5v(\'2O\')}13 l(e.3D==37||e.3D==38){h.k.j(\'.2c\').5v(\'2O\')}})},4J:q(D){f n=$(\'<1p 1u="n"></1p>\');n.w({\'r\':D.r,\'s\':D.s,\'C\':D.C,\'H\':D.H,\'4z-1K\':\'5X(\'+D.1K+\')\',\'4z-2B\':D.2B.r+\'11 \'+D.2B.s+\'11\'});Z n},7r:q(45){f h=c;f 4Q=2K 4n();f 4R;5B(45.1z>0){4R=h.7W(0,45.1z-1);4Q[4Q.1z]=45[4R];45.9L(4R,1)}Z 4Q},7W:q(5C,7X){f 4S;9M 4S=E.1n();5B(4S==1);Z(4S*(7X-5C+1)+5C)|0},6j:q(){f h=c;$(32).4u(\'9N\',q(){h.g.3k=S;h.4M();h.2F(S)});$(32).4u(\'2M\',q(){l(h.g.1m.1z>1){h.g.3k=R;l(h.g.2b==0){h.3P()}13{h.44()}l(h.g.2b<=h.g.2L){h.2F(S);h.31=3R(q(){h.41()},h.g.2L-h.g.2b);h.k.j(\'.1a\').U({\'W\':h.g.1s});h.k.j(\'.1K a\').U({\'1O\':h.g.1N})}}})}});$.2o.3W=q(3F){f w={};f 5D=[\'9O\',\'9P\',\'o\',\'9Q\'];1h(f 2y 7R 3F){1h(f i=0;i<5D.1z;i++)w[\'-\'+5D[i]+\'-\'+2y]=3F[2y];w[2y]=3F[2y]}c.w(w);Z c};f 46=\'9R\';$.2o.2h=q(2V){f 2e=$(c).w(\'1J\')||\'4P\';l(2m 2V==\'1W\'){l(2e){f m=2e.4T(/2h\\(([^)]+)\\)/);l(m&&m[1]){Z m[1]}}Z 0}f m=2V.7Y().4T(/^(-?\\d+(\\.\\d+)?)(.+)?$/);l(m){l(m[3])46=m[3];$(c).w(\'1J\',2e.7Z(/4P|2h\\([^)]*\\)/,\'\')+\'2h(\'+m[1]+46+\')\')}Z c};$.2o.2W=q(2V,4x,D){f 2e=$(c).w(\'1J\');l(2m 2V==\'1W\'){l(2e){f m=2e.4T(/2W\\(([^)]+)\\)/);l(m&&m[1]){Z m[1]}}Z 1}$(c).w(\'1J\',2e.7Z(/4P|2W\\([^)]*\\)/,\'\')+\'2W(\'+2V+\')\');Z c};f 81=$.2k.53.82;$.2k.53.82=q(){l(c.2y==\'2h\'){Z 3m($(c.4U).2h())}13 l(c.2y==\'2W\'){Z 3m($(c.4U).2W())}Z 81.5E(c,5F)};$.2k.83.2h=q(2k){$(2k.4U).2h(2k.84+46)};$.2k.83.2W=q(2k){$(2k.4U).2W(2k.84)};f 85=$.2o.I;$.2o.I=q(2y){l(2m 2y[\'2h\']!=\'1W\'){f m=2y[\'2h\'].7Y().4T(/^(([+-]=)?(-?\\d+(\\.\\d+)?))(.+)?$/);l(m&&m[5]){46=m[5]}2y[\'2h\']=m[1]}Z 85.5E(c,5F)};q 86(87){f 88=[\'1J\',\'9S\',\'9T\',\'9U\',\'9V\'];f p;5B(p=88.9W()){l(2m 87.2e[p]!=\'1W\'){Z p}}Z\'1J\'};f 2J=1w;f 89=$.2o.w;$.2o.w=q(2n,2V){l(2J===1w){l(2m $.8a!=\'1W\'){2J=$.8a}13 l(2m $.3F!=\'1W\'){2J=$.3F}13{2J={}}}l(2m 2J[\'1J\']==\'1W\'&&(2n==\'1J\'||(2m 2n==\'8b\'&&2m 2n[\'1J\']!=\'1W\'))){2J[\'1J\']=86(c.8c(0))}l(2J[\'1J\']!=\'1J\'){l(2n==\'1J\'){2n=2J[\'1J\'];l(2m 2V==\'1W\'&&4L.2e){Z 4L.2e(c.8c(0),2n)}}13 l(2m 2n==\'8b\'&&2m 2n[\'1J\']!=\'1W\'){2n[2J[\'1J\']]=2n[\'1J\'];9X 2n[\'1J\']}}Z 89.5E(c,5F)}})(4L);',62,618,'||||||||||||this|||var|settings|self||find|box_skitter|if||box_clone|||function|left|top|total||width_box|css||||height_box|width_skitter|width|options|Math|time_animate|delay_time|height|animate|case|break|easing|ceil|easing_default|height_skitter|img|callback|false|true|show|attr|opacity|src|col_t|_btop|return||px||else|col|||_bleft|_vleft|is_animating|image_main|delay|_vtop|addBoxClone|init_top|velocity|init_left|for|image_old|division_h|finishAnimation|setActualLevel|images_links|random|_vleft_image|div|hide|_vtop_image|image_atual|division_w|class|100|null|getBoxClone|image_i|length|size_box|info_slide|_ileftc|radius|progressbar|append|_ftop|_ileft|_itop|transform|image|200|easeOutQuad|link_atual|href|extend|class_info|stop|500|fadeTo|getBoxCloneImgOld|img_clone|undefined|image_number|setLinkAtual|_itopc||box_clone1|box_clone2|next_button|animation_type||target||remove|focus_button|interval_in_elements|elapsedTime|prev_button|right|style|box_clone_next|_fleft|rotate|box_clone_next1|box_clone_next2|fx|cssPosition|typeof|arg|fn|hideTools|opacity_elements|interval_out_elements|progressbar_css|label_skitter|400|direction|_left|play_pause_button|prop|label|is_paused|position|ul|switch|loading|clearTimer|100px|easing_old|easing_new|_propsObj|new|interval|focus|info_slide_thumb|click|number_skitter|300|foucs_active|span|link|_fleftc|val|scale|is_hover_box_skitter|controls|stop_over||timer|window|image_number_select|html|new_x|auto||||default|bottom|easeOutExpo|easeInOutQuad|sk|label_atual|target_atual|animateNumberOut|xml|preview|is_blur|is_paused_time|parseFloat|addClass|rel|text|li|offset|hover|parseInt|_i_animation|_ftopc|_itopn|_ileftn|_ftopn|_fleftn|spread|pow|_space|keyCode|date|props|skitter|each|dots|width_label|auto_play|obj|w_info_slide_thumb|queue|fadeIn|startTime|setValueBoxText|setTimeout|animations_functions|animationDirection|700|getRandom|css3|line|box_clone_main|box_clone_container||completeMove|setHideTools||resumeTime|arrayOrigem|rotateUnits|animation|numbers|navigation|random_ia|thumbs|animateNumberOver|animateNumberActive|fullscreen|center|timeStart|with_animations|labelAnimation|slideUp|container_skitter|size|initial_select_class|Array|dimension_thumb|id|type|width_info_slide|width_value|jumpToImage|bind|imageNumber|preview_slide|duration|image_loading|background|img_link|resizeImage|nextImage|easeInQuad|delay_type|sequence|easeInOutExpo|order|mod|getBoxCloneBackground|border|jQuery|pauseTime|overlay_skitter|mark_position|none|arrayDestino|indice|numRandom|match|elem|_self|onLoad|imageSwitched|numbers_align|focus_position||controls_position|theme|prototype|absolute|body|addImageLink|image_n_|_|width_image|x_value|info_slide_dots|removeClass|mouseover|init_pause|showBoxText|mouseOverInit|pauseProgressBar|animationCube|animationCubeStop|animationShowBars|animationTube|animationBlindDimension|animationDirectionBars|animationSwapBars|easeOutBack|150|vleft|sqrt|easeOutCirc|document|trigger|_top|objectSize|key|Date|getTime|while|valorIni|prefixes|apply|arguments|skitters|data|skitter_number|push|defaults|show_randomly|enable_navigation_keys|mouseOverButton|mouseOutButton|structure|number|setup|index|1000|or|is|getEasing|url|container_thumbs|copy_info_slide|y_value|novo_width|15px|sort|mouseleave|width_preview_ul|_left_info|_left_image|_left_preview|_left_ul|easeOutSine|focusSkitter|setControls|addProgressBar|enableNavigationKeys|loadImages|self_il|start|images|windowFocusOut|stopOnMouseOver|isFunction|floor|cube|cubeRandom|block|cubeStop|cubeStopRandom|cubeHide|cubeSize|horizontal|showBars|showBarsRandom|tube|fade|fadeFour|paralell|blind|blindHeight|blindWidth|directionTop|directionBottom|directionRight|directionLeft|cubeSpread|glassCube|glassBlock|circles|circlesInside|circlesRotate|cubeShow|upBars|downBars|hideBars|swapBars|swapBarsBack|swapBlocks|cut|hideProgressBar|random_id|total_with_animations|animationBlock||animationCubeHide|animationCubeSize|animationHorizontal|animationFade||animationFadeFour|animationParalell|animationBlind|animationCubeSpread|animationCubeJelly|animationGlassCube|animationGlassBlock|animationCircles|animationCirclesInside|animationCirclesRotate|animationCubeShow|animationHideBars|animationSwapBlocks|animationCut|easeInBack|20px|600|easeOutElastic|800|1400|zebra|shuffleArray|_rotate|20deg|setImageLink|addClassNumber|hideBoxText|increasingImage|name_image|link_image|label_image|target_link|easing_accepts|fixed|out|leftTop|rightTop|leftBottom|rightBottom|code|_topFinal|_leftFinal|before|prepend|finish_overlay_skitter|pause|play_button|in|startProgressBar|dequeue|linear|resumeProgressBar|randomUnique|valorFim|toString|replace||curProxied|cur|step|now|animateProxied|getTransformProperty|element|properties|proxied|cssProps|object|get|2500|time_interval|max_number_height|prev|next|overflown|hidden|console|warn|Width|Skitter|Slideshow|ajax|GET|async|dataType|success|slide|json|label_text|clone|outerWidth|mousemove|pageX|pageY|scroll_thumbs|box_scroll_thumbs|5px|0px|eq|mouseenter|image_current_preview|preview_slide_current|Loading|9999em|Image|load|error|color|white|black|Error|One|more|were|not|found|1500|randomSmart||cubeJelly|1200|120|browser|mozilla|last|900||easeInCubic|easeOutCubic|easeInOutCubic|easeInQuart|easeOutQuart|easeInOutQuart|easeInQuint|easeOutQuint|easeInOutQuint|easeInSine|easeInOutSine|easeInExpo|easeInCirc|easeInOutCirc|easeInElastic|easeInOutElastic|easeInOutBack|easeInBounce|easeOutBounce|easeInOutBounce|inArray|slideDown|force|clearInterval|removeAttr|keypress|which|scrollTop|9999|2000|live|hasClass|relative|play|visible|hasOwnProperty|fadeOut|keydown|splice|do|blur|moz|ms|webkit|deg|WebkitTransform|msTransform|MozTransform|OTransform|shift|delete'.split('|'),0,{}));;
