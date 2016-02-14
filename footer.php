<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>
                Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>. <?php _e('All rights reserved', 'notebook'); ?>. <br>
                Proudly powered by <a href="<?php echo esc_url(__('https://wordpress.org/', 'notebook')); ?>"><?php printf(__('%s', 'notebook'), 'WordPress'); ?></a>. Theme: <a href="<?php echo esc_url(__('https://ansidev.xyz/', 'notebook')); ?>"><?php printf(__('%s', 'notebook'), 'Notebook'); ?></a> by <a href="<?php echo esc_url(__('https://ansidev.xyz/', 'notebook')); ?>"><?php printf(__('%s', 'notebook'), 'ansidev'); ?></a>.</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>
</div>
<!-- /.container -->
<!-- jQuery -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/bootstrap/js/jquery-2.2.0.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php wp_footer(); ?>
