<?php
/*
Template Name: Full Width Page Home
*/
?>

<?php get_header(home); ?>
<div id="top-hero">
<div id="top-home-info"><h3>You and your pets. Changing lives.</h3><p>Every time you feed your pet Halo, those same ingredients help to nourish healthier, more adoptable shelter pets. Join the movement. <a href="inside-halo-pets/key-programs/halofeeditforward/">#HaloFeedItForward</a></p></div>
		<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
<div id="banner-home-info"><h1>You and your pets. Changing lives.</h1><p>Every time you feed your pet Halo, those same ingredients help to nourish healthier, more adoptable shelter pets. Join the movement. <a href="inside-halo-pets/key-programs/halofeeditforward/">#HaloFeedItForward</a></p></div>
		
</header> <!-- end header -->
			</div></div></div><div class="top-purple-torn"></div>
		<div class="home-middle-banner">
			<div id="content" class="clearfix">
			
				<div id="main-custom" class="twelve columns clearfix" role="main">

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
    
			
    
			</div> <!-- end #content -->
</div> <div style="clear:both;"></div><!--end swoosh bg  --></div>
<div class="home-foundation-image clearfix"><div class="bottom-purple-torn"></div><div class="home-foundation-text"><h3>"Meals"-Free<br> Goodness in Every Bowl</h3><p>We believe in treating pets like you’d treat yourself, with whole proteins like chicken, salmon, lamb and venison – NEVER any chicken meal, by-product meal or other rendered animal parts.
</p><a href="https://halopets.com/products/"><div class="white-rt-arrow-link"><h6 style="color:#ffffff;">SEE OUR PRODUCTS</h6></div></a><br><div style="width:35%;"><image src="/wp-content/uploads/2015/04/chickenmealbusrt.png"/></div></div></div>

<div class="home-foundation-image-mobile clearfix"><div class="bottom-purple-torn"></div></div><div class="home-foundation-text-mobile"><br><div style="width:35%;float:right;"><image src="/wp-content/uploads/2015/04/chickenmealbusrt.png" style=""/></div><h3>"Meals"-Free<br> Goodness in Every Bowl</h3><p>We believe in treating pets like you’d treat yourself, with whole proteins like chicken, salmon, lamb and venison – NEVER any chicken meal, by-product meal or other rendered animal parts.
</p><a href="https://halopets.com/products/"><div class="purple-rt-arrow-link"><h6 style="color:#f78e1e;">SEE OUR PRODUCTS</h6></div></a>

<?php get_footer(); ?>