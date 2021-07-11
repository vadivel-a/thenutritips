<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package medspa
 */

get_header();
?>
<main id="main" class="site-main">

<?php
if( have_rows('all_layouts') ):

// Loop through rows.
while ( have_rows('all_layouts') ) : the_row();

		// Case: Header Banner.
		if( get_row_layout() == 'hero_banner' ):
				$banner_section['banner'] = get_sub_field('banner');
				echo banner_section($banner_section);

		// Case: fullwidth-content Section.
		elseif( get_row_layout() == 'search_box' ):
		    $search_box['background_color'] = get_sub_field('background_color');
		    $search_box['background_image'] = get_sub_field('background_image');
		    $search_box['margin_top'] = get_sub_field('margin_top');
		    $search_box['margin_bottom'] = get_sub_field('margin_bottom');
		    $search_box['padding_top'] = get_sub_field('padding_top');
		    $search_box['padding_bottom'] = get_sub_field('padding_bottom');
		    $search_box['column'] = get_sub_field('column');
		    $search_box['text_align'] = get_sub_field('text_align');
		    $search_box['heading'] = get_sub_field('heading');
		    $search_box['subheading'] = get_sub_field('sub_heading');
		    $search_box['content'] = get_sub_field('content');
		    $search_box['cta'] = get_sub_field('cta');
		    echo search_box($search_box);

		// Case: fullwidth-content Section.
		elseif( get_row_layout() == 'fullwidth_content' ):
		    $fullwidth_content['background_color'] = get_sub_field('background_color');
		    $fullwidth_content['layout_width'] = get_sub_field('layout_width');
		    $fullwidth_content['background_image'] = get_sub_field('background_image');
		    $fullwidth_content['margin_top'] = get_sub_field('margin_top');
		    $fullwidth_content['margin_bottom'] = get_sub_field('margin_bottom');
		    $fullwidth_content['padding_top'] = get_sub_field('padding_top');
		    $fullwidth_content['padding_bottom'] = get_sub_field('padding_bottom');
		    $fullwidth_content['column'] = get_sub_field('column');
		    $fullwidth_content['text_align'] = get_sub_field('text_align');
		    $fullwidth_content['heading'] = get_sub_field('heading');
		    $fullwidth_content['subheading'] = get_sub_field('sub_heading');
		    $fullwidth_content['content'] = get_sub_field('content');
		    $fullwidth_content['cta'] = get_sub_field('cta');
		    echo fullwidth_content($fullwidth_content);
		elseif( get_row_layout() == 'multi_column_grid' ):
				$multi_column_grid['background_color'] = get_sub_field('background_color');
				$multi_column_grid['background_image'] = get_sub_field('background_image');
				$multi_column_grid['margin_top'] = get_sub_field('margin_top');
				$multi_column_grid['margin_bottom'] = get_sub_field('margin_bottom');
				$multi_column_grid['padding_top'] = get_sub_field('padding_top');
				$multi_column_grid['padding_bottom'] = get_sub_field('padding_bottom');
				$multi_column_grid['columns'] = get_sub_field('columns');
				$multi_column_grid['text_align'] = get_sub_field('text_align');
				$multi_column_grid['box_shadow'] = get_sub_field('box_shadow');
				$multi_column_grid['layout_align_item'] = get_sub_field('layout_align_item');
				$multi_column_grid['divider'] = get_sub_field('divider');
				$multi_column_grid['heading'] = get_sub_field('heading');
				$multi_column_grid['subheading'] = get_sub_field('subheading');
				$multi_column_grid['content'] = get_sub_field('content');
				$multi_column_grid['cta'] = get_sub_field('cta');
				echo multi_column_grid($multi_column_grid);

			elseif( get_row_layout() == 'two_column_icon_with_content' ):
			    $two_column_icon_with_content['background_color'] = get_sub_field('background_color');
			    $two_column_icon_with_content['background_image'] = get_sub_field('background_image');
			    $two_column_icon_with_content['margin_top'] = get_sub_field('margin_top');
			    $two_column_icon_with_content['margin_bottom'] = get_sub_field('margin_bottom');
			    $two_column_icon_with_content['padding_top'] = get_sub_field('padding_top');
			    $two_column_icon_with_content['padding_bottom'] = get_sub_field('padding_bottom');
			    $two_column_icon_with_content['left_column'] = get_sub_field('left_column');
			    $two_column_icon_with_content['right_column'] = get_sub_field('right_column');
			    $two_column_icon_with_content['text_align'] = get_sub_field('text_align');
			    $two_column_icon_with_content['box_shadow'] = get_sub_field('box_shadow');
			    $two_column_icon_with_content['layout_align_item'] = get_sub_field('layout_align_item');
			    $two_column_icon_with_content['divider'] = get_sub_field('divider');
			    $two_column_icon_with_content['heading'] = get_sub_field('heading');
			    $two_column_icon_with_content['subheading'] = get_sub_field('subheading');
			    echo two_column_icon_with_content($two_column_icon_with_content);
			// Case: fullwidth-content Section.
			elseif( get_row_layout() == 'gallery_slider' ):
			    $gallery_slider['background_color'] = get_sub_field('background_color');
			    $gallery_slider['background_image'] = get_sub_field('background_image');
			    $gallery_slider['margin_top'] = get_sub_field('margin_top');
			    $gallery_slider['margin_bottom'] = get_sub_field('margin_bottom');
			    $gallery_slider['padding_top'] = get_sub_field('padding_top');
			    $gallery_slider['padding_bottom'] = get_sub_field('padding_bottom');
			    $gallery_slider['columns'] = get_sub_field('columns');
			    $gallery_slider['text_align'] = get_sub_field('text_align');
			    $gallery_slider['box_shadow'] = get_sub_field('box_shadow');
			    $gallery_slider['layout_align_item'] = get_sub_field('layout_align_item');
			    $gallery_slider['divider'] = get_sub_field('divider');
			    $gallery_slider['heading'] = get_sub_field('heading');
			    $gallery_slider['subheading'] = get_sub_field('subheading');
			    $gallery_slider['content'] = get_sub_field('content');
			    $gallery_slider['gallery'] = get_sub_field('gallery');
			    $gallery_slider['cta'] = get_sub_field('cta');
			    echo gallery_slider($gallery_slider);

		elseif( get_row_layout() == 'blog' ):

				$blog_section['background_color'] = get_sub_field('background_color');
				$blog_section['background_image'] = get_sub_field('background_image');
				$blog_section['margin_top'] = get_sub_field('margin_top');
				$blog_section['margin_bottom'] = get_sub_field('margin_bottom');
				$blog_section['padding_top'] = get_sub_field('padding_top');
				$blog_section['padding_bottom'] = get_sub_field('padding_bottom');
				$blog_section['columns'] = get_sub_field('columns');
				$blog_section['text_align'] = get_sub_field('text_align');
				$blog_section['box_shadow'] = get_sub_field('box_shadow');
				$blog_section['layout_align_item'] = get_sub_field('layout_align_item');
				$blog_section['divider'] = get_sub_field('divider');
				$blog_section['heading'] = get_sub_field('heading');
				$blog_section['subheading'] = get_sub_field('subheading');
				$blog_section['per_row_for_blog'] = get_sub_field('per_row_for_blog');

				echo blog_section($blog_section);

		endif;
// End loop.
endwhile;

// No value.
else :
// Do something...
endif;


function blog_section($data) {

	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}

	if ($data['box_shadow']) {
		$data['box_shadow'] = 'inner-shadow '.$data['box_shadow'];
	}
	$layout_align_item = '';

	if ($data['layout_align_item']) {
		$layout_align_item = implode(" ",$data['layout_align_item']);
	}

	$divider_top = '';
	if ($data['divider'] == 'top' || $data['divider'] == 'inside') {
		$divider_top = '<div class="divider '.$data['divider'].'"></div>';
	}
	$divider_bottom = '';
	if ($data['divider'] == 'bottom') {
		$divider_bottom = '<div class="divider '.$data['divider'].'"></div>';
	}
	$html = '<section class="section_bloglists background" style="'.$backgrond.'">'.$divider_top.'
							<div class="container core">
									<div class="row display-flex '.$layout_align_item.'">';
										$html .= '<div class="col-md-'.$data['columns'].' text-'.$data['text_align'].'">';
										if (isset($data['heading'])) {
											$html .= '<h2 class="heading">'.$data['heading'].'</h2>';
										}
										if (isset($data['subheading'])) {
											$html .= '<p class="subheading mb-5">'.$data['subheading'].'</p>';
										}
										$html .= '</div>';

										$html .= blogRecentPost($data);
	$html .= '</div></div>'.$divider_bottom.'</section>';
	return $html;
}

function gallery_slider($data) {

	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}
	$box_shadow = '';
	if ($data['box_shadow']) {
		$box_shadow = 'p-0 inner-shadow '.$data['box_shadow'];
	}
	$layout_align_item = '';

	if ($data['layout_align_item']) {
		$layout_align_item = implode(" ",$data['layout_align_item']);
	}

	$divider_top = '';
	if ($data['divider'] == 'top' || $data['divider'] == 'inside') {
		$divider_top = '<div class="divider '.$data['divider'].'"></div>';
	}
	$divider_bottom = '';
	if ($data['divider'] == 'bottom') {
		$divider_bottom = '<div class="divider '.$data['divider'].'"></div>';
	}
	$html = '<section class="section_multi_column_grid background" style="'.$backgrond.'">'.$divider_top.'
							<div class="container core">
									<div class="row display-flex '.$layout_align_item.'">';
										$html .= '<div class="col-md-'.$data['columns'].' text-'.$data['text_align'].'">';
										if (isset($data['heading'])) {
											$html .= '<h2 class="heading">'.$data['heading'].'</h2>';
										}
										if (isset($data['subheading'])) {
											$html .= '<p class="subheading mb-5">'.$data['subheading'].'</p>';
										}
										$html .= '</div>';

										$html .= '<div class="col-md-'.$data['columns'].' text-'.$data['text_align'].'"><div class="inner w-100 gallery owl-carousel">';
										$count = 0;
										$group_image = '';
										foreach ($data['gallery'] as $key => $gallery) {

											if ($gallery['image']) {
												$count++;
												$group_image .= '<a href="'.$gallery['image'].'" data-toggle="lightbox" data-gallery="hidden-images" class="p-1 thumbnail"><img src="'.$gallery['image'].'" /></a>';
												if ($count % 4 == 0 || $count == count($data['gallery'])) {
													$html .= '<div class="item h-100 '.$box_shadow.'"><div class="in">'.$group_image.'</div></div>';
													$group_image = '';
												}
											}
										}
									$html .= '</div></div>';
	$html .= '</div></div>'.$divider_bottom.'</section>';
	return $html;
}

function multi_column_grid($data) {

	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}
	$box_shadow = '';
	if ($data['box_shadow']) {
		$box_shadow = 'p-4 inner-shadow '.$data['box_shadow'];
	}
	$layout_align_item = '';

	if ($data['layout_align_item']) {
		$layout_align_item = implode(" ",$data['layout_align_item']);
	}

	$divider_top = '';
	if ($data['divider'] == 'top' || $data['divider'] == 'inside') {
		$divider_top = '<div class="divider '.$data['divider'].'"></div>';
	}
	$divider_bottom = '';
	if ($data['divider'] == 'bottom') {
		$divider_bottom = '<div class="divider '.$data['divider'].'"></div>';
	}
	$html = '<section class="section_multi_column_grid background" style="'.$backgrond.'">'.$divider_top.'
							<div class="container core">
									<div class="row display-flex '.$layout_align_item.'">';
								$column_size = 12;
								$column_count = count($data['columns']);
								$column_size = $column_size/$column_count;
								foreach ($data['columns'] as $key => $column) {
									$html .= '<div class="col-md-'.$column_size.' text-'.$data['text_align'].' "><div class="inner h-100 '.$box_shadow.'" style="background-color:'.$column['background_color'].'">';
									if (isset($column['heading'])) {
										$html .= '<h2 class="heading">'.$column['heading'].'</h2>';
									}
									if (isset($column['subheading'])) {
										$html .= '<h4 class="subheading">'.$column['subheading'].'</h4>';
									}
									$html .= '<div class="content">'.$column['content'].'</div>';
									if ($column['cta']) {
										$target = '';
										if ($column['cta']['target']) {
											$column = 'target="'.$column['cta']['target'].'"';
										}
										$html .= '<div class="button-cover"><a class="btn btn-primary" href="'.$column['cta']['url'].'" '.$target.'>'.$column['cta']['title'].'</a></div>';
									}
									$html .= '</div></div>';
								}
	$html .= '</div></div>'.$divider_bottom.'</section>';
	return $html;
}

function two_column_icon_with_content($data) {

	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}
	$box_shadow = '';
	if ($data['box_shadow']) {
		$box_shadow = 'p-4 inner-shadow '.$data['box_shadow'];
	}
	$layout_align_item = '';

	if ($data['layout_align_item']) {
		$layout_align_item = implode(" ",$data['layout_align_item']);
	}

	$divider_top = '';
	if ($data['divider'] == 'top' || $data['divider'] == 'inside') {
		$divider_top = '<div class="divider '.$data['divider'].'"></div>';
	}
	$divider_bottom = '';
	if ($data['divider'] == 'bottom') {
		$divider_bottom = '<div class="divider '.$data['divider'].'"></div>';
	}
	$html = '<section class="section_two_column_icon_with_content background" style="'.$backgrond.'">'.$divider_top.'
							<div class="container core">
									<div class="row display-flex '.$layout_align_item.'">';
	$html .= '<div class="col-md-6 pr-5">';

	$left_column = '';
	foreach ($data['left_column'] as $key => $value) {
		$left_column .= '
		<li class="list-group-item d-flex flex-row '.$box_shadow.' mb-4">
			            <div class="icon-cover">
			                <img class="icon" src="'.$value['icon'].'">
			            </div>
			            <div class="media-body pl-3">
			                <h3 class="title mt-0 mb-0">'.$value['heading'].'</h3>
			                <div class="content pt-0">'.$value['description'].'</div>
			            </div>
		</li>';
	}
	$html .= '
	<div class="card pmd-card">
	    <ul class="list-group pmd-list">
				'.$left_column.'
	    </ul>
	</div>';

	$html .= '</div>';
	$html .= '<div class="col-md-6">'.$data['right_column'].'</div>';
	$html .= '</div></div>'.$divider_bottom.'</section>';
	return $html;
}


function fullwidth_content($data) {
	$layout_type = array(
		'full'    => '100%',
		'large'   => '1110px',
		'medium'  => '1000px',
		'small'   => '800x',
	);

	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond = 'max-width:'.$layout_type[$data['layout_width']].';background-size:contain;margin-left:auto;margin-right:auto;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}
	$html = '<section class="section_fullwidth_content background" style="'.$backgrond.'">
							<div class="container core">
									<div class="row display-flex justify-content-center">
										<div class="col-md-'.$data['column'].' text-'.$data['text_align'].'">';
	$html .= '<h2 class="heading">'.$data['heading'].'</h2>';
	$html .= '<h4 class="subheading">'.$data['subheading'].'</h4>';
	$html .= '<div class="content">'.$data['content'].'</div>';
	if ($data['cta']) {
		$target = '';
		if ($data['cta']['target']) {
			$target = 'target="'.$data['cta']['target'].'"';
		}
		$html .= '<div class="button-cover"><a class="btn btn-primary" href="'.$data['cta']['url'].'" '.$target.'>'.$data['cta']['title'].'</a></div>';
	}
	$html .= '</div></div></div></section>';
	return $html;
}

function banner_section($content){
	$html_slide = '';
	foreach($content['banner'] as $key => $slide) {
	$link = '#';
	$cta_text = '';
	if($slide['cta']){
		$link = $slide['cta']['url'];
	}
		$html_slide .= '
		<div class="item" style="background-image:url('.$slide['background_image'].')">
			<div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
					<div class="row justify-content-md-start justify-content-sm-center">
							<div class="col-md-12 align-self-center">
								<div class="inner">
								<div class="w-100 bg text-center">
									<h1>'.$slide['title'].'</h1>
									<div class="para"><p>'.$slide['description'].'</p></div>
									<a href="'.$link.'" class="btn btn-primary rounded-pill mb-3 mt-3 text-white green_btn" >'. $slide['cta']['title'].'</a>
								</div>
								</div>
							</div>

					</div>
			</div>
		</div>';
	}

	$html = '
	<section id="hero" class="d-flex align-items-center">
	<div id="home_banner" class="home_banner owl-carousel" data-ride="carousel" >
		'.$html_slide.'
	</div>
	<div class="divider bottom"></div>
	</section>';
	return $html;
}

function search_box($data) {
	$backgrond = 'margin-top:'.$data['margin_top'].'px;';
	$backgrond .= 'margin-bottom:'.$data['margin_bottom'].'px;';
	$backgrond .= 'padding-top:'.$data['padding_top'].'px;';
	$backgrond .= 'padding-bottom:'.$data['padding_bottom'].'px;';
	if ($data['background_color']) {
		$backgrond .= 'background-color:'.$data['background_color'].';';
	}
	if ($data['background_image']) {
		$backgrond .= 'background-image:url('.$data['background_image'].');';
	}
	$html = '<section class="home-search background" style="'.$backgrond.'">
							<div class="container core">
									<div class="row display-flex justify-content-center">
										<div class="col-md-'.$data['column'].' text-'.$data['text_align'].'">';
	$html .= '<h2 class="heading">'.$data['heading'].'</h2>';
	$html .= '<h4 class="subheading">'.$data['subheading'].'</h4>';
	$html .= '<div class="content">'.$data['content'].'</div>';
	if ($data['cta']) {
		$target = '';
		if ($data['cta']['target']) {
			$target = 'target="'.$data['cta']['target'].'"';
		}
		$html .= '<div class="button-cover"><a class="btn btn-primary" href="'.$data['cta']['url'].'" '.$target.'>'.$data['cta']['title'].'</a></div>';
	}

	$html .= '</div>'.search_form().'</div></div></section>';
	return $html;
}


function search_form(){
	$search_from = '
	<div class="container">
	<div class="input-group mb-3">
			<input id="search_input" type="text" class="form-control">
      <div class="input-group-append">
				<button id="search_trigger" class="btn btn-primary small"><i class="fa fa-search"></i></button>
			</div>
  </div>
	<span id="total-count" class="text mb-4"></span>
	</div>';

	$html = '
				<div id="search_render_model" class="container form-row d-flex justify-content-center">
								'.$search_from.' <div id="search-results" ></div>
				</div>';
	return $html;
}
?>






</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
?>
