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
            <div class="row author-box">
                <?php echo '<div class="author-avatar">' . get_avatar(get_the_author_meta('ID')) . '</div>';

                printf('<h3>' . __('Posts by %1$s', 'notebook') . '</h3>', get_the_author());

                echo '<p>' . get_the_author_meta('description') . '</p>';

                if (get_the_author_meta('user_url')) : printf(__('<a href="%1$s" title="Visit to %2$s website">Visit to my website</a>', 'notebook'),
                    get_the_author_meta('user_url'), get_the_author());
                endif;
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