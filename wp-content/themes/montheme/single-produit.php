<?php get_header() ?>
<div class="container-fluid text-center mt-5 pt-5">
    <div class="row">
        <?php if (have_posts()) : ?>
                <div class=" col-md-6 text-center" >
                    <?php while (have_posts()) : the_post(); ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt=""  class="border border-dark border border-5 shadow-lg p-1 mb-5 mt-4 bg-body rounded" style="width:100%; height:650px;">
                </div>
                <div class="col-md-6">
                    <h1 class="px-1 mx-1 mt-3"><?php the_title() ?> Prix <?= get_field('prix') ?>€ </h1>
                    
                    <div class="px-1 mx-1"><?php the_content() ?></div>
                    <div>
                        <h3>Réalisée par <?php the_author() ?></h3>
                    </div>
                    <div class=" comm d-grid bouton">
                        <a href="http://localhost/projettitre/contactez-nous/" type="button" class="btn btn-outline-warning btn-lg">Passez votre COMMANDE !</a>
                    </div>
                </div>

        <?php endwhile ?>

    <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>