<aside class="right-box-2">
    <div class="panel panel-default most-comments">
        <div class="panel-heading">
            <h2>Tin bình luận nhiều</h2>
        </div>
        <div class="panel-body">
            <ul>
            <?php
            $view = 10;
            if(is_home()){
                $view = 8;
            }

            if(is_category(array(7))){
                $view = 9;
            }

            if(is_category(array(62))){
                $view = 10;
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