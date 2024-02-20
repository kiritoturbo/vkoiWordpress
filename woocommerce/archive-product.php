<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
	<section class="container">
        <div class="breadcrumb">
			<?php
			/**
			 * Hook: woocommerce_before_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 * @hooked WC_Structured_Data::generate_website_data() - 30
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
		</div>
    </section>
	<div class="sale-main container ">
		<section class="home-coupon d-flex">
			<!-- <div class="slick-track d-flex">
				<div class="coupon-image">
					<img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/coupon_1_img.webp" alt="">
				</div>
				<div class="coupon-descript">
					<div class="p-2">
						<h3>Nhập mã : 
							<?php 
							// Lấy danh sách mã phiếu ưu đãi từ cơ sở dữ liệu
							$args = array(
								'post_type' => 'shop_coupon',
								'posts_per_page' => -1,
								'post_status' => 'publish'
							);

							$coupons = get_posts($args);

							if (!empty($coupons)) {
								// Duyệt qua từng phiếu ưu đãi và lấy mã cùng mô tả
								foreach ($coupons as $coupon) {
									$coupon_code = $coupon->post_title;
									$coupon_description = get_the_excerpt($coupon->ID); // Lấy mô tả từ hàm get_the_excerpt()
									echo 'Mã phiếu ưu đãi: <span class="couponItem">' . $coupon_code . '</span><br>';
									echo 'Mô tả: ' . $coupon_description . '<br>';
								}
							} else {
								echo 'Không tìm thấy mã phiếu ưu đãi.';
							}

						?></h3>
						<p>Giảm 100% cho đơn hàng giá trị tối thiểu 500k.Mã giảm tối đa 300k</p>
						<div class="d-flex coupon_ft align-items-center justify-content-between">
							<button class="coupon-copy">Sao chép</button>
							<a class="coupon_info_toggle" href="#">Điều kiện</a>
						</div>
					</div>
				</div>
				<div class="coupon-gear"></div>
			</div>
			<div class="slick-track d-flex">
				<div class="coupon-image">
					<img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/coupon_1_img.webp" alt="">
				</div>
				<div class="coupon-descript">
					<div class="p-2">
						<h3>Nhập mã : EGAA0</h3>
						<p>Giảm 100% cho đơn hàng giá trị tối thiểu 500k.Mã giảm tối đa 300k</p>
						<div class="d-flex coupon_ft align-items-center justify-content-between">
							<button class="coupon-copy">Sao chép</button>
							<a class="coupon_info_toggle" href="#">Điều kiện</a>
						</div>
					</div>
				</div>
				<div class="coupon-gear"></div>
			</div>
			<div class="slick-track d-flex">
				<div class="coupon-image">
					<img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/coupon_1_img.webp" alt="">
				</div>
				<div class="coupon-descript">
					<div class="p-2">
						<h3>Nhập mã : EGAA0</h3>
						<p>Giảm 100% cho đơn hàng giá trị tối thiểu 500k.Mã giảm tối đa 300k</p>
						<div class="d-flex coupon_ft align-items-center justify-content-between">
							<button class="coupon-copy">Sao chép</button>
							<a class="coupon_info_toggle" href="#">Điều kiện</a>
						</div>
					</div>
				</div>
				<div class="coupon-gear"></div>
			</div>
			<div class="slick-track d-flex">
				<div class="coupon-image">
					<img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/coupon_1_img.webp" alt="">
				</div>
				<div class="coupon-descript">
					<div class="p-2">
						<h3>Nhập mã : EGAA0</h3>
						<p>Giảm 100% cho đơn hàng giá trị tối thiểu 500k.Mã giảm tối đa 300k</p>
						<div class="d-flex coupon_ft align-items-center justify-content-between">
							<button class="coupon-copy">Sao chép</button>
							<a class="coupon_info_toggle" href="#">Điều kiện</a>
						</div>
					</div>
				</div>
				<div class="coupon-gear"></div>
			</div> -->
			
			<?php
				// Lấy danh sách mã phiếu ưu đãi từ cơ sở dữ liệu
				$args = array(
					'post_type' => 'shop_coupon',
					'posts_per_page' => -1,
					'post_status' => 'publish'
				);
				$coupons = get_posts($args);

				if (!empty($coupons)) {
					foreach ($coupons as $coupon) {
						$coupon_code = $coupon->post_title;
						$coupon_description = get_the_excerpt($coupon->ID);
						?>
						<div class="slick-track d-flex">
							<div class="coupon-image">
								<img src="https://shopgym.antbone.vn/wp-content/themes/flatsome-child/lib/images/coupon_1_img.webp" alt="">
							</div>
							<div class="coupon-descript">
								<div class="p-2">
									<h3>Nhập mã : <span class="couponItem"><?php echo $coupon_code; ?></span></h3>
									<p>Mô tả: <?php echo $coupon_description; ?></p>
									<div class="d-flex coupon_ft align-items-center justify-content-between">
										<button class="coupon-copy"  onclick="copyCouponCode(this)">Sao chép</button>
										<a class="coupon_info_toggle" href="#">Điều kiện</a>
									</div>
									</div>
								</div>
							<div class="coupon-gear"></div>
						</div>
						<?php
					}
				} else {
					echo 'Không tìm thấy mã phiếu ưu đãi.';
				}
			?>
						
		</section>
	</div>
	<div class="container mt-5">
            <div class="row">
                <div class="shop-sidebar col-lg-3 ">
					<?php /**
					* Hook: woocommerce_sidebar.
					*
					* @hooked woocommerce_get_sidebar - 10
					*/
					do_action( 'woocommerce_sidebar' );?>
				</div>
				<div class="product-list-category col-lg-9 col-12">
                    <h1 class="product-list-title"><?php woocommerce_page_title(); ?>
					</h1>
                    <div class="sort-ordering d-flex w-100 mb-3">
                        <span>Sắp xếp: </span>
                        <ul class="d-flex ml-3">
                            <li>
                                <a href="#" id="sort-name-asc">Tên A → Z</a>
                            </li>
                            <li>
                                <a href="#" id="sort-name-desc">Tên Z → A</a>
                            </li>
                            <li>
                                <a href="#" id="sort-new">Hàng mới</a>
                            </li>
                            <li>
                                <a href="#" id="sort-price-asc">Giá tăng dần</a>
                            </li>
                            <li>
                                <a href="#" id="sort-price-desc">Giá giảm dần</a>
                            </li>
                            <li>
                                <a href="#" id="reset-filter">Xóa bộ lọc</a>
                            </li>
                        </ul>
							
                    </div>
					<div id="selectedFilters" class=" wpc-custom-selected-terms"></div>
					<div id="product-list">
							<?php
								if ( woocommerce_product_loop() ) {

									/**
									 * Hook: woocommerce_before_shop_loop.
									 *
									 * @hooked woocommerce_output_all_notices - 10
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									// do_action( 'woocommerce_before_shop_loop' );

									woocommerce_product_loop_start();

									if ( wc_get_loop_prop( 'total' ) ) {
										while ( have_posts() ) {
											the_post();

											/**
											 * Hook: woocommerce_shop_loop.
											 */
											do_action( 'woocommerce_shop_loop' );

											wc_get_template_part( 'content', 'product' );
										}
									}

									/**
									 * Hook: woocommerce_after_shop_loop.
									 *
									 * @hooked woocommerce_pagination - 10
									 */
									do_action( 'woocommerce_after_shop_loop' );

									woocommerce_product_loop_end();
								} else {
									/**
									 * Hook: woocommerce_no_products_found.
									 *
									 * @hooked wc_no_products_found - 10
									 */
									do_action( 'woocommerce_no_products_found' );
								}

								/**
								 * Hook: woocommerce_after_main_content.
								 *
								 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
								 */
								do_action( 'woocommerce_after_main_content' );
							?>
						</div>
					
				
					</div>
			</div>
	</div>
<?php
	get_footer();
?>