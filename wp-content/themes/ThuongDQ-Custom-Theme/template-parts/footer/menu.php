<nav class="navbar navbar-default menu-footer">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-footer" aria-expanded="false">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
        <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse collapse" id="menu-footer" aria-expanded="false" style="height: 1px;">
         <?php 
                wp_nav_menu(array("menu" => client_get_options('menu-top'), 'menu_class' => 'nav navbar-nav'));
            ?> 
        <ul class="nav navbar-nav navbar-right" data-smartmenus-id="14943168124772156">
            <li>
                <a href="#">
        SHOW
    </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>