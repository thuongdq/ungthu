<!--Begin Liên kết website-->
<aside>
    <div class="panel link">
        <div class="panel-heading">
            <h2>
                Liên kết website
            </h2>
        </div>
        <div class="panel-body">
            <?php
            // global $tp_options;
            $link = client_get_options('link');;
            wp_nav_menu(array("menu" => $link, 'container'=>"", 'menu_class' => ''));
            ?>
        </div>
    </div>
</aside>
<!--End Liên kết website-->