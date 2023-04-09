<div class="slider">
  <?php if(have_rows('list')): ?>
  <?php while(have_rows('list')): the_row(); ?>
  <div class="slick-img">
    <img src="<?php echo the_sub_field('image') ?>" alt="<?php echo the_sub_field('text'); ?>"/>
    <div><p><?php echo the_sub_field('text'); ?></p></div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</div>