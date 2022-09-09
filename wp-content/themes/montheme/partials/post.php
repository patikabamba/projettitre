<div class="card m-4" style="max-width: 540px; max-height:auto;">
            <div class="row wp-block-cover">
                <div class="col-md-8">
                    <!-- <?php the_post_thumbnail('post-thumbnail', ['class' =>'img-fluid rounded-start']) ?> -->
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid rounded-start" alt="..." style="height:340px; width: 540px;">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?> </a></h5>
                        <?php the_author() ?>
                        <p class="card-text"><?php the_excerpt() ?></p>
                        <p class="card-text"><small class="text-muted"><?php the_date() ?></br><?php the_time() ?></small></p>
                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category() ?></h6>
                        <ul>
                        <h6 class="card-subtitle mb-2 text-muted">
                        <?php
                        the_terms(get_the_ID(), 'oeuvre', '<li>','</li><li>', '</li>');
                        ?> 
                        </h6>
                        </ul>
                        <a href="<?php the_permalink() ?>" class="btn btn-primary">Voir Plus</a>
                        
                    </div>
                </div>
            </div>
        </div>