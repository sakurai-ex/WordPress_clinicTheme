<ul class="doctor-block__items">
  <?php if(have_rows('list')): 
  $index = 1; 
  ?>
  <?php while(have_rows('list')): the_row(); ?>
  <?php 
  if ($index % 2 == 0 ):
  ?>
  <li class="doctor-block__item" style="background-color: <?php echo  the_field('color_1') ?>;"><?php the_sub_field('text'); ?></li>
  <?php else :?>
  <li class="doctor-block__item" style="background-color: <?php echo  the_field('color_2') ?>;"><?php the_sub_field('text'); ?></li>
  <?php endif; ?>
  <?php $index = $index + 1; ?>
  <?php endwhile; ?>
  <?php endif; ?>
</ul>