<!-- Blog Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_entry_thumbnail('thumbnail'); ?>
    <?php get_entry_header(); ?>
    <?php get_entry_meta(); ?>
    <div class="entry-content">
        <?php get_entry_content(); ?>
        <?php (is_single() ? get_entry_tags() : ''); ?>
    </div>
</article>
<hr>