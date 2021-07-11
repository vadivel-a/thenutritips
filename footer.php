<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package medspa
 */

?>

 <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
  		<div class="row py-3">
  			<div class="col-md-12">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'footer-menu',
              'menu_id'        => 'footer-menu',
              'container_class' => 'footerlinks'
            ) );
          ?>
  			</div>
  		</div>
    </div>

    <div class="container-fluid dark_footer copyright">
      <div class="container">
        <div class="row">
            <div class="col-md-6">
              <p><?php the_field('copy_rights', 'option'); ?></p>
            </div>
            <div class="col-md-6 text-right">
              <?php echo social_profile();?>
            </div>
        <div>
      <div>
    <div>

  </footer><!-- End Footer -->

  <?php /*<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> */ ?>
  <div id="preloader">
  </div>

</div><!-- #page -->
<script>
const site_url = "<?php echo site_url(); ?>";
</script>
<?php wp_footer(); ?>

</body>
</html>
