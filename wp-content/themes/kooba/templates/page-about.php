<?php
/*
Template Name: Page About
*/
get_header(); ?>
<header class='about'>
	      <div class="row">
	        <div class="large-12 columns">
	          <h2 class="center">World-class Power & Cooling Environment</h2>
	      	        </div>
	      </div>
    </header>

  <section class='about-intro'> 
     <div class="row">
        <div class="large-12 columns">
        <?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		
		</article>
	<?php endwhile; // End the loop ?>

	</div>
</div>
</section>
<section class="about-management-team">
	<div class="row">
	   <h2 class="center" style="color:#fff;text-size:20px;">Management Team</h2>
	 
			<?php echo build_tshowcase('ID','0','0','0','management','active','grid','img-circle,text-center,img-above,2-columns','photo,position,name','false','','true'); ?> 
	</div>
</section>
<section class="about-board-team">
	<div class="row">
		 <h2 class="center"  style="color:#fff;text-size:20px;">Board Members</h2>
	
		<?php echo build_tshowcase('ID','0','0','0','board','active','grid','img-circle,text-center,img-above,3-columns','photo,position,name','false','','true'); ?> 
    </div>
</section>
<?php get_footer(); ?>

      
  