<?php
/*
Template Name: About
*/
?>

<?php get_header(); //appel du template header.php  ?>


    <div id="content" class="container">



        <div class="intro_container">

            <h1>About</h1>

        </div>

        <div class="card_container">

            <?php

            $args = array('post_type' => 'render');

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    ?>
                    <!-- card -->
                    <div class="card">

                        <?php $url = wp_get_attachment_url( get_field('image') ); ?>
                        <img class="card_img" width="250px" height="250px" src="<?php echo $url ?>" alt="">

                        <a class="card_title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a>
                        <span class="card_age"><?php the_field('date'); ?></span>

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

