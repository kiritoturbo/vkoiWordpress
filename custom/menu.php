<?php 
add_filter('wp_nav_menu_objects', 'add_parent_menu_class');
function add_parent_menu_class($items)
{
    $parents = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }
    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'has-child';
        }
    }
    return $items;
}
function be_arrows_in_menus($item_output, $item, $depth, $args)
{

    if (in_array('menu-item-has-children', $item->classes)) {
        // $arrow = 0 == $depth ? '<i class="ri-arrow-down-s-line"></i>' : '<i class="ri-arrow-right-s-line"></i>';
        $arrow = '<i class="ri-arrow-down-s-line"></i>';
        $item_output = str_replace('</a>', $arrow . '</a>', $item_output);
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4);
class Custom_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $output .= "<li";

        // Thêm các classes của mục menu
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $output .= ' class="' . esc_attr(implode(' ', $classes)) . '"';

        // Thêm ID của mục menu
        $output .= ' id="menu-item-' . $item->ID . '"';

        $output .= '>';

        // Kiểm tra nếu là một danh mục sản phẩm WooCommerce
        if ('product_cat' === $item->object) {
            // Lấy ID của danh mục sản phẩm
            $category_id = $item->object_id;

            // Lấy URL ảnh đại diện của danh mục
            $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);

        }
        if (in_array('menu-item-has-children', $item->classes)) {
            $arrow = '<i class="fas fa-angle-right"></i>';
            if ($image_url) {
                // Hiển thị ảnh đại diện của danh mục
                $output .= '<a href="' . esc_url($item->url) . '" class="flexitem"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($item->title) . '" width="20" height="20">' . esc_html($item->title) . $arrow . '</a>';
            } else {
                // Hiển thị tiêu đề mục menu
                $output .= '<a href="' . esc_url($item->url) . '" class="flexitem">' . esc_html($item->title) . $arrow . '</a>';
            }
        } else {
            if ($image_url) {
                // Hiển thị ảnh đại diện của danh mục
                $output .= '<a href="' . esc_url($item->url) . '" class="flexitem"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($item->title) . '" width="20" height="20">' . esc_html($item->title) . '</a>';
            } else {
                // Hiển thị tiêu đề mục menu
                $output .= '<a href="' . esc_url($item->url) . '" class="flexitem">' . esc_html($item->title) . '</a>';
            }
        }

    }
    function end_el(&$output, $object, $depth = 0, $args = array())
    {
        $output .= '</li>';
    }
}
 //menu đa cấp
 class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    private $menu_stack = array(); // Ngăn xếp lưu trữ menu

    // Ghi đè phương thức start_el để thay đổi thẻ mở của mục menu
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // Xóa lớp CSS tùy chỉnh nếu có
        $custom_classes = array('custom-menu-item');
        $classes = array_diff($classes, $custom_classes);

        // Thêm các lớp CSS mặc định
        $classes[] = 'menu-item';
        if ($args->walker->has_children) {
            $classes[] = 'menu-item-has-children';
        }
        $output .= $indent . '<li class="' . esc_attr( implode( ' ', $classes ) ) . '">';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target     ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn        ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url        ) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a ' . $attributes . '>';
        // Thêm nút "quay lại" nếu mục menu có con và độ sâu lớn hơn 0
        if ( in_array( 'menu-item-has-children', $item->classes ) && $depth > 0 ) {
            $item_output .= '<button class="back-to-parent"><i class="fas fa-angle-left"></i></button>';
            // Lưu trữ menu hiện tại vào ngăn xếp
            array_push($this->menu_stack, $item->url);
        }
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $item_output .= '<span class="sub-menu-toggle"></span>';
        }
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

?>