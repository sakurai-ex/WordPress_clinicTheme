
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

  var topBtn = $('.pagetop');
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
      if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
      } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
      }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
      $('body,html').animate({
      scrollTop: 0
      }, 300, 'swing');
      return false;
  });

  //ドロワーメニュー
  $("#MenuButton").click(function () {
      // $(".l-drawer-menu").toggleClass("is-show");
      // $(".p-drawer-menu").toggleClass("is-show");
      $(".js-drawer-open").toggleClass("open");
      $(".drawer-menu").toggleClass("open");
      $("html").toggleClass("is-fixed");

  });



  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  $(document).on('click', 'a[href*="#"]', function () {
    let time = 400;
    let header = $('header').innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $('html,body').animate({ scrollTop: targetY }, time, 'swing');
    return false;
  });
  // ページ内リンクに飛ぶ時にリンククリックしたらハンバーガーメニューが閉じるように
  $('#menu a[href]').on('click', function (event) {
    $('.js-hamburger').trigger('click')
  })

  //pagetop
  var page_top = $('#js-scroll-top');
  //header-nav
  var header_nav = $('.js-header-nav');
  $(window).scroll(function () {
    //ここの > 100 の数字がどれくらいスクロールしたら出現させるか数字変えてみて確認してみてね！
    if ($(this).scrollTop() > 100) {
      //下にスクロールした時
      page_top.addClass('is-fadein');
      header_nav.addClass('active');
    } else {
      //上にスクロールした時
      page_top.removeClass('is-fadein')
      header_nav.removeClass('active');
    }
  })
  if (window.matchMedia('(max-width: 767px)').matches) {
    //スマホ処理
  } else if (window.matchMedia('(min-width:768px)').matches) {
    //PC処理
    pcNavClick();
  }


function pcNavClick() {
  //have-childクラスを持ったヘッダーナビを取得
  var has_child_nav = $('.header-nav__item.menu-item-has-children');
  has_child_nav.click(function () {
    //クリックされた時にactiveクラスをトグルで付与
    has_child_nav.toggleClass('active');
  })
  //クリックされた時に
  $(document).on('click',function(e) {
    if(!$(e.target).closest('.header-nav__item.active').length) {
    //have-childクラスを持ったヘッダーナビ以外がクリックされたら
    //activeクラスを削除
      has_child_nav.removeClass('active');
    } else {
      // ターゲット要素をクリックした時の操作
    }
  });
}
  if ($('.slider').length) {
    $(".slider").slick({
      autoplay: true,
      dots: true,
      arrows: false,
    });
  };
  $('.hamburger').click(function () {
    $('.hamburger').toggleClass('active');
    $('body').toggleClass('fixed');
    if ($(this).hasClass('active')) {
      $('.js-globalMenuSp').addClass('active');
      $('.background').addClass('active');
    } else {
      $('.js-globalMenuSp').removeClass('active');
      $('.background').removeClass('active');
    }
    if ($('.js-accordion').hasClass('active')) {
      $('.global-menu-sp__child').css('display', 'none');
      $('.js-accordion').removeClass('active')
    } else {
    }
  })
  // ページ内リンクに飛ぶ時にリンククリックしたらハンバーガーメニューが閉じるように
$('#menu a[href]').on('click', function (event) {
  $('.js-hamburger').trigger('click')
})

$(".js-accordion").on("click", function () {
  // クリックした次の要素を開閉
  $(this).next().slideToggle(300);
  // タイトルにopenクラスを付け外しして矢印の向きを変更
  $(this).toggleClass("active", 300);

});
});
