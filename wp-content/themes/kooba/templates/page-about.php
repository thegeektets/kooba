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

<?php get_footer(); ?>

      
  