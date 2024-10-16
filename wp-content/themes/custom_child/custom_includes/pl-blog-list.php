<?php
function program_bloglist() {
    ob_start();
    $page = get_the_ID();
?>
<div class="blogs">
	<div class="eut-container">
		<div class="row align-items-center">
			
		<div class="col-12 col-sm-12 col-md-6 col-lg-6">
			<div class="blog-section" >
				<h2 class="mb-0">
					Blog
				</h2>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4">
			<div class="search">
				 <input name="keywo" id="keywo" class="key mb-0" placeholder="Search"/>
			<i class="fa fa-search"></i>
			</div>
		</div>
		<div class="col-12 col-sm-12 col-md-2 col-lg-2">
			<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filte">
				<?php
					if( $terms = get_terms( array( 'taxonomy' => 'post_tag', 'orderby' => 'name','parent' => 0  ) ) ) : 

						echo '<select name="tagfilte" id="tagfilte" class="fil mb-0"><option value="all">Filter By</option>';
						foreach ( $terms as $term ) :
							echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
						endforeach;
						echo '</select>';
					endif;
				?>

			<!-- 	<button>Apply filter</button> -->
				<input type="hidden" name="action" value="myfilte">
			</form>
		</div>
		</div>
		
	</div>
</div>
<div class="spinner" style="display: none;">
<img data-lazyloaded="1" src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" width="940" height="940" class="img-fluid entered litespeed-loaded" data-src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" alt="loading..." data-ll-status="loaded"><noscript><img width="940" height="940" class="img-fluid" src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" alt="loading..." /></noscript></div>
<div id="blogresponse">
	
	<div class="blogs-se">
		<div class="row align-items-center">
		 <?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array('post_type' => 'post', 'order' => 'DESC' ,  'post_status' => 'publish', 'posts_per_page' => -1,'paged' => $paged,
						  'category_name' => 'blogs');
            $query = new WP_Query($args); 
        ?>
        
        
        <?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); 
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
			$title=get_the_title();
			
        ?>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4 blogss">
		
			<div class="blogimage">
				<?php if(!empty($featured_img_url)){ ?>
				<img src="<?php echo $featured_img_url; ?>" alt="">
				<?php } else { ?>
				<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/placeholder-image.jpg" alt="default" class="img-fluid defaults" />
				<?php } ?>
			</div>

			<div class="blog-sec1">
				<a href="<?php the_permalink(); ?>">
				<h3 class="home-blogt1"><?php the_title(); ?></h3>
				</a>
				<a href="<?php the_permalink(); ?>">
				<div class="bpara">
				<?php $content = get_the_content(); /* or you can use get_the_title() */
					$getlength = strlen($content);
					$thelength = 100;
					echo substr($content, 0, $thelength);
					if ($getlength > $thelength) echo "...";
					?></div>
				</a>
				<div class="kno">
					<a href="<?php the_permalink(); ?>" class="homeblog-btn">KNOW MORE</a>
				</div>
				
			</div>
			</div>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
		<?php wp_reset_postdata(); ?>
			</div>
	</div>
</div>

<script>
jQuery(function($){
	jQuery('#filte').change(function(){
		var filter = jQuery('#filte');
		var spinner = jQuery('.spinner');
		jQuery.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
				spinner.css('display','flex');
			},
			success:function(data){
				console.log(data);
				filter.find('button').text('Apply filter'); // changing the button label back
				spinner.css('display','none');
				jQuery('#blogresponse').html(data); // insert data
				jQuery("#blogresponse").html(data);

			}
		});
		return false;
	});
}); 
	
jQuery('#keywo').keyup(function(){
	var input = jQuery(this).val();
		var spinner = jQuery('.spinner');
		console.log(input);
		if(input != ""){
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { 
				action: 'data_fetchpp', 
				keywo: input
			},
			beforeSend:function(xhr){
				spinner.css('display','flex');
			},
			success: function(data) {
				spinner.css('display','none');
				jQuery('#blogresponse').html( data );
			},
			error: function(data){
				jQuery('#blogresponse').html('No posts found');
			}
		});
		}
		else{
			jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { 
				action: 'data_fetchhpp', 
				keywo: input
			},
			success: function(data) {
				jQuery('#blogresponse').html( data );
			},
			error: function(data){
				jQuery('#blogresponse').html('No products found');
			}
		});
		}

	});
</script>
<?php
	return ob_get_clean();
}
add_shortcode('show_bloglist', 'program_bloglist');
?>