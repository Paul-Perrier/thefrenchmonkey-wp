<?php
/*
Template Name: Bundles
*/
?>

<?php get_header(); //appel du template header.php  ?>


    <div id="content" class="container">

        <div class="card_container">

            <?php

            $args = array('post_type' => 'bundles');

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                    <!-- card -->
                    <div class="showcase-bundle-container">

                        <div class="bundle-picture">
                            <?php $url = wp_get_attachment_url( get_field('picture') ); ?>
                            <img src="<?php echo $url ?>" alt="">
                        </div>

                        <div class="bundle-right-information">
                            <div class="bundle-title">
                                <span><?php the_field('title') ?></span>
                            </div>
                            <div class="bundle-description">
                                <p><?php the_field('description') ?></p>
                            </div>
                            <div class="bundle-include-title">
                                <span><?php the_field('includes') ?></span>
                            </div>
                            <div class="bundle-include-list">
                                <span>
                                    <?php

                                    $terms = get_the_terms(get_the_id(), 'bundle-content');
                                    if ( $terms) {
                                        foreach ( $terms as $term ) {
                                            echo '<li>' . $term->name . '</li>';
                                        }
                                    }

                                    ?>
                                </span>
                            </div>
                            <div class="bundle-price">
                                <span><?php the_field('price') ?></span>
                            </div>
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

