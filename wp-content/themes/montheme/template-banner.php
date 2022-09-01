<?php
/** 
 * Template Name:page avec banniere
 * Template Post Type: page, post
*/
?>

<?php get_header() ?>
<?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
    <p>Ici la banniere</p>
    <p> 
        <img src="<?php the_post_thumbnail_url(); ?>"alt="" style="width:100%; height:auto;">
    </p>
        <h1><?php the_title() ?></h1>

        <?php the_content() ?>
    
    <?php endwhile ?>

<?php endif; ?>
<?php get_footer() ?>