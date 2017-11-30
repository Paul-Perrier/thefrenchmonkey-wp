<?php get_header(); //appel du template header.php  ?>

<div class="single_container">

    <?php
    // boucle WordPress
    if (have_posts()){
        while (have_posts()){
            the_post();
    ?>
    <!-- Content Start -->

    <div class="upper_section">

        <?php $url = wp_get_attachment_url( get_field('image') ); ?>
        <img class="single_img" src="<?php echo $url ?>" alt="">

        <h2 class="single_name"><?php the_title(); ?></h2>

    </div>


    <?php

    $terms = get_the_terms(get_the_id(), 'software');
    if ( $terms) {
        foreach ( $terms as $term ) {
            echo '<li>' . $term->name . '</li>';
        }
    }

    ?>


    <?php
    }
    }
    else {
    ?>
    Nous n'avons pas trouvé d'article répondant à votre recherche
    <?php
    }
    ?>

    <!-- Get Taxonomic field -->


</div> <!-- /content -->

<?php get_footer(); //appel du template footer.php ?>
