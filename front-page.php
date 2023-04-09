<?php get_header(); ?>
  <div class="fv">
    <div class="fv__image-area">
        <?php 
          if (!empty(get_theme_mod('fv_image')) && empty(get_theme_mod('fv_image_sp'))) {
            echo '<img src="'.get_theme_mod('fv_image').'" alt="メインビジュアル" class="fv__image">';
          }
        ?>
        <!-- <?php 
          if (!empty(get_theme_mod('fv_image')) && !empty(get_theme_mod('fv_image_sp'))) {
            echo '<picture><source srcset="'.get_theme_mod('fv_image_sp').'" media="(max-width: 768px)" />';
            echo '<img src="'.get_theme_mod('fv_image').'" alt="メインビジュアル" class="fv__image">';
            echo '</picture>';
          }
        ?> -->
      <?php 
        if (!empty(get_theme_mod('fv__text'))) {
          echo '<div class="fv__text-area">';
          echo '<h1 class="fv__text sub-color">'.get_theme_mod('fv__text').'</h1>';
          echo '</div>';
        }
      ?>
    </div>
    <?php 
      if (!empty(get_theme_mod('fv_text_box_1')) or !empty(get_theme_mod('fv_text_box_2')) ) {
        echo '<div class="fv__lead">';
        if (!empty(get_theme_mod('fv_text_box_1'))) {
          echo '<span class="fv__lead--first sub-background">'.get_theme_mod('fv_text_box_1').'</span>';
        }
        if (!empty(get_theme_mod('fv_text_box_2'))) {
        echo '<span class="fv__lead--last main-background">'.get_theme_mod('fv_text_box_2').'</span>';
        }
        echo '</div>';
      }
    ?>
  </div>
  <!-- /.fv -->
  <?php the_content(); ?>
  <?php 
  get_footer();