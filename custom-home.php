<?php
/*
Template Name: Home Page
*/


get_header();
?>
    <div id="hero" class="hero-image">

        <div class="title-container">
            <h1><?php the_field('title'); ?></h1>
            <h2><?php the_field('sub_title'); ?></h2>
        </div>
        
        <?php 
        
        $image = get_field('background');
        
        if( $image ): ?>
        <style type="text/css">
            #hero {
                background-image: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(31, 22, 33, 0.4)), url(<?php echo $image['url']; ?>);
            }
        </style>
        <?php endif; ?>
    </div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <div class="nostot">

        <?php 
            $args = array( 'post_type' => 'nosto', 'posts_per_page' => 10, 'orderby' => 'post_date', );
            $the_query = new WP_Query( $args ); 
            ?>
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <section class="nosto">
                <?php if(has_post_thumbnail()) { ?>  
                    <div class="nosto-image w-50">
                        <?php  
                        //the_post_thumbnail();
                        ?>
                        <div class="nosto-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">

                        </div>
                    </div>
                <?php  } ?>
                        
                <div class="nostotext w-50">
                    <h1 class="nosto-title"><?php the_title() ;?></h1>
                    <div class="nosto-content"><?php the_content() ?></div>
                </div>
            </section>
            <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
            <?php wp_reset_query(); ?>

        </div>
        <!-- Post cards -->
		<section class="front-page-posts wrapper">
            <div class="flex-posts">

                <?php 
                $args = array( 'post_type' => 'post', 'posts_per_page' => 4 );
                $the_query = new WP_Query( $args ); 
                ?>
                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <article class="card">
                    <div class="card-image">
                        <?php if(has_post_thumbnail()) {  
                            the_post_thumbnail(); 
                        } ?>
                    </div>
                    
                    <div class="article-text">
                        <h1 class="article-title"><?php the_title() ;?></h1>
                        <div class="article-content"><?php the_excerpt() ?></div>
                        <a class="article-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Lue lisää</a>
                    </div>
                </article>
                <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </section>

        <section class="contact">
            <?php echo do_shortcode("[ninja_form id=1]"); ?>
        </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
