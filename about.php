<?php
/*
Template Name: About
*/
?>

<?php get_header(); //appel du template header.php  ?>


    <div id="content" class="container">


        <div class="about-container">

            <?php

            $args = array('post_type' => 'about');

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                        <div class="about-titles">
                            <div class="about-title-top">
                                <h1><?php the_field('tfm_title'); ?></h1>
                            </div>
                            <div class="about-title-bot">
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                    <div class="about-content">
                        <div class="who-i-am">
                            <p>
                                <?php the_field('paragraph1'); ?>
                            </p>
                        </div>
                        <div class="the-site">
                            <h4><?php the_field('title2'); ?></h4>
                            <p>
                                <?php the_field('paragraph2'); ?>
                            </p>
                        </div>
                        <div class="tfm-style">
                            <h4><?php the_field('title3'); ?></h4>
                            <p>
                                <?php the_field('paragraph3'); ?>
                            </p>
                        </div>
                    </div>

                    <!-- end-card -->
                    <?php
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            } else {
                // no posts found
            }

            ?>
        </div>



    </div> <!-- /content -->

<?php get_footer();

