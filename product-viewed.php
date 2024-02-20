<?php if(isset($_SESSION["viewed"]) && $_SESSION["viewed"]){
	$data = $_SESSION["viewed"];
	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'post__in'	=> $data
	);
?>
<?php $getposts = new WP_query( $args);?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
<?php global $product; ?>
    <?php wc_get_template_part( 'content', 'product' );?>
<?php endwhile; wp_reset_postdata(); 
} else { ?> 
	<p>Không có sản phẩm nào đã xem!</p>
<?php } ?>
