<!--/ Adsense 遅延読み込み -->
<script type="text/javascript">
(function(window, document) {
  function main() {
    // GoogleAdSense読込み
    let ad = document.createElement('script');
    ad.type = 'text/javascript';
    ad.async = true;
    // 新コードの場合、サイト運営者IDを書き換えてコメントアウトを外す
    ad.dataset.adClient = 'ca-pub-9555866221676505';
    ad.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js';
    ad.crossorigin = 'anonymous';
    let sc = document.getElementsByTagName('script')[0];
    sc.parentNode.insertBefore(ad, sc);
  }

  // 遅延読込み
  let lazyLoad = false;
  function onLazyLoad() {
    if (lazyLoad === false) {
      // 複数呼び出し回避 + イベント解除
      lazyLoad = true;
      window.removeEventListener('scroll', onLazyLoad);
      window.removeEventListener('mousemove', onLazyLoad);
      window.removeEventListener('mousedown', onLazyLoad);
      window.removeEventListener('touchstart', onLazyLoad);
      window.removeEventListener('keydown', onLazyLoad);
      main();
    }
  }
  window.addEventListener('scroll', onLazyLoad);
  window.addEventListener('mousemove', onLazyLoad);
  window.addEventListener('mousedown', onLazyLoad);
  window.addEventListener('touchstart', onLazyLoad);
  window.addEventListener('keydown', onLazyLoad);
  window.addEventListener('load', function() {
    // ドキュメント途中（更新時 or ページ内リンク）
    if (window.pageYOffset) {
      onLazyLoad();
    }
  //何もアクションがないときは指定秒数後に読み込み開始（ミリ秒）
  window.setTimeout(onLazyLoad,3000)
  });
})(window, document);
</script>
<!--/ Adsense 遅延読み込み END-->