<?php
/*
Template Name: Full Width Campaign Landing Page
*/
?>

<?php get_header(FiF); ?>
<div id="top-campaign">
<div id="top-campaign-info"><h3><a href="#">Campaign Landing Pages</a></h3>customize each page<br />
    <img src="/wp-content/uploads/2015/02/fb.svg" width="40" height="40" style="margin-right:10px"/><img src="/wp-content/uploads/2015/02/twitter.svg" width="40" height="40" style="margin-right:10px"/><img src="/wp-content/uploads/2015/02/ingrm.svg" width="40" height="40"/>
</div>
		<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
<div id="banner-campaign-info"><h3><a href="#">Campaign Landing Pages</a></h3>
<p>  customize each page</p>
 
      <img src="/wp-content/uploads/2015/02/fb.svg" width="50" height="50" style="margin-right:10px"/><img src="/wp-content/uploads/2015/02/twitter.svg" width="50" height="50" style="margin-right:10px"/><img src="/wp-content/uploads/2015/02/ingrm.svg" width="50" height="50"/>
</div>
		</header> <!-- end header -->
			</div></div></div><div style="background-image:url(/wp-content/uploads/2015/02/white-top-tornedge.png);background-repeat:repeat-x;background-position:right top;height:12px;></div></div><div style="background-color: #fff; padding: 10px;margin-bottom:-14px;"></div>
		
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


<?php get_footer(campaign); ?>