<?php
    global $current_category;
    $video = 103;
    $category_slugs_array = explode("/",esc_attr($wp_query->query['category_name']));
    $current_category = get_category_by_slug($category_slugs_array[count($category_slugs_array) - 1]);
    $list_category = get_term_children( $video, "category");
    $list_category[count($list_category)] = $video;
    global $child;
    $child = get_categories(array(
        'orderby' => 'id',
        'parent'  => $current_category->term_id
    ));

    if(in_array($current_category->term_id, $list_category)){
        if(!empty($child)){
            get_template_part( 'template-parts/page/videoCategory');
        }else{
            get_template_part( 'template-parts/page/childVideoCategory');
        }
    }else{
        if(!empty($child)){
            get_template_part( 'template-parts/page/newsCategory');
        }else{
            get_template_part( 'template-parts/page/childNewsCategory');
        }
    }
?>
