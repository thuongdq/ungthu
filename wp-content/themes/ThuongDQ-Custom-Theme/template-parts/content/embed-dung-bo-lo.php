<?php
global $current_category;
$args = array(
    'posts_per_page'   => 6 ,
    'category'         => $current_category->category_parent,
    'category__not_in' => $current_category->term_id
);
$list_post = get_posts( $args );
?>
<div class="panel panel-default slider cLeft embed-dung-bo-lo">
    <div class="panel-heading">
        <h2>ĐỪNG BỎ LỠ ( TIN LIÊN QUAN CHUYÊN MỤC)</h2>
    </div>
    <div class="panel-body">
        <ul id="cSlider-1" class=" content-slider ">
            <?php foreach ($list_post as $key => $value) {
                $category_detail=get_the_category( $value->ID );
                echo '
                    <li>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                            '.media_view_image($value->ID, $value->post_title, $value->post_content,'thumbnail').'
                        </a>
                        <a href="'.get_category_link($category_detail[0]).'" title="'.$category_detail[0]->name.'" class="category">
                            '.$category_detail[0]->name.'
                        </a>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'" class="title">
                            '.$value->post_title.'
                        </a>
                    </li>
                ';
            } ?>
        </ul>
    </div>
</div>
