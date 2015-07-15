<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/demo.css" />
	    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css" />
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr-min.js"></script>


   
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	
	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
	
	<?php do_action( 'foundationpress_layout_start' ); ?>
	

 <div class="edge"></div>
<?php if (is_front_page()){ ?>
     <nav class="top-bar foundation-bar" data-topbar>
  <ul class="title-area">
            <li class="name">
           
              <a href="<?php echo home_url(); ?>">
                
                    <img class="logo" alt='<?php bloginfo( 'name' ); ?>'src="<?php echo get_stylesheet_directory_uri(); ?>/images/kooba.png">

              </a>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>
  
  <section class="top-bar-section">
    <!-- Right Nav Section -->
     	              <?php foundationpress_top_bar_r(); ?>

  </section>
</nav>

  <?php } else { ?>
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/header.css" />
	 
  
   <nav class="top-bar foundation-bar" data-topbar style="background:#fff;color:#000">
  <ul class="title-area">
            <li class="name">
           
              <a href="<?php echo home_url(); ?>">
                
                    <img class="logo" alt='<?php bloginfo( 'name' ); ?>'src="<?php echo get_stylesheet_directory_uri(); ?>/images/kooba.png">

              </a>
            </li>
            <li class="toggle-topbar menu-icon" style="color:#000"><a href="#"><span  style="color:#000">Menu</span></a></li>
          </ul>
  
  <section class="top-bar-section" style="background:#fff;color:#000">
    <!-- Right Nav Section -->
     	              <?php foundationpress_top_bar_r(); ?>

  </section>
</nav>

  <?php } ?>





<section class="container" role="document">
	<?php do_action( 'foundationpress_after_header' ); ?>
