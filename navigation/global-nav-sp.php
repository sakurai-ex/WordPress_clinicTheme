<?php
//ヘッダーSP : Walker
class custom_walker_header_menu_sp extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = \null) {
    //グローバル変数呼び出し
    $output .= '<div class="global-menu-sp__child sub-font ">';
  }
  function end_lvl(&$output, $depth = 0, $args = \null) {
    $terms = get_terms('category');
    if ($terms) {
      $index = 0;
      //グローバル変数呼び出し
      global $child_element_0_sp; //カテゴリ1の要素
      global $child_element_1_sp; //カテゴリ2の要素
      global $child_element_2_sp; //カテゴリ3の要素
      //start_elで生成した要素を配列化
      $child_element_array = [$child_element_0_sp, $child_element_1_sp, $child_element_2_sp];
      foreach ( $terms as $term ) {
        if ($term->slug == 'uncategorized') {
          //カテゴリが未分類の時、処理を抜け出す。
          break 1;
        } else {
          //カテゴリが未分類以外の場合。
          //$child_element_array配列を順番に出力
          $back_color = get_field('page_category_color', 'category_'.$term->term_id);
          // $this_category_name  = $this_categories[0]->name;
          $output .= '<span class="header-nav__child-title" style="' . esc_attr( 'background:' . "$back_color" ) . '">'.$term->name.'</span>';
          $output .= $child_element_array[$index];
          $index = $index + 1;
        };
      }
    }
  }
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $classes = empty($item->classes) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;
      $id = 'menu-item-' . $item->ID;
      $css_classes = '';
      //グローバル変数定義
      global $child_element_0_sp; //カテゴリ1の要素
      global $child_element_1_sp; //カテゴリ2の要素
      global $child_element_2_sp; //カテゴリ3の要素
      foreach ($classes as $class) {
          $css_classes .= $class . ' ';
      }
      if (strpos($css_classes, 'menu-item-has-children') !== false) {
          //子階層を持つナビゲーションメニュー
          $output .= '<li id="' . $id . '" class="global-menu-sp__link  js-accordion ' . $css_classes . '"><span class="sub-font" href="' . $item->url . '" style=" color: '.get_theme_mod('header_nav_color', '#000').'">' . $item->title . '</a></li>';
      } elseif ($depth != 0) { 
        //子階層のナビゲーションメニュー
          $categories = get_the_category( $item->object_id );
          $cat_slug = $categories[0]->category_nicename;
          //カテゴリのスラッグによって格納先を変更
          if ($cat_slug == 'category__1') {
            //カテゴリ1の場合
            $child_element_0_sp = $child_element_0_sp.'<li><a class="sub-font" href="' . $item->url . '">' . $item->title . '</a></li>';
          } elseif ($cat_slug == 'category__2') {
            //カテゴリ2の場合
            $child_element_1_sp = $child_element_1_sp.'<li><a class="sub-font" href="' . $item->url . '">' . $item->title . '</a></li>';
          } elseif ($cat_slug == 'category__3') {
            //カテゴリ3の場合
            $child_element_2_sp = $child_element_2_sp.'<li><a class="sub-font" href="' . $item->url . '">' . $item->title . '</a></li>';
          }
      } else {
        //子階層を持たない通常のナビゲーション
          $output .= '<li id="' . $id . '" class="global-menu-sp__link ' . $css_classes . '"><a class="sub-font" href="' . $item->url . '" style=" color: '.get_theme_mod('header_nav_color', '#000').'">' . $item->title . '</a></li>';
      }
  }
  function end_el(&$output, $item, $depth = 0, $args = \null) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;
    $css_classes = '';
    foreach ($classes as $class) {
        $css_classes .= $class . ' ';
    }
    if (strpos($css_classes, 'menu-item-has-children') !== false) {
        //子階層を持つナビゲーションメニュー
        $output .= '</div>';
    } 
  }
}