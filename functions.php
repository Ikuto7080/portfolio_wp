li<?php

function my_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'galley',
        'caption',
    ));
}

add_action('after_setup_theme', 'my_setup');


/* パーマリンク設定
---------------------------------------------------------- */
// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type ) {
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_page-blog'] = 'blogs';
        $args['has_archive'] = 'blog';
        $args['label'] = 'ブログ';
    }
    return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2);



/* カスタム投稿
---------------------------------------------------- */

function cpt_register_works() {
    $labels = [
        "singular_name" => "works",
        "edit_item" => "works"
    ];

    $args = [
        "label" => "ブログ",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "map_meta_cap" => true,
        "hierachical" => true,
        "rewrite" => ["slug" => "works", "with_front" => true],
        "query_var" => true,
        "menu_position" => 5,
        "supports" => ["title", "editor", "thumbnail"],
    ];
    register_post_type("works", $args);
    register_taxonomy_for_object_type('category', 'works');
    register_taxonomy_for_object_type('post_tag', 'works');

}

add_action('init', 'cpt_register_works');

// ページネーション機能

function the_pagination() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
      return;
    echo '<nav class="pagination">';
    echo paginate_links( array(
      'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
      'format'       => '',
      'current'      => max( 1, get_query_var('paged') ),
      'total'        => $wp_query->max_num_pages,
      'prev_text'    => '&larr;',
      'next_text'    => '&rarr;',
      'type'         => 'list',
      'end_size'     => 3,
      'mid_size'     => 3
    ) );
    echo '</nav>';
  }


/*
サイドバーにウィジェット追加
--------------------------------------------------------------------
*/

function widgetsidebar_init() {
    register_sidebar(array(
        'name'=>'サイドバー',
        'id' => 'side-widget',
        'before_widget'=>'
        <div id="%1$s" class="%2$s sidebar-wrapper">',
        'after_widget'=>'</dv>',
        'before_title'=>'<h5 class="sidebar-title">',
        'after_title'=>'</h5>'
    ));
}

add_action( 'widgets_init', 'widgetsidebar_init' );



/* answer
----------------
*/

global $NO_IMAGE_URL;
$NO_IMAGE_URL = '/image/noing.png';


/*文字数の設定
ーーーーーーーーーーーーーーーーーーーーーー
*/

function max_excerpt_length( $string, $maxLength) {
    $length = mb_strlen($string, 'UTF-8');
    if($length < $maxLength){
        return $string;
    } else{
        $string = mb_substr( $string, 0, $maxLength, 'utf-8');
        return $string.'[...]';
    }
}




/*パンくず
----------------------------------
*/

function breadcrumb($postID) {
    $title = get_the_title($postID);
    echo '<ol class="breadcrumb-list">';
    if (is_single() ) {
        // 詳細ページの場合
        echo '<li class="breadcrumb-item"><a href="/">ホーム</a></li>';
        echo '<li class="breadcrumb-item"><a href="/blog/">ブログ</a></li>';
        echo '<li class="breadcrumb-item" aria-current="page">'.$title.'<li>';
    }
    else if( is_page() ) {
        // 固定ページの場合
        echo '<li class="breadcrumb-item"><a href="/">ホーム</a></li>';
        echo '<li class="breadcrumb-item" aria-current="page">'.$title.'</li>';

    }
    echo "</ol>";
}