<section>
    <div class="post-video-first">
    	<?php
    	global $current_category;
    	$post_video_first = get_posts(array(
    		'posts_per_page' => 1,
    		'category' => $current_category->term_id,
    		'orderby' => 'id',
    		'order' => 'DESC'
    	));	
    	$category_detail=get_the_category($list_post_new_left[$i]->ID);//$post->ID
        if ($category_detail[0] && $category_detail[0]->term_id != 1){
            $category = $category_detail[0];
        }else{
            if($category_detail[1]){
                $category = $category_detail[1];
            }else{
                $category = $category_detail[0];
            }
        }
    	?>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo media_get_code_from_youtube_url(media_get_first_embed($post_video_first[0]->ID))?>"></iframe>
        </div>
        <h2>
            <a href="<?php echo get_permalink($post_video_first[0]->ID); ?>" title="<?php echo $post_video_first[0]->post_title;?>">
            	<?php echo $post_video_first[0]->post_title;?>
            </a>
        </h2>
        <a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
            <?php echo $category->name; ?>
        </a>
        <div class="info">
           	<?php echo post_sub_excerpt($post_video_first[0]->post_content, 670)?>
        </div>
        <div class="sk_socials">
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1405902612956484";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="10px" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            <div class="tw-share pull-left">
                <a class="twitter-share-button" href="#">Tweet</a>
                <script>
                    ! function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0],
                            p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');
                </script>
            </div>
            <div class="gg-share pull-left">
                <script src="https://apis.google.com/js/platform.js" async defer></script>
                <div class="g-plusone" data-href="<?php the_permalink(); ?>" data-size="medium"></div>
            </div>
            <div class="clear"></div>
            <div class="time">
                05/09/2013 16:21
            </div>
            <!--<div class="print pull-right"><a href="javascript:PrintElem(this);">In bài viết</a></div>-->
        </div>

        <div class="clear"></div>
    </div>
</section>