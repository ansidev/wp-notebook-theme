<!-- Blog Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (is_single()) { ?>
        <h1><?php the_content(); ?></h1>
    <?php } else { ?>
        <h2><?php the_content(); ?></h2>
    <?php } ?>
</article>
<hr>