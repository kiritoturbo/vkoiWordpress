<?php 
///create dang ký
// if(!function_exists('create_custom_page')){
	function create_custom_page() {
		$page_title = 'Đăng ký';
		$page_content = 'đăng ký ';
		$page_slug = 'dang-ky';
	
		// Check if the page already exists
		$page_check = get_page_by_path($page_slug);
	
		if (!$page_check) {
			$page_args = array(
				'post_title'   => $page_title,
				'post_content' => $page_content,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_name'    => $page_slug,
			);
	
			// Insert the page into the database
			$page_id = wp_insert_post($page_args);
			
			// Optional: Set the page template
			update_post_meta($page_id, '_wp_page_template', 'template-parts/register-template.php');
		}
	}
// }

// Hook the custom function to run during the 'after_setup_theme' action
add_action('after_setup_theme', 'create_custom_page');

///create dang nhập
function create_custom_page_login() {
    $page_title = 'Đăng nhập';
    $page_content = 'đăng nhập ';
    $page_slug = 'dang-nhap';

    // Check if the page already exists
    $page_check = get_page_by_path($page_slug);

    if (!$page_check) {
        $page_args = array(
            'post_title'   => $page_title,
            'post_content' => $page_content,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_name'    => $page_slug,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_args);
        
        // Optional: Set the page template
        update_post_meta($page_id, '_wp_page_template', 'template-parts/login-template.php');
    }
}

// Hook the custom function to run during the 'after_setup_theme' action
add_action('after_setup_theme', 'create_custom_page_login');
///create địa chỉ cửa hàng 
function create_custom_page_GPS_company() {
    $page_title = 'Hệ thống cửa hàng';
    $page_content = '';
    $page_slug = 'he-thong-cua-hang';

    // Check if the page already exists
    $page_check = get_page_by_path($page_slug);

    if (!$page_check) {
        $page_args = array(
            'post_title'   => $page_title,
            'post_content' => $page_content,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_name'    => $page_slug,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_args);
        
        // Optional: Set the page template
        update_post_meta($page_id, '_wp_page_template', 'template-parts/map-company.php');
    }
}
add_action('after_setup_theme', 'create_custom_page_GPS_company');

?>