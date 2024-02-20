<?php
/**
 * FIMETECH functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FIMETECH
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
if(!class_exists('WooCommerce')){
	echo 'Bạn cần cài plugin WooCommerce';
	return;
}
//lọc sản phẩm
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');
add_action('wp_ajax_reset_filter', 'reset_filter');
add_action('wp_ajax_nopriv_reset_filter', 'reset_filter');

function filter_products() {
    $orderby = $_POST['orderby'];
    $order = $_POST['order'];

    $args = array(
        'post_type' => 'product',
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
		do_action( 'woocommerce_before_shop_loop' );
        woocommerce_product_loop_start();
        while ($query->have_posts()) {
            $query->the_post();
			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
        }
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
        woocommerce_product_loop_end();
    }
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
    wp_reset_postdata();
    die();
}

function reset_filter() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        woocommerce_product_loop_start();
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
        woocommerce_product_loop_end();
    }

    wp_reset_postdata();
    die();
}
//kết thức lọc sản phẩm 


// Lấy danh mục sản phẩm WooCommerce và tạo danh sách nút
function custom_product_category_buttons($parent,$index) {
    // Lấy danh mục sản phẩm
    $product_categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => 0,
		'parent' => $parent
    ) );

    // Kiểm tra xem có danh mục nào tồn tại không
    if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
        $output = '<ul class="d-flex align-items-center list-tabs-product">';
        
        // Tạo nút cho từng danh mục
        foreach ( $product_categories as $category ) {
            $output .= '<button data-target'.$index.'="target'.$index.'" class="category-button btn btn-primary btn-active" data-category="' . $category->slug . '">' . $category->name . '</button>';
        }
        
        $output .= '</ul>';
        
        echo $output;
    }
}

// Hiển thị sản phẩm tương ứng khi nhấn vào nút danh mục
function custom_product_category_button_scripts() {
    ?>
    <script>
    jQuery(document).ready(function($) {
		// Xóa các sản phẩm hiện tại
		$('.product-list').hide();
		$('#target1 .product-list:first').show();
		$('#target2 .product-list:first').show();

        $(document).on('click','.category-button', function() {
            var category = $(this).data('category');
			var target1 = $(this).data('target1');
            var target2 = $(this).data('target2');
			console.log(category, target1, target2);
           
			 // Xóa các sản phẩm hiện tại
			 $('#' + target1 + ' .product-list').hide();
            $('#' + target2 + ' .product-list').hide();
			console.log( $('#' + target1 + ' .product-list'));

            // Hiển thị sản phẩm tương ứng
            $('#' + target1 + ' #' + category + '-products').show();
            $('#' + target2 + ' #' + category + '-products').show();
			console.log( $('#' + target1 + ' #' + category + '-products'));
        });
    });
    </script>
    <?php
}
add_action( 'wp_footer', 'custom_product_category_button_scripts' );

// remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
/**
 * Remove product data tabs
 */
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) && is_plugin_active( 'customer-reviews-woocommerce/ivole.php' ) ) {
    require 'wpshare247-product-review.php';
}

function woo_remove_product_tabs( $tabs ) {
    // unset( $tabs['description'] );      	// Xóa tab mô tả
    // unset( $tabs['reviews'] ); 			// Xóa tab review
    unset( $tabs['additional_information'] );  	// Xóa tab additional information
    return $tabs;
}

// AJAX callback để lấy số lượng sản phẩm trong giỏ hàng
function get_cart_count() {
	$cart_count = WC()->cart->get_cart_contents_count();
	echo $cart_count;
	wp_die();
}
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');
  

/*Woocommerce minicart*/
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" onclick="return false;" class="cart-contents contact-cart d-flex align-items-center" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
	<i class="fas fa-shopping-cart cart-image-icon position-relative">
		<span class="cart-image-icon-mount">
			<?php echo sprintf(_n('%d',$woocommerce->cart->get_cart_contents_count(), 'woothemes')); ?>
		</span>
	</i>
	<span>Giỏ hàng</span>
	</a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}

///search ajax 
function my_ajax_search() {
	get_template_part( 'ajax-search' );
    wp_die();
}
add_action( 'wp_ajax_my_ajax_search', 'my_ajax_search' );
add_action( 'wp_ajax_nopriv_my_ajax_search', 'my_ajax_search' );

function my_enqueue_scripts() {
	wp_enqueue_script( 'my-ajax-search', get_template_directory_uri(). '/js/ajax-search.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'my-ajax-search', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts','my_enqueue_scripts' );
//compare
add_filter('yith_woocompare_compare_added_label', 'custom_compare_added_label');
function custom_compare_added_label()
{
    return '';
}


//xóa các trường checkout
add_filter('woocommerce_checkout_fields', 'remove_filter_company');
function remove_filter_company($dulieu){
	unset($dulieu['billing']['billing_country']);
	unset($dulieu['billing']['billing_postcode']);
	unset($dulieu['billing']['billing_address_1']);
	unset($dulieu['billing']['billing_address_2']);
	unset($dulieu['billing']['billing_city']);
	return $dulieu;
}

//đã xem product 
function viewedProduct(){
	session_start();
	if(!isset($_SESSION["viewed"])){
		$_SESSION["viewed"] = array();
	}
	if(is_singular('product')){
		$_SESSION["viewed"][get_the_ID()] = get_the_ID();
	}
}
add_action('wp', 'viewedProduct');
//end đã xem product 


//hàm reset tất cả các css mặc định của woocommerce 
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//thêm hình ảnh nhỏ cho bài viết gần đây 
// Đăng ký widget tùy chỉnh
function custom_recent_posts_widget_init() {
    register_widget( 'Custom_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'custom_recent_posts_widget_init' );
//import file
function my_custom_function() {
    require 'custom/filterProductCheckbox.php';
    require 'custom/menu.php';
    require 'custom/gpsCompany.php';
    require 'custom/createTemplate.php';
}
my_custom_function();

//widget 
require  get_template_directory().'/widget/customPostImage.php';
// Đăng ký widget
function register_custom_widget() {
    register_widget( 'Custom_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'register_custom_widget' );

//update cart 
function add_wc_cart_params() {
	wp_localize_script( 'your-script-handle', 'wc_cart_params', array(
	  'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'add_wc_cart_params' );

// Hiển thị kết quả tìm kiếm
function search_store_ajax_handler() {
    if (isset($_POST['district']) || isset($_POST['province'])) {
        $province = sanitize_text_field($_POST['province']);
        $district = sanitize_text_field($_POST['district']);

        // Xử lý logic để lấy danh sách quận dựa trên thành phố được chọn
        $provinces =array();

        if($province==='hanoi'){
            $provinces = array(
                array(
                    'id' => 25825, 
                    'name' => '46 QL32, Tân Tây Đô, Đan Phượng, Hà Nội, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7445.771644883401!2d105.701308!3d21.077222!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455ce6a3fffff%3A0xf279b13966b45876!2zS2h1IMSRw7QgdGjhu4sgVMOibiBUw6J5IMSQw7Q!5e0!3m2!1svi!2sus!4v1686235432051!5m2!1svi!2sus'
                ),
                array(
                    'id' => 25823, 
                    'name' => '222 Trần Duy Hưng, Trung Hoà, Cầu Giấy, Hà Nội 100000, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.631662884718!2d105.79054487443396!3d21.00739708851358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca8adaaaaab%3A0x29d0042949dba00b!2zMjIyIMSQLiBUcuG6p24gRHV5IEjGsG5nLCBUcnVuZyBIb8OgLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1686235460145!5m2!1svi!2sus'
                ),
                array(
                    'id' => 25821, 
                    'name' => '2R75+85W, Láng Hạ, Đống Đa, Hà Nội, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.96815200132!2d106.677896!3d10.774188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f27351bea1d%3A0xf3b313e3b93341bd!2zMjIyIMSQLiAzIFRow6FuZyAyLCBQaMaw4budbmcgMTIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1686235398291!5m2!1svi!2sus'
                ),
            );
        }
        if($province==='hochiminh'){
            $provinces = array(
                array(
                    'id' => 25834, 
                    'name' => '222 Đường 3/2, Phường 12 (Quận 10), Quận 10, Thành phố Hồ Chí Minh',
                    'idIframe' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7837.262704936301!2d106.64212300000001!3d10.839498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a928fd9ee7%3A0x9212ec848dbfcbb6!2sEGANY%20Tech!5e0!3m2!1sen!2sus!4v1686235278045!5m2!1sen!2sus'
                ),
                array(
                    'id' => 25831, 
                    'name' => '2 Nguyễn Bỉnh Khiêm, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh 700000, Vietnam',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.597117411932!2d106.69986400000002!3d10.78843!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f35518d0aff%3A0x60199a7bfeeebcf9!2sATM%20BIDV!5e0!3m2!1svi!2sus!4v1686235300128!5m2!1svi!2sus'
                ),
                array(
                    'id' => 25829, 
                    'name' => '123B Phan Đình Phùng, Phường 17, Phú Nhuận, Thành phố Hồ Chí Minh, Vietnam',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.443241817762!2d106.68308!3d10.794331000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175290d5eebe625%3A0x3124e09d783f3724!2s123b!5e0!3m2!1svi!2sus!4v1686235348749!5m2!1svi!2sus'
                ),
                array(
                    'id' => 25827, 
                    'name' => '150 Nguyễn Duy Cung, phường 15, quận Gò Vấp, HCM',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7837.263359712375!2d106.642364!3d10.839473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175299cc282f5d9%3A0x7a1a1342b1de2f3f!2zMTUwIE5ndXnhu4VuIER1eSBDdW5nLCBQaMaw4budbmcgMTIsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcyNzAxMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1686235367394!5m2!1svi!2sus'
                ),
            );
        }
        if($district==='cau-giay'){
            $provinces = array(
                array(
                    'id' => 25823, 
                    'name' => '222 Trần Duy Hưng, Trung Hoà, Cầu Giấy, Hà Nội 100000, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.631662884718!2d105.79054487443396!3d21.00739708851358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca8adaaaaab%3A0x29d0042949dba00b!2zMjIyIMSQLiBUcuG6p24gRHV5IEjGsG5nLCBUcnVuZyBIb8OgLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1686235460145!5m2!1svi!2sus'

                )
            );
        }
        if($district==='ba-dinh'){
            $provinces =array(
                array(
                    'id' => 25825, 
                    'name' => '46 QL32, Tân Tây Đô, Đan Phượng, Hà Nội, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7445.771644883401!2d105.701308!3d21.077222!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455ce6a3fffff%3A0xf279b13966b45876!2zS2h1IMSRw7QgdGjhu4sgVMOibiBUw6J5IMSQw7Q!5e0!3m2!1svi!2sus!4v1686235432051!5m2!1svi!2sus'

                )
            );
        }
        if($district==='hang-trong'){
            $provinces = array(
                array(
                    'id' => 25821, 
                    'name' => '2R75+85W, Láng Hạ, Đống Đa, Hà Nội, Việt Nam',
                    'idIframe' =>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.96815200132!2d106.677896!3d10.774188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f27351bea1d%3A0xf3b313e3b93341bd!2zMjIyIMSQLiAzIFRow6FuZyAyLCBQaMaw4budbmcgMTIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1686235398291!5m2!1svi!2sus'

                )
            );
        }
        if($district==='go-ap'){
            $provinces = array(
                array(
                    'id' => 25827, 
                    'name' => '150 Nguyễn Duy Cung, phường 15, quận Gò Vấp, HCM',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7837.263359712375!2d106.642364!3d10.839473!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175299cc282f5d9%3A0x7a1a1342b1de2f3f!2zMTUwIE5ndXnhu4VuIER1eSBDdW5nLCBQaMaw4budbmcgMTIsIEfDsiBW4bqlcCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcyNzAxMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1686235367394!5m2!1svi!2sus'

                )
            );
        }
        if($district==='quan-1'){
            $provinces =  array(
                array(
                    'id' => 25831, 
                    'name' => '2 Nguyễn Bỉnh Khiêm, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh 700000, Vietnam',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.597117411932!2d106.69986400000002!3d10.78843!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f35518d0aff%3A0x60199a7bfeeebcf9!2sATM%20BIDV!5e0!3m2!1svi!2sus!4v1686235300128!5m2!1svi!2sus'

                )
            );
        }
        if($district==='quan-10'){
            $provinces =array(
                array(
                    'id' => 25834, 
                    'name' => '222 Đường 3/2, Phường 12 (Quận 10), Quận 10, Thành phố Hồ Chí Minh',
                    'idIframe' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7837.262704936301!2d106.64212300000001!3d10.839498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a928fd9ee7%3A0x9212ec848dbfcbb6!2sEGANY%20Tech!5e0!3m2!1sen!2sus!4v1686235278045!5m2!1sen!2sus'

                )
            );
        }
        if($district==='phu-nhuan'){
            $provinces =array(
                array(
                    'id' => 25829, 
                    'name' => '123B Phan Đình Phùng, Phường 17, Phú Nhuận, Thành phố Hồ Chí Minh, Vietnam',
                    'idIframe'=>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.443241817762!2d106.68308!3d10.794331000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175290d5eebe625%3A0x3124e09d783f3724!2s123b!5e0!3m2!1svi!2sus!4v1686235348749!5m2!1svi!2sus'

                )
            );
        }
       
        if (!empty($provinces)) {
            $outputlist='';
            foreach ($provinces as $province) {
              $provinceId = $province['id'];
              $provinceName = $province['name'];
              $idIframe = $province['idIframe'];
              
              $outputlist .= '<div class="item-store" data-id="' . $provinceId . '">
                        <div class="content">
                            <h4>' . $provinceName . '</h4>
                            <textarea name="" class="iframe-textarea hidden" id="" cols="30" rows="10">&lt;iframe src="' . $idIframe . '" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"&gt;&lt;/iframe&gt;</textarea>
                        </div>  
                    </div>';
            }
            echo $outputlist;
          } else {
            echo 'Không tìm thấy kết quả.';
          }
       
    }
    wp_die();
}
add_action('wp_ajax_search_store', 'search_store_ajax_handler');
add_action('wp_ajax_nopriv_search_store', 'search_store_ajax_handler');
//end quận huyện 

//custom post type slider
function slider_custom_post_type(){
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Ảnh slider', //Tên post type dạng số nhiều
        'singular_name' => 'slider' //Tên post type dạng số ít
    );
 
    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Ảnh slider', //Mô tả của post type
        'supports' => array(
            'title',
            'thumbnail',
        ),
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-image', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
add_action('init', 'slider_custom_post_type');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fimetech_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on FIMETECH, use a find and replace
		* to change 'fimetech' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fimetech', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
		add_theme_support('wc-product-gallery-zoom');

	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'fimetech' ),
			'categoryProduct' => esc_html__( 'Menu danh mục sản phẩm ', 'fimetech' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fimetech_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'fimetech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fimetech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fimetech_content_width', 640 );
}
add_action( 'after_setup_theme', 'fimetech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fimetech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fimetech' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fimetech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fimetech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fimetech_scripts() {
	wp_enqueue_style( 'fimetech-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fimetech-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fimetech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_filter( 'the_title', 'short_title_product', 10, 2 );
function short_title_product( $title, $id ) {
if (get_post_type( $id ) === 'product' & !is_single() ) {
return wp_trim_words( $title, 5 ); // thay đổi số từ bạn muốn thêm
} else {
return $title;
}
}

add_action( 'wp_enqueue_scripts', 'fimetech_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

