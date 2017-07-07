<?php
 if(client_get_options('home-box-4')){
    $taxonomy_name = 'category';
    $home_category_4 = client_get_options('home-box-4');
    $home_category_4_list_post_new =  get_posts(array(
        'numberposts'   => 2, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_4,
            ),
        ),
    ));
?>
<section class="home-box-4">
    <div class="panel panel-default category event">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_4); ?>" title="<?php echo category_get_name_by_ID($home_category_4); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_4); ?></h2>
             </a>
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-4-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
            ?>
        </div>
        <div class="panel-body">
            <?php foreach ($home_category_4_list_post_new as $key => $value) { ?>
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
            <!-- <div class="item">
                <a href="#" title="#">
                    <img src="http://via.placeholder.com/360x197" alt="#">
                </a>
                <a href="#" title="#" class="category">
                     BÁC SĨ & CHUYÊN GIA
                </a>
                <a href="#" title="#" class="title">
                    Làm theo 6 lời khuyên này bạn tránh được ung thư đại trực tràng
                </a>
            </div> -->
        </div>
    </div>
</section>
<?php
}
?>