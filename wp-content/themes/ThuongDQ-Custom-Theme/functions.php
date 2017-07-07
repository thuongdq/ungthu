<?php
/**
@ Khai bao hang gia tri
@ THEME_URL = lay duong dan thu muc theme
@ CORE = lay duong dan cua thu muc /core
**/



define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );
/**
@ Nhung file /core/init.php
**/


// require_once( CORE . "/lib/init.php" );
if( !class_exists( 'ReduxFramewrk' ) ) {
	require_once( CORE . '/ReduxCore/framework.php' );
}
require_once( CORE . "/config.php" );
require_once( CORE . "/post.php" );
require_once( CORE . "/category.php" );
require_once( CORE . "/menu.php" );
require_once( CORE . "/media.php" );
// require_once( CORE . "/post-type.php" );
require_once( CORE . "/admin.php" );
require_once( CORE . "/client.php" );
require_once( CORE . "/widget.php" );

$slug_video = 'video';
$slug_cac_benh_ung_thu = 'cac-benh-ung-thu';
$slug_benh_ly_lien_quan = 'benh-ly-lien-quan';
global $slug_video;
global $slug_cac_benh_ung_thu;
global $slug_benh_ly_lien_quan;

// Remove category base
// Xóa Category cha trên đường dẫn
add_filter('category_link', 'no_category_parents',1000,2);
function no_category_parents($catlink, $category_id) {
    $category = &get_category( $category_id );
    if ( is_wp_error( $category ) )
        return $category;
    $category_nicename = $category->slug;

    $catlink = trailingslashit(get_option( 'home' )) . user_trailingslashit( $category_nicename, 'category' );
    return $catlink;
}

// Add our custom category rewrite rules
add_filter('category_rewrite_rules', 'no_category_parents_rewrite_rules');
function no_category_parents_rewrite_rules($category_rewrite) {
    //print_r($category_rewrite); // For Debugging

    $category_rewrite=array();
    $categories=get_categories(array('hide_empty'=>false));
    foreach($categories as $category) {
        $category_nicename = $category->slug;
        $category_rewrite['('.$category_nicename.')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
        $category_rewrite['('.$category_nicename.')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
        $category_rewrite['('.$category_nicename.')/?$'] = 'index.php?category_name=$matches[1]';
    }
    // Redirect support from Old Category Base
    global $wp_rewrite;
    $old_base = $wp_rewrite->get_category_permastruct();
    $old_base = str_replace( '%category%', '(.+)', $old_base );
    $old_base = trim($old_base, '/');
    $category_rewrite[$old_base.'$'] = 'index.php?category_redirect=$matches[1]';

    //print_r($category_rewrite); // For Debugging
    return $category_rewrite;
}

// Add 'category_redirect' query variable
add_filter('query_vars', 'no_category_parents_query_vars');
function no_category_parents_query_vars($public_query_vars) {
    $public_query_vars[] = 'category_redirect';
    return $public_query_vars;
}
// Redirect if 'category_redirect' is set
add_filter('request', 'no_category_parents_request');
function no_category_parents_request($query_vars) {
    //print_r($query_vars); // For Debugging
    if(isset($query_vars['category_redirect'])) {
        $catlink = trailingslashit(get_option( 'home' )) . user_trailingslashit( $query_vars['category_redirect'], 'category' );
        status_header(301);
        header("Location: $catlink");
        exit();
    }
    return $query_vars;
}
















/*
* Load more (Phân trang ajax)
* Hàm khởi tạo dữ liệu
*/
function my_load_more_scripts() {
    global $child;
    global $wp_query; 
    global $current_category;
    $max_num_pages = count($child);
    $current_cat = $current_category->term_id;

    // In most cases it is already included on the page and this line can be removed
    // wp_enqueue_script('jquery');
 
    // register our main script but do not enqueue it yet
    // wp_register_script( 'my_loadmore', '', array('jquery') );
    wp_register_script( 'my_loadmore', '');
 
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'item_current' => get_query_var( 'paged' ) ? get_query_var('paged') : 14,
        'item_max' => $max_num_pages,
        'current_category' => $current_cat,
        'query_vars' => json_encode( $wp_query->query )
    ) );
 
    wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );


/*
 @ Hàm chứa dữ liệu trả về
 */
add_action( 'wp_ajax_nopriv_ajax_loadmore_data', 'set_ajax_loadmore_data' );
add_action( 'wp_ajax_ajax_loadmore_data', 'set_ajax_loadmore_data' );
function set_ajax_loadmore_data() {
    $item_current = $_POST['item_current'] - 6;
    $current_category = $_POST['current_category'];
    // global $child;
    $args = array(
        'parent' => $current_category,
        // 'hide_empty' => false, 
        // 'offset' => $item_current,
        // 'number' => 6,
        // 'orderby' => 'count'
        );
    $categories = get_categories( $args );
    $count = 0;
    $i=$item_current;
    if($categories){
        echo '<section>';
        for ($i; $i < $item_current + 3; $i++) { 
            if($categories[$i]){
                $list_post_new =  get_posts(array(
                    'numberposts'   => 3, // get all posts.
                    'tax_query'     => array(
                        array(
                            'taxonomy'  => 'category',
                            'field'     => 'id',
                            'terms'     => $categories[$i]->term_id,
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
                        <a href="'.get_category_link($categories[$i]->term_id).'" title="'.$categories[$i]->name.'"> 
                            <h2>'.$categories[$i]->name.'</h2>
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
        }
        echo '</section>';
    }

    if(count($categories) > 3){
        echo '<section>';
        for ($i; $i < $item_current + 6; $i++) { 
            if($categories[$i]){
                $list_post_new =  get_posts(array(
                    'numberposts'   => 3, // get all posts.
                    'tax_query'     => array(
                        array(
                            'taxonomy'  => 'category',
                            'field'     => 'id',
                            'terms'     => $categories[$i]->term_id,
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
                        <a href="'.get_category_link($categories[$i]->term_id).'" title="'.$categories[$i]->name.'"> 
                            <h2>'.$categories[$i]->name.'</h2>
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
        }
        echo '</section>';
    }
    die();      
}