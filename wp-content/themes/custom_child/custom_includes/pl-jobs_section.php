<?php
function program_jobs_section() {
    ob_start();
    $page = get_the_ID();
?>
<div class="container">
  <div class="accordion" id="accordionExample">
	   <?php 
        
        $args = array('post_type' => 'jobs', 'order' => 'DESC' , 'posts_per_page' => -1 ,  'post_status' => 'publish'
					 );
        $query = new WP_Query($args); 
    ?>
    
    <?php 
	$j = 0;
	if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); 
          $location = get_field('location');
			$postid = get_the_ID();
			$title=get_the_title();

			$str1 = str_replace('.', '', $title);
			$str = str_replace(' ', '', $str1);
			$postid = get_the_ID();
    ?>
  <div class="card box-pro">
    <div class="card-head" id="heading<?php echo $postid; ?>">
      <h2 class="mb-0" data-toggle="collapse" data-target="#collapse<?php echo $postid; ?>">
          <div class="row accord-title1">  
			  <div class="col-12 col-sm-12 col-md-3 col-lg-3 accordhead1"> 
				  <div class="desgn-text1"><?php the_title(); ?></div>
				  <?php if($location){ ?>
				  <div class="desgn-place1"><?php echo $location; ?></div> 
				  <?php } ?>
			  </div>   
			  <div class="col-12 col-sm-12 col-md-9 col-lg-9 accordtext2">
				  <div>
					<?php the_content(); ?>
				  </div>
			  </div>
		  </div>
      </h2>
    </div>

    <div id="collapse<?php echo $postid; ?>" class="collapse" aria-labelledby="heading<?php echo $postid; ?>" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row accord-content1">
		 <div class="col-12 col-sm-12 col-md-3 col-lg-3 accord-cont-text1">
		</div>
		  <div class="col-12 col-sm-12 col-md-9 col-lg-9 accord-cont-text2">
			   <?php 
// 				 $i = 0; 
				  if( have_rows('more_details') ):
					while ( have_rows('more_details') ) : the_row();
					  $title = get_sub_field('title');
					  $content = get_sub_field('content');
					 
				?>
			  <?php if($title){ ?>
			  	<h6><?php echo $title; ?></h6>
			  <?php } ?>
			  <?php if($content){ ?>
			  	<div>
					<?php echo $content; ?>
			  </div>
			  <?php } ?>
			<?php
				// $i++;
				endwhile;
				else :
				endif;
						  ?>
			  <a href="#" data-toggle="modal" data-target="#careermodal<?php echo $postid; ?>">Apply Now</a>
		  </div>
		</div>
      </div>
    </div>
  </div>
   <?php $j++; endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>
	<div class="ucta load">
		 <a href="#" id="loadMore" class="jobroles-btn">VIEW MORE JOB ROLES</a> 
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.2.0/readmore.min.js"></script>
<script>
// 	jQuery(document).ready(function() {
	
// 	jQuery('.accordion .card h2 .row .accordtext2 p').readmore({
// 		speed: 300,
// 		collapsedHeight: 10,
// 		moreLink: '<a href="#">Read more &gt;</a>',
// 		lessLink: '<a href="#">Read less</a>',
// 		heightMargin: 16
// 	});
	
// });
jQuery('p:empty').not('[role="status"]').remove();
jQuery(document).ready(function(){
  jQuery(".box-pro").slice(0, 3).show();
  jQuery("#loadMore").on("click", function(e){
    e.preventDefault();
    jQuery(".box-pro:hidden").slice(0, 9).slideDown();
    if(jQuery(".box-pro:hidden").length == 0) {
      jQuery("#loadMore").css('display','none');
    }
  });

});
</script>
<?php
	return ob_get_clean();
}
add_shortcode('show_jobs_section', 'program_jobs_section');
?>