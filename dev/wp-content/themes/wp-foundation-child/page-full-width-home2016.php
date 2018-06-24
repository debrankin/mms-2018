<?php
/*
Template Name: Full Width Page Home 2016
*/
?>

<?php get_header(home); ?>
<div class="clearfix" style="background-image:url(/wp-content/uploads/2016/01/light-grey-text-top.png);background-repeat:repeat-x;height:14px;margin-top:0px;"></div>

<div  style="background-image: url(/wp-content/uploads/2015/02/top-grey-arch.png);background-repeat:no-repeat;background-position:center top;background-size:100% auto;">


<header role="banner" id="top-header">
 </header> <!-- end header -->
 
				<div id="main-custom" class="row container clearfix" role="main">

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
    
			


<?php get_footer(); ?>