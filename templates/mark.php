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
                            <!-- /.panel-heading -->
                            <div class="panel-body">
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
                                <!-- /.table-responsive -->
                                <div class="well">
                                    <h4>DataTables Usage Information</h4>
                                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>                
            </div>
        </div>

        <?php echo $this->fetch('scripts.php'); ?>
    </body>
</html>
