<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<!-- <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"></p> -->
<div class="meta-pro-single d-flex">
	<div class="meta-pro-brand">
		<span>Thương hiệu:</span>
		<a href="#">S</a>
	</div>
	<div class="meta-pro-sku">
		<span>Mã sản phẩm</span>
		<a href="#">Đang cập nhật</a>
	</div>
</div>
<div class="product-single-compare mt-3 mb-4">
	<div class="d-flex align-items-center"><?php echo do_shortcode('[yith_compare_button]')?></div>
</div>
<div class="product-single-price">
	<span class="amount"><?php echo $product->get_price_html(); ?></span>
</div>