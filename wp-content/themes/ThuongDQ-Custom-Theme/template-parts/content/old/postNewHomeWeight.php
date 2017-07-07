<?php
global $current_category;
?>
<!--Begin post-new-home-weight -->
<section>
    <div class="category-main">
        <div class="list-post-new">
        	<?php
            $weight_list_post_new =  get_posts(array(
                'numberposts'   => 4, // get all posts.
                'category'         => $current_category->term_id,
            ));
            // $weight_list_post_new =  get_posts(array(
            //     'numberposts'   => 5, // get all posts.
            //     'tax_query'     => array(
            //         array(
            //             'taxonomy'  => 'category',
            //             'field'     => 'id',
            //             'terms'     => $current_category->tearm_id,
            //         ),
            //     ),
            // ));

            foreach($weight_list_post_new as $key => $item){
            	if($key == 0){
            		echo '
						<div class="item">
                            <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
			                    '.media_view_image($item->ID, $item->post_title, $item->post_content,'large', 'medium').'
			                </a>
                            <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
		                        '.$item->post_title.'
		                    </a>
                        </div>
            		';
            	}else{
            		$category_detail=get_the_category($item->ID);//$post->ID
            		if ($category_detail[0] && $category_detail[0]->term_id != 1){
		                $category = $category_detail[0];
		            }else{
		                if($category_detail[1]){
		                    $category = $category_detail[1];
		                }else{
		                    $category = $category_detail[0];
		                }
		            }
            		echo '
						<div class="item">
                            <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
			                    '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
			                </a>
                            <div class="info">
                                <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
			                        '.post_sub_excerpt($item->post_title, 50).'
			                    </a>
                                <a href="' . get_term_link( $category->term_id) . '" title="'.$category->name.'">
			                        '.post_sub_excerpt($category->name, 20).'
			                    </a>
                            </div>
                        </div>
            		';
            	}
            }
            ?>
        </div>
        <div class="list-post-special">
            <ul id="slider-list-post-special" class="content-slider">
            	<?php
            	$weight_list_post_viewest =  get_posts(array(
                    'post_type'    => 'post',
                    'posts_per_page'  => 10,                         
                    'post_status'  => 'publish',  
                    'category'         => $current_category->term_id,
                    'meta_key'           => 'post_views_count',
                    'orderby'    => 'meta_value_num',
                    'order'    => 'DESC'
                ));
                foreach($weight_list_post_viewest as $key => $item){
                	echo '
					<li>
						<a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.media_view_image($item->ID, $item->post_title, $item->post_content,'thumbnail').'
                        </a>
                        <a href="'.get_permalink($item->ID).'" title="'.$item->post_title.'">
                            '.post_sub_excerpt($item->post_title, 50).'
                        </a>
					</li>
                	';
                }
            	?>
            </ul>
        </div>
    </div>
</section>
<!--End post-new-home-weight -->