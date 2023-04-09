<section class="top-reason">
    <div class="top-reason__inner inner--l">
    <?php
    $title = get_field('title');
    if ( $title ): 
    ?>
    <h3 class="top-reason__title title"><?php echo $title ?></h3>      
    <?php endif; ?>
    <div class="top-reason__lists">
        <InnerBlocks />
        <?php $fields = (get_field('list')['box']); ?>
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