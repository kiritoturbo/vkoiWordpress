<?php
$args = array(
    'post_type'      =>  'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    's'              => sanitize_text_field( $_GET['search_keyword'] ),
);

$query = new WP_Query( $args );

?> 
<div class="header-key d-flex align-items-center justify-content-between">
    <strong>Kết quả tìm kiếm <span class="key-text" id="key-text"></span></strong>
    <div class="view-mode-switcher">
        <a href="#" onclick="return false;" class="list active"><i class="fas fa-list"></i></a>
        <a href="#" onclick="return false;" class="grid"><i class="fas fa-th"></i></a>
    </div>
</div>
<div class="header-layout d-flex align-items-center justify-content-between">
    <h3 class="title-layout">Hiển thị kết quả theo:</h3>
    <div class="tabs-layout">
        <a href="#" onclick="return false;" class="layout-products active"><span>Sản phẩm</span></a>
        <a href="#" onclick="return false;" class="layout-news"><span>Bài viết</span></a>
    </div>
</div>
<div class="wrapper-list-result">
<?php
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
         // Display the search results with thumbnail
        //  wc_get_template_part( 'content', 'product' );
        ?>
        <div class="search-result">
            <!-- <div>Kết quả tìm kiếm cho <div id="header-key"></div></div> -->
            <div class="list_result">
                <div class="list_result_item d-flex">
                    <div class="result_item_image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                    <div class="result_descript ml-2">
                        <div class="result_descript_title mb-2">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="result_descript_price">
                            <?php global $product;?>
                            <?php echo $product->get_price()."đ"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        wp_reset_postdata();
    }
    ?>
<?php
} else {
    echo '<p class="message-result-search">No results found</p>';
}?>

</div>
<div class="view-all-key">
    <a href="#">Xem tất cả tìm kiếm có chứa <span class="key-text-all"></span></a>
</div>
<script>
     $('a.list').on('click', function() {
        $('.wrapper-list-result').css('display', 'block');
        $('.view-mode-switcher a.list').addClass('active');
        $('.view-mode-switcher a.grid').removeClass('active');
    });
        
    $('a.grid').on('click', function() {
        $('.wrapper-list-result').css('display', 'grid');
        $('.view-mode-switcher a.grid').addClass('active');
        $('.view-mode-switcher a.list').removeClass('active');
    });

    $('.layout-products').on('click', function() {alert('sdfasdf')});
    $('.layout-news').on('click', function() {alert('news');});

</script>



