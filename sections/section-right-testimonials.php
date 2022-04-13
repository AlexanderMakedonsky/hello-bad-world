<section class="testimonialsRight padd" id="<?php echo get_sub_field('unique_id');?>" data-aos="fade-up" style="background-color: <?php echo get_sub_field('bg');?>;" >
    <div class="container">
        <div class="testimonialsRightText">
            <?php if ($subtitle = get_sub_field('subtitle')): ?>
                <div class="subtitle colorMain" data-aos="fade-up"><?php echo $subtitle; ?></div>
            <?php endif; ?>
            <?php if ($title = get_sub_field('title')): ?>
            <<?php echo get_sub_field('title_tag'); ?> class="title2" data-aos="fade-up"><?php echo $title; ?></<?php echo get_sub_field('title_tag'); ?>>
            <?php endif; ?>
            <div class="line colorMain"></div>
            <?php if ($text = get_sub_field('text')): ?>
                <div class="text" data-aos="fade-up"><?php echo $text; ?></div>
            <?php endif; ?>
            <?php if ($btn = get_sub_field('btn')): ?>
                <a href="<?php echo $btn['url']; ?>" class="btn" data-aos="fade-up"
                   <?php if ($btn['target']): ?>target="<?php echo $btn['target']; ?>"<?php endif; ?>><?php echo $btn['title']; ?></a>
            <?php endif; ?>
        </div>
        <div class="testimonialsRightWrap">
            <div class="testimonialsRightWrapBlock" data-aos="fade-up">
                <?php foreach (get_sub_field('testimonials') as $t):?>
                    <div class="testimonialsRightWrapBlockItem">
                        <?php if($t['stars']):
                            ?>
                            <div class="stars">
                                <?php
                                for ($i = 1; $i <= intval($t['stars']); $i++) {
                                    ?>
                                    <img src="/wp-content/themes/master-template/img/Star.svg" alt="">
                                    <?php
                                }
                                ?>
                            </div>
                        <?php endif;?>
                        <?php if($t['img']):?>
                            <div class="testimonialsRightWrapBlockItemImg"><?php echo wp_get_attachment_image($t['img']['ID'], 'full');?></div>
                        <?php endif;?>
                        <div class="testimonialsRightWrapBlockItemText"><?php echo $t['text'];?></div>
                        <div class="testimonialsRightWrapBlockItemName"><?php echo $t['name'];?></div>
                        <?php if($t['position'] !== ''):?>
                            <div class="testimonialsRightWrapBlockItemPosition colorGrey"><?php echo $t['position'];?></div>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="slickNumberSlide">01/03</div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function (){
        var $slickElement = $('#<?php echo get_sub_field('unique_id');?> .testimonialsRightWrapBlock');

        var $status = $('.slickNumberSlide');
        $($slickElement).slick({
            dots: false,
            infinite: true,
            arrows: true,
            speed: 300,
            // centerMode: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        variableWidth: false,
                        centerMode: true,
                        centerPadding: '35px',
                    }
                },
            ]
        });
        if($(window).width() >=1024){
            $('#<?php echo get_sub_field('unique_id');?> .testimonialsRightWrapBlock').slick('slickGoTo', 1);
        }

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            var i = (currentSlide ? currentSlide : 0) + 1;
            var Count = slick.slideCount;
            i <= 9 ? i = ('0' + i) : i = i;
            Count <= 9 ? Count = ('0' + Count) : Count = slick.slideCount;
            $status.text(i + '/' + Count);

            // $status.text(i + '/' + slick.slideCount);
        });
    });
</script>
