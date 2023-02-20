<!--/ Google Analytics 遅延読み込み -->
<script>
function lazyAnalyticsScript() {

//スクリプトの読み込みが1回目であることを確認するため
 let scrollFirstTime = 1;

//スクロールとマウス動作を検出
 window.addEventListener("scroll", oneTimeFunction, false);
 window.addEventListener("mousemove", oneTimeFunction, false);
 function oneTimeFunction() {
  if (scrollFirstTime === 1) {

//スクリプトの読み込みを1回限りにするため
   scrollFirstTime = 0;

//1つ目のscriptタグの書き込みこみ
   let adScript = document.createElement("script");
   adScript.src = 'https://www.googletagmanager.com/gtag/js?id=UA-136709543-2';
   document.body.appendChild(adScript);

//2つめのscriptタグの書き込み
   let adScript2 = document.createElement("script");
   adScript2.innerHTML = 'window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag("js", new Date()); gtag("config", "UA-136709543-2");';
   document.body.appendChild(adScript2);

//念のためeventListenerを削除
   window.removeEventListener("scroll", oneTimeFunction, false);
   window.removeEventListener("mousemove", oneTimeFunction, false);
  }
 }
}
lazyAnalyticsScript();
</script>
<!--/ Google Analytics 遅延読み込み END-->