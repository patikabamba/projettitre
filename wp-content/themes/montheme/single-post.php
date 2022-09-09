<?php get_header() ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class=" visuel row mx-0">
                <div class="col-sm-12 col-md-12 col-lg-12 px-0">
                    <p class="text-center pt-5 mt-5">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="visu" style="width:80%; height:600px;">
                    </p>
                </div>  
        </div>          
        <div class="corps-entier row px-5 mx-5">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1 class="px-3 mx-5"><?php the_title() ?></h1>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <?php
                if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') :
                ?>
                    <div class="alert alert-info">
                        Cet article est sponsorisé.
                    </div>
                <?php endif ?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">

                <div class=" corps px-3 mx-5"><?php the_content() ?></div>
            </div>
        </div>
        
   
    <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </div>
                <div class=" col-sm-12 col-md-12 col-lg-12">

                    <h2>Articles Relatifs</h2>
                    <div class="row">
                        <?php
                        $oeuvres = array_map(function ($term) {
                            return $term->term_id;
                        }, get_the_terms(get_post(), 'oeuvre'));

                        $query = new WP_Query([
                            'post__not_in' => array($post->ID),
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'tax_query' => [
                                [
                                    'taxonomy' => 'oeuvre',
                                    'terms' => $oeuvres,
                                ]
                            ]
                        ]);
                        while ($query->have_posts()) : $query->the_post();

                        ?>

                            <div class="bloc-artrel col-sm-12 col-md-6 col-lg-6">
                                <?php get_template_part('partials/post'); ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
    </div>

<?php endwhile;
endif; ?>

<?php get_footer() ?>