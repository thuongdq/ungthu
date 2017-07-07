<?php
global $child;
global $current_category;

if ( get_query_var( 'paged' ) ) {
    $paged = get_query_var('paged');
}else if ( get_query_var( 'page' ) ) {
        $paged = get_query_var( 'page' );
    } else {
        $paged = 1;
    }
$per_page    = 9;
$offset      = $per_page * ( $paged - 1) ;

$list_post_all = get_posts( array(
    'posts_per_page'   => -1 ,
    'category'         => $current_category->term_id,
) );
$pagination = '';
$big = 999999999; // need an unlikely integer
$pages = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => ceil(count($list_post_all)/$per_page),
    'prev_next' => false,
    'type'  => 'array',
    'prev_next'   => TRUE,
    'prev_text'    => __('&laquo;'),
    'next_text'    => __('&raquo;'),
) );
if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    $pagination .=  '<ul class="pagination">';
    foreach ( $pages as $page ) {
            $pagination .=  "<li>$page</li>";
    }
   $pagination .=  '</ul>';
}

// array( 'numberposts' => -1, 'offset' => 10 ) 
$args = array(
    'posts_per_page'   => $per_page ,
    'offset' => $offset,
    'category'         => $current_category->term_id,
    
);
$list_post = get_posts( $args );

// foreach($list_post as $value){
//     echo $value->ID.' - '.$value->post_title.'<br>';
// }

// echo $pagination;

// echo '<pre>';
// print_r($list_post);
// echo '</pre>';
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
                





                
                 <?php
                    get_template_part( 'template-parts/content/embed-special-2');
                    get_template_part( 'template-parts/content/embed-anh-video');
                ?>
    































                <section>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/728x90 " alt="# ">
                    </a>
                </section>

                <section>
                    <div class="content-left">

                        <?php
                            $i = 0; 
                            $child_cat_item = 0;
                            for ($i=0; $i < count($list_post); $i++) { 
                                if($i % 3 == 0){
                                    echo '<div class="list-post-new">';
                                }
                                echo '
                                    <div class="item">
                                        <a href="'.get_permalink($list_post[$i]->ID).'" title="'.$list_post[$i]->post_title.'">
                                            '.media_view_image($list_post[$i]->ID, $list_post[$i]->post_title, $list_post[$i]->post_content,'thumbnail').'
                                        </a>
                                        <div class="info">
                                            <a href="'.get_permalink($list_post[$i]->ID).'" title="'.$list_post[$i]->post_title.'">
                                                '.$list_post[$i]->post_title.'
                                            </a>
                                            <span class="time">
                                                '.get_the_date( 'd/m/Y', $list_post[$i]->ID ).' | <i class="glyphicon glyphicon-time"></i> '.get_the_date( 'h:m a', $list_post[$i]->ID ).'
                                            </span>
                                            <span class="sumary">
                                                '.post_sub_excerpt($list_post[$i]->post_content, 200).'
                                            </span>
                                        </div>
                                    </div>
                                ';
                                if(($i + 1 ) % 3 == 0 || ($i + 1) == count($list_post)){
                                    echo '</div>'; 
                                    if($paged == 1){
                                        echo '<div class="group-child-category">';
                                        $current = $child_cat_item;
                                        for($child_cat_item; $child_cat_item < $current  + 2; $child_cat_item++){
                                            if($child[$child_cat_item]){
                                                $list_post_new =  get_posts(array(
                                                    'numberposts'   => 3, // get all posts.
                                                    'tax_query'     => array(
                                                        array(
                                                            'taxonomy'  => 'category',
                                                            'field'     => 'id',
                                                            'terms'     => $child[$child_cat_item]->term_id,
                                                        ),
                                                    ),
                                                ));
                                                $content = '';
                                                foreach ($list_post_new as $key => $value) {
                                                    if($key == 0){
                                                        $content .= '
                                                            <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                                                                '.media_view_image($value->ID, $value->post_title, $value->post_content,'thumbnail').'
                                                            </a>
                                                            <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'" class="title">
                                                                '.$value->post_title.'
                                                            </a>
                                                        ';
                                                    }else{
                                                         $content .= '<ul>';
                                                         $content .= '
                                                            <li>
                                                                <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                                                                    '.$value->post_title.'
                                                                </a>
                                                            </li>
                                                         ';
                                                         $content .= '</ul>';
                                                    }
                                                }

                                                $category_name = str_replace( 'ung thư', '', $child[$child_cat_item]->name  );
                                                $category_name = str_replace( 'gây ung thư', '', $category_name );
                                                echo '
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <a href="'.get_category_link($child[$child_cat_item]->term_id).'" title="'.$child[$child_cat_item]->name.'">
                                                                <h2>'.$category_name.'</h2>
                                                            <a>
                                                        </div>
                                                        <div class="panel-body">
                                                            '.$content.'
                                                        </div>
                                                    </div>
                                                ';
                                            }
                                        }
                                        echo '</div>';
                                    }
                                }
                            }
                        ?>

                        <nav aria-label="Page navigation">
                            <?php
                                echo $pagination;
                            ?>
                        </nav>
                    </div>


                    <div class="content-right pull-right">
                        <?php
                            get_template_part( 'template-parts/content/right/content-right-box-1');
                        ?>

                        <a class="advertising" href="#" title="#">
                            <img src="http://via.placeholder.com/200x446" alt="#">
                        </a>
                        
                        <?php
                            get_template_part( 'template-parts/content/right/content-right-box-2');
                        ?>
                    </div>
                </section>




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
                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>
            </div>
        </div>
    </main>
<?php get_footer(); ?>