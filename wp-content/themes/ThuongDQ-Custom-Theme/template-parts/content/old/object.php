<section>
<?php
    $taxonomy_name = 'category';
    $object = client_get_options('object');
?>
<div class="panel object">
    <div class="panel-heading">
        <h2>
            <a href="<?php echo get_category_link($object); ?>" title="<?php echo category_get_name_by_ID($object); ?>">
                <?php echo category_get_name_by_ID($object); ?>
             </a>
        </h2>
        
        <?php
        
        $term_children = get_term_children( $object, $taxonomy_name );
        foreach ( $term_children as $child ) {
            $term = get_term_by( 'id', $child, $taxonomy_name );
            echo '
                 <div class="item">
                    <a href="' . get_term_link( $child, $taxonomy_name ) . '" title="'.$term->name.'">' . $term->name . '</a>
                </div>
            ';
        }
        ?>
    </div>
    <div class="panel-body">
        <?php
        $object_list_post_new =  get_posts(array(
            'numberposts'   => 5, // get all posts.
            'tax_query'     => array(
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'id',
                    'terms'     => $object,
                ),
            ),
        ));
        ?>
        <div class="item">
            <a href="<?php echo get_permalink($object_list_post_new[0]->ID); ?>" title="<?php echo $object_list_post_new[0]->post_title;?>">
                <?php
                    echo media_view_image($object_list_post_new[0]->ID, $object_list_post_new[0]->post_title, $object_list_post_new[0]->post_content,'thumbnailer');
                ?>
            </a>
            <div class="info">
                 <a href="<?php echo get_permalink($object_list_post_new[0]->ID); ?>" title="<?php echo $object_list_post_new[0]->post_title;?>">
                    <?php echo post_sub_excerpt($object_list_post_new[0]->post_title, 80);?>
                </a>
                <span>
                    <?php
                    echo post_sub_excerpt($object_list_post_new[0]->post_content, 190);
                    ?>
                </span>
            </div>
        </div>
        <?php
        for($i = 1; $i < 5; $i++){
            echo '
                <div class="item">
                    <a href="'.get_permalink($object_list_post_new[$i]->ID).'" title="'.$object_list_post_new[$i]->post_title.'">
                        '.media_view_image($object_list_post_new[$i]->ID, $object_list_post_new[$i]->post_title, $object_list_post_new[$i]->post_content,'thumbnail').'
                    </a>
                    <a href="'.get_permalink($object_list_post_new[$i]->ID).'" title="'.$object_list_post_new[$i]->post_title.'">
                        '.post_sub_excerpt($object_list_post_new[$i]->post_title,50).'
                    </a>
                </div>
            ';
        }
        ?>
        
    </div>
</section>