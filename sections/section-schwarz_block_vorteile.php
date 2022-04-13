<section class="blackAdvantages bgBlack marg" id="<?php echo get_sub_field('unique_id');?>" data-aos="fade-up">
    <div class="containerMax">
        <?php if ($subtitle = get_sub_field('subtitle')): ?>
            <div class="blackAdvantagesSubtitle colorMain" data-aos="fade-up"><?php echo $subtitle; ?></div>

        <?php endif; ?>
        <?php if($title=get_sub_field('title')):?>
            <<?php echo get_sub_field('title_tag');?> class="blackAdvantagesTitle" data-aos="fade-up"><?php echo $title;?></<?php echo get_sub_field('title_tag');?>>
            <div class="blackAdvantagesLine colorMain"></div>
    <?php endif;?>
        <?php if ($subtitle = get_sub_field('text')): ?>
            <div class="blackAdvantagesText colorGrey" data-aos="fade-up"><?php echo $subtitle; ?></div>
        <?php endif; ?>
        <div class="blackAdvantagesBlock">
            <?php foreach (get_sub_field('advantages') as $a):?>
                <div class="blackAdvantagesBlockItem">
                    <div class="blackAdvantagesBlockItemImg" style="background-color: <?php echo get_field('color_light', 'options')?>;">
                        <img src="<?php echo $a['icon']['url'];?>" alt="<?php echo $a['icon']['alt'];?>"></div>
                    <div class="blackAdvantagesBlockItemContent">
                        <div class="blackAdvantagesBlockItemContentTitle"><?php echo $a['title'];?></div>
                        <div class="blackAdvantagesBlockItemContentText colorGrey"><?php echo $a['text'];?></div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
