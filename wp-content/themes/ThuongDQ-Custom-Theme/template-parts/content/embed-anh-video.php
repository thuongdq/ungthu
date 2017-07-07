<?php
    global $current_category;
    $video_category = get_category_by_slug($current_category->slug.'-video');
    $list_video_new =  get_posts(array(
                            'numberposts'   => 9, // get all posts.
                            'tax_query'     => array(
                                array(
                                    'taxonomy'  => 'category',
                                    'field'     => 'id',
                                    'terms'     => $video_category->term_id,
                                ),
                            ),
                        ));

?>
<?php
if($video_category){
?>
<section class="embed-adnh-video">
    <div class="panel panel-default slider">
        <div class="panel-heading">
            <h2>Ảnh & Video</h2>
        </div>
        <div class="panel-body">
            <?php
                if($list_video_new) {
            ?>
            <ul id="slider-video" class=" content-slider ">
                <?php
                foreach ($list_video_new as $key => $value) {
                    echo '
                    <li>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'">
                            '.media_view_image($value->ID, $value->post_title, $value->post_content, 'thumbnail').'
                        </a>
                        <a href="'.get_permalink($value->ID).'" title="'.$value->post_title.'" class="title">
                            '.$value->post_title.'
                        </a>
                    </li>
                    ';
                }
                ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</section>
<?php
}
?>