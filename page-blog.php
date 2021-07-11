<?php
/**
 * Template Name: Blog Page
 */

//https://www.kvcodes.com/2016/02/simple-subscribe-form-wordpress/
get_header(); ?>
<main id="main" class="site-main">
	<!-- ======= Hero Section ======= -->

	<section class="d-flex bg_blue text-white py-2 innerheader blog-header">
		<div class="container">
			<div class="row align-items-center category-wise-lisitng">
						<h1><?php the_title(); ?></h1>
						<?php
						$data['cat'] = 'Featured Post';
						$data['per_row_for_blog'] = 12;
						$data['text_align'] = 'left';
						$data['box_shadow'] = ''; //inner-shadow shadow
						$feature_post_id = get_field('feature_post', 'option');
						var_dump($feature_post_id);
						echo render_feature_content($feature_post_id, $data);
						?>
			</div>
		</div>
	</section>

	<div class="container innerpage section_bloglists my-5">

		<?php
		$categories = get_categories();
		foreach($categories as $category) {
			 $data['link'] = get_category_link($category->term_id);
			 $data['term_id'] = $category->term_id;
			 $data['title'] = $category->name;
			 $data['description'] = $category->description;
			 $data['icon'] = get_field('category_icon',$category);
			 echo renderCategoryListing($data);
			 $query_args = array(
	 				'category__in'   => $category->term_id,
	 				'posts_per_page'  => '2',
	 		 );

	 		$cats_post = new WP_Query( $query_args );
	 		$data['per_row_for_blog'] = 6;
	 		$data['text_align'] = 'left';
	 		$data['box_shadow'] = ''; //inner-shadow shadow
			echo '<div class="row mb-3 category-wise-lisitng">';
	 		if($cats_post->have_posts()):
	 				while($cats_post->have_posts()): $cats_post->the_post();

	 					echo render_blogcontent(get_the_ID(), $data);
	 				endwhile;

	 				// Restore original Post Data
	 				wp_reset_postdata();
	 		 endif;
			 echo '<div class="col-md-12 my-3 text-right">
			 <a class="see-more" href="'.$data['link'].'">See More '.$data['title'].'</a>
			 <hr />
			 </div>';
			 echo '<hr />';
			 echo '</div>';
		}
		function renderCategoryListing($data) {
				if (!$data['icon']) {
					$data['icon'] = esc_url( get_template_directory_uri() ).'/assets/images/default-thumb.png';
				}

				$html = '
						<div class="row mb-3">
				        <div class="col-lg-8">
				            <h3 class="headline-small d-flex align-items-end mb-4"><img class="icon icon-size-9 mr-4" src="'.$data['icon'].'" alt="'.$data['title'].'"> '.$data['title'].'</h3>
				            <p>'.$data['description'].'</p>
				        </div>
					 </div>';
				return $html;
		}
		?>
	</div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer(); ?>
