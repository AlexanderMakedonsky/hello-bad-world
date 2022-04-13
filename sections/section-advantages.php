<section class="advantages marg" id="<?php echo get_sub_field('unique_id');?>" data-aos="fade-up">
    <div class="containerMax">
        <div class="advantagesBlock borderLine">
            <?php foreach (get_sub_field('advantages') as $a):?>
                <div class="advantagesBlockItem">
                    <div class="advantagesBlockItemImg" style="background-color: <?php echo get_field('color_main', 'options')?>;">
                        <img src="<?php echo $a['icon']['url'];?>" alt="<?php echo $a['icon']['alt'];?>"></div>
                    <div class="advantagesBlockItemContent">
                        <div class="advantagesBlockItemContentTitle"><?php echo $a['title'];?></div>
                        <div class="advantagesBlockItemContentText colorGrey"><?php echo $a['text'];?></div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
