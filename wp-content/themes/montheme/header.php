<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body> 

<nav class="navbar navbar-expand-lg position-navbar py-0 w-100">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo get_home_url()?>">
    <?php
    get_custom_logo( $blog_id = 0 );
    the_custom_logo( $blog_id = 0 );
    has_custom_logo( $blog_id = 0 );
    ?></a>
    <!-- <?php bloginfo('name') ?> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="naviga collapse navbar-collapse" id="navbarSupportedContent">
    <?php wp_nav_menu([
        'theme_location' => 'header', 
        'container' => false,
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0 menu-style'
        ]) ?>
       <?= get_search_form() ?>
    </div>
  </div>
</nav>