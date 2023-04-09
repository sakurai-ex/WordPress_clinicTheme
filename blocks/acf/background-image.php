<?php
  if ( ( get_field( 'image' ) ) ) {
  $image = get_field('image') ?: 'ここにテキストが入ります';
  };
?>
<div class="background-image">
  <img src="<?php echo  $image ?>" alt="" class="background-image__image">
</div>
<!-- /.background-image -->