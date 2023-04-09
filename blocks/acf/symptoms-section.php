<section 
  class="top-symptoms section" 
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
  <div class="top-symptoms__inner inner">
    <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-symptoms__title"><?php echo $title; ?></h3>
    <?php endif; ?>
    <?php
    $text = get_field('intro_text');
    if ( $text ): 
    ?>
    <p class="top-symptoms__text"><?php echo $text;  ?></p>
    <?php endif; ?>
    <ul class="top-symptoms__lists">
      <?php $fields = (get_field('list')); ?>
      <?php
      if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
          foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
            $text = $field['text'];
      ?>
      <li class="top-symptoms__list symptoms-item"><?php echo $text; ?></li>
      <?php endforeach; endif; ?>
    </ul>
  </div>
</section>
<!-- /.top-symptoms -->