<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Auto Dealers Database</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Ivan <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Настройки</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Выход</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                </li>
                <li>
                    <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Главная</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-database" aria-hidden="true"></i> База данных<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Автомобили <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="/cars">Список</a>
                                </li>
                                <li>
                                    <a href="/mark">Марки</a>
                                </li>
                                <li>
                                    <a href="/model">Модели</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="morris.html">Параметры</a>
                        </li>                        
                    </ul>
                </li> 

                <li>
                    <a href="index.html"><i class="fa fa-upload" aria-hidden="true"></i> Импорт</a>
                </li>   
                <li>
                    <a href="index.html"><i class="fa fa-download" aria-hidden="true"></i> Экспорт</a>
                </li>        
                <li>
                    <a href="index.html"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a>
                </li>                                                       
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>