<?php get_header() ?>
<div class="container-fluid text-center mt-5 pt-5">
    <div class="row">
        <?php if (have_posts()) : ?>
                <div class="bloc-comm col-sm-12 col-md-6 col-lg-6 text-center" >
                    <?php while (have_posts()) : the_post(); ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt=""  class="border border-dark border border-5 shadow-lg p-1 mb-5 mt-4 bg-body rounded" style="width:100%; height:650px;">
                </div>
                <div class=" col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h1 class="px-1 mx-1 mt-3"><?php the_title() ?> Prix <?= get_field('prix') ?>€ </h1>
                        </div>    
                        <div class=" col-sm-12 col-md-12 col-lg-12 px-1 mx-1"><?php the_content() ?></div>
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                                <h3>Réalisée par <?php the_author() ?></h3>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12  comm d-grid bouton">
                                <a href="http://localhost/projettitre/contactez-nous/" type="button" class="btn btn-outline-warning btn-lg">Passez votre COMMANDE !</a>
                        </div>
                    </div>
                </div>

        <?php endwhile ?>

    <?php endif; ?>
    </div>
</div>
<?php get_footer() ?>