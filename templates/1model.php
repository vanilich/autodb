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
                        <h1 class="page-header"><?php echo $model['name']; ?></h1>
                    </div>
                </div>

                <?php echo $this->fetch('message.php'); ?>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Информация о автомобиле
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default" data-toggle="modal" data-target="#modal-complectation-bind">
                                                    <i class="fa fa-th" aria-hidden="true"></i>
                                                    Привязать комплектацию
                                                </button>                                                 
                                            </div>
                                        </div>

                                        <br/>

                                        <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Комплектация</th>
                                                    <th>КПП</th>
                                                    <th>Мощность</th>
                                                    <th>Цена</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php $currentId = 0; ?>
                                                <?php while($i < count($car)) { ?>
                                                    <?php if( $currentId !== $car[$i]['modification_id'] ) { ?>
                                                        <tr>
                                                            <td colspan="4"><?php echo $car[$i]['modification_name'];?></td>                                                   
                                                        </tr> 
                                                        <tr>
                                                            <td><?php echo $car[$i]['complectation_name'];?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>                                                  
                                                        </tr> 
                                                        <?php $currentId = $car[$i]['modification_id']; ?>
                                                    <?php } else { ?>                                                        
                                                        <tr>
                                                            <td><?php echo $car[$i]['complectation_name'];?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>                                                   
                                                        </tr> 
                                                    <?php } ?>

                                                    <?php $i++; ?>
                                                <?php } ?>                                                                                           
                                            </tbody>
                                        </table>
                                    </div>                              
                                    <div class="col-md-4">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список комплектаций
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-default" data-toggle="modal" data-target="#modal-complectation-add">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Добавить комплектацию
                                        </button>                                                 
                                    </div>
                                </div>

                                <br/>

                                <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($complectation as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id']; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>
                                                    <button 
                                                    class="btn btn-primary btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#modal-complectation-edit" 
                                                    data-data='<?php echo json_encode($item); ?>'>
                                                         <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <a href="/complectation/remove/<?php echo $item['id']; ?>?model_id=<?php echo $model['id']; ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Вы действительно хотите удалить эту комплектацию автомобиля?')">
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
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Список модификаций
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-default" data-toggle="modal" data-target="#modal-modification-add">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Добавить модификацию
                                        </button>                                                 
                                    </div>
                                </div>

                                <br/>

                                <table width="100%" class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($modification as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id']; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td>
                                                    <button 
                                                    class="btn btn-primary btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#modal-modification-edit" 
                                                    data-data='<?php echo json_encode($item); ?>'>
                                                         <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                    <a href="/modification/remove/<?php echo $item['id']; ?>?model_id=<?php echo $model['id']; ?>" 
                                                       class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Вы действительно хотите удалить эту модификацию автомобиля?')">
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

        <div class="modal fade" id="modal-modification-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Добавить модификацию для автомобиля <?php echo $model['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/modification/add" enctype="multipart/form-data">
                            <input type="hidden" name="model_id" value="<?php echo $model['id']; ?>">

                            <div class="form-group">
                                <label>Название модификации</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-modification-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактировать модификацию для автомобиля <?php echo $model['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/modification/edit">
                            <input name="id" type="hidden" value="">
                            <input type="hidden" name="model_id" value="<?php echo $model['id']; ?>">

                            <div class="form-group">
                                <label>Название модификации автомобиля</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-complectation-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Добавить комплектацию для автомобиля <?php echo $model['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/complectation/add" enctype="multipart/form-data">
                            <input type="hidden" name="model_id" value="<?php echo $model['id']; ?>">

                            <div class="form-group">
                                <label>Название комплектации</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-complectation-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактировать комплектацию для автомобиля <?php echo $model['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/complectation/edit">
                            <input name="id" type="hidden" value="">
                            <input type="hidden" name="model_id" value="<?php echo $model['id']; ?>">

                            <div class="form-group">
                                <label>Название комплектации автомобиля</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Параметры</label>

                                <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                                    <?php foreach ($parameter as $item) { ?>
                                         <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                    <?php } ?>                                    
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>        

        <div class="modal fade" id="modal-complectation-bind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Привязать комплектацию для автомобиля <?php echo $model['name']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <td></td>
                                <?php foreach ($modification as $item) { ?>
                                    <td><?php echo $item['name']; ?></td>
                                <?php } ?>
                            </tr>
                            <?php foreach ($complectation as $complectation_item) { ?>
                                <tr>
                                    <td><?php echo $complectation_item['name']; ?></td>
                                    <?php foreach ($modification as $modification_item) { ?>
                                        <td>
                                            <?php $search = search($complectation_has_modification, $modification_item['id'], $complectation_item['id']); ?>

                                            <input 
                                                class="js-change-complectation_has_modification"
                                                type="checkbox" 
                                                <?php if($search) { ?>
                                                    checked 
                                                <?php } ?>
                                                data-complectation-id="<?php echo $complectation_item['id']; ?>"
                                                data-modification-id="<?php echo $modification_item['id']; ?>"
                                            >
                                        </td>
                                    <?php } ?>
                                </tr>  
                            <?php } ?>                          
                        </table>  

                        <button type="submit" class="btn btn-success" onclick="location.reload();">Сохранить</button>              
                    </div>
                </div>
            </div>
        </div>

        <?php
            function search($data, $modification_id, $complectation_id) {
                foreach ($data as $value) {
                    if($value['complectation_id'] == $complectation_id AND $value['modification_id'] == $modification_id) {
                        return true;
                    }
                }
                return false;
            }
        ?>

        <?php echo $this->fetch('scripts.php'); ?>

        <script type="text/javascript">
            $('.js-change-complectation_has_modification').change(function() {
                var complectation_id = $(this).data('complectation-id');
                var modification_id = $(this).data('modification-id');

                $.ajax({
                    method: 'POST',
                    url: '/changeModification',
                    data: {
                       complectation_id : complectation_id, 
                       modification_id : modification_id 
                    }
                });
            });
        </script>

        <script type="text/javascript">
            $('#modal-modification-edit, #modal-complectation-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('data');

                for(var key in data) {
                    $(this).find('[name="' + key + '"]').val(data[key]);
                }
            })
        </script>   

        <script type="text/javascript">
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();

                $('.js-example-basic-multiple').select2({
                    ajax: {
                        url: '/parameter/search',
                        data: function (params) {
                            var query = {
                                search: params.term
                            }
                            return query;
                        },
                        processResults: function (data) {
                            console.log(data);

                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
            });
        </script>    

        <style type="text/css">
            .select2-container {
                width: 100% !important;
                display: block;
            }
        </style>
    </body>
</html>
