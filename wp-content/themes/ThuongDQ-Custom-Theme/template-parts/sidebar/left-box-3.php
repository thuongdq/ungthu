
<aside class="left-box-3">
    <div class="panel panel-default list-video-hot">
        <div class="panel-heading">
            <h2>VIDEO XEM NHIỀU</h2>
        </div>
        <div class="panel-body">
            <ul class="nav nav-pill">
                <?php
                    global $child;

                    $view = 12;

                    if(empty($child)){
                        $view = 9;
                    }

                    for($i = 0; $i < $view; $i++){
                        echo '
                            <li>
                                <a href="#" title="#">
                                    Sinh thiết bằng nước bọt giúp rút ngắn thời gian chẩn đoán bệnh ung thư
                                </a>
                            </li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </div>
</aside>