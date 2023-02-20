<!--/ tweet　Twitterタイムライン 遅延読み込み -->
<script type="text/javascript">
(function(window, document) {
  function main() {
    // 読込み
    let twitter = document.createElement('script');
    twitter.type = 'text/javascript';
    twitter.async = true;
    twitter.src = 'https://platform.twitter.com/widgets.js';
    twitter.charset = 'utf-8';
	document.body.appendChild(twitter);
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
<!--/ tweet　Twitterタイムライン 遅延読み込み END-->