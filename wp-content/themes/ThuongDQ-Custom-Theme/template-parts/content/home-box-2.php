<?php
 if(client_get_options('home-box-2')){
    $taxonomy_name = 'category';
    $home_category_2 = client_get_options('home-box-2');
    $home_category_2_list_post_new =  get_posts(array(
        'numberposts'   => 9, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_2,
            ),
        ),
    ));
?>
<section class="home-box-2">
    <div class="panel category">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_2); ?>" title="<?php echo category_get_name_by_ID($home_category_2); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_2); ?></h2>
             </a>
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-2-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right more'));
            ?>
        </div>
        <div class="panel-body">
            <?php for ($i = 0; $i < 3; $i++) { ?>
            <?php $value = $home_category_2_list_post_new[$i]; ?>
            <?php  $category_detail=get_the_category( $value->ID ); ?>
            <div class="item">
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>">
                    <?php echo media_view_image($value->ID, $value->post_title, $value->post_content, 'medium_m'); ?>
                </a>
                <a href="<?php echo get_category_link($category_detail[0]); ?>" title="<?php echo $category_detail[0]->name; ?>" class="category">
                    <?php echo $category_detail[0]->name; ?>
                </a>
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>" class="title">
                    <?php echo $value->post_title; ?>
                </a>
            </div>
            <?php } ?>
            <ul>
                <?php
                for ($i = 3; $i < 9; $i++) {
                    $related = $home_category_2_list_post_new[$i];
                    echo '
                    <li>
                        <a href="'.get_permalink($related->ID).'" title="'.$related->post_title.'">
                            '.post_sub_excerpt($related->post_title, 85).'
                        </a>
                    </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>