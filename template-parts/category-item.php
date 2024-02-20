<div class="post-item">
    <div class="post-item-img">
        <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'thumnail')); ?></a>
    </div>
    <div class="post-item-descript">
        <h2 class="post-text-title"><?php the_title()?></h2>
        <span class="post-text-time"><?php echo get_the_date('d/m /Y'); ?></span>
        <span class="post-text-descript">
            <?php the_excerpt();?>
        </span>
        <a href="<?php the_permalink(); ?>" class="post-text-add">Đọc thêm</a>
    </div>
</div>
