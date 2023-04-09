<?php
  $news_query = new WP_Query(
    array(
      'post_type'      => 'news',
      'posts_per_page' => 5,
      'order' => 'ASC'
    )
  );
?>
<?php if ( $news_query->have_posts() ) : ?>
<section 
  class="top-news section" 
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
  <div class="top-news__inner inner">
    <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-news__title title"><?php echo $title; ?></h3>
    <?php endif; ?>
    <?php
    $text = get_field('intro_text');
    if ( $text ): 
    ?>
    <p class="intro_text"><?php echo $text; ?></p>
    <?php endif; ?>
    <ul class="top-news__container news-lists sub-font">
  <?php while ( $news_query->have_posts() ) : ?>
    <?php $news_query->the_post(); ?>
  <li class="news-lists__item news">
      <div class="news__head">
        <span class="news__date"><?php the_time('Y.m.d'); ?></span>
        <h4 class="news__title"><?php the_title(); ?></h4>
      </div>
      <div class="news__body">
        <?php the_content(); ?>
      </div>
    </li>
<?php endwhile; ?>
</ul>
</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>