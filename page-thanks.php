<?php get_header(); ?>

<div class="breadcruumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
    bcn_display();
    }?>
</div>

<div class="ns-box">
お問い合わせいただきありがとうございます。 内容を確認した後に、担当者よりご連絡を差し上げます。
</div>

<div class="home-link cmn-link"><a href="<?php bloginfo("url"); ?>/">ホームページへ戻る</a></div>

<?php get_footer();