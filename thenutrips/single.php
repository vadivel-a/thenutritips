<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package medspa
 */

get_header();
global $post;
?>


<?php
function medspa_cats_related_post() {

		$post_id = get_the_ID();
		$cat_ids = array();
		$categories = get_the_category( $post_id );

		if(!empty($categories) && !is_wp_error($categories)):
				foreach ($categories as $category):
						array_push($cat_ids, $category->term_id);
				endforeach;
		endif;

		$current_post_type = get_post_type($post_id);

		$query_args = array(
				'category__in'   => $cat_ids,
				'post_type'      => $current_post_type,
				'post__not_in'    => array($post_id),
				'posts_per_page'  => '3',
		 );

		$related_cats_post = new WP_Query( $query_args );
		$data['per_row_for_blog'] = 4;
		$data['text_align'] = 'center';
		$data['box_shadow'] = 'inner-shadow shadow';

		if($related_cats_post->have_posts()):
				while($related_cats_post->have_posts()): $related_cats_post->the_post();

					echo render_blogcontent(get_the_ID(), $data);
				endwhile;

				// Restore original Post Data
				wp_reset_postdata();
		 endif;

} ?>

	<main id="main" class="site-main mb-5">
		<!-- ======= Hero Section ======= -->
<?php
	$user_id=$post->post_author;
	$avatar = get_avatar_url(get_the_author_meta('ID'));
	$avatar_name =  get_the_author_meta('display_name', $user_id);;
	$thumbnail =  get_the_post_thumbnail_url();
	$avatar_link =  get_author_posts_url(get_the_author_meta('ID'));
	$categories = get_the_category($post->ID);
	$categories_group = '';
	foreach( $categories as $category ) {
    $categories_group .= $category->name . ',';
	}
?>
		<section class="d-flex innerheader">
			<div class="container">
				<div class="row mt-1">

					<div class="col-lg-5 mb-3 mb-lg-0">
							<div class="border-leaf-lg background-image mb-2 w-100" style="padding-bottom: 100% ;background-size:cover;background-image: url('<?php echo $thumbnail; ?>');">
									<meta itemprop="image" content="<?php echo $thumbnail; ?>">
							</div>
					</div>

					<div class="col-lg-7">
							<meta itemprop="keywords" content="Belonging, Candidate Experience, Manager effectiveness">
							<p class="headline-eyebrow mb-2" itemprop="articleSection"><?php echo rtrim($categories_group,','); ?></p>
							<h1 class="headline pr-md-7" itemprop="headline"><?php echo get_the_title(); ?></h1>
							<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-3" itemprop="author" itemscope="" itemtype="http://schema.org/Person" itemid="<?php echo $avatar_link; ?>">
												<a href="<?php echo $avatar_link; ?>">
													<div class="mr-3" style="width: 80px;">
															<div class="rounded-circle background-image" style="padding-bottom: 100%; background-position: center top; background-image: url('<?php echo $avatar; ?>');" itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" itemid="<?php echo $avatar_link; ?>/#authorlogo">
																	<meta itemprop="url" content="<?php echo $avatar; ?>">
																	<meta itemprop="caption" content="<?php echo $avatar_name; ?>">
															</div>
													</div>
												</a>
												<div class="mb-0">
														<a href="<?php echo $avatar_link; ?>" data-gatext="author name">
																<span itemprop="name"><?php echo $avatar_name; ?></span>
														</a>
														<i class="fa fa-calendar" aria-hidden="true"></i> Published: <?php echo get_the_date('j F Y', get_the_ID()); ?>
												</div>
										</div>
						</div>
					</div>

				</div>
			</div>
		</section>

<section class="section innerpage pt-3 single-detail">
<div class="container">
<div class="row">

<div class="col-md-2 stickybar leftcolumn">
	<div class="btn-primary small text-center ripple-circle">Subscribe</div>
	<?php get_template_part( 'inc/share',''); ?>
</div>

<div class="col-md-8 rightcolumn">
		<?php
		while ( have_posts() ) :
			the_post();
			$postUrl = get_permalink(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mb-2 mt-3"><?php the_post_thumbnail(); ?></div>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'medspa' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'medspa' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php medspa_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
<?php

			the_post_navigation(
				array(
					'<' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'medspa' ) . '</span> <span class="nav-title">%title</span>',
					'>' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'medspa' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

			<div class="row section_bloglists relatedpost ">
				<div class="col-md-12 my-3"><h2>Related Posts</h2></div>
				<?php medspa_cats_related_post() ?>
			</div>



			</div>
		</div>
	</div>



	</main><!-- #main -->
</div>
</div>
</div>
</section>
<?php
//get_sidebar();
get_footer();
