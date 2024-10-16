<?php 

get_header(); 
$categories = get_the_category();
?>

<!--<section class="bread-crum">
	<div class="eut-container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<p class="breadcurm-txt"><span  class="pg_orlink"><a href="<?php echo get_site_url(); ?>/products/">All Products </a>>
					<?php
					$terms = get_the_terms( $post->ID , 'pcategories' );
					foreach ( $terms as $term ) { 
					if( $term->parent == 0 ){
					?>
					<a href="<?php echo get_site_url(); ?>/product-category/"><?php echo $term->name; ?></a>
					<?php } else{ ?>
					<a href="<?php echo get_term_link($term->slug,'pcategories'); ?>"><?php echo $term->name; ?></a>
					<?php } ?>
					<?php
					
						echo ' > ';
					}
					?>
					   </span><span class="pg_prlink"><?php the_title(); ?></span></p>
			</div>
			
		</div>
	</div>
</section>-->

<section class="product-sec1">
<div class="eut-container">
	<div class="row">
<!-- 	swipe slider	 -->
		<div class="col-md-6">
			<div class="swiper-container-wrapper">
  <!-- Slider main container -->
  
  <!-- Slider thumbnail container -->
  <div class="swiper-container gallery-thumbs">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
		<?php //   $i= 0;
					if( have_rows('image_gallery') ){ ?>
		<?php 
				
						while ( have_rows('image_gallery') ) : the_row();
						$images = get_sub_field('images');
						
						?>
      <div class="swiper-slide">
		<img src="<?php echo $images; ?>" alt="<?php echo $images; ?>" class="img-fluid">
		</div>
      
		<?php
		// $i++;
		endwhile;

		?>
		<?php }
		else { ?>
		<div class="swiper-slide">
		<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/nia.jpg" alt="<?php echo $images; ?>" class="img-fluid">
		</div>
		<?php
			 }
					
		?>
    </div>
  </div>
	
<div class="swiper-container gallery-top">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
		<?php //   $i= 0;
					if( have_rows('image_gallery') ){ ?>
		<?php 
				
						while ( have_rows('image_gallery') ) : the_row();
						$images = get_sub_field('images');
						
						?>
      <div class="swiper-slide">
		<img src="<?php echo $images; ?>" alt="<?php echo $images; ?>" class="img-fluid">
		</div>
      
		<?php
		// $i++;
		endwhile;

		?>
		<?php }
		else {
		?>
		<div class="swiper-slide">
		<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/09/nia.jpg" alt="<?php echo $images; ?>" class="img-fluid">
		</div>
		
		<?php
		}
					
		?>
<!--       <div class="swiper-slide">

		  <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/09/AARIN-pro1.png" alt="">
      </div>
      <div class="swiper-slide">
        <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/09/AARIN-pro1.png" alt="">
      </div>
      <div class="swiper-slide">
      <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/09/AARIN-pro1.png" alt="">
      </div> -->
      
    </div>
    <!-- Add Arrows -->
<!--     <div class="swiper-button-next"></div> -->
<!--     <div class="swiper-button-prev"></div> -->
  </div>				
				
</div>
		</div>
<!-- 	end swipe slider	 -->
		<div class="col-md-6 pro-details">
			<p class="pro-cat"><?php
					$terms = get_the_terms( $post->ID , 'pcategories' );
					foreach ( $terms as $term ) {
					echo $term->name;
						echo '&nbsp &nbsp';
					}
					?></p>
			<h1 class="pro-head fs38"><?php the_title(); ?></h1>
			<p class="pro-code"><?php $sku = get_field('sku'); if($sku){ ?>SKU: <?php echo $sku; ?> <?php } ?></p>
			<p class="pro-descrip"><?php the_content(); ?></p>
			
			  <?php 
            //   $i= 0;
                if( have_rows('flavours_list') ):
                   
                    ?>
			<p class="pro-stag">Choose your  flavour</p>
			
			<div class="prostage-list pro-temp-btn">
				<?php 
				 while ( have_rows('flavours_list') ) : the_row();
                    $flavour_name = get_sub_field('flavour_name');
				?>
				<a href="#"><?php echo $flavour_name; ?></a>
			<?php
			// $i++;
			endwhile;
				?>
			</div>
			<?php
			else :
			endif;
			?>
			<?php $button_text = get_field('button_text'); 
			$button_url = get_field('button_url');
			if($button_url){
			?>
			<div class="buy-amazon">
				<a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
			</div>
			<?php } ?>
			
		</div><!-- 	product des	 -->
		
	</div>
</div>
</section>


<?php //   $i= 0;
					if( have_rows('benefits_section_content') ): ?>
<section class="product-sec2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
			<?php $benefits_section_title = get_field('benefits_section_title'); 
				if($benefits_section_title){ ?>
				<h3 class="prostag-benef fs38"><?php echo $benefits_section_title; ?></h3>
				<?php } ?>
			</div>
			<div class="col-md-9">
				<div id="arr-pr-ces" class="owl-carousel owl-theme aarin-stag">
					  <?php 
				
						while ( have_rows('benefits_section_content') ) : the_row();
						$content_title = get_sub_field('content_title');
						$content_details = get_sub_field('content_details');
					$content_subtitle = get_sub_field('content_subtitle');
						?>
					<div class="item">
						<p class="stg-num"><?php echo $content_title; ?></p>
						<?php if($content_subtitle){ ?>
						<h5 class="prostg-head"><?php echo $content_subtitle; ?></h5>
						<?php } ?>
						<p class="prostg-subtxt"><?php echo $content_details; ?></p>
					</div>
					<?php
                    // $i++;
                    endwhile;
                       
                ?>
					
				</div>
				
			</div>
		</div>
	</div>
</section>
<?php
 else :
endif;
?>

<?php 
$i= 0;
if( have_rows('section_3_details') ): ?>
<section class="product-sec3">
	<div class="eut-container">
		<div class="row">
			<?php 
				
						while ( have_rows('section_3_details') ) : the_row();
						$section3_image = get_sub_field('section3_image');
						$section3_title = get_sub_field('section3_title');
			$section3_content = get_sub_field('section3_content');
						?>
			<div class="col-md-6 <?php if( $i == 0){ echo 'indications-sec'; } else{ echo 'ingredients-sec aairns-ingre'; }?>">
				<?php if($section3_image){ ?>
				<img src="<?php echo $section3_image; ?>" alt="<?php echo $section3_title; ?>" class="img-fluid"/>
				<?php } ?>
				<h5><?php echo $section3_title; ?></h5>
				<p>
					<?php echo $section3_content; ?>
				</p>
				
			</div>
			<?php
			if($i == '2')
      		$i = 0;
                    $i++;
                    endwhile;
                       
                ?>

			
		</div>
	</div>
</section>
<?php
 else :
endif;
?>

<!-- <section class="product-sec4">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php //echo do_shortcode('[ctu_ultimate_oxi id="2"]'); ?>
				
			</div>
		</div>
	</div>
</section> -->
<?php if( have_rows('tab_section_details') ): ?>
<section class="tabbed-content">
	
	<div class="eut-container">
		
	
  <nav class="tabs">
	  <?php

	$i = 1; // Set the increment variable ?>
    <ul>
		<?php // loop through the rows of data for the tab header
    	while ( have_rows('tab_section_details') ) : the_row();
		$tab_title = get_sub_field('tab_title');
		$tab_content = get_sub_field('tab_content');
	?>
      <li>
		  <a href="#tab<?php echo $i; ?>" class="<?php if($i == 1) echo 'active';?>"><?php echo $tab_title; ?></a>
		</li>
     
	<?php   $i++; // Increment the increment variable

	endwhile; //End the loop  ?>
    </ul>
  </nav>
	</div>
	<?php // loop through the rows of data for the tab header
	$i = 1;
    	while ( have_rows('tab_section_details') ) : the_row();
		$tab_title = get_sub_field('tab_title');
		$tab_content = get_sub_field('tab_content');
	?>
  <section id="tab<?php echo $i; ?>" class="item <?php if($i == 1) echo 'active';?>" data-title="<?php echo $tab_title; ?>">
    <div class="item-content">
     <p><?php echo $tab_content; ?></p>
    </div>
  </section>
	<?php   $i++; // Increment the increment variable
		
	endwhile; //End the loop ?>
	
	
</section>
<?php 
	else :

    // no rows found

endif;
	?>

<?php $button_text = get_field('button_text'); 
			$button_url = get_field('button_url');
			if($button_url){
			?>
<section class="product-sec5">
	<div class="eut-container">
		<div class="row">
			<div class="col-md-6">
				<h3 class="prostag-benef fs38">Purchase your product here</h3>
			</div>
			<div class="col-md-6">
				
			<div class="buy-amazon">
				<a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
			</div>
	
			</div>
		</div>
	</div>
</section>
		<?php } ?>

<section class="product-sec6">
	<div class="eut-container">
		<div class="row">
			<h2 class="loved-parents fs36">We would love your feedback</h2>
			<div class="col-md-12">
				<div class="owl-carousel owl-theme testi-slide">
 
 
  <div class="item">
           <div class="testi-copy">
		   <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
		   <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
		   <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
	</div>
 
 
		
    <div class="item">
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
	</div>
	
	<div class="item">
           <div class="testi-copy">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
            
           </div>
	</div>
 
	
	<div class="item">
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p> “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.”  </p>
              <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
	</div>
	
	
	<div class="item">
           <div class="testi-copy">
		   
			 <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.” </p>
            <h4 class="texti-heading">Melissa Jain, Parent</h4>
            
           </div>
	</div>
 
 
	<div class="item">
           <div class="testi-copy1">
		    <img src="https://pinklemonadedigital.com/british-biological/wp-content/uploads/2022/08/star.png"  class= "testi-im" alt="">
             <p>“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.”  </p>
             <h4 class="texti-heading">Melissa Jain, Parent</h4>
           </div>
     
		</div>
</div>
			</div>
		</div>
	</div>
</section>

<?php echo do_shortcode('[show_similiarbrowse]'); ?>

<section class="product-sec8 home-sec10">
	<div class="eut-container">
		<div class="row">
			<h2 class="loved-parents fs36">Read more about your health and daily nutrition</h2>
			<div class="col-md-12">
				<?php echo do_shortcode('[show_similiarblogs]'); ?>
			</div>
		</div>
	</div>
</section>

<section class="product-sec9">
	<div class="eut-container">
		<div class="row">
			<div class="col-md-8">
				<h3 class="prostag-benef">Have a query? Hear from us...</h3>
				<div class="buy-amazon"><a href="<?php echo get_site_url(); ?>/contact-us">CONTACT US</a></div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>