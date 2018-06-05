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
                                Список автомобилей
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Марка</label>
                                            <select class="form-control js-select-mark">
                                                <option value="0">Любая</option>
                                                <?php foreach($mark as $item) { ?>
                                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                                <?php } ?>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Модель</label>
                                            <select class="form-control js-select-model">
                                                <option value="0">Любая</option>
                                            </select>
                                        </div>
                                    </div>                                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Добавить марку
                                            </button> 
                                            
                                            <button class="btn btn-default">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Добавить модель
                                            </button> 
                                        </div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;"></th>
                                            <th>ID</th>
                                            <th>Логотип</th>
                                            <th>Марка</th>
                                            <th>Модель</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $item) { ?> 
                                            <tr>
                                                <td>
                                                    <a href="/mark/<?php echo $item['id']; ?>" class="btn btn-primary">
                                                        <i class="fa fa-check" aria-hidden="true"></i> 
                                                        Выбрать
                                                    </a>
                                                </td>
                                                <td><?php echo $item['id'];?></td>
                                                <td>
                                                    <img src="https://cdn.worldvectorlogo.com/logos/skoda-6.svg" width="32" height="32">
                                                </td>
                                                <td><?php echo $item['mark_name'];?></td>
                                                <td><?php echo $item['name'];?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                                                        Редактировать
                                                    </button>
                                                    <a href="/mark/remove/<?php echo $item['id']; ?>" class="btn btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> 
                                                        Удалить
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
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

        <script type="text/javascript">
            $('.js-select-mark').change(function() {
                var id = $(this).val();

                var str = '<option value="0">Любая</option>';

                $.ajax({
                    method: 'GET',
                    url: '/model/' + id,

                    success: function(data) {
                        for(var item in data) {
                            $('.js-select-model').html('');

                            var id = data[item]['id'];
                            var name = data[item]['name'];

                            str = str + '<option value="' + id + '">' + name + '</option>';
                        }
                        $('.js-select-model').html(str);
                    }           
                })
            });
        </script>
    </body>
</html>
