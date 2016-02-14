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

            <h2 class="page-header">
                Search
                <small>
                    <?php
                    $search_query = new WP_Query('s=' . $s . '&showposts=-1');
                    $search_keyword = esc_html($s, 1);
                    $search_count = $search_query->post_count;
                    printf(__('Search results for <strong>%1$s</strong>', 'notebook'), $search_keyword); ?>
                </small>
            </h2>

            <div class="row">
                <?php
                if ($search_count > 0) {
                    printf(__('
                    <div class="alert alert-success" role="alert">
                      We found <strong>%1$s</strong> articles for you.
                    </div>',
                        'notebook'), $search_count);
                }
                ?>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>
            <?php get_pagination(); ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>
<?php get_footer(); ?>