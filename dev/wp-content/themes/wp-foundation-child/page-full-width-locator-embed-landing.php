<?php
/*
Template Name: Full Width Locator embed Landing Page
*/
?>

<?php get_header(locatorembed); ?>
		
			<div id="content" class="clearfix">
			<!-- <div id="main" class="twelve columns clearfix" role="main"> -->
				<div id="main-custom" class="clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1 style="display:none;"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content"><div style="background-image:url(/wp-content/uploads/2015/06/us-can-transp.jpg); background-size:100% auto;">
 <?php
			
			require_once('vlocator/locate.php');
			require_once('gmap/gmap.php'); 
			
			function format_postal_code($code) {
				return (strlen($code) == 6) ? substr($code, 0, 3).' '.substr($code,3,3) : $code;
			}
						
			?>
			  <?php  
				
			if (!$zip) {
				?>
			
				<div style='padding: 0 0 20px 0; margin: 0 0 20px 0; border-bottom: 1px solid #dddddd;'><img src="/wp-content/uploads/2015/06/can-flag.jpg" width="67" height="41" alt=""/> <img src="/wp-content/uploads/2015/06/amer-flag.jpg" width="67" height="41" alt=""/>
				  <p>Please call the store before you go to make sure they have the Halo products you want in stock!</p>
  NOTE: WE CAN PUT ANY SORT OF CONTENT HERE BEFORE ZIP CODE IS ENTERED. THIS WILL VANISH ONCE AN ACTIVE SEARCH HAS BEEN INITIATED</div><?php
			
			}
			
	
					
					if ($zip) { 
					
						$query = new Location_query('retail_list05', 'Zip');
						$query->add_fields = array('Name');
						
						
						if ($zip[3] == ' ') $query->postal_code_table = new Postal_code_table('code322_codes_ca','zip','lat','lon','city','province');
						
						$results = locate($query);
						$results2 = locate($query);
						
					}
					
					?>
		      
		  

			  <div class="pageLinks01">
			    <?php display_page_links_get($query, $results) ?>
		      </div>
			  <?php  
				
				if ($zip) { 
					
					if ($results->error) { 
		?>			
						<div style="font-size: 1.1em;">Sorry, we found no retailers nearby. Please visit <strong><a href="http://www.halopets.com/natural-pet-products.html">Halo&#8217;s Online Store</a></strong>.<br/>
<br/>
Also, please be sure to use proper formatting.<br/>
<br/>
<ul>-In the U.S.; ##### (example: 90210)<br/>
<br/>
-In Canada; X#X #X# (example: K1A 0B1 <br />
**Please be sure to include a space between K1A and 0B1)</ul></div> <?php
						
					} else { 
				
					?>
<div class="call"></div> 
					
<div style="background-color: #fff; padding:10px 0px;" class="locator-container">

		<div class="sl-results-map">
		  <div style="width: 97%; height: 400px; padding-top: 5px; padding-right: 5px; padding-left: 5px; padding-bottom: 5px; background-color: #efefef; display: block;"><div id="gmap" style="width:100%;height:400px;"></div></div></div>
<div class="sl-results-li">
<div style="width: 96%; height: auto; padding: 2%;"> <div class="locator_results"> <?php		
						$i = 0;
						$gmap = new GMap();				
						$gmap->show_map_control = true;
						$gmap->show_map_type_control = true;
						
					$gmap->handle_errors = false;
								
						foreach ($results->result as $current) {
							?>
							<div class="locator_result">
							
					<div class="store-listing"><?php		$i++;
							echo '<span class="vip">'.$current->data['VIP'].'</span><br/>';
							echo '<strong>'.$current->data['Name'].'</strong><br/>';
							echo $current->data['Phone'].'<br/>'; 
							echo $current->data['Address1'].'<br/>'; 
							if ($current->data['Address2']) echo $current->data['Address2'].'<br/>'; 
							echo $current->data['City'].', '.$current->data['State'].' '.$current->data['Zip'].'<br/>'; 
							if (!is_nan($current->distance)) printf("%d %s", $current->distance, $units); else echo 'Less than 1 mi'; ?></div></div> <?php 
  							
							$markers[$i] = new GMarker(addslashes($current->data['Address1'].' '.$current->data['City'].', '.$current->data['State'].' '.$current->data['Zip']), addslashes($current->data['Name']), "");
						}  
						
						?></div><br clear="all" />	
					<?php
						
					} 
				}  
				
				if ($markers) $gmap->showMap($markers);
				
				
				?>
					<div class="pageLinks01">
			    <?php display_page_links_get($query, $results) ?>
		      </div>
</div>
</div>

<div style="clear:both;"></div></div>
</div>
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
    
			
    
			</div> <!-- end #content --></div><!--end content bg color--><div class="clearfix"></div>


<?php get_footer(); ?>