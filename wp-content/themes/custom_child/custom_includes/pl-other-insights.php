<?php
function program_similiarinsights() {
    ob_start();
    $page = get_the_ID();
?>
<?php 
// $tags = get_tags(array(
//   'hide_empty' => false
// ));
// echo '<ul>';
// foreach ($tags as $tag) {
//   echo '<li>' . $tag->name . '</li>';
// }
// echo '</ul>';
?>
<div class="owl-carousel owl-theme bls-insights">
    <?php 
        $tags = get_tags(array(
		  'hide_empty' => false
		));
	
    ?>
    
    <?php 
	$term = get_queried_object();
	foreach ($tags as $tag) {
		$tag_image = get_field('tag_image',  $tag->taxonomy.'_'.$tag->term_id);
		    $tag_link = get_tag_link( $tag->term_id );
    ?>
 <div class="item bls-blog1 insights-b">
  <div class="row">
	  <div class="blogimage insightimage">
	   <?php if(!empty($tag_image)){ ?>
            <img src="<?php echo $tag_image; ?>" alt="<?php echo $tag->name ?>" class="img-fluid" >
        <?php } else { ?>
            <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/placeholder-image.jpg" alt="default" class="img-fluid" />
        <?php } ?>
	  </div>
	  
	   <div class="insights-sec">
	      <h3 class="home-blogt1"><?php echo $tag->name ?></h3>
            <a href="<?php echo $tag_link; ?>" class=""><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/08/arrow-10.png" alt="arrow" class="img-fluid" width="45px" height="45px"/></a>
	 </div>
   </div>
   
 </div>
	<?php } ?>

 
</div>
<script>
jQuery('.bls-insights').owlCarousel({
    loop:false,
    margin:10,
	
  autoplay:false,
	navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    nav:true,
	 stagePadding: 200,
    responsive:{
        0:{
            items:1,
			dots: true,
			arrows: false,
			stagePadding: 0
        },
		768:{
            items:2,
			dots: false,
			arrows: false,
			stagePadding: 0
        },
		 991:{
            items:2,
			dots: false,
			arrows: false,
			stagePadding: 0
        },
        
        1000:{
            items:2,
			dots: false
        },
		 1300:{
            items:3,
			dots: false
        }
    }
});



</script>
<?php
	return ob_get_clean();
}
add_shortcode('show_similiarinsights', 'program_similiarinsights');
?>