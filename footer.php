<!-- 下層ページのみパンクずリスト表示 -->
<?php if(is_front_page()):?>
<?php elseif ( !is_home() || !is_front_page() ) : ?>
<div class="breadcrumb sub-font">
  <div class="breadcrumb__inner inner--l">
    <ol class="breadcrumb__content" itemscope="" itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="#" itemprop="item">
          <span itemprop="name">HOME</span>
        </a>
        <meta itemprop="position" content="1">
      </li>
      <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <span itemprop="name"><?php the_title(); ?></span>
        <meta itemprop="position" content="2">
      </li>
    </ol>
  </div>
</div>
<?php endif; ?>
<footer class="footer sub-font">
    <div class="footer__inner inner--l">
      <?php 
        if ( is_home() || is_front_page() ) : 
          $id = 2;
        else :
          $id = get_the_ID(); 
        endif;
      ?>
      <?php if ( get_field('page__option',  $id) ): ?>
        <div class="footer__head meta-info">
          <div class="meta-info__column">
            <table class="meta-info__block">
              <tbody>
              <?php if( have_rows('option__item', 'option') ): ?>
              <?php while( have_rows('option__item', 'option') ): the_row(); ?>
              <tr class="meta-info__list">
                <th class="meta-info__title">
                  <?php if(get_sub_field('option__title')): ?>
                  <span class="sub-background"><?php the_sub_field('option__title'); ?></span>
                  <?php endif; ?>
                </th>
                <td class="meta-info__text" colspan="2">
                <?php if(get_sub_field('option__textarea')): ?>
                  <?php the_sub_field('option__textarea'); ?>
                <?php endif; ?>
                </td>
              </tr>
              <?php endwhile; ?>
              <?php endif; ?>
              </tbody>
            </table>
            <table class="meta-info__block meta-info__block--schedule">
        <caption class="meta-info__caption">
          <span class="badge bold sub-background">休診日</span> <?php echo get_field('group', 'option')['yasumi']; ?>
        </caption>
        <tbody class="meta-info__schedule">
          <tr><th>診療時間</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th class="text-nowrap">日祝</th></tr>
          <?php if( have_rows('group', 'option') ): ?>
            <?php
            $fields = get_field('group', 'option')['list'];
            if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
                foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
                  $yobi_status = $field['yobi-list'];
            ?>
            <tr><td><?php echo $field['time']; ?></td>
            <?php 
              foreach ($yobi_status as $yobi) : // ⇒ foreachでループ処理を行う
                if ($yobi === true) {
                  echo '<td class="active">a</td>';
                } 
                if ($yobi === false) {
                  echo "<td>-</td>";
                }
              endforeach;
              ?>
            <?php endforeach; endif;?>
          <?php endif; ?>
        </tbody>
      </table>
          </div>
          <div class="meta-info__column meta-info__column--google-map">
            <?php  
              $google_map = get_field('option__map', 'option');
              if ($google_map) {
                the_field('option__map', 'option');
              }
            ?>
          </div>
        </div> 
      <?php endif; ?>
      <div class="footer__bottom">
      <?php 
          if (!empty(get_theme_mod('footer_logo'))) {
            echo '<div class="footer__logo-area footer__logo-area--top">';
            echo '<img class="footer__logo" src="'.get_theme_mod('footer_logo').'" alt="ロゴ画像">';
            echo '</div>';
          }
      ?>
        <div class="footer__nav u-desktop">
            <?php 
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false,
              'menu_class' => 'footer__nav-lists',
              'add_li_class' => 'footer__nav-item footer-nav',
              'add_a_class' => 'footer-nav__link',
              'walker' => new custom_walker_footer_menu
            ));
            ?>
        </div>
      </div>
      <?php 
        if (!empty(get_theme_mod('footer_copyright'))) {
          echo "<p class='copyright'><a class='copyright__link' href='". esc_url(home_url())."'>".get_theme_mod('footer_copyright')."</a></p>";
        }
      ?>
    </div>
  </footer>
  <!-- /.footer -->
  <a href="#" id="js-scroll-top" class="js-scroll-top pagetop u-desktop"></a>
  <div class="fixed-button u-mobile">
    <?php 
      if (!empty(get_theme_mod('header_phone_number'))) {
        echo '<a href="tel:'.get_theme_mod('header_phone_number').'">電話する</a>';
      }
    ?>
    <?php 
        if (!empty(get_theme_mod('header_button_text'))) {
          echo '<a href="'.get_theme_mod('header_button_url').'" class="fixed-button__link" target="_blank" rel="noopener noreferrer">';
          echo get_theme_mod('header_button_text');
          echo '</a>';
        }
    ?>
    <a href="#" class="fixed-button__pagetop">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-up mt-n" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"></path>
      </svg>
    </a>
  </div>
  <?php wp_footer(); ?>
</body>
</html>