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

                <?php echo $this->fetch('message.php'); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список марок автомобилей
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default" data-toggle="modal" data-target="#modal-mark-add">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Добавить марку
                                            </button> 
                                        </div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mark as $item) { ?> 
                                            <tr>
                                                <td><?php echo $item['id'];?></td>
                                                <td><?php echo $item['name'];?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default" 
                                                    data-toggle="modal" 
                                                    data-target="#modal-mark-edit" 
                                                    data-data='<?php echo json_encode($item); ?>'>
                                                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                                                        Редактировать
                                                    </button>
                                                    <a href="/mark/remove/<?php echo $item['id']; ?>" 
                                                       class="btn btn-danger" 
                                                       onclick="return confirm('Вы действительно хотите удалить эту марку автомобиля?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> 
                                                        Удалить
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <div class="modal fade" id="modal-mark-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Добавление марки автомобиля</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/mark/add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Название марки автомобиля</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-mark-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактирование марки автомобиля</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/mark/edit">
                            <input name="id" type="hidden" value="">

                            <div class="form-group">
                                <label>Название марки автомобиля</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->fetch('scripts.php'); ?>

        <script type="text/javascript">
            $('#modal-mark-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('data');

                for(var key in data) {
                    $(this).find('[name="' + key + '"]').val(data[key]);
                }
            })
        </script>
    </body>
</html>
