jQuery(document).ready(function() {
	// Centering the main navigation. Not done in css due to IE7 problems 
	theNavWidth = (990 - jQuery('#nav .nav').width() ) / 2 ;
	jQuery('#nav .nav').css('marginLeft', theNavWidth); 
	
	
	// Adding the jQuery Cycle for featured posts
	
	// First Removing the Widgettitle or it will cycle through it as well . Also we're not supporting the category listing since they are out of scope for the slider
	jQuery('#ch-featured-holder .widgettitle').remove();
	jQuery('#ch-featured-holder .widget-wrap > ul').remove();
	
	// Second we add the next and previous buttons
	jQuery('#ch-featured-holder .featuredpost').append('<a href="#" id="ch-prev"><img src="' + childtheme_url + '/images/prev.png" alt="Previous" border="0" /></a><a href="#" id="ch-next"><img src="' + childtheme_url + '/images/next.png" alt="Next" border="0" /></a>');
	// Finally we initiate the slider
	jQuery('#ch-featured-holder .featuredpost .widget-wrap')
	.cycle({ 
		fx:     'fade', 
		speed:  'slow', 
		timeout: 0, 
		next:   '#ch-next', 
		prev:   '#ch-prev'
	});
	// Position the Next and Previous buttons to the middle
	sliderButtonMargin = -jQuery('#ch-featured-holder .featuredpost .widget-wrap').height() +	10;
	jQuery('#ch-next').css('marginTop', sliderButtonMargin);
	jQuery('#ch-prev').css('marginTop', sliderButtonMargin);
	
	//Remove the title atribute for the menu. It just get's in the way.
	jQuery("li.cat-item a").each(function(){
		jQuery(this).removeAttr('title');
	})                

	jQuery("li.page_item a").each(function(){
		jQuery(this).removeAttr('title');
	})
	
	
});