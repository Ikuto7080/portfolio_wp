<?php
/*
Template Name: お問合せ
*/
?>
<?php get_header(); ?>

    <main class="contact">
        <div class="blog-top"></div>
        <div class="contact-inner">
            <div class="breadcruumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>
                <div class="contact">
                    <h2 class="cmn-title">
                        <span class="main">問い合わせ</span>
                        <span class="sub">contact</span>
                    </h2>
                    <?php while( have_posts() ) { ?>
                        <?php the_post(); ?>
                        <?php the_content(); ?>
                    <?php } ?>

                </div>
        </div>
    </main>

<?php get_footer();