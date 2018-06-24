<?php
/*
Template Name: Full Width mixnmore
*/
?>

<?php get_header(FiF); ?>
<div id="top-mix">
<div id="top-kiblet-info"><h3><a href="#">A Nutrition Boost in Every Bowl</a></h3>
<ul id="checklist2">
<li>More real meat, NO carbs</li>
<li>More digestible protein, NO "meals"</li>
<li>More freeze-dried nutrients, NO dehydrated</li>
<li>More natural flavor, NO artificial ingredients</li>
</ul>

  
</div>
		<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
<div id="banner-kiblet-info"><h3>A Nutrition Boost in Every Bowl</h3><ul id="checklist">
<li>More real meat, NO carbs</li>
<li>More digestible protein, NO "meals"</li>
<li>More freeze-dried nutrients, NO dehydrated</li>
<li>More natural flavor, NO artificial ingredients</li>
</ul>



 
    <div class="sm-box">
<a href="http://facebook.com/HaloPets" target="_blank"><div class="fb-button"></div></a>
<a href="http://twitter.com/HaloPets" target="_blank"><div class="tw-button"></div></a>
<a href="http://instagram.com/HaloPets" target="_blank"><div class="inst-button"></div></a>
</div>
</div>
		</header> <!-- end header -->
			</div></div></div>
           
		
			<div id="content" class="clearfix">
			<!-- <div id="main" class="twelve columns clearfix" role="main"> -->
				<div id="main-custom" class="clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1 style="display:none;"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content">  </div>  </div>  
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
    
			
    
			</div> <!-- end #content --></div> <div style="clear:both;"></div><!--end swoosh bg  -->
          


<?php get_footer(); ?>