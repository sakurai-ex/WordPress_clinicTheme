<?php 
/*
 * Template Name: accessテンプレート
 * Template Post Type: page
 */
?>
<?php get_header(); ?>
<div class="child-page">
<div class="child-page__inner inner">
  <div class="schedule-block">
    <h3 class="normal-block__title">診療時間</h3>
    <div class="schedule-block__meta-info meta-info__column sub-font">
      <table class="meta-info__block meta-info__block--schedule">
        <caption class="meta-info__caption">
          <span class="badge bold sub-background">休診日</span> <?php echo get_field('group', 'option')['yasumi']; ?>
        </caption>
        <tbody class="meta-info__schedule">
          <tr><th>診療時間</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th class="text-nowrap">日祝</th></tr>
          <?php if( have_rows('group', 'option') ): ?>
            <?php
            $fields = get_field('group', 'option')['list'];
            if ($fields) : // ⇒ $fields = (get_field('group')['repeat'])が存在するとき
                foreach ($fields as $field) : // ⇒ foreachでループ処理を行う
                  $yobi_status = $field['yobi-list'];
            ?>
            <tr><td><?php echo $field['time']; ?></td>
            <?php 
              foreach ($yobi_status as $yobi) : // ⇒ foreachでループ処理を行う
                if ($yobi === true) {
                  echo '<td class="active">a</td>';
                } 
                if ($yobi === false) {
                  echo "<td>-</td>";
                }
              endforeach;
              ?>
            <?php endforeach; endif;?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="access-block">
    <h3 class="normal-block__title">アクセス</h3>
    <div class="schedule-block__meta-info meta-info__column sub-font">
      <table class="meta-info__block">
        <tbody>
        <?php if( have_rows('option__item', 'option') ): ?>
        <?php while( have_rows('option__item', 'option') ): the_row(); ?>
        <?php if(get_sub_field('access')): ?>
        <tr class="meta-info__list">
          <th class="meta-info__title">
            <?php if(get_sub_field('option__title')): ?>
            <span class="sub-background"><?php the_sub_field('option__title'); ?></span>
            <?php endif; ?>
          </th>
          <td class="meta-info__text" colspan="2">
          <?php if(get_sub_field('option__textarea')): ?>
            <?php the_sub_field('option__textarea'); ?>
          <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
      </table>
      <div class="meta-info__column meta-info__column--google-map">
        <?php the_field('option__map', 'option'); ?>
      </div>
    </div>
  </div>
</div>
  </div>
<?php get_footer(); ?>