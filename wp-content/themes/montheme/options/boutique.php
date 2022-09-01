<?php
class BoutiqueMenuPage {

    const GROUP = 'boutique_options';

  public static function register () {
    add_action('admin_menu', [self::class, 'addMenu']);
    add_action('admin_init', [self::class, 'registerSettings']);
    add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
  }

  public static function registerScripts ($suffix) { 
    if ($suffix === 'settings_page_boutique_options') {
        wp_register_style('flatpicker', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
        wp_register_script('flatpicker', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true );
        wp_enqueue_script('montheme_admin', get_template_directory_uri() . '/assets/admin.js', ['flatpicker'], false, true);
        wp_enqueue_style('flatpicker');
      }
  }

  public static function registerSettings () {
    register_setting(self::GROUP, 'boutique_horaire');
    register_setting(self::GROUP, 'boutique_date');
    add_settings_section('boutique_options_section', 'Paramètres', function () {
        echo 'Vous pouver gerer ici  les parametres liés à la boutique .';
    }, self::GROUP);
    add_settings_field('boutique_options_horaire', "Horaires et coordonnées", function () {

        ?>
        <textarea name="boutique_horaire"  cols="30" rows="10" style="width: 100%">
        <?= esc_html(get_option('boutique_horaire')) ?>
        </textarea>
        <?php

    }, self::GROUP, 'boutique_options_section');

    add_settings_field('boutique_options_date', "Date et coordonnées", function () {

        ?>
        <input type="text" name="boutique_date"  value="<?= esc_attr(get_option('boutique_date')) ?>" class="montheme_datepicker">
       
        </input>
        <?php

    }, self::GROUP, 'boutique_options_section');
  }

  public static function addMenu () {
    add_options_page("Gestion de la boutique", "Boutique", "manage_options", self::GROUP, [self::class, 'render']);
  }

  
  public static function render () {
      ?>
      <h1>Gestion de la boutique</h1>

      <?= get_option('boutique_horaire') ?>

      <form action="options.php" method="post">
        <?php 
        settings_fields(self::GROUP); 
        do_settings_sections(self::GROUP);
        submit_button(); 
        ?>

      </form>
      <?php
  }
}