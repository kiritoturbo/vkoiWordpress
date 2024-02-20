<?php
// Đánh giá sản phẩm có hình
add_filter( 'woocommerce_product_tabs', 'wpshare247_remove_product_tabs', 98 );
function wpshare247_remove_product_tabs($tabs){
    unset( $tabs['reviews'] );
    $tabs['wpshare247-custom-reviews'] = array(
        'title'     => __( 'Reviews', 'woocommerce' ),
        'priority'     => 50,
        'callback'     => 'wpshare247_new_product_tab_content'
    );
    return $tabs;
}
function wpshare247_new_product_tab_content(){
    global $product;
    $product_id = $product->get_id();
    $arr_prepare[] = $product_id;
    global $wpdb;
    $sql = "
        SELECT cm.* 
        FROM `{$wpdb->prefix}commentmeta` cm 
        INNER JOIN `{$wpdb->prefix}comments` c  ON cm.comment_id = c.comment_ID
        WHERE `meta_key` = 'ivole_review_image2' AND `meta_value` > 0 AND c.comment_approved = 1 AND c.comment_post_ID = %d
        ORDER BY meta_id DESC
    ";
    $arr_cm = $wpdb->get_results( $wpdb->prepare( $sql, $arr_prepare ), ARRAY_A );
    $review_count = $product->get_review_count();
    $average = $product->get_average_rating();
    ?>
    <style type="text/css">
        #tab-wpshare247-custom-reviews{
            border: 1px solid #ccc;
            padding: 30px 20px;
            border-radius: 5px;
        }
        #wpshare247-rating-list-total .pbar{
            width: 300px;
            height: 3px;
            background: #ccc;
            position: relative;
            margin-top: 13px;
            margin-left: 5px;
            margin-right: 5px;
        }
        #wpshare247-rating-list-total{
            margin: 0 0 0 20px;
            padding: 0;
            list-style: none;
        }
        #wpshare247-rating-list-total li{
            margin-left: 0;
        }
        #wpshare247-rating-list-total .pbar i{
            height: 3px;
            background: #f00;
            position: absolute;
            left: 0;
            top: 0;
        }
        body:not(.theme-flatsome) #reviews .commentlist li{
            border-bottom: 1px solid #ccc !important;
            padding-bottom: 10px;
        }
        #wpshare247-verified-buy{
            font-style: italic;
            color: #4CAF50;
        }
        #wpshare247-cm-gallery{
            margin-bottom: 20px;
            float: left;
            width: 100%;
        }
        #wpshare247-rating-container .star-rating{
             display: inline-block;
                width: 16px;
                margin: 0;
                margin-top: 4px;
                margin-left: 5px;
        }
        #wpshare247-rating-list-total li {
            display: flex;
        }
        .wpshare247-rating-average-top{
            font-size: 2rem;
        }
        #wpshare247-rating-container .wpshare247-rating-average-top .star-rating{
            font-size: 2rem;
            width: 33px;
            margin: 0;
        }
        .wpshare247-rating-average-text, .wpshare247-rating-average-top{
             color: #FF5722;
        }
        #wpshare247-rating-average{ 
            text-align: center;
            border-right: 1px solid #ccc;
            padding-right: 10px;
            padding-top: 40px;
        }
        #wpshare247-rating-top{
            display: flex;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding: 10px;
        }
    </style>
    <div id="wpshare247-rating-container">
        <div id="wpshare247-rating-top">
            <div id="wpshare247-rating-average">
                <div class="wpshare247-rating-average-top"><?php echo $average; ?> <div class="star-rating"><span style="width: 100%;"></span></div></div>
                <div class="wpshare247-rating-average-text">ĐÁNH GIÁ TRUNG BÌNH</div>
            </div>
            <ul id="wpshare247-rating-list-total">
                <?php 
                for($i=5; $i >0; $i--){
                    $star_t = $product->get_rating_count($i);
                    $p = round( ($star_t / $review_count) * 100 );
                    ?>
                    <li><span><?php echo $i;?></span> <div class="star-rating"><span style="width: 100%;"></span></div> <span class="pbar"><i style="width: <?php echo $p; ?>%;"></i></span> <span><?php echo $p; ?>% (<?php echo $star_t;?>)</span></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php 
        if ($arr_cm) {
        ?>
        <div id="wpshare247-cm-gallery" class="cr-comment-images cr-comment-videos">
            <?php 
            foreach ($arr_cm as $cm_item) {
                $attachment_id = $cm_item['meta_value'];
                $attachment_url = wp_get_attachment_image_url( $attachment_id, '', false );
                ?>
                <div class="iv-comment-image">
                    <a href="<?php echo $attachment_url;?>" class="cr-comment-a">
                        <?php echo wp_get_attachment_image( $attachment_id, '', false, array('alt' => '') ); ?>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php 
        }
        ?>
    </div>
    <?php
    comments_template();
}