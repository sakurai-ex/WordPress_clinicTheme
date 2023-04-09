<?php
//フッター : Walker
class custom_walker_footer_menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = \null) {
    //グローバル変数呼び出し
    $output .= '';
  }
  function end_lvl(&$output, $depth = 0, $args = \null) {
    $terms = get_terms('category');
    if ($terms) {
      $index = 0;
      //グローバル変数呼び出し
      global $child_element_0_footer; //カテゴリ1の要素
      global $child_element_1_footer; //カテゴリ2の要素
      global $child_element_2_footer; //カテゴリ3の要素
      //start_elで生成した要素を配列化
      $child_element_array = [$child_element_0_footer, $child_element_1_footer, $child_element_2_footer];
      foreach ( $terms as $term ) {
        if ($term->slug == 'uncategorized') {
          //カテゴリが未分類の時、処理を抜け出す。
          break 1;
        } else {
          //カテゴリが未分類以外の場合。
          //$child_element_array配列を順番に出力
          // $this_category_name  = $this_categories[0]->name;
          $output .= '<span class="footer-nav__category-title">'.$term->name.'</span>';
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
      global $child_element_0_footer; //カテゴリ1の要素
      global $child_element_1_footer; //カテゴリ2の要素
      global $child_element_2_footer; //カテゴリ3の要素
      foreach ($classes as $class) {
          $css_classes .= $class . ' ';
      }
      if (strpos($css_classes, 'menu-item-has-children') !== false) {
          //子階層を持つナビゲーションメニュー
          $output .= '<li id="' . $id . '" class="footer__nav-item footer-nav footer-nav--dropdown' . $css_classes . '"><span class="footer-nav__title" href="' . $item->url . '" >' . $item->title . '</span>';
      } elseif ($depth != 0) { 
        //子階層のナビゲーションメニュー
          $categories = get_the_category( $item->object_id );
          $cat_slug = $categories[0]->category_nicename;
          //カテゴリのスラッグによって格納先を変更
          if ($cat_slug == 'category__1') {
            //カテゴリ1の場合
            $child_element_0_footer = $child_element_0_footer.'<a class="footer-nav__link" href="' . $item->url . '">' . $item->title . '</a>';
          } elseif ($cat_slug == 'category__2') {
            //カテゴリ2の場合
            $child_element_1_footer = $child_element_1_footer.'<a class="footer-nav__link" href="' . $item->url . '">' . $item->title . '</a>';
          } elseif ($cat_slug == 'category__3') {
            //カテゴリ3の場合
            $child_element_2_footer = $child_element_2_footer.'<a class="footer-nav__link" href="' . $item->url . '">' . $item->title . '</a>';
          }
      } else {
        //子階層を持たない通常のナビゲーション
          $output .= '<li id="' . $id . '" class="footer__nav-item footer-nav ' . $css_classes . '"><a class="footer-nav__link" href="' . $item->url . '" >' . $item->title . '</a></li>';
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
        $output .= '';
    } 
  }
}