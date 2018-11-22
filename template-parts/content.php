<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */
$source = get_post_meta(get_the_ID(), '_qod_quote_source', true);
$source_url = get_post_meta(get_the_ID(), '_qod_quote_source_url', true);
?>

<div class="container">
    <i class="fas fa-quote-left"></i>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <div class="thequote"><?php the_content(); ?></div>
        </div><!-- .entry-content -->
        <div class="entry-meta">
            <h2 class="quotetitle">- <?php the_title(); ?></h2>
            
        </div><!-- .entry-meta -->
    </article><!-- #post-## -->
    <i class="fas fa-quote-right"></i>
</div>
<?php
if (is_home() || is_single()): ?>
    <button type="button" id="new-quote-button">Show Me Another!</button>
<?php endif ?>
