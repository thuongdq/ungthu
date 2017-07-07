<!--Begin Các bệnh liên quan  -->
<aside>
<?php
    $taxonomy_name = 'category';
    $involve = client_get_options('involve');;
    $no_post = 6;
    if(is_home() || is_single()){
        $no_post = 4;
    }
?>
<div class="panel involve">
    <div class="panel-heading">
        <h2>
            <a href="<?php echo get_category_link($involve); ?>" title="<?php echo category_get_name_by_ID($involve); ?>">
                <?php echo category_get_name_by_ID($involve); ?>
             </a>
        </h2>
    </div>
    <div class="panel-body">
        <?php
         $involve_list_post_new =  get_posts(array(
            'numberposts'   => $no_post, // get all posts.
            'tax_query'     => array(
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'id',
                    'terms'     => $involve,
                ),
            ),
        ));
        foreach($involve_list_post_new as $key => $item){
            echo '
            <div class="item">
                <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                    '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                </a>
                <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                    '.post_sub_excerpt($item->post_title, 55).'
                </a>
            </div>
            ';
        }
        ?>
    </div>
</div>
</aside>
<!--End Các bệnh liên quan  -->