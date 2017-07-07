<!--Begin Tin mới-->
<aside>
<?php
    $args = array(
    'post_type'    => 'post',
    'posts_per_page'   => 10,
    );
    $list_post_new_left = get_posts( $args ); 
?>
<div class="panel post-new">
    <div class="panel-heading">
        <h2>
            Tin mới
        </h2>
    </div>
    <div class="panel-body">
        <div class="item">
            <a href="<?php echo get_permalink($list_post_new_left[4]->ID); ?>" title="<?php echo $list_post_new_left[4]->post_title;?>">
                <?php echo $list_post_new_left[4]->post_title; ?>
            </a>
            <a href="<?php echo get_permalink($list_post_new_left[4]->ID); ?>" title="<?php echo $list_post_new_left[4]->post_title;?>">
                <?php
                echo media_view_image($list_post_new_left[4]->ID, $list_post_new_left[4]->post_title, $list_post_new_left[4]->post_content,'thumbnailer', 'medium');
                ?>
            </a>
            <span>
                <?php echo post_sub_excerpt($list_post_new_left[4]->post_content, 160)?>
            </span>
        </div>
        <?php
        for($i = 5; $i < 10; $i++){
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
            echo '
            <div class="item">
                <a href="'.get_permalink($list_post_new_left[$i]->ID).'" title="'.$list_post_new_left[$i]->post_title.'">
                    '.media_view_image($list_post_new_left[$i]->ID, $list_post_new_left[$i]->post_title, $list_post_new_left[$i]->post_content,'small').'
                </a>
                <div class="info">
                    <a href="'.get_permalink($list_post_new_left[$i]->ID).'" title="'.$list_post_new_left[$i]->post_title.'">
                        '.post_sub_excerpt($list_post_new_left[$i]->post_title, 50).'
                    </a>
                    <a href="' . get_term_link( $category->term_id) . '" title="'.$category->name.'">
                        '.$category->name.'
                    </a>
                </div>
            </div>
            ';
        }
        ?>
        <!-- <div class="item">
            <a href="#" title="#">
                <img class="img-responsive" src="http://placehold.it/82x82">
            </a>
            <div class="info">
                <a href="#" title="#">
                Học lỏm bí quyết của cô gái giảm 3,5 kg/tuần dễ ợt
            </a>
                <a href="#" title="#">
                THỪA CÂN BÉO PHÌ
            </a>
            </div>
        </div>
        <div class="item">
            <a href="#" title="#">
                <img class="img-responsive" src="http://placehold.it/82x82">
            </a>
            <div class="info">
                <a href="#" title="#">
                Giảm mỡ bụng đơn giản như không nhờ 2 cách ăn ổi
            </a>
                <a href="#" title="#">
                TẾ BÀO MỠ VÀ MỠ TRẮNG
            </a>
            </div>
        </div>
        <div class="item">
            <a href="#" title="#">
                <img class="img-responsive" src="http://placehold.it/82x82">
            </a>
            <div class="info">
                <a href="#" title="#">
                Chỉ cần nắm chắc 4 điều này, mỡ bụng dưới sẽ không còn
            </a>
                <a href="#" title="#">
                NHẬT KÝ GIẢM CÂN
            </a>
            </div>
        </div>
        <div class="item">
            <a href="#" title="#">
                <img class="img-responsive" src="http://placehold.it/82x82">
            </a>
            <div class="info">
                <a href="#" title="#">
                Học lỏm bí quyết của cô gái giảm 3,5 kg/tuần dễ ợt
            </a>
                <a href="#" title="#">
                THỂ DỤC GIẢM CÂN
            </a>
            </div>
        </div>
        <div class="item">
            <a href="#" title="#">
                <img class="img-responsive" src="http://placehold.it/82x82">
            </a>
            <div class="info">
                <a href="#" title="#">
                Chỉ cần nắm chắc 4 điều này, mỡ bụng dưới sẽ không còn
            </a>
                <a href="#" title="#">
                THUỐC NAM GIẢM CÂN 
            </a>
            </div>
        </div> -->
    </div>
</div>
</aside>
<!--End Tin mới-->