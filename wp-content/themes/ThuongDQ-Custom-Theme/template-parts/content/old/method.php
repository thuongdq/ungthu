<section>
<?php
    $taxonomy_name = 'category';
    $method = client_get_options('method');
?>
<div class="panel method">
    <div class="panel-heading">
        <h2>
            <a href="<?php echo get_category_link($method); ?>" title="<?php echo category_get_name_by_ID($method); ?>">
                <?php echo category_get_name_by_ID($method); ?>
             </a>
        </h2>
        <?php
        $term_children = get_term_children( $method, $taxonomy_name );
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
        <div class="post-viewest">
            <?php
                $method_list_post_viewest =  get_posts(array(
                    'post_type'    => 'post',
                    'posts_per_page'  => 4,                         
                    'post_status'  => 'publish',  
                    'category'     => $method,
                    'meta_key'           => 'post_views_count',
                    'orderby'    => 'meta_value_num',
                    'order'    => 'DESC'
                ));
                for($i = 0; $i<4; $i++){
                    $title = "";
                    if($i == 0){
                        $title = $method_list_post_viewest[$i]->post_title;
                        $image = media_view_image($method_list_post_viewest[$i]->ID, $method_list_post_viewest[$i]->post_title, $method_list_post_viewest[$i]->post_content,'thumbnailer');
                    }else{
                        $title = post_sub_excerpt($method_list_post_viewest[$i]->post_title,40);
                        $image = media_view_image($method_list_post_viewest[$i]->ID, $method_list_post_viewest[$i]->post_title, $method_list_post_viewest[$i]->post_content,'small');
                    }
                    echo '
                        <div class="item">
                            <a href="'.get_permalink($method_list_post_viewest[$i]->ID).'" title="'.$method_list_post_viewest[$i]->post_title.'">
                                '.$image.'
                            </a>
                            <a href="'.get_permalink($method_list_post_viewest[$i]->ID).'" title="'.$method_list_post_viewest[$i]->post_title.'">
                                '.$title.'
                            </a>
                        </div>
                    ';
                }
            ?>
        </div>
        <div class="post-new">
            <?php
            $method_list_post_new =  get_posts(array(
                'numberposts'   => 5, // get all posts.
                'tax_query'     => array(
                    array(
                        'taxonomy'  => 'category',
                        'field'     => 'id',
                        'terms'     => $method,
                    ),
                ),
            ));
            ?>
            <ul>
                <li>
                     <a href="<?php echo get_permalink($method_list_post_new[0]->ID); ?>" title="<?php echo $method_list_post_new[0]->post_title;?>">
                        <?php
                        echo media_view_image($method_list_post_new[0]->ID, $method_list_post_new[0]->post_title, $method_list_post_new[0]->post_content,'thumbnail');
                        ?>
                    </a>
                    <a href="<?php echo get_permalink($method_list_post_new[0]->ID); ?>" title="<?php echo $method_list_post_new[0]->post_title;?>">
                        <?php echo post_sub_excerpt($method_list_post_new[0]->post_title,50); ?>
                    </a>
                </li>
                <?php
                for($i = 1; $i < 5; $i++){
                    echo '
                        <li>
                            <a href="'.get_permalink($method_list_post_new[$i]->ID).'" title="'.$method_list_post_new[$i]->post_title.'">
                                '.post_sub_excerpt($method_list_post_new[$i]->post_title, 45).'
                            </a>
                        </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </div>
</section>
