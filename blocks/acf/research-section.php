<?php
$research_query = new WP_Query(
  array(
    'post_type'      => 'research',
    'posts_per_page' => 6,
    'order' => 'ASC'
  )
);
?>
<?php if ( $research_query->have_posts() ) : ?>
<section 
  class="top-report section" 
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
  <div class="top-report__inner inner">
    <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-reason__title title"><?php echo $title; ?></h3>
    <?php endif; ?>
    <?php
    $text = get_field('intro_text');
    if ( $text ): 
    ?>
    <p class="intro_text"><?php echo $text; ?></p>
    <?php endif; ?>
    <ul class="top-report__lists">
      <?php while ( $research_query->have_posts() ) : ?>
        <?php $research_query->the_post(); ?>
        <li class="top-report__list report-list sub-font">
          <div class="report-list__head">
            <span class="report-list__date main-color"><?php the_time('Y.m.d'); ?></span>
            <h4 class="report-list__title"><?php the_title(); ?></h4>
          </div>
          <p class="report-list__text"><?php the_content(); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
    </div>
  </section>
  <?php endif; ?>
  </div>
</section>
<!-- /.top-report -->