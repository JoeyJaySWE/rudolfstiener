<?php get_header(); ?>
<!-- <?php var_dump("front-page.php") ?> -->
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

    

        <?php the_content();?>

    <?php endwhile; ?>
    <?php $posts = get_posts() ?>
    <?php foreach ($posts as $post) : ?>
        <h2> <?= $post->title ?></h2>
    <?php endforeach ?>

<?php endif; ?>

<?php get_footer(); ?>