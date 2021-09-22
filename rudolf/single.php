<?php get_header(); ?>
<!-- <?php var_dump("single.php") ?> -->
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
        <?php the_date() ?> <br>
        <?php the_post_thumbnail('medium') ?>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>