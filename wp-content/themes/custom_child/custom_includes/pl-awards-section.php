<?php
function program_awardsection() {
    ob_start();
    $page = get_the_ID();
?>

<div class="owl-carousel owl-theme aboutbbl-awards">
   <?php 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array('post_type' => 'awards', 'paged'=> $paged , 'order' => 'DESC' , 'posts_per_page' => -1 ,  'post_status' => 'publish' );
	$query = new WP_Query($args); 
	$i = "1";
	?>

	<?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post();   

	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 

	?>
	 <div class="item aboutbbl-awards1">
		  <div class="row">
			  <?php if($featured_img_url){ ?>
			   <img src="<?php echo $featured_img_url; ?>" class="img-fluid" alt="<?php the_title(); ?>" style="width:80%">
			  <?php } ?>
		</div>
	 </div>
       
	<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>

<?php
	return ob_get_clean();
}
add_shortcode('show_awardsection', 'program_awardsection');
?>