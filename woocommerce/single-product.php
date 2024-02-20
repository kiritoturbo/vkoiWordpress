<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>
	<section class="container-single-background">
        <section class="container">
            <div class="breadcrumb">
			<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
            </div>
        </section>
                
            </div>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

            <?php
                /**
                 * woocommerce_after_main_content hook.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
            ?>

			<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				// do_action( 'woocommerce_sidebar' );
                //comments_template( 'woocommerce/single-product-reviews' );
			?>
        <div class="container-single-background">
            <div class="product-viewed container">
                <div style="background-color: #fff;">
                    <h3>Sản phẩm đã xem </h3>
                    <div class="product-single-item col-12 col-lg-12 d-flex flex-wrap">
                        <?php get_template_part('product-viewed');?> 
                    </div>   
                </div>   
            </div>
        </div>
        <div class="container ">
            <div class="product-single-footer mt-5">
                <div class="product-detail__review">
                    <h3 class="title-single-product">Đánh giá sản phẩm</h3>
                </div>
                <div class="box-statistic-rate d-flex justify-content-center">
                    <div class="rate-ratio flex-grow-1 text-center">
                        <p>Đánh giá trung bình</p>
                        <p>0/5</p>
                        <p>0 người đánh giá</p>
                    </div>
                    <div class="rate-detail flex-grow-1 text-center ">
                        <div class="rate-detail__item d-flex align-items-center justify-content-center">
                            <div class="number-star">
                                <span>5</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="progress-bar-rate ml-3">
                                <div class="progress-bar-default"></div>
                                <div class="progress-bar-active"></div>
                            </div>
                            <p class="number-rate mb-0 ml-2">0 đánh giá</p>
                        </div>
                        <div class="rate-detail__item d-flex align-items-center justify-content-center">
                            <div class="number-star">
                                <span>4</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="progress-bar-rate ml-3">
                                <div class="progress-bar-default"></div>
                                <div class="progress-bar-active"></div>
                            </div>
                            <p class="number-rate mb-0 ml-2">0 đánh giá</p>
                        </div>
                        <div class="rate-detail__item d-flex align-items-center justify-content-center">
                            <div class="number-star">
                                <span>3</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="progress-bar-rate ml-3">
                                <div class="progress-bar-default"></div>
                                <div class="progress-bar-active"></div>
                            </div>
                            <p class="number-rate mb-0 ml-2">0 đánh giá</p>
                        </div>
                        <div class="rate-detail__item d-flex align-items-center justify-content-center">
                            <div class="number-star">
                                <span>2</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="progress-bar-rate ml-3">
                                <div class="progress-bar-default"></div>
                                <div class="progress-bar-active"></div>
                            </div>
                            <p class="number-rate mb-0 ml-2">0 đánh giá</p>
                        </div>
                        <div class="rate-detail__item d-flex align-items-center justify-content-center">
                            <div class="number-star">
                                <span>1</span>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="progress-bar-rate ml-3">
                                <div class="progress-bar-default"></div>
                                <div class="progress-bar-active"></div>
                            </div>
                            <p class="number-rate mb-0 ml-2">0 đánh giá</p>
                        </div>
                       
                    </div>
                    <div class="rate-right flex-grow-1 text-center d-flex align-items-center justify-content-center">
                        <a href="#" class="more-single-pro">Viết bình luận</a>
                    </div>
                </div>
                <div class="product-comments">
                    <div class="product-detail__review mt-4">
                        <h3 class="title-single-product">Đánh giá</h3>
                    </div>
                    <p>Chưa có đánh giá nào</p>
                </div>
                <div class="review_form_wrapper">
                    <div class="review_form">
                        <h3 class="comment-reply-title">Hãy là người đầu tiên nhận xét “Chia sẻ Ostrovit Collagen + Vitamin C 400g” </h3>
                        <form action="" class="comment-form">
                            <div class="comment-form-rating ">
                                <label for="">Đánh giá của bạn<span class="required">*</span></label>
                                <div class="select-option-list position-relative">
                                    <select name="rating" id="rating" required="">
                                        <option value="">Xếp hạng…</option>
                                        <option value="5">Rất tốt</option>
                                        <option value="4">Tốt</option>
                                        <option value="3">Trung bình</option>
                                        <option value="2">Không tệ</option>
                                        <option value="1">Rất tệ</option>
                                    </select>
                                    <span class="arrow-down position-absolute"><i class="fas fa-angle-down"></i></span>
                                </div>
                            </div>
                            <p class="comment-form-comment mt-3">
                                <label for="comment">Nhận xét của bạn&nbsp;<span class="required">*</span></label>
                                <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                            </p>
                            <div class="d-flex combo-input">
                                <p class="comment-form-author d-inline-block">
                                    <label for="author">Tên&nbsp;<span class="required">*</span></label>
                                    <input id="author" name="author" type="text" value="" size="30" required="">
                                </p>
                                <p class="comment-form-email d-inline-block">
                                    <label for="email">Email&nbsp;<span class="required">*</span></label>
                                    <input id="email" name="email" type="email" value="" size="30" required="">
                                </p>
                            </div>
                            <p class="comment-form-cookies-consent d-flex align-items-center">
                                <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> 
                                <label for="wp-comment-cookies-consent">Lưu tên của tôi, email, và trang web trong trình duyệt này cho lần bình luận kế tiếp của tôi.</label>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Gửi đi"> 
                                <input type="hidden" name="comment_post_ID" value="26031" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="productAnchor-wrap mt-3">
                    <div class="productAnchor-wrap-item d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            <div class="productAnchor-image">
                                <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/upload_183c4bc80ac6406aa6e248ea9b2fec40_grande.webp" alt="">
                            </div>
                            <div class="productAnchor-info-content pt-3">
                                <span class="productAnchor-info-name">Chia sẻ Ostrovit Collagen + Vitamin C 400g</span>
                                <p class="price"><span class="amount">1980000đ</span></p>
                            </div>
                        </div>
                        <div class="productAnchor-info-buttons">
                            <form action="" class="cart d-flex align-items-center">
                                <label for="">Số lượng:</label>
                                <div>
                                    <div class="quantity buttons_added d-inline-flex">
                                        <input type="button" value="-" class="minus button is-form">
                                        <input type="number" id="quantity_64995c167caea" class="input-text qty text"  value="2" title="SL" size="4" placeholder="" inputmode="numeric">
                                        <input type="button" value="+" class="plus button is-form">	
                                    </div>
                                </div>
                                <button class="single_add_to_cart_button button">
                                    Thêm vào giỏ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
