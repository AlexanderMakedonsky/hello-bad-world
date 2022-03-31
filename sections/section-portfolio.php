<?php
$btn = get_sub_field('btn'); ?>
<section class="portfolio marg" id="<?php echo get_sub_field('unique_id');?>" data-aos="fade-up">
    <div class="container">
        <?php if ($subtitle = get_sub_field('subtitle')): ?>
            <div class="subtitle colorMain" data-aos="fade-up"><?php echo $subtitle; ?></div>
        <?php endif; ?>
        <?php if ($title = get_sub_field('title')): ?>
            <<?php echo get_sub_field('title_tag'); ?> class="title2" data-aos="fade-up"><?php echo $title; ?></<?php echo get_sub_field('title_tag'); ?>>
        <?php endif; ?>
        <div class="portfolioBlock <?php if (!$btn): ?>showAll<?php endif; ?>" data-aos="fade-up">
            <?php $portfolio = get_sub_field('portfolio');
            $portfolioItems = array_chunk($portfolio, 3);
            foreach ($portfolioItems as $item): ?>
                <div class="portfolioBlockWrap">
                    <?php foreach ($item as $p): ?>
                        <a href="<?php echo $p['img']['url']; ?>" class="portfolioBlockItem"
                           data-fancybox="<?php echo get_sub_field('unique_id');?>" data-caption="<strong><?php echo $p['title']; ?></strong><?php if ($p['info'] !== ''): ?><br><?php echo $p['info']; ?><?php endif; ?>">
                            <?php echo wp_get_attachment_image($p['img']['ID'], 'large'); ?>
                            <span class="portfolioBlockItemContent">
                            <span class="portfolioBlockItemContentTitle"><?php echo $p['title']; ?></span>
                            <?php if ($p['info'] !== ''): ?>
                                <span class="portfolioBlockItemContentText"><?php echo $p['info']; ?></span>
                            <?php endif; ?>
                        </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($btn): ?>
            <div class="btn" data-aos="fade-up" onclick="$(this).hide();$(this).prev('.portfolioBlock').addClass('showAll');"><?php echo $btn; ?></div>
        <?php endif; ?>
        <div class="portfolioBlockMob">
            <?php foreach (get_sub_field('portfolio') as $p):?>
                <div class="portfolioBlockMobItem">
                    <a href="<?php echo $p['img']['url']; ?>"
                       data-fancybox="<?php echo get_sub_field('unique_id');?>2" data-caption="<strong><?php echo $p['title']; ?></strong><?php if ($p['info'] !== ''): ?><br><?php echo $p['info']; ?><?php endif; ?>">
                        <?php echo wp_get_attachment_image($p['img']['ID'], 'large'); ?>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        if ($(document).width() <= 768) {
            $('#<?php echo get_sub_field('unique_id');?> .portfolioBlockMob').slick({
                dots: false,
                infinite: false,
                arrows: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '35px',
            });
            $('#<?php echo get_sub_field('unique_id');?> .portfolioBlock').slick('slickGoTo', 1);
        }
    });
</script>