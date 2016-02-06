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
            <?php
            _e('<h2>404 NOT FOUND</h2>', 'notebook');
            _e('<p>The article you were looking for was not found, but maybe try looking again!</p>', 'notebook');

            get_search_form();

            _e('<h3>Content categories</h3>', 'notebook');
            echo '<div class="404-category-list">';
            wp_list_categories(array('title_li' => ''));
            echo '</div>';

            _e('<h3>Tag Cloud</h3>', 'notebook');
            wp_tag_cloud();
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>
<?php get_footer(); ?>