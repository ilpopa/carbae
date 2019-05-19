<?php
/*
Template Name: Home Page
*/


get_header();
?>
    <div id="hero" class="hero-image">

        <div class="container">
            <h2><?php the_field('sub_title'); ?></h2>
            <h1><?php the_field('title'); ?></h1>
        </div>
        
        <?php 
        
        $image = get_field('background');
        
        if( $image ): ?>
        <style type="text/css">
            #hero {
                background-image: url(<?php echo $image['url']; ?>);
            }
        </style>
        <?php endif; ?>
    </div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        ?>
        
        <?php echo do_shortcode("[ninja_form id=1]"); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
