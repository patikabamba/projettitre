<?php get_header() ?>
<?php $oeuvres = get_terms(['taxonomy' => 'oeuvre']); ?>
<h1 class="produit text-center mt-5 pt-5">VOIR TOUS NOS PRODUITS</h1>
<?php if (have_posts()) : ?>
    <div class="row  mx-5 cartepro ">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-sm-12 col-md-6 col-lg-6 cartesing">
                <?php get_template_part('partials/post'); ?>
            </div>
        <?php endwhile ?>
        <?php montheme_pagination() ?>
        <!-- <?= paginate_links(); ?> -->
    
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </div>
    <?php get_footer() ?>