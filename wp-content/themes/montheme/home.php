<?php get_header() ?>
<h1 class="text-center pt-5 mt-5 titre-size">Nos Publications</h1>

        
    
<?php if (have_posts()): ?>
    
    <div class="container">
        <div class="row">
            <?php while(have_posts()): the_post(); ?>
            
                <div class="col-12 col-md-4 col-lg-6 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-7">
                        
                                <img src="<?php the_post_thumbnail_url(); ?>" style="width:100%; height:300px; margin:auto" alt="..."> 
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title">  <a href=""><?php the_title() ?> </a></h5>
                                    <?php the_author() ?>
                                    <p class="card-text"><?php the_excerpt() ?></p>
                                    <p class="card-text"><small class="text-muted"><?php the_date() ?></br><?php the_time() ?></small></p>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                                    <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir Plus</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

            <?php endwhile ?>
        </div>
    </div>
<?php else: ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>
<?php get_footer() ?>