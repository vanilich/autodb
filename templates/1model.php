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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Редактор комплектаций и модификайи автомобиля
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default" data-toggle="modal" data-target="#modal-complectation-add">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Добавить комплектацию
                                                </button> 
                                                
                                                <button class="btn btn-default">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Добавить модификацию
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
                                                    <th>Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php $currentId = 0; ?>
                                                <?php while($i < count($complectation)) { ?>
                                                    <?php if( $currentId !== $complectation[$i]['modification_id'] ) { ?>
                                                        <tr>
                                                            <td colspan="4"><?php echo $complectation[$i]['modification_name'];?></td>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm">
                                                                     <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm">
                                                                     <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>                                                        
                                                            </td>                                                    
                                                        </tr> 
                                                        <tr>
                                                            <td><?php echo $complectation[$i]['complectation_name'];?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm">
                                                                     <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm">
                                                                     <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>                                                        
                                                            </td>                                                    
                                                        </tr> 
                                                        <?php $currentId = $complectation[$i]['modification_id']; ?>
                                                    <?php } else { ?>                                                        
                                                        <tr>
                                                            <td><?php echo $complectation[$i]['complectation_name'];?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm">
                                                                     <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm">
                                                                     <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>                                                        
                                                            </td>                                                    
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
                            <input type="hidden" name="id" value="<?php echo 1; ?>">

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


        <?php echo $this->fetch('scripts.php'); ?>
    </body>
</html>
