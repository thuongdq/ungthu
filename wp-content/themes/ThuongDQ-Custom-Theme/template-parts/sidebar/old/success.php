<!--Begin Giảm cân thành công-->
<aside>
<?php
    $taxonomy_name = 'category';
    $success = client_get_options('success');;
?>
<div class="panel success">
    <div class="panel-heading">
        <h2>
            <a href="<?php echo get_category_link($success); ?>" title="<?php echo category_get_name_by_ID($success); ?>">
                <?php echo category_get_name_by_ID($success); ?>
             </a>
        </h2>
        <ul>
            <?php
            $term_children = get_term_children( $success, $taxonomy_name );
            foreach ( $term_children as $child ) {
                $term = get_term_by( 'id', $child, $taxonomy_name );
                echo '
                    <li>
                        <a href="' . get_term_link( $child, $taxonomy_name ) . '" title="'.$term->name.'">' . $term->name . '</a>
                    </li>
                ';
            }
            ?>
        </ul>
    </div>
    <div class="panel-body">
        <?php
         $success_list_post_new =  get_posts(array(
            'numberposts'   => 4, // get all posts.
            'tax_query'     => array(
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'id',
                    'terms'     => $success,
                ),
            ),
        ));
         foreach ($success_list_post_new as $key => $item) {
            if($key == 0){
                echo '
                <div class="item">
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                        '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnailer').'
                    </a>
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                        '.post_sub_excerpt($item->post_title, 52).'
                    </a>
                    <span>
                        '.post_sub_excerpt($item->post_content, 160).'
                    </span>
                </div>
                ';
            }else{
                echo '
                <div class="item">
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                        '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                    </a>
                    <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                        '.post_sub_excerpt($item->post_title, 52).'
                    </a>
                </div>
                ';
            }
         }
        ?>
    </div>
</div>
</aside>
<!--End Giảm cân thành công-->