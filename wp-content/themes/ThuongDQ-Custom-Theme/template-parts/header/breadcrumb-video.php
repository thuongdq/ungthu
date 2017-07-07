<div class="row box-breadcrumbs video">
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div class="breadcrumbs">','</div>');
    }
    ?>
    <div class="report">
        <a href="#" title="#" class="rss">rss</a>
        <?php
        if(!is_single()){
            echo '
            <span class="time">
                Thứ sáu, 7/4/2017 | 13:47 GMT+7
            </span>
            ';
        }
        ?>
    </div>
</div>

