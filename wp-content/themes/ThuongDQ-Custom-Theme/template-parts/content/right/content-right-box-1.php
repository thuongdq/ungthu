<div class="panel panel-default list-post-new content-right-box-1">
    <div class="panel-heading">
        <h2>Tin đọc nhiều</h2>
    </div>
    <div class="panel-body">
        <ul>
            <?php
                global $child;
                $view = 10;
                if(empty($child)){
                    $view = 8;
                }else{
                    $view = 10;
                }

                if(is_category(62)){
                    $view = 10;
                }

                for($i=0; $i<$view; $i++){
                    echo '
                    <li>
                        <a href="#" title="#">
                           Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung
                        </a>
                        <span>
                            <i class="glyphicon glyphicon-time"></i> 18/02/2017
                        </span>
                    </li>
                    ';
                }
            ?>
        </ul>
    </div>
</div>