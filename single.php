<?php get_header(); ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <h1 class="page-header">
                <?php bloginfo('sitename'); ?>
                <small><?php bloginfo('description'); ?></small>
            </h1>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                get_template_part('content', get_post_format());
                get_template_part('author-bio');
                comments_template();
                ?>
            <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>

    </div>
    <!-- /.row -->

    <hr>
<?php get_footer(); ?>