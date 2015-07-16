<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

</section>
<section class="footer">
  

<footer class="row">
  <?php do_action( 'foundationpress_before_footer' ); ?>
</footer>

 <section class='footer-one'> 
     <div class="row">
        <div class="large-12 columns">
          <h3 class="center" >
          <span style="color:#fff;padding:20px;border: solid 2px;display: inline-block;" >
          Learn more About Our Services
          </span>
          </h3>
                 </div>
      </div>
  </section>
  <section class='footer-second'> 
     <div class="row">
        <div class="large-12 columns">
           <?php dynamic_sidebar( 'footer-widgets' ); ?>
      </div>
      </div>
  </section>
    <section class='footer-last'> 
      <div class="row">
      <div style="float:left;margin-top:-10px;font-size:10px;">
          &copy;<?php echo date("Y") ?> KOOBA
      </div>
      <div style="float:right;margin-top:-10px;font-size:10px;">
          PRIVACY POLICY
      </div>
      </div>
  </section>
<a class="exit-off-canvas"></a>

  <?php do_action( 'foundationpress_layout_end' ); ?>
  </div>
</div>
<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</section>
 <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app-min.js"></script>
 <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>

</body>
</html>