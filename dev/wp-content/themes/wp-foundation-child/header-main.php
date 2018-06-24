<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]--><head>
    <meta name="sitelock-site-verification" content="1819" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title('', true, 'right'); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
		<!-- For Nokia -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
		<!-- For everything else -->
		<!--<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">-->
<link rel="shortcut icon" href="https://www.halopets.com/favicon.ico?v=2" />
				
		<link rel="stylesheet" href="https://use.typekit.net/xvo8zss.css">
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

	

		
		<!-- bring in theme options styles -->
		<?php 
		$heading_typography = of_get_option('heading_typography');
		if ($heading_typography) {
			$theme_options_styles = '
			h1, h2, h3, h4, h5, h6{ 
				font-family: ' . $heading_typography['face'] . '; 
				font-weight: ' . $heading_typography['style'] . '; 
				color: ' . $heading_typography['color'] . '; 
			}';
		}
		
		$main_body_typography = of_get_option('main_body_typography');
		if ($main_body_typography) {
			$theme_options_styles .= '
			body{ 
				font-family: ' . $main_body_typography['face'] . '; 
				font-weight: ' . $main_body_typography['style'] . '; 
				color: ' . $main_body_typography['color'] . '; 
			}';
		}
		
		$link_color = of_get_option('link_color');
		if ($link_color) {
			$theme_options_styles .= '
			a{ 
				color: ' . $link_color . '; 
			}';
		}
		
		$link_hover_color = of_get_option('link_hover_color');
		if ($link_hover_color) {
			$theme_options_styles .= '
			a:hover{ 
				color: ' . $link_hover_color . '; 
			}';
		}
		
		$link_active_color = of_get_option('link_active_color');
		if ($link_active_color) {
			$theme_options_styles .= '
			a:active{ 
				color: ' . $link_active_color . '; 
			}';
		}
		
		$topbar_bg_color = of_get_option('top_nav_bg_color');
		if ($topbar_bg_color) {
			$theme_options_styles .= '
			.top-nav { 
				background-color: '. $topbar_bg_color . ';
			}';
		}
		
		$topbar_link_color = of_get_option('top_nav_link_color');
		if ($topbar_link_color) {
			$theme_options_styles .= '
			.top-nav > li > a { 
				color: '. $topbar_link_color . ' !important;
			}';
		}
		
		$topbar_link_hover_color = of_get_option('top_nav_link_hover_color');
		if ($topbar_link_hover_color) {
			$theme_options_styles .= '
			.top-nav > li > a:hover { 
				color: '. $topbar_link_hover_color . ' !important;
			}';
		}
		
		$suppress_comments_message = of_get_option('suppress_comments_message');
		if ($suppress_comments_message){
			$theme_options_styles .= '
			#main article {
				border-bottom: none;
			}';
		}
						
		if($theme_options_styles){
			echo '<style>' 
			. $theme_options_styles . '
			</style>';
		}
		
		?>
    	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <link rel="stylesheet" type="text/css" href="/MyFontsWebfontsKit/MyFontsWebfontsKit.css">
        <link href="includes/OnePageSite/OnePageSite2.css" rel="stylesheet" type="text/css">
        <link href="violator.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" async></script>    
        
    
	
<!-- jQuery library  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" async></script>-->
<!-- jQuery library -->
<script type="text/javascript" async>
jQuery( document ).ready(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#backtotop').fadeIn();	
		} else {
			$('#backtotop').fadeOut();
		}
	});
 
	$('#backtotop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});

$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>
	

	
<body <?php body_class(); ?> >    
       

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" async></script>
<!-- jQuery library -->
<!-- jQuery library -->
<script type="text/javascript" async>
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#backtotop').fadeIn();	
		} else {
			$('#backtotop').fadeOut();
		}
	});
 
	$('#backtotop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});

$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>
</head>
	
	<body <?php body_class(); ?>>

<div style="width:100%;height:auto;">
    <div id="OnePageMenu2_container" class="FM2_OnePageMenu2_container">
    <ul id="OnePageMenu2" class="FM2_OnePageMenu2">
      <!-- version=2.0.217;name=OnePageMenu2;baseskin=skin06;colorscheme=dark_blue;type=horizontal; --><li style="padding-top:3px;padding-right:40px;padding-left:8%;border-right:none;"><img src="http://blog.halopets.com/wp-content/uploads/2018/05/word-logo.png" width="140" height="auto" alt=""/></li>
      
    </ul><div class="header-tag">Improving the wellbeing of pets and the people who love them</div>
   
	</div> <div class="m-poopsie-violator block" id="block-poopsieviolator">
  
    
        <a href="https://halopets.com/halo-feed-it-forward"><div class="poopsie-img halo-donates"><img src="http://blog.halopets.com/wp-content/uploads/2018/05/donate.png" width="auto" height="auto"></div><div class="halo-donates-text top"><div><span class="single">Halo</span> Donates a Bowl to Animals in Need</div><div class="hide-desktop">For Every Purchase You Make</div></div><div class="halo-donates-text bottom">For Every Purchase You Make</div></a>
    </div>  

<a href="http://blog.halopets.com"><img src="http://blog.halopets.com/wp-content/uploads/2018/05/header.png" width="auto" height="auto" alt=""/>
</a></div>
<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
					
					<div class="site info navinfo">
						<h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
						<h4 class="subhead"><?php echo get_bloginfo ( 'description' ); ?></h4>
					</div>
 
			

				</header> <!-- end header -->
			</div>