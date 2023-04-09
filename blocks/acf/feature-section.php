<section 
  class="top-feature section" 
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
<div class="top-feature__inner inner">
  <?php
    $title = get_field('title');
    if ( $title ): 
  ?>
    <h3 class="top-news__title title"><?php echo $title ?></h3>
  <?php endif; ?>
  <?php
  $text = get_field('intro_text');
  if ( $text ): 
  ?>
  <p class="intro_text"><?php echo $text; ?></p>
  <?php endif; ?>
  <?php 
  $fields = (get_field('list')['box']); 
  $count = count($fields);
  if ($count == 2 || $count == 4) {
    echo '<ul class="top-feature__lists column--2">';
  } else {
    echo '<ul class="top-feature__lists">';
  }
  ?>
  <!-- Repeater fileld in group -->
  <?php
  if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
      foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
        $title = $field["box-title"];
        $number = $field['box-number'];
        $text = $field['box-text'];
  ?>
    <li class="top-feature__box feature-box">
      <p class="feature-box__sub-title main-color"><?php echo $title; ?></p>
      <p class="feature-box__main-title main-color"><?php echo $number ?></p>
      <p class="feature-box__text sub-color"><?php echo $text; ?></p>
    </li>
  <?php endforeach; endif; ?>
  </ul>
</div>
</section>
<!-- /.top-feature -->