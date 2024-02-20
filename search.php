<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package FIMETECH
 */

get_header();
?>
<section class="container">
	<div class="category-main">
		<div class="row">
			<div class="category-main-left col-lg-9 col-12">
				<main id="primary" class="site-main">
					<div class="post-list d-flex flex-wrap post-archive">
						<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );
							endwhile;
							the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
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
<?php get_footer();?>
