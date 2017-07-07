<?php
 if(client_get_options('home-box-1')){
    $taxonomy_name = 'category';
    $home_category_1 = client_get_options('home-box-1');
    $home_category_1_list_post_new =  get_posts(array(
        'numberposts'   => 3, // get all posts.
        'tax_query'     => array(
            array(
                'taxonomy'  => 'category',
                'field'     => 'id',
                'terms'     => $home_category_1,
            ),
        ),
    ));
?>
<section class="home-box-1">
    <div class="panel category">
        <div class="panel-heading">
            <a href="<?php echo get_category_link($home_category_1); ?>" title="<?php echo category_get_name_by_ID($home_category_1); ?>">
                <h2><?php echo category_get_name_by_ID($home_category_1); ?></h2>
             </a>
            <!-- <ul class="nav nav-pills pull-right nomal"> -->
                <?php
                // $term_children = get_term_children( $home_category_1, $taxonomy_name );
                // foreach ( $term_children as $child ) {
                //     $term = get_term_by( 'id', $child, $taxonomy_name );
                //     echo '
                //     <li>
                //         <a href="' . get_term_link( $child, $taxonomy_name ) . '" title="'.$term->name.'">' . $term->name . '</a>
                //     </li>
                //     ';
                // }


                // $args = array('parent' => $home_category_1,'hide_empty' => false);
                // $categories = get_categories( $args );
                // foreach ( $categories as $child ) {
                //     echo '
                //     <li>
                //         <a href="' . get_term_link( $child, $taxonomy_name ) . '" title="'.$child->name.'">' . $child->name . '</a>
                //     </li>
                //     ';
                // }
                ?>
            <!-- </ul> -->
            <?php
            wp_nav_menu(array("menu" => client_get_options('home-box-1-sub-category-1'), 'container' => '', 'container_class' => '', 'menu_class' => 'nav nav-pills pull-right nomal'));
            ?>
        </div>
        <div class="panel-body">
            <?php foreach ($home_category_1_list_post_new as $key => $value) { ?>
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
        </div>
    </div>
</section>
<?php } ?>