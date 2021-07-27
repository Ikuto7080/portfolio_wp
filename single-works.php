<?php get_header(); ?>

<main class="single-work">
    <div class="inner">
        <div class="breadcruumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
        </div>
        <article class="entry">
            <div class="blog-cont">
                <?php
                $title=get_the_title();
                $ttl=CFS()->get('title');
                $date=CFS()->get('date');
                $thumbnail=CFS()->get('thumbnail');
                $head=CFS()->get('head');
                ?>
                <div class="blog-row"><?php echo $title; ?></div>
                <div class="blog-title"><?php echo $ttl; ?></div>
                <ul class="sns-date">
                    <li class="sns-icon">
                        <?php wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false)); ?>
                    </li>
                    <li class="blog-date"><?php echo $date; ?></li>
                </ul>
                <div class="img"><img src="<?php echo $thumbnail; ?>" alt=""></div>
                <div class="blog-head2">
                    <h2>見出し２</h2>
                    <div class="head-cont"><?php echo $head; ?></div>
                </div>
                <div class="blog-head3">
                    <h3>見出し３</h3>
                    <div class="blog-cont"><?php echo $head; ?></div>
                </div>
                <div class="blog-head3">
                    <h3>見出し３</h3>
                    <div class="blog-cont"><?php echo $head; ?></div>
                </div>
                <div class="blog-head2">
                    <h2>見出し２</h2>
                    <div class="head-cont"><?php echo $head; ?></div>
                </div>
            </div>
        </article>
    </div>
</main>
