<?php
    global $current_category;
    $args = array(
      'numberposts' => 15
    );
    $latest_posts = get_posts( $args );
    $category_detail=get_the_category( $latest_posts[0]->ID );
    ?>
<section>
    <div class="content-special">
        <div class="list-post-special">
            <?php
            if(!empty($latest_posts)){
            ?>
            <div class="post-main">
                <a href="<?php echo get_permalink($latest_posts[0]->ID); ?>" title="<?php echo $latest_posts[0]->post_title; ?>">
                    <?php
                        echo media_view_image($latest_posts[$i]->ID, $latest_posts[$i]->post_title, $latest_posts[$i]->post_content,'large_m');
                    ?>
                </a>
                <a href="<?php echo get_category_link($category_detail[0]); ?>" title="<?php echo $category_detail[0]->name; ?>" class="category">
                    <?php echo $category_detail[0]->name; ?>
                </a>
                <a href="<?php echo get_permalink($latest_posts[0]->ID); ?>" title="<?php echo $latest_posts[0]->post_title; ?>" class="title">
                    <?php echo $latest_posts[0]->post_title; ?>
                </a>
                <span class="info">
                    <?php echo post_sub_excerpt($latest_posts[0]->post_content, 220) ?>
                </span>
            </div>
            <?php
            }else{
                echo '
                <div class="post-main">
                    <h4> Nội dung đang được cập nhật...</h4>
                </div>
                ';
            }
            if(count($latest_posts) >1 ){ 
            ?>
            <div class="post-other">
                <?php
                for($i = 1; $i < 4 ; $i++){
                    if($latest_posts[$i]){
                        echo '
                            <div class="item">
                                <a href="'.get_permalink($latest_posts[$i]->ID).'" title="'.$latest_posts[$i]->post_title.'" >
                                    '.media_view_image($latest_posts[$i]->ID, $latest_posts[$i]->post_title, $latest_posts[$i]->post_content, 'thumbnail').'
                                </a>
                                <a href="'.get_permalink($latest_posts[$i]->ID).'" title="'.$latest_posts[$i]->post_title.'" class="title">
                                    '.$latest_posts[$i]->post_title.'
                                </a>
                            </div>
                        ';
                    }
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="list-post-new-hot-tab">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tin mới</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Xem nhiều</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <ul>
                    <?php
                        if(count($latest_posts) >4 ){ 
                            for($i = 4; $i < 15 ; $i++){
                                if($latest_posts[$i]){
                                    echo '
                                         <li>
                                             <a href="'.get_permalink($latest_posts[$i]->ID).'" title="'.$latest_posts[$i]->post_title.'" class="title">
                                                '.$latest_posts[$i]->post_title.'
                                            </a>
                                        </li>
                                    ';
                                }
                            }
                        }else{
                            echo '<li> 
                                    <a href="#" title="Nội dung đang được cập nhật" class="title">
                                        Nội dung đang được cập nhật...
                                    </a>
                                  </li>';
                        }
                        ?>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <ul>
                    <?php
                         $viewest_list_post =  get_posts(array(
                            'post_type'    => 'post',
                            'posts_per_page'  => 11,                         
                            'post_status'  => 'publish', 
                            'meta_key'           => 'post_views_count',
                            'orderby'    => 'meta_value_num',
                            'order'    => 'DESC'
                        ));
                        if(!empty($viewest_list_post)){
                            for($i = 0; $i < 11 ; $i++){
                                if($viewest_list_post[$i]){
                                    echo '
                                         <li>
                                             <a href="'.get_permalink($viewest_list_post[$i]->ID).'" title="'.$viewest_list_post[$i]->post_title.'" class="title">
                                                '.$viewest_list_post[$i]->post_title.'
                                            </a>
                                        </li>
                                    ';
                                }
                            }
                        }else{
                            echo '<li> 
                                    <a href="#" title="Nội dung đang được cập nhật" class="title">
                                        Nội dung đang được cập nhật...
                                    </a>
                                  </li>';

                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="list-post-hot">
            <a class="advertising" href="#" title="#">
                <img src="http://via.placeholder.com/300x250" alt="#">
            </a>
            <div class="panel">
                <div class="panel-heading">
                    <h2>Chủ đề hot</h2>
                </div>
                <div class="panel-body">
                    <div class="item">
                        <a href="#" title="#">
                            <img src="http://via.placeholder.com/89x53" alt="#">
                        </a>
                        <a href="#" title="#">
                    Sinh thiết bằng nước bọt giúp rút ngắn thời gian chẩn đoán bệnh ung thư
                </a>
                    </div>
                    <div class="item">
                        <a href="#" title="#">
                            <img src="http://via.placeholder.com/89x53" alt="#">
                        </a>
                        <a href="#" title="#">
                    Sinh thiết bằng nước bọt giúp rút ngắn thời gian chẩn đoán bệnh ung thư
                </a>
                    </div>
                    <div class="item">
                        <a href="#" title="#">
                            <img src="http://via.placeholder.com/89x53" alt="#">
                        </a>
                        <a href="#" title="#">
                    Sinh thiết bằng nước bọt giúp rút ngắn thời gian chẩn đoán bệnh ung thư
                </a>
                    </div>
                    <div class="item">
                        <a href="#" title="#">
                            <img src="http://via.placeholder.com/89x53" alt="#">
                        </a>
                        <a href="#" title="#">
                    Sinh thiết bằng nước bọt giúp rút ngắn thời gian chẩn đoán bệnh ung thư
                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>