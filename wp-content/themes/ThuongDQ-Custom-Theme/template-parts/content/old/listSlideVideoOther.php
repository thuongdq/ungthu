<?php global $child; ?>
<?php foreach($child as $key=>$item){?>
<section>
    <div class="panel list-post-other">
        <div class="panel-heading">
            <h2>
                <a href="<?php echo get_term_link( $item->term_id); ?>" title="<?php echo $item->name; ?>">
                    <?php echo $item->name; ?>
                </a>
            </h2>
            <ul>
            	<?php
            		$child_item = get_categories(array(
				        'orderby' => 'id',
				        'parent'  => $item->term_id
				    ));
				    foreach ($child_item as $key_child => $item_child) {
				    	echo '
							<li>
		                        <a href="'.get_term_link( $item_child->term_id).'" title="'.$item_child->name.'">
		                            '.$item_child->name.'
		                        </a>
		                    </li>
				    	';
				    	if($key_child == 2){
				    		echo '
							<li class="more">
		                        ...
		                    </li>
				    		';
				    		break;
				    	}
				    }
            	?>
            </ul>
        </div>
        <div class="panel-body">
            <ul id="slider-list-post-category-<?php echo $item->term_id; ?>" class="content-slider">
            	<?php
                $child_video_list_post_new =  get_posts(array(
                    'numberposts'   => 10, // get all posts.
                    'tax_query'     => array(
                        array(
                            'taxonomy'  => 'category',
                            'field'     => 'id',
                            'terms'     => $item->term_id,
                        ),
                    ),
                ));
                if($child_video_list_post_new){
                	foreach ($child_video_list_post_new as $key_child => $item_child) {
                		echo '
						<li>
	                        <a href="'.get_permalink($item_child->ID).'" title="'.$item_child->post_title.'">
                                '.media_view_image($item_child->ID, $item_child->post_title, $item_child->post_content,'thumbnail', 'medium').'
                                <span>'.media_get_duration_in_seconds($item_child->ID).'</span>
                            </a>
                            <a href="'.get_permalink($item_child->ID).'" title="'.$item_child->post_title.'">
                                '.post_sub_excerpt($item_child->post_title, 60).'
                            </a>
	                    </li>
                		';
                	}
                }
                ?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>