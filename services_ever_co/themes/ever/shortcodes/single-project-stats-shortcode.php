<?php
function ever_project_stats() {
    global $post;
    ob_start(); ?>

    <div class="github-rate col">
        <?php //Display the statistics
        ever_get_project_stats() ?>
    </div>

<?php return ob_get_clean();
}
/* Register the function as a shortcode to use anywhere you want in the WordPress editor */
add_shortcode('ever_project_stats', 'ever_project_stats');