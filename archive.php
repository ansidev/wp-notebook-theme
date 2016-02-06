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
                <?php
                if (is_tag()) :
                    printf(__('Posts Tagged: %1$s', 'notebook'), single_tag_title('', false));
                elseif (is_category()) :
                    printf(__('Posts Categorized: %1$s', 'notebook'), single_cat_title('', false));
                elseif (is_day()) :
                    printf(__('Daily Archives: %1$s', 'notebook'), get_the_time('l, F j, Y'));
                elseif (is_month()) :
                    printf(__('Monthly Archives: %1$s', 'notebook'), get_the_time('F Y'));
                elseif (is_year()) :
                    printf(__('Yearly Archives: %1$s', 'notebook'), get_the_time('Y'));
                endif;
                ?>
                <?php if (is_tag() || is_category()) : ?>
                    <small>
                        <?php echo term_description(); ?>
                    </small>
                <?php endif; ?>
            </h2>

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