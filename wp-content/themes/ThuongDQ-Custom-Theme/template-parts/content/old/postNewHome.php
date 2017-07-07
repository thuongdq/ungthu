<?php
$args = array(
    'post_type'    => 'post',
    'posts_per_page'   => 4,
);
$list_post_new_home = get_posts( $args ); 
?>
<!--Begin post-new-home-->
<section>
    <div class="post-new-home">
        <div class="item">
             <a href="<?php echo get_permalink($list_post_new_home[0]->ID); ?>" title="<?php echo $list_post_new_home[0]->post_title;?>">
                <?php
                echo media_view_image($list_post_new_home[0]->ID, $list_post_new_home[0]->post_title, $list_post_new_home[0]->post_content,'large', 'high');
                ?>
            </a>
            <div class="info">
                <a href="<?php echo get_permalink($list_post_new_home[0]->ID); ?>" title="<?php echo $list_post_new_home[0]->post_title;?>">
                    <?php echo post_sub_excerpt($list_post_new_home[0]->post_title, 80); ?>
                </a>
                <span>
                    <?php echo post_sub_excerpt($list_post_new_home[0]->post_content, 200)?>
                </span>
            </div>
        </div>
        <?php
        for($i = 1; $i < 4; $i++){
        ?>
        <div class="item">
            <a href="<?php echo get_permalink($list_post_new_home[$i]->ID); ?>" title="<?php echo $list_post_new_home[$i]->post_title;?>">
                <?php
                echo media_view_image($list_post_new_home[$i]->ID, $list_post_new_home[$i]->post_title, $list_post_new_home[$i]->post_content,'thumbnail');
                ?>
            </a>
            <a href="<?php echo get_permalink($list_post_new_home[$i]->ID); ?>" title="<?php echo $list_post_new_home[$i]->post_title;?>">
                <?php echo post_sub_excerpt($list_post_new_home[$i]->post_title, 50); ?>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<!--End post-new-home-->