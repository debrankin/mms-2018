<?php
/*
Template Name: Full Width AboutUs Landing Page
*/
?>

<?php get_header(aboutus); ?>




<div id="top-aboutus">
<div id="top-aboutus-info"><h3><a href="#">#HaloFeeditForward</a></h3>For over 30 years, Halo, Purely for Pets® has created holistic pet products of uncompromising quality. Halo, America’s Best Loved Holistic Brand, believes nutrition is the single most important factor in the quality of a pet’s life.
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
<div id="banner-aboutus-info"><h3><a href="#">About HALO, Purely for Pets®</a></h3>
For over 30 years, Halo, Purely for Pets® has created holistic pet products of uncompromising quality. Halo, America’s Best Loved Holistic Brand, believes nutrition is the single most important factor in the quality of a pet’s life.
     <div class="sm-box">
<a href="http://facebook.com/HaloPets" target="_blank"><div class="fb-button"></div></a>
<a href="http://twitter.com/HaloPets" target="_blank"><div class="tw-button"></div></a>
<a href="http://instagram.com/HaloPets" target="_blank"><div class="inst-button"></div></a>
</div>
</div>
		</header> <!-- end header -->

			</div></div></div><div style="background-image:url(/wp-content/uploads/2015/02/white-top-tornedge.png);background-repeat:repeat-x;background-position:right top;height:12px;></div></div><div style="background-color: #fff; padding: 10px;margin-bottom:-14px;"></div>
		
			<div id="content" >
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