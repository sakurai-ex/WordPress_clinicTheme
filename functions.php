<?php 

add_theme_support( 'align-wide' );

// 分割したファイルパスを配列に追加
$function_files = [
  '/functions/init.php', 
  '/navigation/global-nav.php',//ナビゲーションメニュー： PC
  '/navigation/global-nav-sp.php',// ナビゲーションメニュー : SP 
  '/navigation/footer-nav.php', // フッターナビゲーション
  '/navigation/about-nav.php', // フッターナビゲーション
  '/customizer/customizer.php', //カスタマイザー管理
  '/menu/custom-menu.php', // option管理
];
foreach ($function_files as $file) {
  if ((file_exists(__DIR__ . $file))) { // ファイルが存在する場合
    // ファイルを読み込む
    locate_template($file, true, true);
  } else { // ファイルが見つからない場合
    // エラーメッセージを表示
    trigger_error("`$file`ファイルが見つかりません", E_USER_ERROR);
  }
}

// 管理画面からメインメニューを非表示にする 
function remove_menus() {
  remove_menu_page( 'index.php' ); // ダッシュボード
  remove_menu_page( 'edit.php' ); // 投稿
  remove_menu_page( 'upload.php' ); // メディア
  remove_menu_page( 'edit-comments.php' ); // コメント
  // remove_submenu_page( 'themes.php', 'theme-editor.php' ); // 外観 / テーマエディタ.
  // remove_menu_page( 'plugins.php' ); // プラグイン
  remove_menu_page( 'users.php' ); // ユーザー
  remove_menu_page( 'tools.php' ); // ツール
} 
add_action( 'admin_menu', 'remove_menus', 999 );


/***************************************************/
/*************        メニュー      *****************/
/***************************************************/

//「外観 → メニュー」設定
function register_header_menus() {
  register_nav_menus( array( 
    'main-menu' => 'NavMenu',
  ));
}
add_action('after_setup_theme', 'register_header_menus');

//wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->add_li_class)) {
    $classes['class'] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//wp_nav_menuのaにclass追加
function add_additional_class_on_a($classes, $item, $args) {
  if(isset($args->add_li_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


/***************************************************/
/*************   カスタムフィールド   *****************/
/***************************************************/
/*
 * 投稿機能
 * 「お知らせ」を作成
 */
add_action( 'init', 'create_knowledge_post_type' );
function create_knowledge_post_type() {
    register_post_type( 'news', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => 'お知らせ', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'news',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest' => true,

    ]);
}
/*
 * 投稿機能
 * 「お知らせ」を作成
 */
$news_text = get_theme_mod('custom_news');
add_action( 'init', 'create_research_post_type' );
function create_research_post_type() {
    register_post_type( 'research', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '研究会・学会活動', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'research',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'menu_position' => 6,     // 管理画面上での配置場所
        'show_in_rest' => true,
    ]);
}
/*==============================
固定ページカテゴリ追加用コード
==============================*/
//固定ページにカテゴリを追加
add_action('init','add_categories_for_pages'); 
function add_categories_for_pages(){ 
  register_taxonomy_for_object_type('category', 'page'); 
} 
//カテゴリアーカイブに固定ページを含める
add_action( 'pre_get_posts', 'my_set_page_categories' ); 
function my_set_page_categories( $query ) { 
  if ( $query->is_category== true && $query->is_main_query() ) { 
  $query->set('post_type', array( 'post', 'page')); 
} 
} 

/*==============================
スタータープラグイン
==============================*/
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'shapeshifter_register_required_plugins' );
	function shapeshifter_register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin bundled with a theme.
			array(
				'name'      => 'Advanced Custom Field Pro', // The plugin name.
				'slug'      => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
				'required'  => true, // 推奨の場合は「false」に
        'source'       => get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			),
      array(
				'name'      => 'custom-block', // The plugin name.
				'slug'      => 'snow-monkey-blocks', // The plugin slug (typically the folder name).
				'required'  => true, // 推奨の場合は「false」に
        'source'       => get_stylesheet_directory() . '/plugins/snow-monkey-blocks.zip', // The plugin source.
			),
      array(
				'name'      => '固定ページ管理プラグイン', // The plugin name.
				'slug'      => 'wp-nested-pages', // The plugin slug (typically the folder name).
				'required'  => false, // 推奨の場合は「false」に
        'source'       => get_stylesheet_directory() . '/plugins/wp-nested-pages.zip', // The plugin source.
			),

		);

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'この関数で設定するためのID',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );

	}