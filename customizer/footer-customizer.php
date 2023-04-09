<?php
  /*==============================
  カスタマイザー「フッター」
  ==============================*/
  $wp_customize -> add_section( 'custom_footer_section', array(
    'title' => 'フッター',
    'priority' => 2,
    'panel' => 'original_panel'
  ));
    // 「copyright」の設定
    $wp_customize -> add_setting( 'footer_copyright', array(
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize -> add_control( 'footer_copyright', array(
      'section' => 'custom_footer_section',
      'settings' => 'footer_copyright',
      'label' => 'コピーライト',
      'type' => 'text',
      'priority' => 1,
    ));
  }
  add_action( 'customize_register', 'add_theme_customizer' );