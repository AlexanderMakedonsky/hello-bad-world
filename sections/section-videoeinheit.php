<section class="videoFile marg" id="<?php echo get_sub_field('unique_id');?>" data-aos="fade-up">
    <div class="">
        <?php if ($subtitle = get_sub_field('subtitle')): ?>
            <div class="videoFileSubtitle colorMain" data-aos="fade-up"><?php echo $subtitle; ?></div>
        <?php endif; ?>
        <?php if($title=get_sub_field('title')):?>
        <<?php echo get_sub_field('title_tag');?> class="blackAdvantagesTitle colorBlack" data-aos="fade-up"><?php echo $title;?></<?php echo get_sub_field('title_tag');?>>
    <div class="videoFileLine"></div>
    <?php endif;?>
    <?php if ($subtitle = get_sub_field('text')): ?>
        <div class="videoFileText colorGrey" data-aos="fade-up"><?php echo $subtitle; ?></div>
    <?php endif; ?>
    <?php if ($video = get_sub_field('video_file')): ?>
        <div class="videoFileBlock" data-aos="fade-up">
            <video id="media-video" src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>"></video>
            <div class="videoFileBlockPause">
                <div>
                    <img src="/wp-content/themes/master-template/img/pause.png" alt="">
                </div>
            </div>
            <div class="videoFileBlockPlay">
                <div>
                    <img src="/wp-content/themes/master-template/img/play.png" alt="">
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</section>
<script>
    $('#media-video').on('ended', function () {
        $('.videoFileBlockPlay').show();
        $('.videoFileBlockPause').hide();
    });
    $('.videoFileBlockPlay').on('click', function () {
        $('.videoFileBlockPlay').hide();
        $('.videoFileBlockPause').show();
        $('#media-video').get(0).play();
    })
    $('.videoFileBlockPause').on('click', function () {
        $('.videoFileBlockPause').hide();
        $('.videoFileBlockPlay').show();
        $('#media-video').get(0).pause();
    })
</script>
