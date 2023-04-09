<section 
  class="top-reason section" 
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
    <div class="top-reason__inner inner--l">
    <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-reason__title title"><?php echo $title ?></h3>      
    <?php endif; ?>
    <?php 
    $fields = (get_field('list')['box']); 
    $count = count($fields);
    if ($count == 2) {
      echo '<div class="top-reason__lists column--2">';
    } elseif ($count == 1) {
      echo '<div class="top-reason__lists column--1">';
    } elseif ($count == 3) {
      echo '<div class="top-reason__lists column--3">';
    }
    ?>
        <?php
        if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
            foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
              $image = $field["image"];
              $title = $field['title'];
              $text = $field['text'];
        ?>
        <div class="top-reason__list reason-card">
          <?php if ($image):?>
          <div class="reason-card__image-area">
            <img src="<?php echo $image; ?>" alt="" class="reason-card__image">
          </div>
          <?php endif;?>
          <?php if ($title):?>
          <h4 class="resson-card__title"><?php echo $title; ?></h4>
          <?php endif;?>
          <?php if ($text):?>
          <p class="reason-card__text"><?php echo $text; ?></p>
          <?php endif;?>
        </div>
      <?php endforeach; endif; ?>
      </div>
    </div>
  </section>
  <!-- /.top-reason -->