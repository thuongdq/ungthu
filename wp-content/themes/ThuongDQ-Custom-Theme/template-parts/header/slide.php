<div class="row slide-post-hot">
    <ul id="content-slider-top" class="bxslider">
        <?php
        $slide_post_hot_viewest =  get_posts(array(
            'post_type'    => 'post',
            'posts_per_page'  => 10,                         
            'post_status'  => 'publish',  
            'meta_key'           => 'post_views_count',
            'orderby'    => 'meta_value_num',
            'order'    => 'DESC'
        ));
        foreach($slide_post_hot_viewest as $key=>$item){
            echo '
                <li>    
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                         '.media_view_image($item->ID, $item->post_title, $item->post_content,'small').'
                    </a>
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.post_sub_excerpt($item->post_title, 45).'
                    </a>
                </li>
            ';
        }
        ?>
    </ul>
</div>