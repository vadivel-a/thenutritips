<?php

// Creating a Nutrients Custom Post Type
function crunchify_deals_custom_post_type() {
	$labels = array(
		'name'                => __( 'Nutrients' ),
		'singular_name'       => __( 'Nutrient'),
		'menu_name'           => __( 'Nutrients'),
		'parent_item_colon'   => __( 'Parent Nutrient'),
		'all_items'           => __( 'All Nutrients'),
		'view_item'           => __( 'View Nutrient'),
		'add_new_item'        => __( 'Add New Nutrient'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Nutrient'),
		'update_item'         => __( 'Update Nutrient'),
		'search_items'        => __( 'Search Nutrient'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash'),
	);
	$args = array(
		'label'               => __( 'Nutrients'),
		'description'         => __( 'Best Nutrients'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
	    'yarpp_support'       => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-food',
);
	register_post_type( 'nutrients', $args );
}
add_action( 'init', 'crunchify_deals_custom_post_type', 0 );

// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'wp_create_nutrients_types_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function wp_create_nutrients_types_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Categorie', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Categorie' ),
    'parent_item_colon' => __( 'Parent Categorie:' ),
    'edit_item' => __( 'Edit Categorie' ), 
    'update_item' => __( 'Update Categorie' ),
    'add_new_item' => __( 'Add New Categorie' ),
    'new_item_name' => __( 'New Categorie Name' ),
    'menu_name' => __( 'Categories' ),
  ); 	
 
  register_taxonomy('categories',array('nutrients'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}

//ACF-fields

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_nutrients',
	'title' => 'Nutrient Fields',
	'fields' => array(
		array(
			'key' => 'field_nutrients_food_code',
			'label' => 'Nutrient Code',
			'name' => 'food_code',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_energy',
			'label' => 'Energy',
			'name' => 'energy',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_carbo_hyderate',
			'label' => 'Carbo Hyderate',
			'name' => 'carbo_hyderate',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_protein',
			'label' => 'Protein',
			'name' => 'protein',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_fat',
			'label' => 'FAT',
			'name' => 'fat',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_soluable_fiber',
			'label' => 'Soluable Fiber',
			'name' => 'soluable_fiber',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_insoluable_fibe',
			'label' => 'InSoluable Fiber',
			'name' => 'insoluable_fiber',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_calcium',
			'label' => 'Calcium',
			'name' => 'calcium',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_iron',
			'label' => 'Iron',
			'name' => 'iron',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_potassium',
			'label' => 'Potassium',
			'name' => 'potassium',
			'type' => 'text',
		),
		array(
			'key' => 'field_nutrients_sodium',
			'label' => 'Sodium',
			'name' => 'sodium',
			'type' => 'text',
		),		
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'nutrients',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;


/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){
	add_submenu_page( 
		'edit.php?post_type=nutrients', 
		'Import', 
		'Import', 
		'manage_options', 
		'nutrients_import', 
		'import_nutrient_excel_file_upload' 
	); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
 
/**
 * Display a custom menu page
 */
function import_nutrient_excel_file_upload(){ 

	if ( !empty( $_FILES ) ){ 
		ExcelFileUpload();
	}
	?>
	   <div>
			<h2>Upload a file here</h2>
			<form action="" method="post" enctype="multipart/form-data">
			<?php wp_nonce_field('excel-import'); ?>

			<label for="file">Filename:</label>
			<input type="file" name="upload_file" id="file"><br>
			<input type="submit" name="submit" value="submit">
			</form>
		</div>
    <?php 	
}

function importNutrientDataSubmitForm($data){ 

	?>
	   <div>
			<h2>Data Import</h2>
			<form action="" method="post" enctype="multipart/form-data">
			<?php wp_nonce_field('excel-import'); ?>
			<input type="submit" name="submit_import_data" value="submit">
			</form>
		</div>
    <?php 	
}

function ExcelFileUpload(){
	$currenttime = date("Y-m-d-H-i-s");
	$upload_dir   = wp_upload_dir();
	
	if ( isset($_POST['submit'])) {
		$file_name = $_FILES['upload_file']['name'];
		if ( isset($file_name) && $file_name != "" ) {
			$allowedExtensions = array("csv");

			$ext = pathinfo( $file_name , PATHINFO_EXTENSION );
			
			if ( in_array ($ext, $allowedExtensions)){
				$nutrips_folder = $upload_dir['basedir']."/thenutrips";
				if (!is_dir($nutrips_folder)) {
					mkdir($nutrips_folder);
				}
				$cfileName = $nutrips_folder."/".$currenttime.'-'.$file_name;
				$isUploaded = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $cfileName);
				
				if ($isUploaded) {
					echo 'File uploaded!';
					$data = readCsvFile($cfileName);
					//importNutrientDataSubmitForm($data);
					insertNutripsData($data);
				} else {
					echo 'File not uploaded!';
				}
			} else {
				echo 'This type of file not allowed!';
			}
		}
		else { echo 'Select an CSV file first!';
		}
	}
}

//error_reporting(E_ALL);
function readCsvFile($file){

	$row = 1;
	$html = '<table class="widefat fixed" cellspacing="0">';
	$header = '';
	$body = '';
	$makeData = array();
	if (($handle = fopen($file, "r")) !== FALSE) {
	  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		
		if($row == 1){
			for ($c=0; $c < $num; $c++) {
				$header .= '<th id="columnname" class="manage-column column-columnname" scope="col">'.$data[$c].'</th>';
			}			
			
		}else{
			$body .= '<tr>';
			for ($c=0; $c < $num; $c++) {
				$body .= '<td class="column-columnname">'.$data[$c].'</td>';
			}
			$body .= '</tr>';
		}
		$row++;
	  }
	  fclose($handle);
	}
	$html .= '<thead><tr>'.$header.'</tr></thead>';
	$html .= '<tbody>'.$body.'</tbody>';
	echo $html;
	return processCsv($file);
}

function processCsv($absolutePath)
{
    $csv = array_map('str_getcsv', file($absolutePath));
    $headers = $csv[0];
    unset($csv[0]);
    $rowsWithKeys = [];
    foreach ($csv as $row) {
        $newRow = [];
        foreach ($headers as $k => $key) {
            $newRow[$key] = $row[$k];
        }
        $rowsWithKeys[] = $newRow;
    }
    return $rowsWithKeys;
}

function insertNutripsData($alldata){
	global $wpdb;
	foreach($alldata as $data){
		if($data){
			$new_post = array(
				'post_title' => $data['title'],
				'post_content' => $data['content'],
				'post_status' => 'publish',
				'post_date' => date('Y-m-d H:i:s'),
				'post_type' => 'nutrients',
				'post_category' => array(0)
			);
			$post_id = wp_insert_post($new_post);
			postAttachementFile($post_id, $data['image']);
			$post_meta = array( 'food_code', 'energy', 'carbo_hyderate', 'protein', 'fat', 'soluable_fiber', 'insoluable_fiber', 'calcium', 'iron', 'potassium', 'sodium');
			foreach ($post_meta as $meta) {
				if($data[$meta] != ''){
					add_post_meta( $post_id, $meta, $data[$meta] );
				}
			}
			wp_set_object_terms($post_id, $data['category'], 'categories');
		}
	}
}

function postAttachementFile($post_id, $file){
	$filename = basename($file);

	$upload_file = wp_upload_bits($filename, null, file_get_contents($file));
	if (!$upload_file['error']) {
		$wp_filetype = wp_check_filetype($filename, null );
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_parent' => $parent_post_id,
			'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
			'post_content' => '',
			'post_status' => 'inherit'
		);
		$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
		if (!is_wp_error($attachment_id)) {
			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
			wp_update_attachment_metadata( $attachment_id,  $attachment_data );
			set_post_thumbnail( $post_id, $attachment_id );
		}
	}
					
}