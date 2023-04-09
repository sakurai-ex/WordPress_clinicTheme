<?php 
  /*******************************************/
  /*************   共通設定   *****************/
  /*******************************************/
  function my_setup() {
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automoatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support( 'title-tag' ); // タイトルタグの自動生成
  };
  add_action('after_setup_theme', 'my_setup');

  /* CSSとJavaScriptの読み込み */
  function my_script_init() {
    //wordpress提供のjquery.jsを読み込まない
    wp_deregister_script('jquery');
    //jQueryの読み込み
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', '', '1.0.1' );
    //slickの読み込み
    wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '1.0.1');
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', '', '1.0.1', );
    //jsファイルの読み込み
    wp_enqueue_script('main', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.1', true);
    //cssファイルの読み込み
    wp_enqueue_style('main', get_template_directory_uri() . '/css/styles.css', array(), '1.0.1');
    //snow monkey blockのcss上書き
    wp_enqueue_style('smb', get_template_directory_uri() . '/css/smb-styles.css', array(), '1.0.2');

  }
  add_action( 'wp_enqueue_scripts', 'my_script_init');

function add_block_editor_styles() {
    wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/css/smb-styles.css' );
    wp_enqueue_script('myeditor-script', get_stylesheet_directory_uri() . '/js/scrpt.js');
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor_styles' );



//fuctions.phpに追記
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
  if( function_exists('acf_register_block_type') ) {
    acf_register_block_type(array(
      'name'              => 'Background-image',
      'title'             => __('背景画像セクション'),
      'description'       => __('背景画像のブロックです。'),
      'render_template'   => 'blocks/acf/background-image.php',
      'category'          => 'formatting',
      'icon'              => 'wordpress',
      'keywords'          => array( 'background', 'image' ),
      'mode' => 'auto',
    ));
  /* 以下が追加したカスタムブロック */
  acf_register_block_type(array(
      'name'            => 'feature', 
      'title'           => __( 'featureセクション' ), 
      'description'     => __( 'featureセクションのブロックです。' ), 
      'render_template' => 'blocks/acf/feature-section.php', 
      'category'        => 'formatting',
      'icon'            => 'admin-comments', 
      'keywords'        => array( 'feature, original' ), 
      'mode'            => 'auto', 
      )
    );
    /* 以下が追加したカスタムブロック */
    acf_register_block_type(array(
      'name'            => 'reason', 
      'title'           => __( 'reasonセクション' ), 
      'description'     => __( 'reasonセクションのブロックです。' ), 
      'render_template' => 'blocks/acf/reason-section.php', 
      'category'        => 'formatting',
      'icon'            => 'admin-comments', 
      'keywords'        => array( 'reason, original' ), 
      'mode'            => 'auto', 
      )
    );
    /* 以下が追加したカスタムブロック */
    acf_register_block_type(array(
      'name'            => 'about', 
      'title'           => __( 'aboutセクション' ), 
      'description'     => __( 'aboutセクションのブロックです。' ), 
      'render_template' => 'blocks/acf/about-section.php', 
      'category'        => 'formatting',
      'icon'            => 'admin-comments', 
      'keywords'        => array( 'about, original' ), 
      'mode'            => 'auto', 
      )
    );
    /* 以下が追加したカスタムブロック */
    acf_register_block_type(array(
      'name'            => 'disease', 
      'title'           => __( 'diseaseセクション' ), 
      'description'     => __( 'diseaseセクションのブロックです。' ), 
      'render_template' => 'blocks/acf/disease-section.php', 
      'category'        => 'formatting',
      'icon'            => 'admin-comments', 
      'keywords'        => array( 'disease, original' ), 
      'mode'            => 'auto', 
      )
    );
      /* 以下が追加したカスタムブロック */
      acf_register_block_type(array(
        'name'            => 'symptoms', 
        'title'           => __( 'symptomsセクション' ), 
        'description'     => __( 'symptomsセクションのブロックです。' ), 
        'render_template' => 'blocks/acf/symptoms-section.php', 
        'category'        => 'formatting',
        'icon'            => 'admin-comments', 
        'keywords'        => array( 'symptoms, original' ), 
        'mode'            => 'auto', 
        )
      );
      /* 以下が追加したカスタムブロック */
      acf_register_block_type(array(
        'name'            => 'reserach', 
        'title'           => __( 'researchセクション' ), 
        'description'     => __( 'researchセクションのブロックです。' ), 
        'render_template' => 'blocks/acf/research-section.php', 
        'category'        => 'formatting',
        'icon'            => 'admin-comments', 
        'keywords'        => array( 'research, original' ), 
        'mode'            => 'auto', 
        )
      );
        /* 以下が追加したカスタムブロック */
  acf_register_block_type(array(
    'name'            => 'news', 
    'title'           => __( 'newsセクション' ), 
    'description'     => __( 'newsセクションのブロックです。' ), 
    'render_template' => 'blocks/acf/news-section.php', 
    'category'        => 'formatting',
    'icon'            => 'admin-comments', 
    'keywords'        => array( 'news, original' ), 
    'mode'            => 'auto', 
    )
  );
  /* 以下が追加したカスタムブロック */
  acf_register_block_type(array(
    'name'            => 'list', 
    'title'           => __( 'list' ), 
    'description'     => __( 'listのブロックです。' ), 
    'render_template' => 'blocks/acf/list.php', 
    'category'        => 'formatting',
    'icon'            => 'admin-comments', 
    'keywords'        => array( 'list, original' ), 
    'mode'            => 'auto', 
    )
  );
  /* 以下が追加したカスタムブロック */
  acf_register_block_type(array(
    'name'            => 'slick', 
    'title'           => __( 'slick' ), 
    'description'     => __( 'slickのブロックです。' ), 
    'render_template' => 'blocks/acf/slick.php', 
    'category'        => 'formatting',
    'icon'            => 'admin-comments', 
    'keywords'        => array( 'slick, original' ), 
    'mode'            => 'auto', 
    )
  );
};
  
}