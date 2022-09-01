<?php get_header() ?>
    <div class="container mt-5 pt-5">
        <h1><?= esc_html(get_queried_object()->name) ?></h1>

        <p> <?= get_queried_object()->description ?>  </p>

        <?php $oeuvres = get_terms(['taxonomy' => 'oeuvre']); ?>
        <?php if (is_array($oeuvres)): ?>
        <ul class="nav nav-pills my-4">
            <?php foreach($oeuvres as $oeuvre): ?>
            <li class="nav-item">
                <a href="<?= get_term_link($oeuvre) ?>" class="nav-link <?= is_tax('oeuvre', $oeuvre->term_id) ? 'active' : '' ?>"><?= $oeuvre->name ?></a>

            </li>
                <?php endforeach; ?>
        </ul>
        <?php endif ?>
        <?php if (have_posts()): ?>
            <div class="row px-5">
                    <?php while(have_posts()): the_post(); ?>
                    <div class="col-md-6 ">
                    <?php get_template_part('partials/post'); ?>
                    </div>
                    <?php endwhile ?>
                <?php montheme_pagination() ?>
                <!-- <?= paginate_links(); ?> -->
            
            <?php else: ?>
                <h1>Pas d'articles</h1>
            <?php endif; ?>
            </div>
    </div>        

<?php get_footer() ?>