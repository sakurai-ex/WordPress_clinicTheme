<section class="top-disease section"
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
    <div class="top-disease__inner inner--l">
      <h3 class="top-disease__title title"><?php the_field('title'); ?></h3>
      <?php
      $text = get_field('intro_text');
      if ( $text ): 
      ?>
      <p class="intro_text"><?php echo $text; ?></p>
      <?php endif; ?>
      <div class="top-disease__container">
      <?php $fields = (get_field('list')); ?>
      <?php
      if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
          foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
      ?>
        <?php if ($field['style'] == 'row_text' || $field['style'] == 'row_list'): ?>
          <div class="disease-card column--one">
        <?php elseif($field['style'] == 'column_text' || $field['style'] == 'column_list'): ?>
          <div class="disease-card column--two">
        <?php endif; ?>
          <div class="disease-card__image-area">
            <img src="<?php echo $field['image']; ?>" alt="" class="disease-card__image">
          </div>
          <?php if ($field['style'] == 'row_text' || $field['style'] == 'column_text'): ?>
            <div class="disease-card__body">
              <?php echo $field['text']; ?>
            </div>
          <?php endif; ?>
          <?php if ($field['style'] == 'row_list' || $field['style'] == 'column_list'): ?>
            <ul class="disease-card__body">
            <?php
              $link_list = $field['list'];
              if ($link_list) : 
                foreach ($link_list as $link_items) :                   
            ?>
            <?php if($link_items['link']): ?>
            <li><a href="<?php echo $link_items['link']; ?>" class="disease-card__link"><?php echo $link_items['text']; ?></a></li>
            <?php else: ?>
            <li><?php echo $link_items['text']; ?></li>
            <?php endif;?>
            <?php endforeach; endif; ?>
          </ul>
          <?php endif; ?>
        </div>
      <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
</section>
<!-- /.top-disease -->