<?php
/*
 * Template Name: Full width Page
 */
get_header(); ?>
    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <h1 class="page-header">
                <?php bloginfo('sitename'); ?>
                <small><?php bloginfo('description'); ?></small>
            </h1>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                the_content();
                comments_template();
                ?>
            <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>

        </div>

    </div>
    <!-- /.row -->

    <hr>
<?php get_footer(); ?>