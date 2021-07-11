<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package medspa
 */

get_header();
?>

<main id="main" class="site-main">
	<!-- ======= Hero Section ======= -->

	<section class="d-flex bg_blue text-white py-2 innerheader">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 text-center py-5">
						<h1><?php single_term_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container innerpage section_bloglists my-5">
		<div class="row">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							echo render_blogcontent(get_the_ID());
						endwhile;
						if (  $wp_query->max_num_pages > 1 )
						echo '<div class="clear"></div><div class="col-md-12 mt-4 text-center medspa_loadmore_posts">
						<div class="btn btn-primary rounded-pill green_btn">More posts</div>
						</div>';
					endif;
				?>
		</div>
		<div class="row"><div class="col-md-12"><div class="show_loader"><?php get_template_part( 'inc/loader',''); ?></div></div></div>
	</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
