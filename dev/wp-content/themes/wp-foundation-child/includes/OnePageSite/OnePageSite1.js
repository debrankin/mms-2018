menus_jQuery(document).ready(function () {
	duration = 1000;
	swing = 'easeInOutQuart';
// Cache selectors
	var lastId, anchors, scrollItems;
	
	// check if anchor target won't change the page
	function targetIsSamePage(target) { 
		return !target || target == "_self";
	}

	// get hash id from an url
	function getHash(url) { 
		if(!url) { 
			return false;
		}

		var indexOfHash = url.indexOf('#');

		if(indexOfHash > -1) { 
			if(indexOfHash == 0) { 
				return url.replace('#', '');
			}

			var hash = url.substring(indexOfHash+1);
			var urlQuery = "";
			if(url.indexOf('?') > -1) { 
				urlQuery = url.substring(indexOf('?'));
			}

			var absLinkRegExp = /(https?|file):\/\//;

			var pageLocation = window.location.pathname;

			var urlLocation = url.replace('#', '').replace(hash, '').replace(urlQuery, '').replace(absLinkRegExp, '');

			if(url.match(absLinkRegExp)) { 
				// if href is absolute, add the host in the page location (without http)
				pageLocation = window.location.host + pageLocation;
			} else { 
				// if not, add the pathname to the url so we can check if we're inside same folder
				urlLocation = pageLocation.substring(0, pageLocation.lastIndexOf("/")) + "/" +  urlLocation;
			}



			if(pageLocation == urlLocation) { 
				return hash;
			}
			
		}

		return false;
	}	

	// click handler for OnePage anchors 
	function linkClick(ev, elem) { 
		try { 
			
			var hash = elem.data('onepage-hash') ? elem.data('onepage-hash') : getHash(elem.attr('href'));
			var section = elem.data('onepage-section') ? elem.data('onepage-section') : false;
			
			if(section) { 
				ev.preventDefault();
				var parent = elem.parent().parent();
				var parentClass = parent.attr("class");
				var menuHeight = 0;
				var isFlexiMenu = parentClass && parentClass.indexOf('FM2_') > -1;
				
				if(isFlexiMenu && parent.parent().hasClass('stick-to-top-menu')) { 
					menuHeight = -parent.parent().outerHeight(true,true);					
					/*if(!parent.parent().hasClass('stick')) {
						menuHeight = 2*menuHeight;
					}*/
					if(!parent.parent().hasClass('stick')) { 
						parent.parent().css('position', 'fixed');
					}
				}


				
				var scrollToValue = section.offset().top + menuHeight;
				if(scrollToValue < 0) { 
					scrollToValue = 0;
				}

				if(!parent.parent().hasClass('stick')) { 
					parent.parent().css('position', '');
				}

				//console.log(section.offset().top + " .. " + scrollToValue + " .. " + menuHeight);
				menus_jQuery('html, body').animate({
					scrollTop: scrollToValue
				},duration ,swing);	
			}

		} catch(e) { 
			alert('error in xtd one page site script ' + e);
		}
	}


	// sort array of HTML elements by their top positioning
	function bubbleSortByTop(arr) { 
	 	var swapped;
	    do {
	        swapped = false;
	        for (var i=0; i < arr.length-1; i++) {
	        	var elem = arr[i];
	        	var elem2 = arr[i+1];
	            if (elem.offset().top > elem2.offset().top) {
	                var temp = arr[i];
	                arr[i] = arr[i+1];
	                arr[i+1] = temp;
	                swapped = true;
	            }
	        }
	    } while (swapped);
	}


	// get the list of OnePage anchors from the page
	function getAnchors() { 
		//anchors = menus_jQuery();
		scrollItems = [];
		anchors = menus_jQuery('a').filter(function() { 
			var elem = menus_jQuery(this);
			var href = elem.attr('href');
			var target = elem.attr('target');

			var hash = getHash(href);
			// check if we should catch the click event
			// and execute scroll animation
			if(hash && targetIsSamePage(target)) { 
				var section = menus_jQuery("#" + hash);
				if(section.length > 0 && section.hasClass('site-section')) { 
					elem.data('onepage-section', section);
					if(elem.parent()[0].tagName == "LI") {
						section.data('onepage-anchor', elem);
					}
					scrollItems.push(section);
					//console.log(scrollItems);
					//anchors.add(elem);
					return true;
				}
			}
			return false;
		})
		.unbind('click.onePage')
		.bind("click.onePage", function(e) {
			linkClick(e, menus_jQuery(this));
			e.stopPropagation();			
		});
		

		anchors.each(function() { 
			if(menus_jQuery(this).parent()[0].tagName == "LI") { 
				var selfAnchor = this;
			
				menus_jQuery(this).unbind('click.onePage');

				menus_jQuery(this).parent().unbind('click.onePage')
				.bind("click.onePage", function(e) {
					linkClick(e, menus_jQuery(selfAnchor));
				});
			}
		});	

		try {
			// array of sections must be sorted for spy scroll to work correctly
			bubbleSortByTop(scrollItems);
		} catch(e) {

		}
	}

	var scrollTimeout;

	/** spy scroll start */
	var is_touch_device = 'ontouchstart' in document.documentElement;
	if(!is_touch_device) { 
		menus_jQuery(window).scroll(function(){
		   clearTimeout(scrollTimeout);
		   scrollTimeout = setTimeout(doneScrolling, 20);
	              
		});
	}



	function doneScrolling() { 

	   // Get container scroll position
	   var windowElem = menus_jQuery(window);
	   var fromTop = windowElem.scrollTop() + 200;
	   
	   // Get id of current scroll item
	   var cur = []; 


	    for(var i=0; i<scrollItems.length; i++) { 
		 	if (scrollItems[i].offset().top < fromTop) {
		 		cur.push(scrollItems[i]);
		 	}
		}

		var lastItem = scrollItems[scrollItems.length - 1];
		// alert((windowElem.scrollTop() + windowElem.height()) + " .. " + menus_jQuery(document).height());
		if((windowElem.scrollTop() + windowElem.height() + 50) >= menus_jQuery(document).height()) { 
			// we've hit rock bottom
			cur.push(lastItem);
	    }
	   // Get the id of the current element
	   cur = cur[cur.length-1];
	  
	   var id = cur && cur.length ? cur[0].id : "";
	   
	   if (lastId !== id) {
	       lastId = id;
	       // Set/remove active class
	       try {
	        anchors.filter('.sel').each(function() {
	        	menus_jQuery(this).parent().andSelf().removeClass('sel');
	        })
	       	cur.data('onepage-anchor').parent().andSelf().addClass('sel');
	       } catch(e) { 
	       	//console.error(e);
	       }
	   }     
	}
	/** spy scroll end */


	/** page resize start */
	// FIXME : CSSMenus2 is regenerating it's list of items on browser resize. 
	// The dom elements shouldn't be regenerated. Check if that is necessary
	var id;
	menus_jQuery(window).bind("resize orientationchange", function() { 
		/*var is_touch_device = 'ontouchstart' in document.documentElement;
		if(is_touch_device) { 
			menus_jQuery(window).unbind('resize orientationchange');
			return;
		}*/
		clearTimeout(id);
		id = setTimeout(doneResizing, 100);
	});


	function doneResizing() {
		// get anchors after page resize
		getAnchors();	
	}
	/** page resize end */

	// timeout a little for flexi menus to finish all its magic
	setTimeout(function() { 
		// get all anchors once the page finished loading
		getAnchors();

		var is_touch_device = 'ontouchstart' in document.documentElement;
		if(!is_touch_device) { 
			// call this at start so we set as selected the item that matches first view
			doneScrolling();
		}
	}, 100);

});