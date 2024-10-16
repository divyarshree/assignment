<?php
function program_homebanner() {
    ob_start();
    $page = get_the_ID();
?>

<div class="owl-carousel owl-theme home-slide">
	 <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'homebanner', 'paged'=> $paged , 'order' => 'DESC' , 'posts_per_page' => -1 ,  'post_status' => 'publish', 
					 );
        $query = new WP_Query($args); 
    ?>
    
    <?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); 
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	$cta_text = get_field('cta_text');
	$cta_url = get_field('cta_url');
    ?>
    <div class="item">
        <div class="row craft-ban1">
           <div class="col-md-6 hban-col1">
			   <div class="banner-images">
				   <?php if(!empty($featured_img_url)){ ?>
						<img src="<?php echo $featured_img_url; ?>" alt="">
					<?php } ?>
			   </div>
			   <div class="banner-content">
				   
               <h2><b class="ban-text"><?php the_title(); ?></b></h2>
                    <p class="smart-text"><?php the_content(); ?></p>
			   <?php if($cta_text){ ?>
					<a href="<?php echo $cta_url; ?>" class="ban-btn"><?php echo $cta_text; ?></a>
			   <?php } ?>
				    </div>
           </div>
           <div class="col-md-6 ban-slide-one1">
			   <?php if(!empty($featured_img_url)){ ?>
            <img src="<?php echo $featured_img_url; ?>" alt="">
        <?php } ?>
            
           </div>
       </div>
    </div>
	 <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    
</div>

<script>
    jQuery('.home-slide').owlCarousel({
    loop:true,
	autoplay:true,	
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1,
			autoHeight: true,
			autoplay: true
        },
        600:{
            items:1,
			autoHeight: true,
        },
        1000:{
            items:1
        }
    }
})
</script>

<?php
	return ob_get_clean();
}
add_shortcode('show_homebanner', 'program_homebanner');
?>