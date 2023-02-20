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

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//人気記事出力用
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
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
//目次をh2の上に表示する
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //

function insert_table_of_contents( $the_content ){
    if(is_single()) {
        $tag = '/^<h2.*?>(.+?)<\/h2>$/im';
        if(preg_match_all($tag, $the_content, $tags)) {
            $idpattern = '/id *\= *["\'](.+?)["\']/i';
			$table_of_contents = '<p class="point mokuji" id="mokuji"><span class="icon-list-ul"></span> 記事の内容</p><ul>';
			$idnum = 1;
            $nest = 0;

            for($i = 0 ; $i < count($tags[0]) ; $i++){
                if( ! preg_match_all($idpattern, $tags[0][$i], $idstr) ){
                    $idstr[1][0] = 'autoid_'.$idnum++; 
                    $the_content = preg_replace( "/".str_replace('/', '\/' ,$tags[0][$i])."/", preg_replace('/(^<h2)/i', '${1} id="' . $idstr[1][0] . '" ' , $tags[0][$i]), $the_content,1);
                }
                $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';
            }

            $table_of_contents .= '</ul>';

            if($tags[0][0]){
                $the_content = preg_replace('/(^<h[2-6].*?>.+?<\/h[2-6]>$)/im', $table_of_contents.'${1}', $the_content,1);
            }
        }
    }
    return $the_content;
}
add_filter('the_content','insert_table_of_contents');



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
//AdSenseをh2の上に表示する
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  //
function add_ads_before_h2($the_content) {
if (is_single() && !is_single('1539') && !is_single('3809') && !is_single('3768') ) {
$ads = <<< EOF

<div class="ad-single">
<!-- 幅336×高さ280 目次上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-9555866221676505"
     data-ad-slot="6352990782"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<div style="clear:both"></div>
EOF;
	$h2 = '/^.+?<\/h2>$/im';//H2見出しのパターン

	if ( preg_match_all( $h2, $the_content, $h2s )) {
		if ( $h2s[0] ) {

			// 1つ目のh2見出しの上にアドセンス挿入
			if ( $h2s[0][0] ) {
				$the_content  = str_replace($h2s[0][0], $ads.$h2s[0][0], $the_content);
			}

		}
	}
}
return $the_content;
}
add_filter('the_content','add_ads_before_h2');