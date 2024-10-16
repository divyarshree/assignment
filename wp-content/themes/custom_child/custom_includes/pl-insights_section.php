<?php
function program_insightsection() {
    ob_start();
    $page = get_the_ID();
?>


<div class="owl-carousel owl-theme insights-pro">
	  <?php 
        $tags = get_tags(array(
		  'hide_empty' => false,
		'orderby'   => 'date',
        'order' => 'DESC',
		));
	
    ?>
    
    <?php 
	$term = get_queried_object();
	foreach ($tags as $tag) {
		$tag_image = get_field('tag_image',  $tag->taxonomy.'_'.$tag->term_id);
		    $tag_link = get_tag_link( $tag->term_id );
    ?>
	<div class="item">
		  <?php if(!empty($tag_image)){ ?>
            <img src="<?php echo $tag_image; ?>" alt="<?php echo $tag->name ?>" class="img-fluid" >
        <?php } else { ?>
            <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/placeholder-image.jpg" alt="default" class="img-fluid" />
        <?php } ?>
		<a href="<?php echo $tag_link; ?>">
			<div class="insig-desc">
				<h4><?php echo $tag->name ?></h4>
				<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/08/arrow-10.png" alt="arrow" class="img-fluid">
			</div>
		</a>
	</div>
	<?php } ?>
</div>

<?php
	return ob_get_clean();
}
add_shortcode('show_insightsection', 'program_insightsection');
?>