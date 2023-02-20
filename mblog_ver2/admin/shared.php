<?php ?>
<style type="text/css">
table {border-collapse: collapse;}
.FormImageFieldPreviewArea { margin-bottom: 12px;max-width: 300px;width: 100%; }
.FormImageFieldPreview { display: block;width: 100%; }
.FormImageFieldButtonArea { align-items: center;display: flex; }
.FormImageFieldUploadButton { margin-right: 12px!important; }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js" integrity="sha256-wWIfHlrIpCbyDbt+VSBUsc54ApQZWKqBmF38yUKLGeY=" crossorigin="anonymous"></script>

<!-- メディアアップローダー用のJavaScript -->
<script type="text/javascript">
var file_frame;
function showMediaPicker(callback) {
  if (file_frame) {
    file_frame.off('select');
  } else { 
    file_frame = wp.media.frames.file_frame = wp.media({
      title: 'アップロードする画像を選択',
      button: {
        text: 'この画像を使う',
      },
      multiple: false
    });
  }
  file_frame.on('select', function() {
    attachment = file_frame.state().get('selection').first().toJSON();
    callback(attachment);
  });
  file_frame.open();
}
jQuery(document).ready(function($) {
  // 画像選択フィールドの選択ボタンクリックイベント
  $('.js-imageUploadButton').on('click', function (event) {
    const $item = $(this);
    const fieldInputTagId = $item.data('field-id');
    // 選択された画像をプレビューするimgタグのID
    const previewImageTagId = $item.data('preview-id');
    const size = $item.data('size') || 'full';
    // WordPressのメディアピッカーを表示
    showMediaPicker(function(attachment) {
      let url = attachment.url;
      if (size in attachment.sizes) {
        url = attachment.sizes[size].url;
      }
      // 画像のURLをPostするための隠しフィールドをセット
      $(`#${fieldInputTagId}`).val(url);
      // 選択された画像をプレビューするimgタグをセット
      $(`#${previewImageTagId}`).attr('src', url);
    });
  });
  // 画像選択フィールドのクリアボタンクリックイベント
  $('.js-imageClearButton').on('click', function (event) {
    const $item = $(this);
    const fieldInputTagId = $item.data('field-id');
    $(`#${fieldInputTagId}`).val('');
    // 選択された画像をプレビューするimgタグをクリア
    const previewImageTagId = $item.data('preview-id');
    $(`#${previewImageTagId}`).attr('src', '');
  });
});
</script>