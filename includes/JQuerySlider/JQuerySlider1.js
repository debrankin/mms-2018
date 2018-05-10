var JQuerySlider1_json = 
	{
          "align": "left",
          "auto": true,
          "hideOnMouseOut": true,
          "vertical": false,
          "ease": "easeOut",
          "continuous": true,
          "loop": true,
          "sliderEffect": "fade",
          "speed": "1000",
          "fadeDuration": "1000",
          "pause": "3000",
          "stopAtInteraction": true,
          "resumeDuration": "3000",
          "innernavbaritem.spacing": "10px",
          "innernumbers.spacing": "0px",
          "innerbutton.back.opacity": 1,
          "innerbutton.back.hideOnMouseOut": true,
          "innerbutton.back.mouseOutEffect": "slideFromLeft",
          "innerbutton.back.mouseOutEffectDuration": "300",
          "innerbutton.back.mouseOutEffectEasing": "linear",
          "innerbutton.back.halign": "left",
          "innerbutton.back.valign": "middle",
          "innerbutton.back.left": "0px",
          "innerbutton.back.top": "100px",
          "innerbutton.next.opacity": 1,
          "innerbutton.next.hideOnMouseOut": true,
          "innerbutton.next.mouseOutEffect": "slideFromRight",
          "innerbutton.next.mouseOutEffectDuration": "300",
          "innerbutton.next.mouseOutEffectEasing": "linear",
          "innerbutton.next.halign": "right",
          "innerbutton.next.valign": "middle",
          "innerbutton.next.left": "0px",
          "innerbutton.next.top": "100px",
          "innerplaypause.opacity": 1,
          "innerplaypause.hideOnMouseOut": false,
          "innerplaypause.mouseOutEffect": "fadeIn",
          "innerplaypause.mouseOutEffectDuration": "1000",
          "innerplaypause.mouseOutEffectEasing": "linear",
          "innerplaypause.halign": "right",
          "innerplaypause.valign": "top",
          "innerplaypause.left": "15px",
          "innerplaypause.top": "5px",
          "innernavbar.hideOnMouseOut": false,
          "innernavbar.mouseOutEffect": "slideFromBottom",
          "innernavbar.mouseOutEffectDuration": "500",
          "innernavbar.mouseOutEffectEasing": "linear",
          "innernavbar.halign": "left",
          "innernavbar.valign": "bottom",
          "innernavbar.left": "0px",
          "innernavbar.top": "0px",
          "innernavbaritem.orientation": "horizontal",
          "innerbullets.valign": "bottom",
          "innerbullets.halign": "right",
          "innerbullets.left": "0px",
          "innerbullets.hideOnMouseOut": false,
          "innerbullets.mouseOutEffect": "fadeIn",
          "innerbullets.mouseOutEffectEasing": "linear",
          "innerbullets.mouseOutEffectDuration": "1000",
          "innerbulletsitem.orientation": "horizontal",
          "innernumbers.valign": "bottom",
          "innernumbers.halign": "right",
          "innernumbers.left": "0px",
          "innernumbers.hideOnMouseOut": false,
          "innernumbers.mouseOutEffect": "fadeIn",
          "innernumbers.mouseOutEffectEasing": "linear",
          "innernumbers.mouseOutEffectDuration": "1000",
          "innernumbersitem.orientation": "horizontal",
          "content_paragraph.opacity": "1",
          "content_subheader.opacity": "1",
          "content_header.opacity": "1",
          "innernavbar.scrollerType": "noScroll",
          "backgroundType": "predefined",
          "innernavbaritem.active.backgroundType": "",
          "innerbutton.hover.backgroundType": "normal",
          "innerslider.top": "2px",
          "innerbulletsitem.spacing": "0px",
          "innerbutton.next.backgroundType": "normal",
          "innerplaypause.pause.hover.backgroundType": "normal",
          "innerslider.left": "2px",
          "innerplaypause.play.backgroundType": "normal",
          "innerbutton.back.backgroundType": "normal",
          "innerbulletsitem.active.backgroundType": "normal",
          "innernumbersitem.spacing": "0px",
          "innernavbaritem.hover.backgroundType": "",
          "innerbullets.top": "30px",
          "innerplaypause.play.hover.backgroundType": "normal",
          "height": "-2px",
          "width": "-6px",
          "gifPath": "includes/JQuerySlider/x.gif",
          "innerplaypause.pause.backgroundType": "normal",
          "innernumbers.top": "0px"
};
	
var JQuerySlider1_slider = null;	

xtd_jQuery(document).ready(function(){
	var $ = xtd_jQuery;
	var jQuery = xtd_jQuery;
	
	$("#JQuerySlider1Container").hide();
	
	// fix bug on webkit//
	if (jQuery.browser.webkit && document.readyState != "complete") {
		setTimeout( createJQuerySlider, 100 );
	} else {
		createJQuerySlider()
	}
		
	function createJQuerySlider() {

		if (document.readyState && document.readyState != "complete") {
			setTimeout( createJQuerySlider, 100 );
			return;
		}

		//show element first as height/width of auto elements is 0 if container is hidden//
		$("#JQuerySlider1Container").show();
		
		// create the slider
		JQuerySlider1_slider = $("#JQuerySlider1").jQuerySlider();
	}
});