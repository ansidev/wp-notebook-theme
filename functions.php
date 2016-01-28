<?php
require_once('inc/wp_bootstrap_navwalker.php');
define('THEME_URL', get_stylesheet_directory());
//define('BOOTSTRAP', bloginfo('template_directory') . '/bootstrap');
define('THEME_NAME', 'notebook');

/*
 * Auto insert RSS Feed links in <head> tag
 */
add_theme_support('automatic-feed-links');

/*
 * Add post thumbnail featured image
 */
add_theme_support('post-thumbnails');

/*
 * Add title-tag feature to generate page title
 */
add_theme_support('title-tag');

/*
 * Add post format feature
 */
add_theme_support('post-formats',
    array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    )
);

/*
 * Add theme menu
 */
register_nav_menu('primary-menu', __('Primary Menu', THEME_NAME));

/*
 * Add theme sidebar
 */
$sidebar = array(
    'name' => __('Main Sidebar', THEME_NAME),
    'id' => 'main-sidebar',
    'description' => 'Main sidebar for Notebook theme',
    'class' => 'main-sidebar',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
);
register_sidebar($sidebar);

/*
 * Add top navbar
 */

if (!function_exists('get_theme_navbar')) {
    function get_theme_navbar()
    { ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php printf(
                        '<a class="navbar-brand" href="%1$s" title="%2$s">%3$s</a>',
                        get_bloginfo('url'),
                        get_bloginfo('description'),
                        get_bloginfo('sitename')
                    );
                    ?>

                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php get_theme_menu('primary_menu'); ?>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    <?php }
}

/*
 * Add menu
 */
if (!function_exists('get_theme_menu')) {
    function get_theme_menu($slug)
    {
        $menu = array(
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'bs-example-navbar-collapse-1',
            'menu_class' => 'nav navbar-nav ' . $slug,
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker()
        );
        wp_nav_menu($menu);
    }
}

/*
 * Get pagination
 */
if (!function_exists('get_pagination')) {
    function get_pagination()
    {
//        if ($GLOBALS['wp_query']->max_num_pages < 2) {
//            return '';
//        }
        ?>
        <!-- Pager -->
        <ul class="pager">
            <?php if (get_previous_post_link()) : ?>
                <li class="previous">
                    <?php previous_posts_link(__('Newer Posts', 'notebook')); ?>
                </li>
            <?php endif; ?>
            <?php if (get_next_post_link()) : ?>
                <li class="next">
                    <?php next_posts_link(__('Older Posts', 'notebook')); ?>
                </li>
            <?php endif; ?>
        </ul>
        <?php
    }
}

/*
* Add theme sidebar
*/
$sidebar = array(
    'name' => __('Main Sidebar', 'notebook'),
    'id' => 'main-sidebar',
    'description' => 'Main sidebar for Notebook theme',
    'class' => 'main-sidebar',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
);
register_sidebar($sidebar);

/*
 * Get entry thumbnail
 */
if (!function_exists('get_entry_thumbnail')) {
    function get_entry_thumbnail($size)
    {
        if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
            <figure class='entry-thumbnail'><?php the_post_thumbnail($size); ?></figure>
        <?php endif;
    }
}
/*
* Get entry header
*/
if (!function_exists('get_entry_header')) {
    function get_entry_header()
    {
        if (is_single()) { ?>
            <h1 class="entry-header">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
        <?php } else { ?>
            <h2 class="entry-header">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        <?php }
    }
}

/*
 * Get entry meta
 */
if (!function_exists('get_entry_meta')) {
    function get_entry_meta()
    { ?>
        <p class="entry-meta"><span class="glyphicon glyphicon-time"></span> Posted by <a class="author" href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
            <?php if (the_date()) : ?>
                on <?php the_date(); ?>
            <?php endif; ?>
            <?php printf(__('<span class="category"> in %1$s</span>', 'notebook'), get_the_category_list(', ')); ?>
            <?php if (comments_open()) :
                echo ' | <span class="comments">';
                comments_popup_link(
                    __('Leave a comment', 'notebook'),
                    __('One comment', 'notebook'),
                    __('% comments', 'notebook'),
                    __('Read all comments', 'notebook')
                );
                echo '</span>';
            endif; ?>
        </p>
        <hr>
    <?php }
}

/*
 * Get entry content
 */
if (!function_exists('get_entry_content')) {
    function get_entry_content()
    {
        if (!is_single()) {
            the_excerpt();
        } else {
            the_content();
            $link_pages = array(
                'before' => __('<p>Page:', 'notebook'),
                'after' => '</p>',
                'nextpagelink' => __('Next page', 'notebook'),
                'previouspagelink' => __('Previous page', 'notebook')
            );
            wp_link_pages($link_pages);
        }
    }
}

/*
 * Add Read more link
 */
function add_read_more_link()
{
    return '... <a class="label label-primary read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'notebook') . '</a>';
}

add_filter('excerpt_more', 'add_read_more_link');

/*
 * Get entry tag
 */

if (!function_exists('get_entry_tags')) {
    function get_entry_tags()
    {
        if (has_tag()) :
            echo '<hr>';
            echo '<div class="entry-tag">';
            printf(__('Tags: %1$s', 'notebook'), get_the_tag_list('', ', '));
            echo '</div>';
        endif;
    }
}
