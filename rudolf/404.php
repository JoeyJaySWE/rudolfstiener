<?

/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div class="row mt-5">
    <div class="col-md-4 mt-5">
        <img class="img-thumbnail img-fluid mr-3 mb-3" src="https://media.giphy.com/media/MEMKLhAjS35YoZS5sH/giphy.gif" alt="404 - Not Found">
    </div><!-- /col -->
    <div class="col-md-8 mt-5">
        <h1>404 - Not Found</h1>
        <p>You're lost and confused. This page doesn't exist. Perhaps you want to <a href="<?php bloginfo('url'); ?>">visit the startpage</a>?</p>
    </div><!-- /col -->
</div><!-- /row -->

<?php get_footer(); ?>