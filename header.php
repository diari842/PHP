<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DS Theme</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 
    <header>
       <h1><?php bloginfo('name'); ?></h1>
       <nav>
        <?php wp_nav_menu(array['theme_locatio' => 'main-menu']) ?>
       </nav>
    </header> 