<?php get_header() ?>

<?php while (have_posts()) : the_post() ?>


    <div><?php the_content() ?></div>

    <!-- <a href="<?php echo get_post_type_archive_link('post') ?>">Voir les dernières Actualités</a> -->

    

<?php endwhile; ?>


<?php get_footer() ?>