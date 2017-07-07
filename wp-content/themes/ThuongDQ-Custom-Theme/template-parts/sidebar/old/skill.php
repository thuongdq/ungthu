<!--Begin Bí quyết giảm cân-->
<aside>
<?php
    $taxonomy_name = 'category';
    $skill = client_get_options('skill');
?>
    <div class="panel skill">
        <div class="panel-heading">
            <h2>
                <a href="<?php echo get_category_link($skill); ?>" title="<?php echo category_get_name_by_ID($skill); ?>">
                    <?php echo category_get_name_by_ID($skill); ?>
                 </a>
            </h2>
        </div>
        <div class="panel-body">
            <ul>
            <?php
                $skill_list_post_new =  get_posts(array(
                    'numberposts'   => 7, // get all posts.
                    'tax_query'     => array(
                        array(
                            'taxonomy'  => 'category',
                            'field'     => 'id',
                            'terms'     => $skill,
                        ),
                    ),
                ));
                foreach ($skill_list_post_new as $key => $item) {
                    if($key == 0){
                        echo '
                        <li>
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.post_sub_excerpt($item->post_title,50).'
                            </a>
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                            </a>
                            <span>
                                '.post_sub_excerpt($item->post_content,80).'
                            </span>
                        </li>
                        ';
                    }else{
                        echo '
                        <li>
                            <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                                '.post_sub_excerpt($item->post_title.' ung dung giam can vao thuc te de ap dung',55).'
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
<!--End Bí quyết giảm cân-->