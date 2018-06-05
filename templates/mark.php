<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php echo $this->fetch('head.php'); ?>
    </head>

    <body>
        <div id="wrapper">
            <?php echo $this->fetch('nav.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">База данных</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список производителей автомобилей
                            </div>

                            <div class="panel-body">

                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Поиск">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>                                    
                                </form>

                                <br/>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;"></th>
                                            <th>ID</th>
                                            <th>Логотип</th>
                                            <th>Название</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa fa-check" aria-hidden="true"></i> 
                                                    Выбрать
                                                </button>
                                            </td>
                                            <td>1</td>
                                            <td>
                                                <img src="https://cdn.worldvectorlogo.com/logos/skoda-6.svg" width="32" height="32">
                                            </td>
                                            <td>Skoda</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> 
                                                    Редактировать
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> 
                                                    Удалить
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination">
                                                <li>
                                                    <a href="#" aria-label="Previous">
                                                        Назад
                                                    </a>
                                                </li>
                                                <li class="disabled"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li>
                                                    <a href="#" aria-label="Next">
                                                        Вперед
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <?php echo $this->fetch('scripts.php'); ?>
    </body>
</html>
