<?php
function program_videosection() {
    ob_start();
    $page = get_the_ID();
?>

<?php // Get total number of posts in post-type-name
	$count_posts = wp_count_posts('product');
	$total_posts = $count_posts->publish;
// 	echo $total_posts . ' custom posts. ';
?>
<div class="eut-container">
<div class="testimo row ">

	<div class="col-12 col-sm-12 col-md-5 col-lg-7 testi feature-blog-head">
		<h6 class="txt-blue">
			<span id="tcount"><?php echo $total_posts; ?></span> Products Available
		</h6>
	</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3">
			<div class="psearch">
                <input name="search_by_equipment_num" id="search_by_equipment_num" placeholder="Search"/>
			<i class="fa fa-search"></i>
<!-- 				<input type="text" name="keyword" id="keyword"> -->

			</div>
		</div>
	<div class="col-12 col-sm-12 col-md-3 col-lg-2 testimon">
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( array( 'taxonomy' => 'pcategories', 'orderby' => 'name','parent' => 0  ) ) ) : 
	
			echo '<select name="categoryfilter" id="categoryfilter"><option class="fil-opt" value="all">Filter By</option>';
			foreach ( $terms as $term ) :
				echo '<option class="fil-opt" value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	
<!-- 	<button>Apply filter</button> -->
	<input type="hidden" name="action" value="myfilter">
</form>
	</div>
</div>
</div>
<div class="spinner" style="display: none;">
<img data-lazyloaded="1" src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" width="940" height="940" class="img-fluid entered litespeed-loaded" data-src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" alt="loading..." data-ll-status="loaded"><noscript><img width="940" height="940" class="img-fluid" src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/loading-png-gif-2.gif" alt="loading..." /></noscript></div>
<div id="response">
			<div class="row vtesti-mrow">
				 
		 <?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array('post_type' => 'product', 'order' => 'DESC' ,  'post_status' => 'publish', 'posts_per_page' => 8,'paged' => $paged );
            $query = new WP_Query($args); 
        ?>
        
        
        <?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); 
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
			$title=get_the_title();
		$product_flavour = get_field('product_flavour');
			
        ?>
		<div class="col-12 col-sm-12 col-md-4 col-lg-3 prodcut-block">
				<div class="pr-im-block" style="display: block;">
				
					<?php if($featured_img_url){ ?>
				  <a class="prde-imgblock" href="<?php the_permalink(); ?>">
				  <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>" class="img-fluid">
				  </a>
					<?php } else{ ?>

					  <a class="prde-imgblock" href="<?php the_permalink(); ?>">
				  <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/nia.jpg" alt="<?php the_title(); ?>" class="img-fluid">
				  </a>
					<?php } ?>
				  </div>
					<span class="category bjb">
						<?php 
						$categories = get_the_terms( get_the_ID(), 'pcategories' );
//echo "<pre>"; print_r($categories); echo "</pre>";
	foreach ( $categories as $key => $category ) {
    if( $category->parent == 0 ){
        echo $category->name;
    }
}
						?>
				 
				 </span>
					<h6>
						<?php the_title(); ?>
					</h6>
			<?php if($product_flavour){ ?>
			<h5>
				<?php echo $product_flavour; ?>
			</h5>
				<?php } ?>
					
				   <a class="now-mor" href="<?php the_permalink(); ?>">KNOW MORE</a>
				</div> 
     <?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
		<?php wp_reset_postdata(); ?>		
	
</div>
	<div class="pagination">
     <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $query->max_num_pages,
          'prev_text' => '<i class="fa fa-chevron-left"></i>',
          'next_text' => '<i class="fa fa-chevron-right"></i>'
     ) );
?>			
	
			
	</div>
	


<script>
// jQuery(function($){
// 	jQuery('#filter').change(function(){
// 		var filter = jQuery('#filter');
// 		var spinner = jQuery('.spinner');
// 		jQuery.ajax({
// 			url:filter.attr('action'),
// 			data:filter.serialize(), // form data
// 			type:filter.attr('method'), // POST
			
// 			beforeSend:function(xhr){
// // 				filter.find('button').text('Processing...'); // changing the button label
// // 				spinner.css('display','flex');
// 			},
// 			success:function(data){
// // 				filter.find('button').text('Apply filter'); // changing the button label back
// // 				spinner.css('display','none');
// // 				 printresult(data);
// 				jQuery('#response').html(data[0].html);
// 				jQuery('#tcount').text(data[0].count);
// 				console.log(data);

// 			}
// 		});
// 		return false;
// 	});
	
// }); 

	jQuery(function($){
	jQuery('#filter').change(function(){
		var filter = jQuery('#filter');
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
				filter.find('button').text('Apply filter'); // changing the button label back
				spinner.css('display','none');
// 				 printresult(data);
				jQuery('#response').html(data[0].html);
				jQuery('#tcount').text(data[0].count);
				console.log(data);

			}
		});
		return false;
	});
	
	
}); 

	
// 	function printresult(data)
// {
//     alert(data['ValueA']);   
//     alert(data['ValueB']);
// }
</script>
<script>
jQuery(document).on('click','.page-numbers', function(e){
  e.preventDefault();
	if(jQuery(this).hasClass('next')){
	   var page = jQuery('.page-numbers.current').html();
		var filter=jQuery('#categoryfilter').val();
					  jQuery.ajax({
						url:'<?php echo site_url() ?>/wp-admin/admin-ajax.php',
						data:{page:parseInt(page),filter:filter,'action':'testimonial_load_next'}, // form data
						type:'POST',
						success:function(data){
							//console.log(data);
							jQuery("#response").html(data);
// 							jQuery('.page-numbers:first-child').css('border-top-left-radius','50%');
// 							jQuery('.page-numbers:first-child').css('border-bottom-left-radius','50%');
// 							jQuery('.page-numbers:last-child').css('border-top-right-radius','50%');
// 							jQuery('.page-numbers:last-child').css('border-bottom-right-radius','50%');
						}
			});
	   }
	else if(jQuery(this).hasClass('prev')){
			var page = jQuery('.current').html();
			var filter=jQuery('#categoryfilter').val();
					  jQuery.ajax({
						url:'<?php echo site_url() ?>/wp-admin/admin-ajax.php',
						data:{page:parseInt(page),filter:filter,'action':'testimonial_load_prev'}, // form data
						type:'POST',
						success:function(data){
							//console.log(data);
							jQuery("#response").html(data);
// 							jQuery('.page-numbers:first-child').css('border-top-left-radius','50%');
// 							jQuery('.page-numbers:first-child').css('border-bottom-left-radius','50%');
// 							jQuery('.page-numbers:last-child').css('border-top-right-radius','50%');
// 							jQuery('.page-numbers:last-child').css('border-bottom-right-radius','50%');
						}
			});
			}
	else{
		var page = jQuery(this).text();
		var filter=jQuery('#categoryfilter').val();
					  jQuery.ajax({
						url:'<?php echo site_url() ?>/wp-admin/admin-ajax.php',
						data:{page:parseInt(page),filter:filter,'action':'testimonial_load_more'}, // form data
						type:'POST',
						success:function(data){
							//console.log(data);
							jQuery("#response").html(data);

						}
			});
	}
  
   
  });
	
	
	jQuery('#search_by_equipment_num').keyup(function(){
	var input = jQuery(this).val();
		var spinner = jQuery('.spinner');
		console.log(input);
		if(input != ""){
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { 
				action: 'data_fetch', 
				keyword: input
			},
			beforeSend:function(xhr){
				spinner.css('display','flex');
			},
			success: function(data) {
				spinner.css('display','none');
				jQuery('#response').html( data[0].html );
				jQuery('#tcount').text(data[0].count);
			},
			error: function(data){
				jQuery('#response').html('No products found');
			}
		});
		}
		else{
			jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { 
				action: 'data_fetchh', 
				keyword: input
			},
			success: function(data) {
				jQuery('#response').html( data[0].html );
				jQuery('#tcount').text(data[0].count);
			},
			error: function(data){
				jQuery('#response').html('No products found');
			}
		});
		}

	});
	
</script>


<script> 
	

</script>
<?php
	return ob_get_clean();
}
add_shortcode('show_videosection', 'program_videosection');
?>