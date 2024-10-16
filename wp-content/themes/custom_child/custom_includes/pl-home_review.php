<?php
function program_homereview() {
    ob_start();
    $page = get_the_ID();
?>
<?php 
	if( have_rows('reviews_product') ){ ?>
<div class="owl-carousel owl-theme testi-slide">
  <?php
		while ( have_rows('reviews_product') ) : the_row();
		$rate = get_sub_field('review_ratings');
		$review_description = get_sub_field('review_description');
		$reviewer_name = get_sub_field('reviewer_name');
	?>
 
  <div class="item">
					<div class="testi-copy">
						 <div class="ratings">
                                <?php 
                                  
                                    if($rate > 0 && $rate < 1.5){
                                ?>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon ">★</span>
                                <span class="star-icon ">★</span>
                                <span class="star-icon ">★</span>
                                <span class="star-icon">★</span>
                                <?php  } elseif($rate > 1.6 && $rate < 2.5){ ?>
                                    <span class="star-icon filled">★</span>
                                    <span class="star-icon filled">★</span>
                                    <span class="star-icon ">★</span>
                                    <span class="star-icon ">★</span>
                                    <span class="star-icon">★</span>
                              <?php  } elseif($rate > 2.6 && $rate < 3.5){ ?>
                                    <span class="star-icon filled">★</span>
                                    <span class="star-icon filled">★</span>
                                    <span class="star-icon filled">★</span>
                                    <span class="star-icon ">★</span>
                                    <span class="star-icon">★</span>
                              <?php  }
                              elseif($rate > 3.6 && $rate < 4.5){ ?>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon">★</span>
                          <?php  } else { ?> 
                            <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                                <span class="star-icon filled">★</span>
                          <?php } ?>
						</div>
<!-- 							<img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt=""> -->
						<?php if($review_description){ ?>
							<p><?php echo $review_description; ?></p>
						<?php } ?>
						<?php if($reviewer_name){ ?>
							<h4 class="texti-heading"><?php echo $reviewer_name; ?></h4>
						<?php } ?>
						</div>
					</div>
					   <?php
                      // $i++;
                      endwhile;
                          
                  ?>
	
</div>
<?php } else{ ?>
<div class="owl-carousel owl-theme testi-slide">
 
 
  <div class="item">
        <div class="row">
		
           <div class="testi-copy">
		   <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
		   <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
		   <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
     
		</div>
	</div>
 
 
		
    <div class="item">
        <div class="row">
		
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
     
		</div>
	</div>
	
	<div class="item">
        <div class="row">
		
           <div class="testi-copy">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
            
           </div>
     
		</div>
	</div>
 
	
	<div class="item">
        <div class="row">
		
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p> “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.”  </p>
              <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
     
		</div>
	</div>
	
	
	<div class="item">
        <div class="row">
		
           <div class="testi-copy">
		   
			 <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
            
           </div>
     
		</div>
	</div>
 
 
	<div class="item">
        <div class="row">
		
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.”  </p>
             <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
     
		</div>
	</div>
	
</div>
<?php } ?>
<?php
	return ob_get_clean();
}
add_shortcode('show_homereview', 'program_homereview');
?>