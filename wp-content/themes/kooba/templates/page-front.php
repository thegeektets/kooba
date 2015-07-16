<?php
/*
Template Name: Front Page
*/
get_header(); ?>
	
	<header class='front'>
	      <div class="row">
	        <div class="large-12 columns">
	          <h1 class="center"><strong style="font-size:75px;color:#fff">TOP-TIER</strong></h1>
	          <h2 class="center" style="font-weight:300;font-size:35px;">World-class Power & Cooling Enviroment</h2>
	        </div>
	      </div>
    </header>


  <section class='front-second'> 
     <div class="row">
        <div class="large-12 columns">
          <h2 class="center"><?php the_title(); ?></h2>
     <?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
      <?php endwhile; // End the loop ?>


       </div>
      </div>
  </section>
<section class='front-promise'> 
          <div class="large-4 columns zero-padding">
          <div class="front-promise-orange">
 
          <h3 style="color:#fff"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/reliability.png"> Reliability</h3>
          <p class="desc">Full UPS power back-up systems and two N+1 redundancy to meet your backup and storage needs at all times.
          </p>
        </div>
        </div>
         <div class="large-4 columns zero-padding">
          <div class="front-promise-red">
    
         <h3 style="color:#fff">   <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/security.png">  Security</h3>
         	<p class="desc">Security: Our state-of-the art security systems and controls monitor and record access to every level of the facility to ensure your data stays safe.</p>
           </div>
        </div>
         <div class="large-4 columns zero-padding">
            <div class="front-promise-green">
          <h3 style="color:#fff"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/recovery.png">  Recovery </h3>
        	<p class="desc">With 24-hour technical support simplifies your data recovery

			process while helping you maintain your critical operations at all time. 
				</p>
			 </div>
        </div>
  </section>

 

		</div>
</div>
<?php get_footer(); ?>

