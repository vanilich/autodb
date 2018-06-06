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
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список категорий для параметров
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default" data-toggle="modal" data-target="#modal-category-add">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Добавить категорию
                                            </button> 
                                        </div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название категории</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($parameter_category as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id']; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>
                                                    <button 
                                                        class="btn btn-primary btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#modal-category-edit" 
                                                        data-data='<?php echo json_encode($item); ?>'>
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>  
                                                    <a href="/parameter_category/remove/<?php echo $item['id']; ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Вы действительно хотите удалить эту категорию?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> 
                                                    </a>                                                                                                     
                                                </td>
                                            </tr>
                                        <?php } ?>                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>             
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список параметров для комплектации
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-default" data-toggle="modal" data-target="#modal-parameter-add">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Добавить параметр
                                            </button> 
                                        </div>
                                    </div>
                                </div>

                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название параметра</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($parameter as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id']; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>
                                                    <button 
                                                        class="btn btn-primary btn-sm" 
                                                        data-toggle="modal" 
                                                        data-target="#modal-parameter-edit" 
                                                        data-data='<?php echo json_encode($item); ?>'>
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>  
                                                    <a href="/parameter/remove/<?php echo $item['id']; ?>?model_id=<?php echo $model['id']; ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Вы действительно хотите удалить этот параметр?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> 
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

        <div class="modal fade" id="modal-category-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Добавить категорию</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/parameter_category/add" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Название категории</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-category-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактировать категорию</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/parameter_category/edit">
                            <input name="id" type="hidden" value="">

                            <div class="form-group">
                                <label>Название категории</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-parameter-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Добавить параметр</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/parameter/add" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Название категории</label>
                                <select class="form-control" name="parameter_category_id" required>
                                    <option selected="true" disabled="disabled"></option> 
                                    <?php foreach($parameter_category as $item) { ?>
                                        <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Название параметра</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>        

        <div class="modal fade" id="modal-parameter-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактировать параметр</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/parameter/edit">
                            <input name="id" type="hidden" value="">

                            <div class="form-group">
                                <label>Название параметра</label>
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
            $('#modal-category-edit, #modal-parameter-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('data');

                for(var key in data) {
                    $(this).find('[name="' + key + '"]').val(data[key]);
                }
            })
        </script>               
    </body>
</html>
