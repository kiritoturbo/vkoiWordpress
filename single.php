<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FIMETECH
 */

get_header();
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
	<section class="container">
		<div class="category-main">
			<div class="row">
					<div class="category-main-left col-lg-9 col-12">
						<main id="primary" class="site-main">

							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'fimetech' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'fimetech' ) . '</span> <span class="nav-title">%title</span>',
									)
								);

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>

						</main><!-- #main -->
					</div>
					<div class="category-main-sidebar col-lg-3 col-12">
						<?php get_sidebar();?>
					</div>
			</div>
			<div class="category-new-page">
				<?php
					$categories = get_the_category($post->ID);
					if ($categories) 
					{
						$category_ids = array();
						foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				
						$args=array(
							'category__in' => $category_ids,
							'post__not_in' => array($post->ID),
							'showposts'=>5, // Số bài viết bạn muốn hiển thị.
							'caller_get_posts'=>1
						);
						$my_query = new wp_query($args);
						if( $my_query->have_posts() ) 
						{
							echo '<h3>Tin tức liên quan</h3><ul class="post-list d-flex flex-wrap post-archive">';
							while ($my_query->have_posts()):
							
								$my_query->the_post();
								get_template_part( 'template-parts/category-item', get_post_type() );
							endwhile;

						the_posts_navigation();
						}
						else{
							get_template_part( 'template-parts/category-item', 'none' );
						}
							echo '</ul>';
						}
				?>
			</div>
		</div>
	</section>	
<?php
get_footer();
?>