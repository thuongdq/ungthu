<section>
<?php
    $taxonomy_name = 'category';
    $video = client_get_options('video');
?>
    <div class="panel video">
        <div class="panel-heading">
            <h2>
                <a href="<?php echo get_category_link($video); ?>" title="<?php echo category_get_name_by_ID($video); ?>">
                    <?php echo category_get_name_by_ID($video); ?>
                 </a>
            </h2>
        </div>
        <div class="panel-body">
        <?php
            $video_list_post_new =  get_posts(array(
                'numberposts'   => 4, // get all posts.
                'tax_query'     => array(
                    array(
                        'taxonomy'  => 'category',
                        'field'     => 'id',
                        'terms'     => $video,
                    ),
                ),
            ));
            foreach ($video_list_post_new as $key => $item) {
                if($key == 0){
                    $category_detail=get_the_category($list_post_new_left[$i]->ID);//$post->ID
            
                    if ($category_detail[0] && $category_detail[0]->term_id != 1){
                        $category = $category_detail[0];
                    }else{
                        if($category_detail[1]){
                            $category = $category_detail[1];
                        }else{
                            $category = $category_detail[0];
                        }
                    }
                    echo '
                        <div class="item">
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnailer', 'medium').'
                            </a>
                            <div class="info">
                                <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                    '.post_sub_excerpt($item->post_title,50).'
                                </a>
                                <a href="' . get_term_link( $category->term_id) . '" title="'.$category->name.'">
                                    '.$category->name.'
                                </a>
                            </div>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="item">
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                            </a>
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.post_sub_excerpt($item->post_title,60).'
                            </a>
                        </div>
                    ';
                }           
            }
        ?>
        </div>
</section>