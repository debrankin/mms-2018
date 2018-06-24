<?php
/*
Template Name: Full Width Locator mobile Landing Page
*/
?>

<?php get_header(locatormob); ?>
		
			<div id="content" class="clearfix">
			<!-- <div id="main" class="twelve columns clearfix" role="main"> -->
				<div id="main-custom" class="clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1 style="display:none;"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content">


<div><div class="row container">
<div class="twelve columns">

<div class="intrinsic-container">

<div style="height:420px;">
 <?php
			
			require_once('vlocator/locate.php');
			
			
			function format_postal_code($code) {
				return (strlen($code) == 6) ? substr($code, 0, 3).' '.substr($code,3,3) : $code;
			}
						
			?>
			  <?php  
				
			if (!$zip) {
				?>
			  <div style='padding: 10px 20px 0px 150px; margin: 0 0 10px 0; background-image: url(https://halopets.com/wp-content/uploads/2015/06/storeLocator.jpg); background-repeat: no-repeat; background-size: 100px auto; background-position: left top; height: auto;'><a href="https://www.petsmart.ca/halo" target="_blank"><img src="https://halopets.com/wp-content/uploads/2015/10/petsmart-online.gif" width="200" height="auto" alt="" /></a><a href="https://halopets.com/where-to-buy-canada" target="_parent"></a> <a href="https://halopets.com/shop-online/" target="_parent"><img src="https://halopets.com/wp-content/uploads/2015/10/shoponline-trans.gif" width="180" height="auto" alt="" /></a></div>
			  <!--<div style="background-image:url(/wp-content/uploads/2015/06/us-can-map2.jpg);background-repeat: no-repeat; background-size: auto 100%; background-position: left top;width:100%;height:400px;">	</div>--><?php
			
			}
			
	
					
					if ($zip) { 
					
						$query = new Location_query('retail_list05_greatselection', 'Zip');
						$query->add_fields = array('Name');
						
						
						if ($zip[3] == ' ') $query->postal_code_table = new Postal_code_table('code322_codes_ca','zip','lat','lon','city','province');
						
						$results = locate($query);
						$results2 = locate($query);
						
					}
					
					?>
		      
		  

			  <div class="pageLinks01" >
			    <?php display_page_links_get($query, $results) ?> 
		      </div>
			  <?php  
				
				if ($zip) { 
					
					if ($results->error) { 
		?>			
						<div>Sorry, we found no retailers nearby. Please visit <strong><a href="https://halopets.com/products" target="_blank">Halo&#8217;s Online Store</a></strong> for USA or <a href="http://www.petsmart.ca/halo" target="_blank">PetSmart Online Store</a> for Canada.<br/><br/>
Also, please be sure to use proper formatting.<br/>
<br/>
<ul>
  <li>-In the U.S.; ##### (example: 90210)</li>
  <li>-In Canada; X#X #X# (example: K1A 0B1 </li>
    <p>**Please be sure to include a space between K1A and 0B1) </p>
</ul></div> <?php
						
					} else { 
						
				
					?>

					
<div style="background-color: #fff; padding:10px 0px;">

		
<div>
<div style="width: 96%; height: auto; padding: 2%;"> <div class=""><?php		
						$i = 0;
						$gmap = new GMap();				
						$gmap->show_map_control = true;
						$gmap->show_map_type_control = true;
						
					$gmap->handle_errors = false;
				
								
						foreach ($results->result as $current) {
							?>
							
							
					<div class="locate-row"><?php		$i++;
					
							
							echo '<strong>'.$current->data['Name'].'</strong><br/>';
							 
							echo $current->data['Address1'].'<br/>'; 
							if ($current->data['Address2']) echo $current->data['Address2'].'<br/>'; 
							echo $current->data['City'].', '.$current->data['State'].' '.$current->data['Zip'].'<br/>'; echo $current->data['Phone'].'<br/>';
							echo '<div><span class="vip">'.$current->data['VIP'].'</span></div>';
							if (!is_nan($current->distance)) printf("%d %s", $current->distance, $units); else echo 'Less than 1 mi'; ?></div> <?php 
  							
							$markers[$i] = new GMarker(addslashes($current->data['Address1'].' '.$current->data['City'].', '.$current->data['State'].' '.$current->data['Zip']), addslashes($current->data['Name']), "");
						}  
						
						?></div>
					<?php
						
					} 
				}  
				
				if ($markers) $gmap->showMap($markers);
				
				
				?>
					<div class="pageLinks01" style="clear:both;">
			    <?php display_page_links_get($query, $results) ?>
		      </div>
</div><!-- end zip results listings -->
</div><!-- end zip results listings -->

<div style="clear:both;"></div>
</div><!-- end zip results listings -->
</div>
<!-- start number replacer -->

<!-- end ad widget -->



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