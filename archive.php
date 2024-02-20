<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

						<?php if ( have_posts() ) : ?>
							<h3 class="category-main-title"><?php the_archive_title( '<h1 class="page-title">', '</h1>' );?></h3>
							<div class="post-list d-flex flex-wrap post-archive">
								<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										* Include the Post-Type-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Type name) and that will be used instead.
										*/
										get_template_part( 'template-parts/category-item', get_post_type() );

									endwhile;

									the_posts_navigation();

									else :

									get_template_part( 'template-parts/category-item', 'none' );

								endif;
								?>
							</div>
					</main><!-- #main -->
			</div>
			<div class="category-main-sidebar col-lg-3 col-12">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
</section>


