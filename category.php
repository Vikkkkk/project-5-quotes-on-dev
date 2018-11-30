<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<i class="fas fa-quote-left"></i>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>				 
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="container">
   
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <div class="thequote"><?php the_content(); ?></div>
        </div><!-- .entry-content -->
        <div class="entry-meta">
            <h2 class="quotetitle">- <?php the_title(); ?></h2>
            
        </div><!-- .entry-meta -->
    </article><!-- #post-## -->
   
</div>

			<?php endwhile; ?>
		<?php endif; ?>
		
		</main><!-- #main -->
		<i class="fas fa-quote-right"></i>
	</div><!-- #primary -->

<?php get_footer(); ?>
