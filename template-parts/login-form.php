<?php /* Template Name: login form */ ?>
<?php get_header(); ?>

<section class="container">
    <main id="site-content">
        <div class="section-inner">
    
            <?php
            $home_url = get_home_url();
            if ( is_user_logged_in() ) {
    
                echo 'Bạn đã đăng nhập rồi. <a href="'.wp_logout_url($home_url).'">Đăng xuất</a> ?';
    
            } else {
    
                $args = array(
                    'redirect' => $home_url,
                );
    
                wp_login_form( $args );
    
            }
            ?>
    
        </div>
    </main>
</section>

<?php get_footer(); ?>