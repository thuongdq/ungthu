<!--begin Bài viết xem nhiều-->
<aside>
<div class="panel viewest">
    <div class="panel-heading">
        <h2>
            Bài viết xem nhiều
        </h2>
    </div>
    <div class="panel-body">
        <ul>
            <?php
            $viewest_list_post =  get_posts(array(
                'post_type'    => 'post',
                'posts_per_page'  => 8,                         
                'post_status'  => 'publish', 
                'meta_key'           => 'post_views_count',
                'orderby'    => 'meta_value_num',
                'order'    => 'DESC'
            ));
            foreach ($viewest_list_post as $key => $item) {
                if($key == 0){
                    echo '
                    <li>
                        <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnailer').'
                        </a>
                        <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.post_sub_excerpt($item->post_title, 52).'
                        </a>
                    </li>
                    ';
                }else{
                    echo '
                    <li>
                        <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.post_sub_excerpt($item->post_title, 50).'
                        </a>
                    </li>
                    ';
                }
            }
            ?>
        </ul>
    </div>
</div>
</aside>
<!--End Bài viết xem nhiều-->