<?php 
//widget lọc sản phẩm checkbox
// Đăng ký widget tùy chỉnh
function register_custom_filter_widget() {
    register_widget( 'Custom_Filter_Widget' );
}
add_action( 'widgets_init', 'register_custom_filter_widget' );

// Widget tùy chỉnh
class Custom_Filter_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'custom_filter_widget',
            __('Custom Filter Widget', 'text_domain'),
            array( 'description' => __( 'A custom widget for filtering products', 'text_domain' ), )
        );
    }

    // Hiển thị widget
    public function widget( $args, $instance ) {
        // Hiển thị tiêu đề widget
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Lấy danh sách các thuộc tính chung của sản phẩm
        $attributes = wc_get_attribute_taxonomies();
        echo '<div class="custom-filter-widget shop-sidebar">';

        if ($attributes) {
            foreach ($attributes as $attribute) {
                // Lấy tên thuộc tính
                $attribute_name = $attribute->attribute_name;

                // Lấy tên chủng loại của thuộc tính
                $attribute_label = $attribute->attribute_label;
                // // Lấy slug của thuộc tính
                $attribute_slug = 'pa_' . $attribute_name;
                // echo $attribute_name.'<br />';
                // echo $attribute_label.'<br />';
                // Lấy tất cả các thuộc tính (terms) của taxonomy 'pa_manufacturer' liên kết với sản phẩm 'product'.
                echo '<h4 class="shop-sidebar-title">' . __( $attribute_label, 'text_domain') . '</h4>';
                echo '<div class="shop-sidebar-filter">
                        <div class="filter-list">';
                            $taxonomy = $attribute_slug;
                            $args = array(
                                'taxonomy' => $taxonomy,
                                'hide_empty' => false, // Hiển thị cả những thuộc tính không có sản phẩm nào liên kết.
                            );

                            $terms = get_terms($args);

                            // Kiểm tra nếu có thuộc tính tồn tại.
                            if (!empty($terms) && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    // Lấy tên của thuộc tính (term name).
                                    $term_name = $term->name;
                                    // Lấy đường dẫn tĩnh (slug) của thuộc tính (term slug).
                                    $term_slug = $term->slug;

                                    // In ra tên và slug của thuộc tính.
                                    // echo "Tên: " . $term_name . "<br>";
                                    // echo "Slug: " . $term_slug . "<br>";

                                    // Nếu bạn muốn tạo liên kết đến trang hiển thị các sản phẩm có thuộc tính này,
                                    // bạn có thể sử dụng get_term_link() như sau:
                                    // $term_link = get_term_link($term);
                                    // echo "Đường dẫn liên kết: " . $term_link . "<br><br>";
                                    echo '<label><input type="checkbox" name="' . $attribute_name . '" value="'. $term_name .'" />'. $term_name .'</label>';
                                }
                            } else {
                                echo "Không có thuộc tính nào được tìm thấy.";
                            }
                echo '</div></div>';
            }
        } else {
            echo "Không tìm thấy thuộc tính sản phẩm nào.";
        }

        // // Hiển thị bộ lọc sản phẩm
        // echo '<div class="custom-filter-widget shop-sidebar">';

        // // Hiển thị danh sách các thuộc tính để lọc
        // echo '<h4 class="shop-sidebar-title">' . __('Hãng sản xuất', 'text_domain') . '</h4>';
        // echo '<div class="shop-sidebar-filter">
        //             <div class="filter-list">';
        // echo '<label><input type="checkbox" name="manufacturer" value="Nutrabolics" />Nutrabolics</label>';
        // echo '<label><input type="checkbox" name="manufacturer" value="Muscletech" />Muscletech</label>';
        // echo '<label><input type="checkbox" name="manufacturer" value="OstroVit" />OstroVit</label>';
        // echo '</div></div>';

        // echo '<div class="shop-sidebar">
        // <div class="shop-sidebar-filter">
        //            <div class="filter-list">';
        // echo '<h4 class="shop-sidebar-title">' . __('Giá', 'text_domain') . '</h4>';
        // echo '<label><input type="checkbox" name="price" value="0-100000" />Giá dưới 100,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="100000-200000" />100,000₫ - 200,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="200000-300000" />200,000₫ - 300,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="300000-500000" />300,000₫ - 500,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="500000-1000000" />500,000₫ - 1,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="1000000-2000000" />1,000,000₫ - 2,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="2000000-3000000" />2,000,000₫ - 3,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="3000000-4000000" />3,000,000₫ - 4,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="4000000-5000000" />4,000,000₫ - 5,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="5000000-6000000" />5,000,000₫ - 6,000,000₫</label>';
        // echo '<label><input type="checkbox" name="price" value="7000000" />Giá trên 7,000,000₫</label>';
        // echo '</div></div></div>';
        

        // echo '<div class="shop-sidebar">
        //      <div class="shop-sidebar-filter">
        //                 <div class="filter-list">';
        // echo '<h4 class="shop-sidebar-title">' . __('Bảo hành', 'text_domain') . '</h4>';
        // echo '<label><input type="checkbox" name="warranty" value="6" />06 tháng</label>';
        // echo '<label><input type="checkbox" name="warranty" value="12" />12 tháng</label>';
        // echo '<label><input type="checkbox" name="warranty" value=24" />24 tháng</label>';
        // echo '</div></div></div>';

        // echo '<div class="shop-sidebar">
        //      <div class="shop-sidebar-filter">
        //                 <div class="filter-list">';
        // echo '<h4 class="shop-sidebar-title">' . __('Loại sản phẩm', 'text_domain') . '</h4>';
        // echo '<label><input type="checkbox" name="type" value="15lbs" />15lbs</label>';
        // echo '<label><input type="checkbox" name="type" value="13lbs" />13lbs</label>';
        // echo '<label><input type="checkbox" name="type" value="6kg" />6kg</label>';
        // echo '<label><input type="checkbox" name="type" value="8.8lbs" />8.8lbs</label>';
        // echo '<label><input type="checkbox" name="type" value="6lbs" />6lbs</label>';
        // echo '</div></div></div>';


        // echo '<br>';
        // echo '<button class="custom-filter-submit">' . __('Filter', 'text_domain') . '</button>';
        // echo '</div>';

        echo $args['after_widget'];
    }

    // Cập nhật cài đặt widget
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

    // Form cài đặt widget
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

}

// Xử lý yêu cầu AJAX để lọc sản phẩm
add_action( 'wp_ajax_custom_product_filter', 'custom_product_filter_callback' );
add_action( 'wp_ajax_nopriv_custom_product_filter', 'custom_product_filter_callback' );
function custom_product_filter_callback() {
    $attributes = isset( $_POST['attributes'] ) ? $_POST['attributes'] : array();

    // Xây dựng truy vấn cho sản phẩm
    $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(),
    );

    // Xử lý các thuộc tính đã chọn
    foreach ( $attributes as $attribute_name => $attribute_values ) {
        if ( ! empty( $attribute_values ) ) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'pa_' . $attribute_name,
                'field' => 'slug',
                'terms' => $attribute_values,
            );
        }
    }

    // Truy vấn sản phẩm
    $products_query = new WP_Query( $query_args );

    // Kiểm tra kết quả trả về
    if ( $products_query->have_posts() ) {
        ob_start();

        // Hiển thị sản phẩm mới
        while ( $products_query->have_posts() ) {
            $products_query->the_post();
            wc_get_template_part( 'content', 'product' ); // Hoặc sử dụng template của bạn
        }

        $products_html = ob_get_clean();

        // Trả về kết quả AJAX thành công
        wp_send_json_success( array(
            'products' => $products_html,
        ) );
    } else {
        // Trả về kết quả AJAX với lỗi (nếu có)
        wp_send_json_error( array(
            'error' => __( 'No products found.', 'text_domain' ),
        ) );
    }

    wp_reset_postdata();
    exit;
}

//end lọc sản phẩm 
?>