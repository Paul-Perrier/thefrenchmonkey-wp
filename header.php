<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <!-- Appel du fichier style.css de notre thème -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="reset.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu" rel="stylesheet">

        <!--
            Tout le contenu de la partie head de mon site
         -->

        <!-- Execution de la fonction wp_head() obligatoire ! -->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="header">

            <div class="header-menu">
            <?php
            $args=array(
            'theme_location' => 'header', // nom du slug
            'menu' => 'header_fr', // nom à donner cette occurence du menu
            'menu_class' => 'menu_header', // class à attribuer au menu
            'menu_id' => 'menu_id' // id à attribuer au menu
            // voir les autres arguments possibles sur le codex
            );
            wp_nav_menu($args);
            ?>
            </div>

        </header>
