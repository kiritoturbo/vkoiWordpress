<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FIMETECH
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>> 
<!-- trả về đúng ngôn ngữ của nó  -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/Gym2/style.css">

	<?php wp_head(); ?>
	<!-- rất quan trọng ,dựa vào hook để viết code ,ở phần footer cx có  -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header class="header-container">
        <div class="background-image-top">
            <section class="header-wrapper container">
                <div id="top-bar" class="header-top">
                    <a href="<?php bloginfo( 'url' )?>"><img class="w-100" src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/top_banner.webp" alt="">
                </div>
            </section>
        </div>

        <div class="header-main container d-flex mt-4">
            <div class="logo d-flex align-items-center">
                <a href="<?php bloginfo( 'url' )?>">
                    
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img style="max-width: 150px;height: 64px;object-fit:cover;" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/Screenshot-2023-06-11-223211-copy.png" alt="">';
                        }
                    ?>
                </a>
                <div class="nav-menu-stuck">
                    <ul class="wide-nav-list d-flex align-items-center position-relative mb-0">
                        <li class="header-vertical-menu d-flex align-items-center">
                            <i class="fas fa-bars mr-1"></i>
                            <div class="vertical-menu-title">Danh mục sản phẩm <i class="fas fa-caret-down"></i>
                                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                                    <div class="navbar-nav">
                                        <ul class="header-nav-second">
                                            <?php wp_nav_menu(
                                                array(
                                                    'theme_location' => 'categoryProduct',
                                                    'container' => false,
                                                    'walker' => new Custom_Menu_Walker(),
                                                )
                                            ) ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="header-main-right d-flex align-items-center">
                <div class="nav-search">
                    <div class="nav-search-input">
                        <?php get_template_part('template-parts/search-input')?>
                        <!-- <?php get_search_form(); ?> -->
                    </div>

                    <div class="nav-search-drowdown">
                        <ul class="drowdown-descript d-flex flex-wrap">
                            <?php 
                                // Lấy danh sách tối đa 5 danh mục sản phẩm
                                $categories = get_terms( 'product_cat', array(
                                    'hide_empty' => false,
                                    'number'     => 5,
                                ) );
                                // In ra danh sách danh mục sản phẩm
                                foreach ( $categories as $category ) {
                                    ?>
                                        <li><a href="<?php echo get_term_link($category->slug, 'product_cat');?>"><?php echo $category->name;?></a></li>
                                    <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="nav-contact d-flex align-items-center">
                    <div class="nav-contact d-flex ml-3 ">
                        <a href="#">
                            <div class="contact d-flex align-items-center">
                                <div class="contact-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-phone-descript d-flex flex-column ">
                                    <span>Gọi mua hàng</span>
                                    <strong>19001393</strong>
                                </div>
                            </div>
                        </a>
                        <a href="<?php bloginfo('url'); ?>/he-thong-cua-hang/">
                            <div class="contact d-flex ml-3 align-items-center">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-phone-descript">
                                    <span>Hệ thống<br/> cửa hàng</span>
                                </div>
                            </div>
                        </a>

                        <!-- <?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?> -->
                        <div class="position-relative user-contact d-flex align-items-center">
                            <a href="<?php bloginfo('url'); ?>/dang-nhap">
                                <div class="contact d-flex ml-3 align-items-center">
                                        <div class="contact-icon">
                                            <div class="user-menu-avatar">
                                                <?php 
                                                    $user_id = get_current_user_id(); // Lấy ID của người dùng hiện tại
                                                    $avatar = get_avatar($user_id); // Lấy avatar của người dùng
                                                    if($user_id) {echo $avatar;}else{ echo '<i class="fas fa-user"></i>';}; // Hiển thị avatar
                                                ?>
                                            </div>
                                        </div>
                                        <div class="contact-phone-descript">
                                            <?php 
                                                $current_user = wp_get_current_user(); // Lấy thông tin người dùng hiện tại
                                                $username = $current_user->user_login; // Lấy tên đăng nhập của người dùng
                                                if($username){echo '<span>'.$username.'</span>';}else{echo '<span>Tài khoản<br/> đăng nhập</span>';};
                                            ?>
                                        </div>
                                    </div>
                            </a>    
                            <?php 
                            if($username){ echo '<a href="'. wp_logout_url(home_url()).'" class="logout-deskop position-absolute">Đăng xuất</a>';}
                            ?>
                        </div>


                        <a href="#">
                            <div class="contact d-flex ml-3 align-items-center mr-5">
                                <div class="contact-phone-descript">
                                <?php global $woocommerce; ob_start();?>
                                    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="cart-contents contact-cart d-flex align-items-center" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                                        <i class="fas fa-shopping-cart cart-image-icon position-relative">
                                            <span class="cart-image-icon-mount">
                                                <?php echo sprintf(_n('%d',$woocommerce->cart->get_cart_contents_count(), 'woothemes')); ?>
                                            </span>
                                        </i>
                                        <span>Giỏ hàng</span>
                                    </a>
                                    <div class="<?php if(is_cart()){ echo 'hidden';}else{echo 'widget_cart_mini';}  ?>">
                                        <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom container d-flex mt-2">
            <ul class="wide-nav-list d-flex align-items-center position-relative mb-0">
                <li class="header-vertical-menu d-flex align-items-center">
                    <i class="fas fa-bars mr-1"></i>
                    <div class="vertical-menu-title">Danh mục sản phẩm <i class="fas fa-caret-down"></i>
                        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                            <div class="navbar-nav">
                                <ul class="header-nav-second">
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'categoryProduct',
                                            'container' => false,
                                            'walker' => new Custom_Walker_Nav_Menu(),
                                        )
                                    ) ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </li>
            </ul>
            
			<div class="menu-main-primary d-flex align-items-center ml-3 mb-0">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class' => 'menu-main-primary d-flex align-items-center ml-3 mb-0'
						)
					);
				?>
			</div>
        </div>
       
        <div class="header-top-mobile  container">
           <div class="top-mobile hidden">
                <div class="menu-mobile menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="logo-mobile">
                    <a href="<?php bloginfo('url');?>">
                        <img src="https://shopgym.antbone.vn/wp-content/uploads/2023/06/Screenshot-2023-06-11-223211-copy.png" alt="">
                    </a>
                </div>
                <div class="cart-mobile">
                    <?php global $woocommerce; ob_start();?>
                    <a href="<?php  echo $woocommerce->cart->get_cart_url(); ?>" onclick="return false;" class="cart-contents contact-cart d-flex align-items-center" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                        <i class="fas fa-shopping-cart cart-image-icon position-relative">
                            <span class="cart-image-icon-mount">
                                <?php echo sprintf(_n('%d',$woocommerce->cart->get_cart_contents_count(), 'woothemes')); ?>
                            </span>
                        </i>
                    </a>
                    
                </div>
           </div>
           <div class="bottom-mobile">
                <div class="nav-search">
                    <div class="nav-search-input">
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search search-form" method="get" id="search-form"  role="search"  >
                            <div class="input-group mb-1">
                                <input type="search" id="search-input-mobile" class="form-control search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="Nhập tên sản phẩm..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-email btn-outline-secondary search-submit" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                                    <div id="search-result-mobile"></div>
                                </div>
                                </div>
                        </form>
                        <div id="overlaysearch2" class="hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="overlay" class="hidden"></div>
        <div class="mobile-menu">
                <ul class="menu">
                    <li class="user-menu d-flex align-items-center">
                        <div class="user-menu-avatar">
                            <?php 
                                $user_id = get_current_user_id(); // Lấy ID của người dùng hiện tại
                                $avatar = get_avatar($user_id); // Lấy avatar của người dùng
                                echo $avatar; // Hiển thị avatar
                            ?>
                        </div>
                        <div class="user-menu-body d-flex">
                            <a href="#" class="myAccount">
                                <?php 
                                    $current_user = wp_get_current_user(); // Lấy thông tin người dùng hiện tại
                                    $username = $current_user->user_login; // Lấy tên đăng nhập của người dùng
                                    if($username){echo $username;}else{echo 'Tài khoản';};
                                ?>
                            </a>
                            <small>
                                <a href="webWocommerce/dang-nhap" class="loginAccount">
                                    <?php 
                                        if($username){echo 'Đã đăng nhập';}else{echo 'Đăng nhập';};
                                    ?>
                                    
                                </a>
                            </small>
                        </div>
                    </li>
                    <!-- <li><a href="#">Trang chủ</a></li>
                    <li class="menu-item-has-children">
                    <a href="#">Sản phẩm</a>
                    <ul class="sub-menu">
                        <li><a href="#">Danh mục 1</a></li>
                        <li><a href="#">Danh mục 2</a></li>
                        <li><a href="#">Danh mục 3</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Giỏ hàng</a></li>
                    <li><a href="#">Liên hệ</a></li> -->
                    <li class="menu-item-has-children">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'container'      => false,
                                    'menu_class'     => 'primary-menu',
                                    'depth'          => 3,
                                    'walker'         => new Custom_Walker_Nav_Menu(),
                                )
                                
                            );
                        ?>
                    </li>
                </ul>
                <button class="remove-menu"><i class="fas fa-times"></i></button>
                <?php 
                    if($user_ID){
                        ?>
                        <a href="<?php echo wp_logout_url(); ?>" class="logout-user">Đăng xuất</a>
                    <?php
                    }
                    else{
                        
                    }
                ?>
        </div>
            
        <div class="<?php if(is_cart()){ echo 'hidden';}else{echo 'cart-content-mobile';} ?>">
            <span class="title-cart-content">Giỏ hàng</span>
            <div class="is-divider"></div>
            <button class="remove-cart"><i class="fas fa-times"></i></button>
            <div class="widget_cart_mini">
                <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
            </div>
        </div>
        
    </header>

	
		