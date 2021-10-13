<?php get_header(); ?>
<!-- <?php var_dump("single.php") ?> -->

<?php
if (hasSubmenu($wp_query->queried_object_id, 'mobilmeny')) {

    get_desktop_submenu($wp_query->queried_object_id);
	
} else {

    // If we want to do something only on sites that arent parent to or submenu item
}
?>
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
        
        <?php the_post_thumbnail('medium') ?>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>