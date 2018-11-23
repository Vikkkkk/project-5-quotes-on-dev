<?php
/**
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container">
                <i class="fas fa-quote-left"></i>
                <section class="quote-submission">
                    <header class="entry-header">
                        <!-- some template tags allow you to add the html element inside the brackets -->
                        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                    </header>
                    <?php if(is_user_logged_in() && current_user_can('edit_posts')):?>
                        <div class="quote-submission-wraper">
                            <form name="quoteForm" id="quote-submission-form">
                                <div class="form-fields">
                                    <div>
                                        <label for="quote-author">Author of Quote</label>
                                        <input type="text" name="quote_author" id="quote-author" required>
                                    </div>
                                    <div> 
                                        <label for="quote-content">Quote</label>
                                        <textarea name="quote_content" id="quote-content" cols="20" rows="3" required></textarea>  <!-- row and cols are like the default width andheight for the tztarea -->
                                    </div>
                                    <div>
                                        <label for="quote-source">Where did you find this quote? (e.g. book name)</label>
                                        <input type="text" name="quote_source" id="quote-source">
                                    </div>
                                    <div>
                                        <label for="quote-source-url">Provide the URL of the quote source, if avaliable</label>
                                        <input type="url" name="quote_source_url" id="quote-source-url">
                                    </div>
                                </div>
                                <input class="submitbutton"type="submit" value="Submit Quote">
                            </form>
                        </div> <!-- quote-submission-warpper -->

                        <?php else: ?>
                        <p> Sorry, You must be logged in to submit a quote! </p>
                        <p>
                            <?php echo sprintf('<a href="%1s">%2s</a>',esc_url(wp_login_url() ), 'Cilck here to login.');?>
                            <!-- %1s is a token, the number 1 means the 1st parameter after the comma, 2 means 2nd etc. -->
                        </p>

                    <?php endif;?>
                </section>
                <i class="fas fa-quote-right"></i>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
