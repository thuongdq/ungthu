<?php 
$category_obj = get_the_category();

$video = 103;
$list_category = get_term_children( $video, "category");
$list_category[count($list_category)] = $video;

if(in_array($category_obj[0]->term_id, $list_category)){
    get_template_part( 'template-parts/page/singleVideo');
}else{
    get_template_part( 'template-parts/page/singleNews');
}
?>
