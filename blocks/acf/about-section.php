<section 
  class="top-about section" 
  <?php 
  $color = (get_field('group')['color']); 
  echo $color;
  if ($color):
  ?>
  style="background-color: <?php echo $color; ?>"
  <?php endif; ?>
  <?php 
  $image = (get_field('group')['image']); 
  echo $image;
  if ($image):
  ?>
  style="background-image: url('<?php echo $image; ?>');"
  <?php endif; ?>
>
  <div class="top-about__inner inner--l">
  <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-about__title title"><?php echo $title; ?></h3>
    <?php endif; ?>
    <?php
    $text = get_field('intro_text');
    if ( $text ): 
    ?>
    <p class="top-about__text intro_text"><?php echo $text; ?></p>
    <?php 
    endif; 
    $categories = get_categories(array(
      'taxonomy' => 'category',
    )); //最上位のカテゴリーのみを取得する
    $count = count($categories);
    if ($count == 3) {
      echo '<div class="top-about__container column--2">';
    } elseif ($count == 2) {
      echo '<div class="top-about__container column--1">';
    } else {
      echo '<div class="top-about__container column--3">';
    }
    ?>
    <?php
      foreach ($categories as $category):
      ?>
      <div class="top-about__item about-item">
        <?php if ($category->slug == 'uncategorized'):?>
        <?php else:?>
          <?php $back_color = get_field('page_category_color', 'category_'.$category->term_id); ?>
          <h4 style="background-color:<?php echo $back_color; ?> " class="about-item__title sub-background"><?php echo $category->name; ?></h2>
        <?php endif; ?>
      <?php
        $my_query = new WP_Query(array(
          'post_type' => 'page',
          'category_name' => $category->slug
        ));
        if ($my_query->have_posts()):
      ?>
      <div class="about-item__lists">
      <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <?php if ($category->slug == 'uncategorized'):?>
        <?php else:?>
        <a href="<?php the_permalink(); ?>" class="about-item__link"><?php the_title(); ?></a>
        <?php endif; ?>
      <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
      <?php else: ?>
      <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- /.top-about -->