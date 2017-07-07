<?php
 if(client_get_options('home-box-8')){
    $taxonomy_name = 'category';
    $home_category_8 = client_get_options('home-box-8');
    $home_category_8_list_post_new =  get_posts(array(
        'numberposts'   => 5, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_8,
            ),
        ),
    ));
?>
<section class="home-box-8">
    <div class="panel panel-default video">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_8); ?>" title="<?php echo category_get_name_by_ID($home_category_8); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_8); ?></h2>
            </a>
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-8-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
            ?>
        </div>
        <div class="panel-body">
            <?php foreach ($home_category_8_list_post_new as $key => $value) { ?>
            <div class="item">
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>">
                    <?php echo media_view_image($value->ID, $value->post_title, $value->post_content, 'thumbnails'); ?>
                </a>
                <a href="<?php echo get_permalink($value->ID); ?>" title="<?php echo $value->post_title; ?>">
                    <?php echo $value->post_title; ?>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
}
?>