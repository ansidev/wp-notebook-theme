<?php
if (is_active_sidebar('main-sidebar')) { ?>
    <?php dynamic_sidebar('main-sidebar'); ?>
    <?php
} else {
    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'notebook');
}