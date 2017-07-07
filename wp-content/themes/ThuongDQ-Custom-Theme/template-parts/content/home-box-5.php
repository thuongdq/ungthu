<?php
 if(client_get_options('home-box-5')){
    $taxonomy_name = 'category';
    $home_category_5 = client_get_options('home-box-5');
    $home_category_5_list_post_new =  get_posts(array(
        'numberposts'   => 9, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_5,
            ),
        ),
    ));

    $args = array('parent' => $home_category_5,'hide_empty' => false);
    $categories = get_categories( $args );
?>
<section class="home-box-5">
    <div class="panel category">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_5); ?>" title="<?php echo category_get_name_by_ID($home_category_5); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_5); ?></h2>
             </a>
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-5-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
            ?>
            <div class="nomal-more">
                <?php
                wp_nav_menu(array("menu" => client_get_options('home-box-5-sub-category-2'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
                ?>
            </div>
        </div>
        <div class="panel-body">
            <?php for ($i = 0; $i < 3; $i++) { ?>
            <?php $value = $home_category_5_list_post_new[$i]; ?>
            <?php  $category_detail=get_the_category( $value->ID ); ?>
            <div class="item">
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>">
                    <?php echo media_view_image($value->ID, $value->post_title, $value->post_content); ?>
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
                    $related = $home_category_5_list_post_new[$i];
                    echo '
                    <li>
                        <a href="'.get_permalink($related->ID).'" title="'.$related->post_title.'">
                            '.post_sub_excerpt($related->post_title, 55).'
                        </a>
                    </li>
                    ';
                }
                ?>
            </ul>
        </div>
    </div>
</section>
<?php
}
?>