<?php
/*
Template Name: Full Width Mothers Day Landing Page
*/
?>

<?php get_header(insidehalo); ?>




<div id="top-insidehalo">
<div id="top-aboutus-info"><h3><a href="#">#HaloFeeditForward</a></h3>When you share a photo of your pet with #HaloFeedItForward, we’ll donate a meal of Halo to a shelter pet on your behalf. So join the movement. Help us nourish healthier, happier shelter pets—and give them their very best chance at a forever home.
<br />
   <div class="sm-box">
<a href="http://facebook.com/HaloPets" target="_blank"><div class="fb-button"></div></a>
<a href="http://twitter.com/HaloPets" target="_blank"><div class="tw-button"></div></a>
<a href="http://instagram.com/HaloPets" target="_blank"><div class="inst-button"></div></a>
</div>
</div>
		<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
<div id="banner-aboutus-info">
  <h1>Mother's Day Contest</h1>
  
	<h2>Share a WHOLE lot of love this Mother's Day! Enter to win a year's supply of Halo pet food, PLUS a 5,000-bowl donation to a shelter of your choice courtesy of Freekibble.com and GreaterGood.org. It's just another way to help #HaloFeeditFoward. See below for entry details.</h2>

<div class="sm-box">
<a href="http://facebook.com/HaloPets" target="_blank"><div class="fb-button"></div></a>
<a href="http://twitter.com/HaloPets" target="_blank"><div class="tw-button"></div></a>
<a href="http://instagram.com/HaloPets" target="_blank"><div class="inst-button"></div></a>
</div>
</div>
		</header> <!-- end header -->

			</div></div></div>

<div style="background-image:url(/wp-content/uploads/2015/02/footer-bg.png);background-repeat:repeat-x;background-position:right top;height:12px;"></div>
		
			<div id="content" class="clearfix">
			<!-- <div id="main" class="twelve columns clearfix" role="main"> -->
				<div id="main-custom" class="clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1 style="display:none;"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
			
</div> <!-- end #main -->
    
			
    
			</div> <!-- end #content --><div class="clearfix"></div>


<?php get_footer(); ?>