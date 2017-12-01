<?php get_header(); //appel du template header.php  ?>


    <div id="content" class="container">



        <?php

        $args1 = array(
            'post_type' => 'render',
            'posts_per_page' => 1
        );
        $args2 = array(
            'post_type' => 'animate',
            'posts_per_page' => 8,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    => 'facebook'
                ),
            )
        );
        $args3 = array(
            'post_type' => 'animate',
            'posts_per_page' => 2,
            'tax_query' => array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    => 'vimeo'
                ),
            )
        );



        // The Query
        $render_query = new WP_Query( $args1 );
        $animation_query = new WP_Query( $args2 );
        $vimeo_query = new WP_Query( $args3 );

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

        <div class="animation-container">
            <div class="animation-list">
                <?php
                // animation
                if ( $animation_query->have_posts() ) {
                    while ( $animation_query->have_posts() ) {
                        $animation_query->the_post();
                        // TO DO : A trier selon animation carré ou pas
                        ?>

                        <div class="anim">
                            <?php $animation_url = get_field('link'); ?>
                            <iframe class="" src="<?php echo $animation_url ?>" width="280" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
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
        </div>

        <div class="vimeo-container">
            <div class="vimeo-list">
                <?php
                // animation
                if ( $vimeo_query->have_posts() ) {
                    while ( $vimeo_query->have_posts() ) {
                        $vimeo_query->the_post();
                        // TO DO : A trier selon animation carré ou pas
                        ?>

                        <div class="anim">
                            <?php $animation_url = get_field('link'); ?>
                            <iframe class="" src="<?php echo $animation_url ?>" width="580" height="327" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
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
        </div>




    </div> <!-- /content -->

<?php get_footer();
