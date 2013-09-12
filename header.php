<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>
    <?php wp_enqueue_script('jquery'); ?>
    <?php wp_enqueue_script('header-script', get_stylesheet_directory_uri() . '/js/header.js', array( 'jquery' )); ?>
    <?php wp_head(); ?>
</head>

<body>

	<header>
        <nav>
            <h1><a href="<?php echo get_bloginfo('url'); ?>">
            <?php echo get_bloginfo('name'); ?></a></h1>

            <ul><?php wp_list_pages('title_li=&depth=2'); ?></ul>
        </nav>
    </header>
    

    <div id="main_wrapper">