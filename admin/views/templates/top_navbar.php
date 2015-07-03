<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="/admin.php">博客后台管理</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>菜单</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li class="divider"></li>
            <li class="has-dropdown not-click">
                <a href="#">系统管理</a>
                <ul class="dropdown">
                    <li><a href="#">系统配置</a></li>
                    <li class=""><a href="#">管理员</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li class="has-dropdown not-click">
                <a href="#">博客管理</a>
                <ul class="dropdown">
                    <li><?=anchor('channel/index','栏目管理');?></li>
                    <li class=""><a href="#">文章管理</a></li>
                </ul>
            </li>
            <li class="divider"></li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <li class="divider"></li>
            <li class="has-dropdown not-click">
                <a href="#">admin</a>
                <ul class="dropdown">
                    <li><?=anchor('user/modify_pwd','修改密码');?></li>
                    <li class=""><?=anchor('user/logout','注销');?></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li><a href="#"></a></li>
        </ul>
    </section>
</nav>
