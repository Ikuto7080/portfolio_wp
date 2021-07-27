<?php
global $post,$_HEADER;

// URLを取得
$http = is_ssl() ? 'https' : 'http' . '://';
$_HEADER['url'] = $http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

//ディスクリプションを取得
$_HEADER['description'] = wp_trim_words ( strip_shortcodes( $post->post_content  ), 55 );

//ogp画像を取得
$_HEADER['og_image'] = CFS()->get('thumbnail');

//ページタイトルを取得
if(is_single() || is_page()) {
    $_HEADER['title'] = (get_the_title($post->ID)) ? get_the_title($post->ID) : get_bloginfo('name');
} else {
    $_HEADER['title'] = get_bloginfo('name');
}

$og_image .= '?' . time(); // UNIXTIMEのタイムスタンプをパラメータとして付与（OGPのキャッシュ対策）

?>

<!DOCTYPE html>
<html <?php language_attributes(); //html要素のlang属性を出力?>>
<head>
    <meta charset="<?php bloginfo('charset'); //文字エンコーディング情報を出力?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right' ); //ページタイトルを出力 ?><?php bloginfo('name'); //サイト名を表示?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url' ); //ピングバックURLを出力 ?>">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/wow.min.js" defer></script>
    <script src="<?php echo get_template_directory_uri();?>/js/script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php wp_head(); //wp_headはテーマの</head>タグ直前に必ず挿入します ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <!-- headerがスマホとPCで分けるためにheader-fixedを設定 -->
        <div class="header-fixed">
            <h1 class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/image/logo.png" alt="極楽亭"></h1>
            <button class="nav-btn" id="nav-btn" type="button" aria-label="メニュー"><span></span><span></span><span></span></button>
        </div>
        <div class="nav header-nav" id="nav">
            <nav class="nav-wrap">
                <ul class="nav-list">
                    <li class="item"><a href="#">宿泊予約</a></li>
                    <li class="item"><a href="#">観光情報</a></li>
                    <li class="item"><a href="#">よくあるご質問</a></li>
                    <li class="item"><a href="<?php echo home_url('/contact/'); ?>">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
    </header>