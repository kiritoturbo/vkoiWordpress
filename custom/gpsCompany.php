<?php 
//start chọn quận huyện 
// Hàm xử lý yêu cầu AJAX
function get_districts_ajax_handler() {
    if (isset($_POST['province'])) {
        $province = sanitize_text_field($_POST['province']);

        // Xử lý logic để lấy danh sách quận dựa trên thành phố được chọn
        $districts = array();

        if (trim($province) === 'hanoi') {
            $districts = array('Cầu Giấy', 'Ba Đình', 'Hàng Trống');
           
        } elseif ($province === 'hochiminh') {
            $districts = array('Gò Ấp','Quận 1', 'Phú Nhuận', 'Quận 10');
        }

        // Trả về danh sách quận dưới dạng HTML
        if (!empty($districts)) {
            $output = '<option value="">Chọn quận</option>';
            foreach ($districts as $district) {
                $output .= '<option value="' . sanitize_title($district) . '">' . esc_html($district) . '</option>';
            }
            echo $output;
        }
    }
    wp_die();
}
add_action('wp_ajax_get_districts', 'get_districts_ajax_handler');
add_action('wp_ajax_nopriv_get_districts', 'get_districts_ajax_handler');

?>