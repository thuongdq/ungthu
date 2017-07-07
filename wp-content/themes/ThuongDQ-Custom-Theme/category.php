<?php
	$category_slugs_array = explode("/",esc_attr($wp_query->query['category_name']));
	$current_category = get_category_by_slug($category_slugs_array[count($category_slugs_array) - 1]);
	global $current_category;
	


	

	// $video = get_term_by('slug', $slug_video, 'category')->term_id;
	// $category_slugs_array = explode("/",esc_attr($wp_query->query['category_name']));
	// $current_category = get_category_by_slug($category_slugs_array[count($category_slugs_array) - 1]);
	// $list_category = get_term_children( $video, "category");
	// $list_category[count($list_category)] = $video;
	
	

	// if(in_array($current_category->term_id, $list_category)){
	// 	if(!empty($child) && $current_category->parent == 0){
	// 		get_template_part( 'template-parts/page/videoCategory');
	// 	}else{
	// 		get_template_part( 'template-parts/page/childVideoCategory');
	// 	}
	// }else{
	// 	if(!empty($child) && $current_category->parent == 0){
	// 		get_template_part( 'template-parts/page/newsCategory');
	// 	}else{
	// 		get_template_part( 'template-parts/page/childNewsCategory');
	// 	}
	// }

	if($current_category && $current_category->parent == 0){
		$child = get_categories(array(
	        'parent'  => $current_category->term_id
	    ));
	    global $child;
		get_template_part( 'template-parts/page/newsCategory');
	}else{
		global $slug_video;
		global $slug_cac_benh_ung_thu;
		global $slug_benh_ly_lien_quan;
		$video = get_term_by('slug', $slug_video, 'category');
		$cac_benh_ung_thu = get_term_by('slug', $slug_cac_benh_ung_thu, 'category');
		$benh_ly_lien_quan = get_term_by('slug', $slug_benh_ly_lien_quan, 'category');

		$list_parent = get_ancestors($current_category->term_id, 'category');
		if(in_array($video->term_id, $list_parent)){
			get_template_part( 'template-parts/page/child-category-video');
		}else if(in_array($cac_benh_ung_thu->term_id, $list_parent)){
			get_template_part( 'template-parts/page/child-category-cac-benh-ung-thu');
		}else if(in_array($benh_ly_lien_quan->term_id, $list_parent)){
			get_template_part( 'template-parts/page/child-category-benh-ly-lien-quan');
		}else{
			get_template_part( 'template-parts/page/child-category-bao-chi');
		}
	}
?>
