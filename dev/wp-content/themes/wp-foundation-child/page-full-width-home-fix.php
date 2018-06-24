<?php
/*
Template Name: Full Width Page Home FIX
*/
?>

<?php get_header(home); ?><div class="top-purple-torn"></div>
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
    
			
    
			</div> <!-- end #content --><div class="clearfix"></div>
</div> <!--end swoosh bg  -->
<div class="home-foundation-image clearfix"><div class="bottom-purple-torn"></div><div class="home-foundation-text" style="padding:40px;"><?php if(function_exists('ditty_news_ticker')){ditty_news_ticker(5106);} ?></div></div></div>

<div class="home-foundation-image-mobile clearfix"><div class="bottom-purple-torn"></div></div><div class="home-foundation-text-mobile"><h3>Improving the well-being of pets and the people who love them.</h3><p>Discover how the Halo Pet Foundation helps pets and their families live longer, happier, healthier lives together.</p><div class="orange-rt-arrow-link"><h6>READ MORE</h6></div></div>


<?php get_footer(); ?>