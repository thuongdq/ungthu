 <!-- Begin Tư vấn giảm cân-->
<aside>
<?php
    $taxonomy_name = 'category';
    $support = client_get_options('support');;
?>
<div class="panel support">
    <div class="panel-heading">
        <h2>
            <a href="<?php echo get_category_link($support); ?>" title="<?php echo category_get_name_by_ID($support); ?>">
                <?php echo category_get_name_by_ID($support); ?>
             </a>
        </h2>
    </div>
    <div class="panel-body">
        <?php
        $support_list_post_new =  get_posts(array(
            'numberposts'   => 7, // get all posts.
            'tax_query'     => array(
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'id',
                    'terms'     => $support,
                ),
            ),
        ));
        foreach ($support_list_post_new as $key => $item) {
            if($key == 0){
                echo '
                <div class="item">
                    <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                        '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnailer').'
                    </a>
                    <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                        '.post_sub_excerpt($item->post_title,50).'
                    </a>
                    <span>
                       '.post_sub_excerpt($item->post_content, 130).'
                    </span>
                </div>
                ';
            }else{
                echo '
                    <div class="item">
                        <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                            '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                        </a>
                        <a href="'.get_permalink($item->ID).'" title="'.get_permalink($item->post_title).'">
                            '.post_sub_excerpt($item->post_title,50).'
                        </a>
                    </div>
                ';
            }
        }
        ?>
    </div>
</div>
</aside>
<!-- End Tư vấn giảm cân