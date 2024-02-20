<?php get_header(); ?>
    <section>
        <div class="slider-image container mt-3">
            <div class="row">
                <div class="col-12 ">
                    <section class="section home-slider row w-100 pr-0">
                        <div class="slider-left col-lg-9 col-12 pr-0 ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <?php 
                                    $args = array(
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                        'post_type' => 'slider'
                                    );
                                    $the_query = new WP_Query($args);
                                    $i = 1;
                                    ?>
                                    <?php if ($the_query->have_posts()) : ?>
                                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                            <?php if ($i == 1) { ?>
                                                <div class="carousel-item active">
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' =>'thumbnail d-block w-100'));?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="carousel-item">
                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' =>'thumbnail d-block w-100'));?>
                                                </div>
                                            <?php } ?>
                                            <?php $i++; ?>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                            <div class="carousel-item active">
                                            <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/e5ec90350b0d6dc99e117193f7d20dec-600x331.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                            <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/pngtree-lucky-koi-forward-koi-blessing-image_18246.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                            <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/pngtree-lucky-koi-forward-koi-blessing-image_18147.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        </div>
        
                        <div class="slider-right col-lg-3 col-12 pr-0">
                            <div class="slider-right-item mb-3">
                                <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/pngtree-lucky-koi-forward-koi-blessing-image_18250.jpg" alt="">
                            </div>
                            <div class="slider-right-item mb-3">
                                <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/pngtree-lucky-koi-forward-koi-blessing-image_18246.jpg" alt="">
                            </div>
                            <div class="slider-right-item mb-3">
                                <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/pngtree-lucky-koi-forward-koi-blessing-image_18147.jpg" alt="">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="category-main container mt-5">
            <section class="d-flex mt-3 mb-2 justify-content-center">
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Cá Koi</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Thức awnb cho cá Koi</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
                <div class="slick-slide p-0 d-flex align-items-center flex-column">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_1.webp" alt=""></a>
                    <p class="text-center p-2">Sản phẩm ưa chuộng</p>
                </div>
            </section>
        </div>
        <div class="sale-main container mt-4">
            <section class="home-coupon d-flex">
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
        <div class="banner-main container mt-4">
            <section class="threed-card d-flex justify-content-center w-100"> 
                <div class="card threed-wrapper">
                    <div class="wrapper">
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/banner_coll_1_1.png?v=130" class="cover-image" />
                    </div>
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/food-2.png?v=130" class="character" />
                </div>
                <div class="card threed-wrapper">
                    <div class="wrapper">
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/banner_coll_1_1.png?v=130" class="cover-image" />
                    </div>
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/food-2.png?v=130" class="character" />
                </div>
                <div class="card threed-wrapper">
                    <div class="wrapper">
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/banner_coll_1_1.png?v=130" class="cover-image" />
                    </div>
                    <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/food-2.png?v=130" class="character" />
                </div>
            </section>
        </div>
        <div class="container">
            <div class="row mt-5 mb-4 ">
                    <div class="col-12 title-list-one d-flex justify-content-between align-items-center">
                        <?php $args = array( 
                            'hide_empty' => 0,
                            'taxonomy' => 'product_cat',
                            // 'orderby' => 'id',
                            'parent' => 0,
                            'offset'=>1,
                            'number'=>1
                            ); 
                            $cates = get_categories( $args ); 
                            foreach ( $cates as $cate ) {  
                                $category_id = $cate->term_id;
                                ?>
                                <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                                    <h3 class="nav-left-bt"><?php echo $cate->name; ?></h3>
                                </a>
                        <?php } ?>
                            
                        <?php custom_product_category_buttons($category_id,1); ?>
                    </div>
            </div>
    
            <div class="row">
                <div class="col-sm-3 col-12  product-banner-items">
                    <div class="product-banner-image">
                        <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/section_product_tag_1_banner.webp" alt="">
                    </div>
                    <div class="product-banner-propose d-flex flex-wrap mt-5 ">
                        <a href="#">Tăng cơ</a>
                        <a href="#">Phục hồi cơ</a>
                        <a href="#">Tăng sức khỏe</a>
                    </div>
                </div>
                <div class="product-list-category col-sm-9 col-12 d-flex flex-wrap" id="target1">
                    <?php
                        // Lấy danh mục sản phẩm
                        $product_categories = get_terms( array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => true,// Hiển thị cả các danh mục không có sản phẩm nào được gán
                        ) );
                        // Hiển thị sản phẩm cho từng danh mục
                        foreach ( $product_categories as $category ) {
                            $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 10, // Số lượng sản phẩm muốn hiển thị
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                            );
                            
                            $products = new WP_Query( $args );
                            
                            if ( $products->have_posts() ) {
                                echo '<ul id="' . $category->slug . '-products" class="product-list flex-wrap w-100">';
                                
                                while ( $products->have_posts() ) {
                                    $products->the_post();
                                    ?>
                                        <?php wc_get_template_part( 'content', 'product' );?>
                                    <?php
                                }
                                echo '</ul>';
                                wp_reset_postdata();
                            } else {
                                echo 'Không có sản phẩm trong danh mục này.';
                            }
                        }
                    ?>

                </div>
            </div>
    
            <div class="row mt-4 d-flex justify-content-center">
                <div class="banner-main">
                    <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/section_hot_banner.webp" alt=""></a>
                </div>
            </div>
    
            <div class="row mt-4">
                <div class="col-12">
                    <div class="product-top-des d-flex justify-content-between align-items-center">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                        <?php $args = array( 
                            'hide_empty' => 0,
                            'taxonomy' => 'product_cat',
                            'parent' => 0,
                            'offset'=>4,
                            'number'=>1
                            ); 
                            $cates = get_categories( $args ); 
                            foreach ( $cates as $cate ) {  
                                $category_id = $cate->term_id;
                                ?>
                                <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                                    <h3 class="nav-left-bt"><?php echo $cate->name; ?></h3>
                                </a>
                        <?php } ?>
                            
                        <?php custom_product_category_buttons($category_id,2); ?>
                        </div>
                    </div>
                    
                    <div class="product-bottom-des d-flex flex-wrap mt-3 justify-content-start" id="target2">
                    <?php
                        // Lấy danh mục sản phẩm
                        $product_categories = get_terms( array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => true,// Hiển thị cả các danh mục không có sản phẩm nào được gán
                        ) );
                        // Hiển thị sản phẩm cho từng danh mục
                        foreach ( $product_categories as $category ) {
                            $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 10, // Số lượng sản phẩm muốn hiển thị
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'slug',
                                        'terms'    => $category->slug,
                                    ),
                                ),
                            );
                            
                            $products = new WP_Query( $args );
                            
                            if ( $products->have_posts() ) {
                                echo '<ul id="' . $category->slug . '-products" class="product-list flex-wrap w-100">';
                                
                                while ( $products->have_posts() ) {
                                    $products->the_post();
                                    ?>
                                        <?php wc_get_template_part( 'content', 'product' );?>
                                    <?php
                                }
                                echo '</ul>';
                                wp_reset_postdata();
                            } else {
                                echo 'Không có sản phẩm trong danh mục này.';
                            }
                        }
                    ?>

                    </div>
                </div>
                <div class="col-12 product-item-all d-flex mt-4 justify-content-center">
                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) )?>" type="button" class="btn btn-outline-danger">Xem tất cả <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="expand-list d-flex col-12">
    
                    <div class="expand-item expand-item-active position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_8_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
    
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_7_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
    
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_5_bg_img.jpg" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_2_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_4_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_9_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_8_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_8_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="expand-item expand-item-unactive position-relative m-2">
                        <a href="#" class="expand-background"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/expand_banner_8_bg_img.webp" alt=""></a>
                        <div class="expand-shadow">
                            <div class="expand-label d-flex align-items-center position-absolute justify-content-between">
                                <div class="expand-icon"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/coll_9.webp" alt=""></div>
                                <div class="expand-info"><a href="#">Bổ sung vitamin</a></div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="brand-heading mb-3">Thương hiệu sản phẩm</h3>
                    <div class="image-brand d-flex flex-wrap">
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_1.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_4.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_1.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_4.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_1.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_4.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_1.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_4.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_1.webp" alt=""></a>
                        </div>
                        <div class="image-brand-item">
                            <a href="#"><img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/brand_4.webp" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row mt-5">
            <div class="col-12 col-sm-6 mb-3">
                    <div class="post-list-all">
                        <h3 class="post-title mb-3">Gym cho nam</h3>
                        <div class="post-list ">
                            <?php
                                // Lấy ID của trang chủ
                                $homepage_id = get_option('page_on_front');
                                // Kiểm tra nếu trang chủ hiển thị các bài viết mới nhất
                                if (get_option('show_on_front') == 'posts') {
                                    // echo 'Người dùng đang sử dụng bố cục trang chủ mặc định của WordPress (Hiển thị các bài viết mới nhất).';
                                    ?>
                                    <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="post-item d-flex mb-4">
                                            <div class="post-item-image"><a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_id(),'full',array('class'=>'thumnail')); ?></div>
                                            <div class="post-item-descript">
                                                <div class="item-descript-title"><?php the_title()?></div>
                                                <div class="item-descript-time mt-3"><?php echo get_the_date('d/M/Y')?></div>
                                                <div class="item-descript-detail mt-3"><?php the_excerpt()?></div>
                                            </div>
                                        </div>
                                    <?php endwhile; else : ?>
                                    <p>Không có</p>
                                    <?php endif; ?>
                                <?php
                                } elseif ($homepage_id) {
                                    // echo 'Người dùng đã chọn một trang cố định làm trang chủ.';
                                    // echo 'ID của trang chủ: ' . $homepage_id;
                                    ?>
                                        <?php 
                                            $getposts = new WP_query(); 
                                            $getposts->query('post_status=publish&showposts=10&post_type=post');
                                        ?>
                                        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                            <div class="post-item d-flex mb-4">
                                                <div class="post-item-image"><a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_id(),'full',array('class'=>'thumnail')); ?></div>
                                                <div class="post-item-descript">
                                                    <div class="item-descript-title"><?php the_title()?></div>
                                                    <div class="item-descript-time mt-3"><?php echo get_the_date('d/M/Y')?></div>
                                                    <div class="item-descript-detail mt-3"><?php the_excerpt()?></div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    <?php
                                } else {
                                    echo 'Không thể xác định bố cục trang chủ.';
                                }
                                ?>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <div class="post-list-all">
                        <h3 class="post-title mb-3">Gym cho nam</h3>
                        <div class="post-list ">
                            <?php
                                // Lấy ID của trang chủ
                                $homepage_id = get_option('page_on_front');
                                // Kiểm tra nếu trang chủ hiển thị các bài viết mới nhất
                                if (get_option('show_on_front') == 'posts') {
                                    // echo 'Người dùng đang sử dụng bố cục trang chủ mặc định của WordPress (Hiển thị các bài viết mới nhất).';
                                    ?>
                                    <?php if (have_posts()) : ?>
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="post-item d-flex mb-4">
                                            <div class="post-item-image"><a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_id(),'full',array('class'=>'thumnail')); ?></div>
                                            <div class="post-item-descript">
                                                <div class="item-descript-title"><?php the_title()?></div>
                                                <div class="item-descript-time mt-3"><?php echo get_the_date('d/M/Y')?></div>
                                                <div class="item-descript-detail mt-3"><?php the_excerpt()?></div>
                                            </div>
                                        </div>
                                    <?php endwhile; else : ?>
                                    <p>Không có</p>
                                    <?php endif; ?>
                                <?php
                                } elseif ($homepage_id) {
                                    // echo 'Người dùng đã chọn một trang cố định làm trang chủ.';
                                    // echo 'ID của trang chủ: ' . $homepage_id;
                                    ?>
                                        <?php 
                                            $getposts = new WP_query(); 
                                            $getposts->query('post_status=publish&showposts=10&post_type=post');
                                        ?>
                                        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                            <div class="post-item d-flex mb-4">
                                                <div class="post-item-image"><a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_id(),'full',array('class'=>'thumnail')); ?></div>
                                                <div class="post-item-descript">
                                                    <div class="item-descript-title"><?php the_title()?></div>
                                                    <div class="item-descript-time mt-3"><?php echo get_the_date('d/M/Y')?></div>
                                                    <div class="item-descript-detail mt-3"><?php the_excerpt()?></div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    <?php
                                } else {
                                    echo 'Không thể xác định bố cục trang chủ.';
                                }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
<?php get_footer(); ?>