<?php
 if(client_get_options('home-box-3')){
    $taxonomy_name = 'category';
    $home_category_3 = client_get_options('home-box-3');
    $home_category_3_list_post_new =  get_posts(array(
        'numberposts'   => 4, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_3,
            ),
        ),
    ));
?>
<section class="home-box-3">
    <div class="panel panel-default care">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_3); ?>" title="<?php echo category_get_name_by_ID($home_category_3); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_3); ?></h2>
             </a>
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-3-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
            ?>
        </div>
        <div class="panel-body">
            <?php $value = $home_category_3_list_post_new[0]; ?>
            <?php if($value) { ?>
            <?php  $category_detail=get_the_category( $value->ID ); ?>
            <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>">
                <?php echo media_view_image($value->ID, $value->post_title, $value->post_content, 'medium_m'); ?>
            </a>
            <div class="info">
                <a href="<?php echo get_category_link($category_detail[0]); ?>" title="<?php echo $category_detail[0]->name; ?>" class="category">
                    <?php echo $category_detail[0]->name; ?>
                </a>
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>" class="title">
                    <?php echo $value->post_title; ?>
                </a>
                <span>
                    <?php echo post_sub_excerpt($value->post_content, 150) ?>
                </span>
                <ul>
                    <?php
                    for($i = 1; $i < 4; $i++){
                        if($home_category_3_list_post_new[$i]){
                        ?>
                        <li>
                            <a href="<?php echo get_permalink($home_category_3_list_post_new[$i]->ID); ?>" title="<?php echo $home_category_3_list_post_new[$i]->post_title; ?>">
                                <?php echo post_sub_excerpt($home_category_3_list_post_new[$i]->post_title, 45); ?>
                            </a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
}
?>