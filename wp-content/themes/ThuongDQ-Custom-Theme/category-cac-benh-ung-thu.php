<?php
$category_slugs_array = explode("/",esc_attr($wp_query->query['category_name']));
$current_category = get_category_by_slug($category_slugs_array[count($category_slugs_array) - 1]);

$child = get_categories(array(
    'parent'  => $current_category->term_id
));
global $current_category;
global $child;
global $wp_query;
?>
<?php get_header(); ?>
    <section style="display:block;background:#dfdfdf; margin:0px; padding:10px 0px;">
        <a href="#" title="#">
            <img src="http://via.placeholder.com/980x90" alt="#">
        </a>
    </section>
    <main>
        <div class="container">
            <section>
                <div class="title-category">
                    <ul class="nav nav-pills">
                        <li>
                            <a class="current-category" href="<?php echo get_category_link($current_category->term_id); ?>" title="<?php echo $current_category->name; ?>">
                                <?php echo $current_category->name; ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="category-child">
                    <ul class="nav nav-pills pull-right more">
                        <?php
                        foreach ($child as $key => $value) {
                            echo '
                                <li>
                                    <a href="'.get_category_link($value->term_id).'" title="'.$value->name.'">
                                        '.$value->name.'
                                    </a>
                                </li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <div class="content newspaper">
                <div id="content-new">
                    <?php
                        get_template_part( 'template-parts/content/embed-special-1');
                    ?>
                    <?php
                        $box = 0;
                        // foreach ($child as $key => $value) {
                        for($i = 0; $i < 15; $i++){
                            if($i % 3 == 0){
                                $box++;
                                echo '<section>';
                            }
                            if( in_array($box, [1,2, 4])){
                                if($child[$i]){
                                    $list_post_new =  get_posts(array(
                                        'numberposts'   => 3, // get all posts.
                                        'tax_query'     => array(
                                            array(
                                                'taxonomy'  => 'category',
                                                'field'     => 'id',
                                                'terms'     => $child[$i]->term_id,
                                            ),
                                        ),
                                    ));
                                    $content = '';
                                    if($list_post_new){
                                        $content .= '
                                            <a href="'.get_permalink($list_post_new[0]->ID).'" title="'.$list_post_new[0]->post_title.'">
                                                '.media_view_image($list_post_new[0]->ID, $list_post_new[0]->post_title, $list_post_new[0]->post_content, 'thumbnail').'
                                            </a>
                                            <a href="'.get_permalink($list_post_new[0]->ID).'" title="'.$list_post_new[0]->post_title.'" class="title">
                                                '.$list_post_new[0]->post_title.'
                                            </a>
                                        ';
                                        if(count($list_post_new) > 1){
                                            $content .= '<ul>';
                                            for($j = 1; $j < 3; $j++){
                                            $content .= '
                                                <li>
                                                    <a href="'.get_permalink($list_post_new[$j]->ID).'" title="'.$list_post_new[$j]->post_title.'">
                                                        '.$list_post_new[$j]->post_title.'
                                                    </a>
                                                </li>
                                            ';
                                            }
                                            $content .= '</ul>';
                                        }
                                        
                                    }
                                    echo '
                                    <div class="panel panel-default child-category">
                                        <div class="panel-heading">
                                            <a href="'.get_category_link($child[$i]->term_id).'" title="'.$child[$i]->name.'"> 
                                                <h2>'.$child[$i]->name.'</h2>
                                            </a>
                                        </div>
                                        <div class="panel-body">
                                            '.$content.'
                                        </div>
                                    </div>
                                    ';
                                }else{
                                    break;
                                }
                            }else{
                                if($child[$i]){
                                    $list_post_new =  get_posts(array(
                                        'numberposts'   => 3, // get all posts.
                                        'tax_query'     => array(
                                            array(
                                                'taxonomy'  => 'category',
                                                'field'     => 'id',
                                                'terms'     => $child[$i]->term_id,
                                            ),
                                        ),
                                    ));
                                    $content = '';
                                    if($list_post_new){
                                        $content .= '
                                            <a href="'.get_permalink($list_post_new[0]->ID).'" title="'.$list_post_new[0]->post_title.'">
                                                '.media_view_image($list_post_new[0]->ID, $list_post_new[0]->post_title, $list_post_new[0]->post_content, 'thumbnail').'
                                            </a>
                                            <a href="'.get_permalink($list_post_new[0]->ID).'" title="'.$list_post_new[0]->post_title.'" class="title">
                                                '.$list_post_new[0]->post_title.'
                                            </a>
                                        ';
                                        if($list_post_new[1]){
                                            $content .= '
                                            <div class="more">
                                                <a href="'.get_permalink($list_post_new[1]->ID).'" title="'.$list_post_new[1]->post_title.'">
                                                    '.media_view_image($list_post_new[1]->ID, $list_post_new[1]->post_title, $list_post_new[1]->post_content, 'thumbnail').'
                                                </a>
                                                <a href="'.get_permalink($list_post_new[1]->ID).'" title="'.$list_post_new[1]->post_title.'">
                                                    '.post_sub_excerpt($list_post_new[1]->post_title, 50).'
                                                </a>
                                            </div>
                                            ';
                                        }
                                    }
                                    echo '
                                    <div class="panel panel-default child-category">
                                        <div class="panel-heading">
                                            <h2>'.$child[$i]->name.'</h2>
                                        </div>
                                        <div class="panel-body">
                                            '.$content.'
                                        </div>
                                    </div>
                                    ';
                                }else{
                                    break;
                                }
                            }
                            if(($i + 1) % 3 == 0 || $i == count($child)){
                                echo '</section>';
                                if($box == 2){
                                    get_template_part( 'template-parts/content/embed-anh-video');
                                }

                                if($box < 5){
                                    echo '
                                        <section>
                                            <a class="advertising" href="# " title="# ">
                                                <img src="http://via.placeholder.com/728x90 " alt="# ">
                                            </a>
                                        </section>
                                    ';
                                }
                            }
                        }
                    ?>
                </div>
                
                <div class="pagination btn loadmore" item_curent="15"> Xem thêm</div>
            </div>
            






            <div class="right ">
                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>

                <?php
                    get_template_part( 'template-parts/sidebar/right-box-1');
                ?>


                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>

                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>

                <?php
                    get_template_part( 'template-parts/sidebar/right-box-2');
                ?>

                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>

                <?php
                    get_template_part( 'template-parts/sidebar/right-box-3');
                ?>
                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>
            </div>
        </div>
    </main>

<?php get_footer(); ?>