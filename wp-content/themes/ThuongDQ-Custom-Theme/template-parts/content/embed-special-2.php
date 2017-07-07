<?php
global $current_category;

$viewest_list_post_special =  get_posts(array(
    'post_type'    => 'post',
    'posts_per_page'  => 12,                         
    'post_status'  => 'publish', 
    'category'         => $current_category->term_id,
    'meta_key'           => 'post_views_count',
    'orderby'    => 'meta_value_num',
    'order'    => 'DESC'
));

?>
<section class="embed-special-2">
    <div class="content-special">
        <div class="list-post-special">
            <div class="post-main">
                <a href="<?php echo get_permalink($viewest_list_post_special[0]->ID); ?>" title="<?php echo $viewest_list_post_special[0]->post_title; ?>">
                    <?php echo media_view_image($viewest_list_post_special[0]->ID, $viewest_list_post_special[0]->post_title, $viewest_list_post_special[0]->post_content, 'large_m'); ?>
                </a>
                <a href="<?php echo get_permalink($viewest_list_post_special[0]->ID); ?>" title="<?php echo $viewest_list_post_special[0]->post_title; ?>" class="title">
                    <?php echo $viewest_list_post_special[0]->post_title; ?>
                </a>
                <span class="info">
                    <?php echo post_sub_excerpt($viewest_list_post_special[0]->post_content, 210);?>
                </span>
            </div>
            <div class="post-other">
                <?php
                    for ($i=1; $i < 4; $i++) { 
                        if($viewest_list_post_special[$i]){
                            echo '
                                <div class="item">
                                    <a href="'.get_permalink($viewest_list_post_special[$i]->ID).'" title="'.$viewest_list_post_special[$i]->post_title.'">
                                        '.media_view_image($viewest_list_post_special[$i]->ID, $viewest_list_post_special[$i]->post_title, $viewest_list_post_special[$i]->post_content, 'thumbnail').'
                                    </a>
                                    <a href="'.get_permalink($viewest_list_post_special[$i]->ID).'" title="'.$viewest_list_post_special[$i]->post_title.'" class="title">
                                        '.$viewest_list_post_special[$i]->post_title.'
                                    </a>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="list-post-other-special">
            <ul>
                <?php
                for($i = 4; $i < count($viewest_list_post_special); $i++){
                    if($i == 4){
                        echo '
                            <li>
                                <a href="'.get_permalink($viewest_list_post_special[$i]->ID).'" title="'.$viewest_list_post_special[$i]->post_title.'">
                                    '.media_view_image($viewest_list_post_special[$i]->ID, $viewest_list_post_special[$i]->post_title, $viewest_list_post_special[$i]->post_content, 'thumbnail').'
                                </a>
                                <a href="'.get_permalink($viewest_list_post_special[$i]->ID).'" title="'.$viewest_list_post_special[$i]->post_title.'">
                                    '.$viewest_list_post_special[$i]->post_title.'
                                </a>
                            </li>
                        ';
                    }else{
                        echo '
                            <li>
                                <a href="'.get_permalink($viewest_list_post_special[$i]->ID).'" title="'.$viewest_list_post_special[$i]->post_title.'">
                                    '.$viewest_list_post_special[$i]->post_title.'
                                </a>
                            </li>
                        ';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</section>