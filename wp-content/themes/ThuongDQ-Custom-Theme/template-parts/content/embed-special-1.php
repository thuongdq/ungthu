<?php
    global $current_category;
    $list_post_new_special_1 =  get_posts(array(
                            'numberposts'   => 6, // get all posts.
                            'tax_query'     => array(
                                array(
                                    'taxonomy'  => 'category',
                                    'field'     => 'id',
                                    'terms'     => $current_category->term_id,
                                ),
                            ),
                        ));
?>
<section class="embed-special-1">
    <div class="content-special">
        <?php
        $content = '';
        foreach ($list_post_new_special_1 as $key => $value) {
            if($key == 0){
                echo  '
                <div class="list-post-special">
                    <div class="post-main">
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                            '.media_view_image($value->ID, $value->post_title, $value->post_content, 'large_m').'
                        </a>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'" class="title">
                            '.$value->post_title.'
                        </a>
                        <span class="info">
                            '.post_sub_excerpt($value->post_content, 370).'
                        </span>
                    </div>
                </div>
                ';
            }else{
                if($key == 1){
                    echo '<div class="list-post-other-special">';
                }
                echo '
                    <div class="item">
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                            '.media_view_image($value->ID, $value->post_title, $value->post_content, 'thumbnail').'
                        </a>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'" class="title">
                            '.$value->post_title.'
                        </a>
                    </div>
                ';
                if($key == count($list_post_new_special_1)){
                    echo '</div>';
                }
            }
        }
        ?>
</section>