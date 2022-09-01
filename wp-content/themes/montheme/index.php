<?php get_header() ?>
<div class="container mt-5 pt-5">
    <?php $oeuvres = get_terms(['taxonomy' => 'oeuvre']); ?>
    <ul class="nav nav-pills my-4">
        <?php foreach ($oeuvres as $oeuvre) : ?>
            <li class="nav-item">
                <a href="<?= get_term_link($oeuvre) ?>" class="nav-link <?= is_tax('oeuvre', $oeuvre->term_id) ? 'active' : '' ?>"><?= $oeuvre->name ?></a>

            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-6">
                    <?php get_template_part('partials/post'); ?>
                </div>
            <?php endwhile ?>
            <?php montheme_pagination() ?>
            <!-- <?= paginate_links(); ?> -->

        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
        </div>
</div>


    <?php get_footer() ?>