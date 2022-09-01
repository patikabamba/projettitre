<?php
function montheme_supports()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  register_nav_menu('header', 'En tête du menu');
  register_nav_menu('footer', 'pied de page');

  add_image_size('post-thumbnail', 350, 215, true);
}

function montheme_register_assets()
{
  wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', []);
  wp_register_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', []);
  wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', ['popper'], null, true);
  wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', false, true);
  wp_register_style('moncss', get_stylesheet_uri());
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('bootstrap-icons');
  wp_enqueue_style('moncss');
  wp_enqueue_script('bootstrap');
}

function montheme_title_separator()
{
  return '|';
}

function montheme_menu_class($classes)
{
  $classes[] = 'nav-item';
  return $classes;
}

function montheme_menu_link_class($attrs)
{
  $attrs['class'] = 'nav-link';
  return $attrs;
}

function montheme_pagination()
{

  $pages = paginate_links(['type' => 'array']);
  if ($pages === null) {
    return;
  }
  echo '<nav aria-label="pagination" class="my-4">';
  echo '<ul class="pagination">';
  foreach ($pages as $page) {
    $active = strpos($page, 'current') !== false;
    $class = 'page-item';
    if ($active) {
      $class = 'active';
    }
    echo '<li class="' . $class . '">';
    echo str_replace('page-numbers', 'page-link', $page);
    echo '</li>';
  }
  echo '</ul>';
  echo '</nav>';
}


function montheme_init()
{
  register_taxonomy('oeuvre', ['produit', 'post'], [
    'labels' => [
      'name' => 'Oeuvre',
      'singular_name'   =>  'Oeuvre',
      'plural_name'     =>  'Oeuvres',
      'search_items'    =>  'Rechercher des oeuvres',
      'all_items'       =>  'Toutes les oeuvres',
      'edit_items'      =>  'Editer oeuvre ',
      'update_item'     =>  'Mettre à jour oeuvre',
      'add_new_item'    =>  'Ajouter une nouvelle oeuvre',
      'new_item_name'   =>  'Nouvelle oeuvre',
      'menu_name'       =>  'Oeuvre',
    ],
    'show_in_rest'  => true,
    'hierarchical'  => true,
    'show_admin_column' => true,

  ]);
  register_post_type('produit', [
    'labels' => [
      'name' => 'Produit',
      'singular_name'   =>  'Produit',
      'plural_name'     =>  'Produits',
      'search_items'    =>  'Rechercher des produits',
      'all_items'       =>  'Tous les produits',
      'edit_items'      =>  'Editer le produit ',
      'update_item'     =>  'Mettre à jour le produit',
      'add_new_item'    =>  'Ajouter un nouveau produit',
      'new_item_name'   =>  'Nouveau produit',
      'menu_name'       =>  'Produit',

    ],
    'public' => true,
    'menu_position' => 3,
    'menu_icon' => 'dashicons-buddicons-activity',
    'supports'  => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'],
    'show_in_rest' => true,
    'has_archive' => true,

  ]);

}



add_action('init', 'montheme_init');
add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_filter('document_title_separator', 'montheme_title_separator');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/boutique.php');

SponsoMetaBox::register();
BoutiqueMenuPage::register();

add_filter('manage_produit_posts_columns', function ($columns) {
  return [
    'cb'  => $columns['cb'],
    'thumbnail'  => 'Miniature',
    'title'  => $columns['title'],
    'author'  => $columns['author'],
    'taxonomy-oeuvre'  => $columns['taxonomy-oeuvre'],
    'comments'  => $columns['comments'],
    'date'  => $columns['date']
  ];
});

add_filter('manage_produit_posts_custom_column', function ($column, $postId) {
  if ($column === 'thumbnail') {
    the_post_thumbnail('thumbnail', $postId);
  }
}, 10, 2);

add_action('admin_enqueue_scripts', function () {
  wp_enqueue_style('admin_montheme', get_template_directory_uri() . '/assets/admin.css');
});

add_filter('manage_post_posts_columns', function ($columns) {
  $newColumns = [];
  foreach ($columns as $k => $v) {
    if ($k === 'date') {
      $newColumns['sponso'] = 'Article sponsorisé ?';
    }
    $newColumns[$k] = $v;
  }
  return $newColumns;
});



add_filter('manage_post_posts_custom_column', function ($column, $postId) {
  if ($column === 'sponso') {
    if (!empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true))) {
      $class = 'yes';
    } else {
      $class = 'no';
    }
    echo '<div class="bullet bullet-' . $class . '"></div>';
  }
}, 10, 2);

function montheme_pre_get_posts ($query) {
  var_dump($query); die();
}

add_action('pre_get_post', 'montheme_pre_get_posts');


function montheme_register_widget () {
  register_sidebar([
    'id' => 'homepage',
    'name' => 'Sidebar Acceuil'
  ]);
}


add_action('widgets_init', 'montheme_register_widget');

function montheme_prefix_setup() {
  add_theme_support( 'custom-logo' );
}

add_action( 'after_setup_theme', 'montheme_prefix_setup' );

add_theme_support( 'custom-logo', array(
  'height'      => 175,
  'width'       => 400,
  'flex-width' => true,
) );

