<?php
//ヘッダー : Walker
class custom_walker_header_menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = \null) {
    //グローバル変数呼び出し
    global $category;
    $category = [];
    $output .= "<div class='header-nav__child sub-font'><div class='header-nav__child-inner'>";
  }
  function end_lvl(&$output, $depth = 0, $args = \null) {
    $terms = get_terms('category');
    if ($terms) {
      $index = 0;
      //グローバル変数呼び出し
      global $child_element_0; //カテゴリ1の要素
      global $child_element_1; //カテゴリ2の要素
      global $child_element_2; //カテゴリ3の要素
      //start_elで生成した要素を配列化
      $child_element_array = [$child_element_0, $child_element_1, $child_element_2];
      foreach ( $terms as $term ) {
        if ($term->slug == 'uncategorized') {
          //カテゴリが未分類の時、処理を抜け出す。
          break 1;
        } else {
          //カテゴリが未分類以外の場合。
          //$child_element_array配列を順番に出力
          $back_color = get_field('page_category_color', 'category_'.$term->term_id);
          // $this_category_name  = $this_categories[0]->name;
          $output .= '<div class="header-nav__child-column"><span class="header-nav__child-title" style="' . esc_attr( 'background:' . "$back_color" ) . '">'.$term->name.'</span>';
          $output .= $child_element_array[$index];
          $output .='</div>';
          $index = $index + 1;
        };
      }
    }
    $output .='</div></div>';
  }
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $id = 'menu-item-' . $item->ID;
      $css_classes = '';
      //グローバル変数定義
      global $child_element_0;
      global $child_element_1;
      global $child_element_2;
      foreach ($classes as $class) {
          $css_classes .= $class . ' ';
      }
      if (strpos($css_classes, 'menu-item-has-children') !== false) {
          //子階層を持つナビゲーションメニュー
          $output .= '<li id="' . $id . '" class="header-nav__item ' . $css_classes . '"><a class="header-nav__link"  style=" color: '.get_theme_mod('header_nav_color', '#000').'">' . $item->title . '</a>';
      } elseif ($depth != 0) { 
        //子階層のナビゲーションメニュー
          $categories = get_the_category( $item->object_id );
          $cat_slug = $categories[0]->category_nicename;
          //カテゴリのスラッグによって格納先を変更
          if ($cat_slug == 'category__1') {
            //カテゴリ1の場合
            $child_element_0 = $child_element_0.'<a class="header-nav__child-link" href="' . $item->url . '">' . $item->title . '</a>';
          } elseif ($cat_slug == 'category__2') {
            //カテゴリ2の場合
            $child_element_1 = $child_element_1.'<a class="header-nav__child-link" href="' . $item->url . '">' . $item->title . '</a>';
          } elseif ($cat_slug == 'category__3') {
            //カテゴリ3の場合
            $child_element_2 = $child_element_2.'<a class="header-nav__child-link" href="' . $item->url . '">' . $item->title . '</a>';
          }
      } else {
        //子階層を持たない通常のナビゲーション
          $output .= '<li id="' . $id . '" class="header-nav__item ' . $css_classes . '"><a class="header-nav__link" href="' . $item->url . '" style=" color: '.get_theme_mod('header_nav_color', '#000').'">' . $item->title . '</a>';
      }
  }
  function end_el(&$output, $item, $depth = 0, $args = \null) {
    $output .= '';
  }
}