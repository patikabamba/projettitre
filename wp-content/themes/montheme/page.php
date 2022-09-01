<?php get_header() ?>
<div class="container-fluid text-center g-0">
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        the_content();
    endwhile; 
endif; 
?>
</div>
<?php get_footer() ?>