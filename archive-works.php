<?php get_header(); ?>

    <main class="wp-works">
        <div class="blog-top"></div>
        <div class="archive-inner">
            <div class="breadcruumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php if(function_exists('bcn_display'))
                {
               bcn_display();
                }?>
            </div>
            <h2 class="cmn-title">
                <span class="main">ブログ</span>
                <span class="sub">blog</span>
            </h2>
            <?php
            $args = array(
                'post_type' =>'works',

            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()):
            ?>
            <ul class="blog-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <a href="<?php the_permalink();?> ">
                <li class="blog-item">

                        <div class="blog-cont">
                            <div class="blog-date"><?php echo CFS()->get('date'); ?></div>
                            <div class="blog-title"><?php echo max_excerpt_length(CFS()->get('title'), 40); ?></div>
                            <div class="blog-head"><?php echo max_excerpt_length(CFS()->get('head'), 40); ?></div>
                        </div>
                        <div class="img">
                            <div class="blog-title"><?php echo get_the_title(); ?></div>
                            <img src="<?php echo CFS()->get('thumbnail'); ?>" alt="">
                        </div>
                </li>
                    </a>
                <?php endwhile; endif;?>
            </ul>

<!-- ページ送り -->
            <div class="pagenate font">
            <div class="pagebox">
                <?php global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }
                else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');;
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $wp_query->max_num_pages,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '«',
                    'next_text' => '»',
                )); ?>
            </div>
            </div>

        </div>
    </main>
<?php get_footer();