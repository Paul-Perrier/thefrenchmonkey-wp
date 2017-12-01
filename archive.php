<?php
/*
Template Name: Everydays
*/
?>

<?php get_header(); //appel du template header.php  ?>

    <div id="content" class="container">

        <?php

        $args1 = array(
            'post_type' => 'render',
            'posts_per_page' => 1
        );
        $args2 = array(
            'post_type' => 'render',
            'posts_per_page' => 31,
            'tax_query' => array(
                array(
                    'taxonomy' => 'month',
                    'field'    => 'slug',
                    'terms'    => 'novembre'
                ),
            )
        );
        $args3 = array(
            'post_type' => 'render',
            'posts_per_page' => 31,
            'tax_query' => array(
                array(
                    'taxonomy' => 'month',
                    'field'    => 'slug',
                    'terms'    => 'octobre'
                ),
            )
        );



        // The Query
        $render_query = new WP_Query( $args1 );
        $render_query_nov = new WP_Query( $args2 );
        $render_query_oct = new WP_Query( $args3 );

        // The Loop
        if ( $render_query->have_posts() ) {
            while ( $render_query->have_posts() ) {
                $render_query->the_post();
                ?>

                <div class="intro_container">

                    <div class="showcase-render-container">
                        <div class="render-picture">
                            <?php $url = wp_get_attachment_url( get_field('image') ); ?>
                            <div class="img"><img src="<?php echo $url ?>" alt=""></div>
                            <h3>Daily Render</h3>
                        </div>
                        <div class="right-information home-mode">

                            <div class="render-title"><span><?php the_field('date'); ?> </span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></div>
                            <div class="render-software"><span>Software</span></div>
                            <div class="render-software-list">
                                    <span>
                                          <?php

                                          $terms = get_the_terms(get_the_id(), 'software');
                                          if ( $terms) {
                                              foreach ( $terms as $term ) {
                                                  echo '<li>' . $term->name . '</li>';
                                              }
                                          }

                                          ?>
                                    </span>
                            </div>
                            <div class="render-engine"><span>Renderer</span></div>
                            <div class="render-engine-list">
                                    <span>
                                        <?php

                                        $terms = get_the_terms(get_the_id(), 'renderer');
                                        if ( $terms) {
                                            foreach ( $terms as $term ) {
                                                echo '<li>' . $term->name . '</li>';
                                            }
                                        }

                                        ?>
                                    </span>
                            </div>
                            <div class="render-dowload"><?php the_field('download'); ?><img src="assets/images/icons/arrow.svg" alt=""></div>
                            <div class="render-files">Project Render File</div>
                            <div class="render-files-list">
                                    <span>
                                        <?php

                                        $terms = get_the_terms(get_the_id(), 'files');
                                        if ( $terms) {
                                            foreach ( $terms as $term ) {
                                                echo '<li>' . $term->name . '</li>';
                                            }
                                        }

                                        ?>
                                    </span>
                            </div>

                        </div>
                    </div>

                </div>


                <?php
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }

        ?>
        <h5>November</h5>
        <div class="card-container">

        <?php
        // The Loop
        if ( $render_query_nov->have_posts() ) {
        while ( $render_query_nov->have_posts() ) {
        $render_query_nov->the_post();
        ?>



            <div class="card">
                <div class="card-image">
                    <?php $url = wp_get_attachment_url( get_field('image') ); ?>
                    <div class="img"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>""><img src="<?php echo $url ?>" alt=""></div></a>
                </div>
                <div class="card-title">
                    <span><?php the_field('date'); ?> </span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a>
                </div>

            </div>



        <?php
        }
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }


        ?>
        </div>
        <h5>October</h5>
        <div class="card-container">

        <?php
        // The Loop
        if ( $render_query_oct->have_posts() ) {
            while ( $render_query_oct->have_posts() ) {
                $render_query_oct->the_post();
                ?>

                    <div class="card">
                        <div class="card-image">
                            <?php $url = wp_get_attachment_url( get_field('image') ); ?>
                            <div class="img"><img src="<?php echo $url ?>" alt=""></div>
                        </div>
                        <div class="card-title">
                            <span><?php the_field('date'); ?> </span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a>
                        </div>

                    </div>


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
