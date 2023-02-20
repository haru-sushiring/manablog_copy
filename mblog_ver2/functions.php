<?php
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
// WordPressがヘッダーで読み込むrsd_linkとwlwmanifest_linkを削除
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
// WordPressが自動読み込みするwp-embedスクリプト（Youtube等の動画埋め込み用スクリプト）を削除
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
// WordPressのjQuery自動読み込みを解除
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
	}
}
add_action('init', 'replace_jquery');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
// サムネイル表示の有効化
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
add_theme_support('post-thumbnails');

//更新日の追加
function get_mtime($format) {
	$mtime = get_the_modified_time('Ymd');
	$ptime = get_the_time('Ymd');

	if ($ptime > $mtime) {
		return get_the_time($format);
	} elseif ($ptime === $mtime) {
		return null;
	} else {
		return get_the_modified_time($format);
	}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
// 人気記事出力用
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
	}
	return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
	}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//スマホのみ条件分岐
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function is_mobile(){
	$useragents = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android.*Mobile', // 1.5+ Android *** Only mobile
		'Windows.*Phone', // *** Windows Phone
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
		);
	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//ビジュアルエディタ対応
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function remove_p_on_images($content){
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'remove_p_on_images');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//管理画面に独自のフィールド
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
define('ORIGINAL_FIELD_GROP_MANAGA',         'original-field-mblog');      // 設定のグループ名
define('ORIGINAL_FIELD_SITENAME_MAIN',       'mblog_sitename_main');        //サイト名メイン
define('ORIGINAL_FIELD_SITENAME_SUB',        'mblog_sitename_sub');         //サイト名サブ
define('ORIGINAL_FIELD_FACEBOOK_APP_ID',     'mblog_facebook_app_id');      //Facebook App ID(fb:app_id)
define('ORIGINAL_FIELD_FACEBOOK_ADMINS_ID',  'mblog_facebook_admins_id');   //Facebook admins ID(fb:admins)
define('ORIGINAL_FIELD_TWITTER',             'mblog_twitter_id');           //TwitterのID
define('ORIGINAL_FIELD_PROFILE_IMG',         'mblog_profile_img');          //プロフィール画像
define('ORIGINAL_FIELD_PROFILE_NAME',        'mblog_profile_name');         //プロフィール名前
define('ORIGINAL_FIELD_PROFILE_DESCRIPTION', 'mblog_profile_description');  //プロフィール文
define('ORIGINAL_FIELD_TWITTER_ID_FOOTER',   'mblog_twitter_id_footer');    //プロフィール文
define('ORIGINAL_FIELD_PICKUP',              'mblog_pick_up');              //ピックアップ記事

function register_custom_settings() {
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_SITENAME_MAIN);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_SITENAME_SUB);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_FACEBOOK_APP_ID);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_FACEBOOK_ADMINS_ID);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_TWITTER);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_PROFILE_IMG);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_PROFILE_NAME);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_PROFILE_DESCRIPTION);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_TWITTER_ID_FOOTER);
	register_setting(ORIGINAL_FIELD_GROP_MANAGA, ORIGINAL_FIELD_PICKUP);
}
add_action('admin_init', 'register_custom_settings');

function register_custom_menu() {
  add_menu_page(
      'mblog管理',                                                            // mblog管理
      'mblog管理',                                                            // メニューの見出し
      'manage_options',                                                       // 権限
      'mblog-manage',                                                         // メニューのスラッグ
      function() { include(dirname(__FILE__) . '/admin/form-manage.php'); },  // 管理画面のページの定義関数
      'dashicons-admin-generic',                                              // メニューのアイコン
      0                                                                       // メニューでの表示位置
  );
}
add_action('admin_menu', 'register_custom_menu');

/* 管理画面上でメディアピッカーを使えるようにする（wp.mediaをセットする）*/
function my_media_script(){
	wp_enqueue_media();
 }
 add_action('admin_enqueue_scripts', 'my_media_script');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//管理画面にメニューを表示する
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menus( array(
		'gloval-navigation' => 'ヘッダーナビゲーション',
		'footer-navigation' => 'フッター ポートフォリオ',
		) );
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//タイトルとURLをコピー　実行するアクションの定義
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function title_copy_echo() {
//jQuery を CDN から読み込む
  wp_enqueue_script( 'jquery',
    'https://cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js', 
    array(), 
    '1.5.13',
	true				
	);				
// title_copy の読み込み 
  wp_enqueue_script( 
    'title_copy-script', 
    get_theme_file_uri( '/js/title_copy.js' )
  );
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//本文からnoopenerを残してnoreferrerだけ取り除く
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function remove_noopener_and_noreferrer_demo($the_content){
$the_content = str_replace(' rel="nofollow noopener noreferrer"', ' rel="nofollow noopener"', $the_content);
$the_content = str_replace(' rel="noopener noreferrer"', ' rel="noopener"', $the_content);
return $the_content;
}
add_filter('the_content', 'remove_noopener_and_noreferrer_demo', 9999);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//目次をh2の上に表示する
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //

function insert_table_of_contents( $the_content ){
    if(is_single()) {  //投稿ページの場合
        $tag = '/^<h2.*?>(.+?)<\/h2>$/im'; //見出しタグの検索パターン
        if(preg_match_all($tag, $the_content, $tags)) { //本文中に見出しタグが含まれていれば
            $idpattern = '/id *\= *["\'](.+?)["\']/i'; //見出しタグにidが定義されているか検索するパターン
			$table_of_contents = '<div class="hidden_box"><input type="checkbox" id="label1"/><label for="label1">目次</label><div class="hidden_show"><ul>';
			$idnum = 1;
            $nest = 0;

            for($i = 0 ; $i < count($tags[0]) ; $i++){
                if( ! preg_match_all($idpattern, $tags[0][$i], $idstr) ){
                    //見出しタグにidが定義されていない場合、「autoid_1」のようなidを自動設定
                    $idstr[1][0] = 'autoid_'.$idnum++; 
                    $the_content = preg_replace( "/".str_replace('/', '\/' ,$tags[0][$i])."/", preg_replace('/(^<h2)/i', '${1} id="' . $idstr[1][0] . '" ' , $tags[0][$i]), $the_content,1);
                }
                //見出しへのリンクを目次に追加。<li>でリスト形式に。
                $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';
            }

            $table_of_contents .= '</ul></div></div>'; //目次の各タグを閉じる

            if($tags[0][0]){
                //作った目次を、1番目の見出しタグの直前に追加
                $the_content = preg_replace('/(^<h[2-6].*?>.+?<\/h[2-6]>$)/im', $table_of_contents.'${1}', $the_content,1);
            }
        }
    }
    return $the_content;
}
// 記事表示時に「insert_table_of_contents()」を実行する
add_filter('the_content','insert_table_of_contents');

//名前の置換　468
// add_filter('the_content', function($content) {
// if (!is_page( array('468', '459') )) {
// $content = str_replace('すしりんぐ', 'はる', $content);
// }
// return $content;
// });