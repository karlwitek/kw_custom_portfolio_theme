<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="kwcpt-header-container">
      <?php 
        wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'menu_class' => 'kwcpt-top-menu'
        ));
      ?>
    </div>
  </header>
  
