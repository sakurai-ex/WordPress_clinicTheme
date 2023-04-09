<?php
/***************************************************/
/*************   カスタム（オリジナル）   *****************/
/***************************************************/
function add_theme_customizer( $wp_customize ) {
  //「ホームページ設定」削除
  $wp_customize -> remove_section( 'static_front_page' );

  $wp_customize->add_panel(
    'original_panel',//パネルID
    array(
        'title' => 'オリジナルカスタマイズ',//パネルタイトル
        'priority' => 10,//表示位置
    )
);
  /*==============================
  カスタマイザー「ヘッダー」
  ==============================*/
  $wp_customize -> add_section( 'custom_header_section', array(
    'title' => 'ヘッダー',
    'priority' => 0,
    'panel' => 'original_panel'
  ));
  /*==============================
  カスタマイザー「ヘッダー：入力欄」
  ==============================*/
  // 「ロゴ画像」の設定
  $wp_customize->add_setting( 'header_logo' ); //設定項目を追加
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
      'label' => 'ロゴ画像', //設定項目のタイトル
      'section' => 'custom_header_section', //追加するセクションのID
      'settings' => 'header_logo', //追加する設定項目のID
      'description' => 'ロゴ画像を設定してください。', //設定項目の説明
      'priority' => 0,
  )));
  // 「電話番号」の設定
  $wp_customize -> add_setting( 'header_phone_number', array(
    'default' => 'XX-XXXX-XXXX',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize -> add_control( 'header_phone_number', array(
    'section' => 'custom_header_section',
    'settings' => 'header_phone_number',
    'label' => '電話番号',
    'type' => 'text',
    'priority' => 1,
  ));
  // 「住所」の設定
  $wp_customize -> add_setting( 'header_accees', array(
    'default' => '住所を入力してください。',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize -> add_control( 'header_accees', array(
    'section' => 'custom_header_section',
    'settings' => 'header_accees',
    'label' => '住所',
    'type' => 'text',
    'priority' => 2,
  ));
  // 「住所：サブテキスト」の設定
  $wp_customize -> add_setting( 'header_accees_sub', array(
    'default' => '住所（サブ）を入力してください。',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize -> add_control( 'header_accees_sub', array(
    'section' => 'custom_header_section',
    'settings' => 'header_accees_sub',
    'label' => '住所（サブ）',
    'type' => 'text',
    'priority' => 2,
  ));
  // 「ボタン：テキスト」の設定
  $wp_customize -> add_setting( 'header_button_text', array(
    'default' => 'WEB予約',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'

  ));
  $wp_customize -> add_control( 'header_button_text', array(
    'section' => 'custom_header_section',
    'settings' => 'header_button_text',
    'label' => 'ボタンテキスト',
    'description' => 'ボタンテキストを入力するとボタンが表示されます。', //設定項目の説明
    'type' => 'text',
    'priority' => 4,
  ));
  // 「ボタン：URL」の設定
  $wp_customize -> add_setting( 'header_button_url', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize -> add_control( 'header_button_url', array(
    'section' => 'custom_header_section',
    'settings' => 'header_button_url',
    'label' => 'ボタンURL',
    'type' => 'url',
    'priority' => 5,
  ));
  //「ナビゲーションカラー」の設定
  $wp_customize->add_setting( 'header_nav_color', array(
    'default' => '#000',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
    'label' => 'ナビゲーションカラー',
    'section' => 'custom_header_section',
    'settings' => 'header_nav_color',
    'priority' => 20,
  )));
  /*==============================
  カスタマイザー「FV」
  ==============================*/
  $wp_customize -> add_section( 'custom_fv_section', array(
    'title' => 'FV',
    'priority' => 1,
    'panel' => 'original_panel'
  ));
  // 「メインビジュアル：画像」の設定
  $wp_customize->add_setting( 'fv_image' ); //設定項目を追加
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fv_image', array(
      'label' => 'メインビジュアル：画像', //設定項目のタイトル
      'section' => 'custom_fv_section', //追加するセクションのID
      'settings' => 'fv_image', //追加する設定項目のID
      'description' => 'メインビジュアル画像を設定してください。', //設定項目の説明
      'priority' => 0,
  )));
  // 「メインビジュアル：テキスト」の設定
  $wp_customize -> add_setting( 'fv__text', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_filter_post_kses'
  ));
  $wp_customize -> add_control( 'fv__text', array(
    'section' => 'custom_fv_section',
    'settings' => 'fv__text',
    'label' => 'メインビジュアル：テキスト',
    'description' => '改行の際はbrタグを入力してください。', //設定項目の説明
    'type' => 'textarea',
    'priority' => 1,
  ));
  // 「FV下：テキストボックス①」の設定
  $wp_customize -> add_setting( 'fv_text_box_1', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_filter_post_kses'
  ));
  $wp_customize -> add_control( 'fv_text_box_1', array(
    'section' => 'custom_fv_section',
    'settings' => 'fv_text_box_1',
    'label' => 'メインビジュアル：テキストボックス1',
    'description' => 'サイトのメインカラーの背景色のテキストボックスが現れます。', //設定項目の説明
    'type' => 'text',
    'priority' => 1,
  ));
  // 「FV下：テキストボックス②」の設定
  $wp_customize -> add_setting( 'fv_text_box_2', array(
    'transport' => 'refresh',
    'sanitize_callback' => 'wp_filter_post_kses'
  ));
  $wp_customize -> add_control( 'fv_text_box_2', array(
    'section' => 'custom_fv_section',
    'settings' => 'fv_text_box_2',
    'label' => 'メインビジュアル：テキストボックス2',
    'description' => 'サイトのサブカラーの背景色のテキストボックスが現れます。', //設定項目の説明
    'type' => 'text',
    'priority' => 1,
  ));
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