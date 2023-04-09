<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
</head>
<body>
<header class="header">
  <div class="header__inner inner">
    <div class="header__top">
      <?php 
          if (!empty(get_theme_mod('header_logo'))) {
            echo '<h1><a href="'.esc_url(home_url()).'" class="header__logo-link">';
            echo '<img src="'.get_theme_mod('header_logo').'" alt="ロゴ画像" class="header__logo">';
            echo '</a></h1>';
          }
      ?>
      <div class="header__info sub-font">
      <?php 
        if (!empty(get_theme_mod('header_phone_number'))) {
          echo ' <div class="header__tel" style="color: '.get_theme_mod('header_nav_color', '#000').'"><span class="header__tel--small">TEL.</span>';
          echo '<a href="tel:'.get_theme_mod('header_phone_number').'">'.get_theme_mod('header_phone_number').'</a>';
          echo '</div>';
        }
      ?>
      <?php 
        if (!empty(get_theme_mod('header_accees'))) {
          echo '<p class="header__access">'.get_theme_mod('header_accees').'</p>	';
        }
      ?>
      <?php 
        if (!empty(get_theme_mod('header_accees_sub'))) {
          echo '<p class="header__access header__access--bold">'.get_theme_mod('header_accees_sub').'</p>	';
        }
      ?>
      </div>  
      <?php 
        if (!empty(get_theme_mod('header_button_text'))) {
          echo '<a href="'.get_theme_mod('header_button_url').'" class="header__button contact-button sub-font" target="_blank" rel="noopener noreferrer" style="background: '.get_theme_mod('header_nav_color', '#000').'">'.get_theme_mod('header_button_text').'</a>';
        }
      ?>
    </div>
  </div>
  <div class="header__inner inner">
  <nav class="header__nav  js-header-nav">
    <div class="header__inner inner">
      <?php 
        wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'container' => false,
          'menu_class' => 'header__nav-container header-nav sub-font',
          'add_li_class' => 'header-nav__item',
          'add_a_class' => 'header-nav__link',
          'walker' => new custom_walker_header_menu
        ));
      ?>
  </div>
  </nav>
  <div class="hamburger js-hamburger u-mobile nav-background">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <?php 
    wp_nav_menu(array(
      'theme_location' => 'main-menu',
      'container' => false,
      'menu_class' => 'global-menu-sp js-globalMenuSp',
      'add_li_class' => 'global-menu-sp__link',
      'add_a_class' => 'nav-color',
      'walker' => new custom_walker_header_menu_sp
    ));
  ?>
  <div class="background"></div>
</header>
<?php ?>
<?php if(is_front_page()):?>
<?php elseif (!is_home() || !is_front_page()): ?>
<div class="child-fv">
  <h2 class="child-fv__title nav-color"><?php the_title(); ?></h2>
</div>
<?php endif; ?>