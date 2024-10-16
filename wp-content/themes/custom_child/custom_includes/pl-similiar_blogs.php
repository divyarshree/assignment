<?php
function program_similiarblogs() {
    ob_start();
    $page = get_the_ID();
?>

<div class="owl-carousel owl-theme bls-blog">
    <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'post', 'paged'=> $paged , 'order' => 'DESC' , 'posts_per_page' => -1 ,  'post_status' => 'publish', 'post__not_in' => array(get_the_ID()),'category_name' => 'blogs'
					 );
        $query = new WP_Query($args); 
    ?>
    
    <?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); 
          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    ?>
 <div class="item bls-blog1">
  <div class="row">
	  <div class="blogimage">
	   <?php if(!empty($featured_img_url)){ ?>
            <img src="<?php echo $featured_img_url; ?>" alt="">
        <?php } else { ?>
          			<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/placeholder-image.jpg" alt="default" class="img-fluid defaults" />
        <?php } ?>
	  </div>
	  
	   <div class="blog-sec1">
	      <h3 class="home-blogt1"><?php the_title(); ?></h3>
            	<div class="bpara"><?php $content = get_the_content(); /* or you can use get_the_title() */
						$getlength = strlen($content);
						$thelength = 100;
						echo substr($content, 0, $thelength);
						if ($getlength > $thelength) echo "...";
						?></div>
			<a href="<?php the_permalink(); ?>" class="homeblog-btn">KNOW MORE</a>
	 </div>
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
add_shortcode('show_similiarblogs', 'program_similiarblogs');
?>