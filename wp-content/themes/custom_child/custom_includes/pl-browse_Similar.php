<?php
function program_similiarbrowse() {
    ob_start();
    $page = get_the_ID();
?>
<?php 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array('post_type' => 'product', 'paged'=> $paged , 'order' => 'DESC' , 'posts_per_page' => -1 ,  'post_status' => 'publish', 'post__not_in' => array(get_the_ID()),
									 );
						$query = new WP_Query($args); 
					?>

					<?php if ( $query->have_posts() ) :
?>
<section class="product-sec7">
	<div class="eut-container">
		<div class="row">
			<h2 class="loved-parents fs36">Browse similar products</h2>
			<div class="col-md-12">
				<div class="owl-carousel owl-theme simil-prod">
					<?php 
					 while ($query->have_posts()) : $query->the_post(); 
						  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
							$product_flavour = get_field('product_flavour');
					?>
					<div class="item">
						<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
							<?php if($product_flavour){ ?>
							<h6>
								<?php echo $product_flavour; ?>
							</h6>
							<?php } ?>
						</a>
						<a href="<?php the_permalink(); ?>">
						 <?php if($featured_img_url){ ?>
							<img src="<?php echo $featured_img_url; ?>" alt="<?php echo get_the_ID(); ?>">
						<?php } else { ?>
							<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/nia.jpg" alt="<?php echo $term_slug->name; ?>" class="img-fluid"/>
						<?php } ?>
						</a>
					</div>
					 <?php endwhile; ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php else : ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php
	return ob_get_clean();
}
add_shortcode('show_similiarbrowse', 'program_similiarbrowse');
?>