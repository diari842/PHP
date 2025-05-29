<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="container">
    <?php
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<h1>' . get_bloginfo('name') . '</h1>';
    }
    ?>
    <nav>
      <?php
      wp_nav_menu([
          'theme_location' => 'main-menu',
          'container' => false,
          'menu_class' => 'main-menu'
      ]);
      ?>
    </nav>
  </div>
</header>
<main>
