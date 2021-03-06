<?php
/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="container">
    <i class="fas fa-quote-left"></i>
    <section class="browse-archives">
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">','</h1>');?>
                </header>
                <div class="post-archives">
                    <h2>Quote Authors</h2>
                    <ul>
                        <?php $posts = get_posts( 'posts_per_page=-1' ); //the -1 means "to the end" which means all
                            foreach($posts as $post) : setup_postdata($post);
                        ?>
                        <li>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>

                </div><!-- .post archives -->
                <div class="category-archives">
                    <h2>Categories</h2>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>  <!-- the 'title_li =' is to get rid of the default li title (which is category) -->
                    </ul>
                </div> <!-- category-archives -->
                <div class="tag-archives">
                    <h2>Tags</h2>
                    <?php wp_tag_cloud( array(   //the tag cloud let you control all tags
                        'smallest' => 1,
                        'largest' => 1,
                        'unit' => 'rem',
                        'format' => 'list'
                    ) ); ?>
                </div>
            </section>
    <i class="fas fa-quote-right"></i>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>


