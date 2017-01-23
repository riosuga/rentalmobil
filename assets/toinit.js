// JavaScript Document

		var observe;
		if (window.attachEvent) {
		    observe = function (element, event, handler) {
		        element.attachEvent('on'+event, handler);
		    };
		}
		else {
		    observe = function (element, event, handler) {
        		element.addEventListener(event, handler, false);
		    };
		}
		function init () {
		    var text = document.getElementById('texta');
		    function resize () {
		        text.style.height = 'auto';
		        text.style.height = text.scrollHeight+'px';
		    }
		    function delayedResize () {
		        window.setTimeout(resize, 0);
		    }
			
		    text.focus();
		    text.select();
		    resize();
		}
		function inita () {
		    var text = document.getElementById('textb');
		    function resize () {
		        text.style.height = 'auto';
		        text.style.height = text.scrollHeight+'px';
		    }
		    function delayedResize () {
		        window.setTimeout(resize, 0);
		    }
			
		    text.focus();
		    text.select();
		    resize();
		}
		function initb () {
		    var text = document.getElementById('textc');
		    function resize () {
		        text.style.height = 'auto';
		        text.style.height = text.scrollHeight+'px';
		    }
		    function delayedResize () {
		        window.setTimeout(resize, 0);
		    }
			
		    text.focus();
		    text.select();
		    resize();
		}