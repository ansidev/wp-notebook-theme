<!DOCTYPE html>
<!--[if IE 8]>
<html <?php language_attributes();?> class="ie8"> <![endif]-->
<!--[if !IE]>
<html <?php language_attributes();?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmgp.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php
    if (is_singular()) wp_enqueue_script('comment-reply');
    wp_head();
    ?>
</head>

<body <?php body_class(); ?> >
<?php get_theme_navbar(); ?>
