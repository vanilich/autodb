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
                                                    Привязать комплектацию и назначить цены
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
                                                    <th>Старая цена</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                <?php $currentId = 0; ?>
                                                <?php while($i < count($car)) { ?>
                                                    <?php if( $currentId !== $car[$i]['modification_id'] ) { ?>
                                                        <tr>
                                                            <td colspan="5"><?php echo $car[$i]['modification_name'];?></td>                                                   
                                                        </tr> 
                                                        <tr>
                                                            <td><?php echo $car[$i]['complectation_name'];?></td>
                                                            <td><?php echo $car[$i]['modification_gearbox'];?></td>
                                                            <td><?php echo $car[$i]['modification_power'];?></td>
                                                            <td>
                                                                <?php echo number_format($car[$i]['price'], 0, '', ' ');; ?> р.
                                                            </td> 
                                                            <td>
                                                                <?php echo number_format($car[$i]['old_price'], 0, '', ' ');; ?> р.
                                                            </td>                                                                                                               
                                                        </tr> 
                                                        <?php $currentId = $car[$i]['modification_id']; ?>
                                                    <?php } else { ?>                                                        
                                                        <tr>
                                                            <td><?php echo $car[$i]['complectation_name'];?></td>
                                                            <td><?php echo $car[$i]['modification_gearbox'];?></td>
                                                            <td><?php echo $car[$i]['modification_power'];?></td>
                                                            <td>
                                                                <?php echo number_format($car[$i]['price'], 0, '', ' ');; ?> р.
                                                            </td>  
                                                            <td>
                                                                <?php echo number_format($car[$i]['old_price'], 0, '', ' ');; ?> р.
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
                                            <th style="width: 100px;">Действия</th>
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
                                            <th style="width: 100px;">Действия</th>
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

                            <div class="form-group">
                                <label>Длина, мм</label>
                                <input type="number" name="length" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Ширина, мм</label>
                                <input type="number" name="width" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Высота, мм</label>
                                <input type="number" name="height" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Колесная база, мм</label>
                                <input type="number" name="wheel_base" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Передняя колея колес, мм</label>
                                <input type="number" name="front_rut" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Задняя колея колес, мм</label>
                                <input type="number" name="back_rut" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Передний свес, мм</label>
                                <input type="number" name="front_overhang" class="form-control" >
                            </div>                                                                                                                

                            <div class="form-group">
                                <label>Задний свес, мм</label>
                                <input type="number" name="back_overhang" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Минимальный объем багажного отделения, л</label>
                                <input type="number" name="trunk_volume_min" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Максимальный объем багажного отделения, л</label>
                                <input type="number" name="trunk_volume_max" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Объем топливного бака, л</label>
                                <input type="number" name="tank_volume" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Передние тормоза (тип, размер)</label>
                                <input type="text" name="front_brakes" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Задние тормоза (тип, размер)</label>
                                <input type="text" name="back_brakes" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Передняя подвеска</label>
                                <input type="text" name="front_suspension" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Задняя подвеска</label>
                                <input type="text" name="back_suspension" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Объем двигателя, л</label>
                                <input type="number" step="any" name="engine_displacement" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Рабочий объем двигателя, см3</label>
                                <input type="number" name="engine_displacement_working_value" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Тип двигателя</label>
                                <input type="text" name="engine_type" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Коробка передач</label>
                                <select class="form-control" name="gearbox">
                                    <option selected="true" disabled="disabled"></option> 
                                    <option value="Механическая">Механическая</option>
                                    <option value="Автоматическая">Автоматическая</option>
                                </select>
                            </div> 

                            <div class="form-group">
                                <label>Количество передач</label>
                                <input type="text" name="gears" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Тип привода</label>
                                <select class="form-control" name="drive">
                                    <option selected="true" disabled="disabled"></option> 
                                    <option value="Передний">Передний</option>
                                    <option value="Задний">Задний</option>
                                    <option value="Полный">Полный</option>
                                </select>                                
                            </div> 

                            <div class="form-group">
                                <label>Мощность, л.с.</label>
                                <input type="number" name="power" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Расход топлива в городе, л/100 км</label>
                                <input type="number" step="any" name="consume_city" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Расход топлива на трассе, л/100 км</label>
                                <input ttype="number" step="any" name="consume_track" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Смешанный расход топлива, л/100 км</label>
                                <input type="number" step="any" name="consume_mixed" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Разгон от 0 до 100 км/ч, сек.</label>
                                <input type="number" step="any" name="acceleration_100km" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Максимальная скорость, км/ч</label>
                                <input type="number" name="max_speed" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Дорожный просвет, мм</label>
                                <input type="number" name="clearance" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Минимальная масса, кг</label>
                                <input type="number" name="min_mass" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Максимальная масса, кг</label>
                                <input type="number" name="max_mass" class="form-control" >
                            </div> 

                            <div class="form-group">
                                <label>Допустимая масса прицепа без тормозов, кг</label>
                                <input type="number" name="trailer_mass" class="form-control" >
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
                                <label>Опции <small>(Введите слово для поиска)</small></label>

                                <div class="search-wrapper">
                                    <input type="text" class="form-control js-search">

                                    <ul class="search-container list-unstyled"></ul>
                                </div>
                            </div>

                            <div class="js-option">
                                <table class="table table-bordered search-table">
                                    <tbody></tbody>
                                </table>
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
                                    <td class="text-center"><?php echo $item['name']; ?></td>
                                <?php } ?>
                            </tr>
                            <?php foreach ($complectation as $complectation_item) { ?>
                                <tr>
                                    <td><?php echo $complectation_item['name']; ?></td>
                                    <?php foreach ($modification as $modification_item) { ?>
                                        <td class="text-center">
                                            <?php $search = search($complectation_has_modification, $modification_item['id'], $complectation_item['id']); ?>

                                            <div class="js-change-modification">
                                                <input 
                                                    class="js-change-complectation_has_modification"
                                                    type="checkbox" 
                                                    <?php if($search) { ?>
                                                        checked 
                                                    <?php } ?>
                                                    data-complectation-id="<?php echo $complectation_item['id']; ?>"
                                                    data-modification-id="<?php echo $modification_item['id']; ?>"
                                                >

                                                <form class="form-inline">
                                                    <input type="hidden" name="id" value="<?php echo $search['id']; ?>">

                                                    <div class="form-group text-left">
                                                        <label>Цена:</label>
                                                        <br/>
                                                        <input type="number" class="form-control" name="price" placeholder="Цена" value="<?php echo $search['price']; ?>" <?php if(!$search) { echo "disabled";} ?>>
                                                    </div>
                                                    <div class="form-group text-left">
                                                        <label>Старая цена:</label>
                                                        <br/>
                                                        <input type="number" class="form-control" name="old_price" placeholder="Старая цена" value="<?php echo $search['old_price']; ?>" <?php if(!$search) { echo "disabled";} ?>>
                                                    </div>
                                                </form> 
                                            </div>                                           
                                        </td>
                                    <?php } ?>
                                </tr>  
                            <?php } ?>                          
                        </table>  

                        <button type="submit" class="btn btn-success js-save">Сохранить</button>              
                    </div>
                </div>
            </div>
        </div>

        <script type="text/template" id="tpl-remove-parameter">
            <td style="width: 30px;">
                <a href="#" class="btn btn-danger btn-sm js-remove-parametr">
                    <i class="fa fa-trash" aria-hidden="true"></i> 
                </a>
            </td>
        </script>

        <?php
            function search($data, $modification_id, $complectation_id) {
                foreach ($data as $value) {
                    if($value['complectation_id'] == $complectation_id AND $value['modification_id'] == $modification_id) {
                        return $value;
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

                // Очищаем цену и страую цену в этой ячейке таблицы
                if( $(this).is(':checked') === false ) {
                    $(this).parents('.js-change-modification').find('input[type="number"]').val('').attr('disabled', true);
                } else {
                    $(this).parents('.js-change-modification').find('input[type="number"]').val(0).attr('disabled', false);
                }
            });

            // Щелчок на кнопке сохранить привязку комплектации к модификации
            $('#modal-complectation-bind .js-save').click(function() {
                //location.reload();

                data = [];    
                // Проходимся по ячейкам таблицы и получаем данные цены
                $('#modal-complectation-bind .js-change-modification').each(function() {
                    var form = $(this).find('form');

                    if( $(this).find('input[type="checkbox"]').is(':checked') ) {
                        var form = $(this).find('form');

                        var id = form.find('input[name="id"]').val();
                        var price = form.find('input[name="price"]').val();
                        var old_price = form.find('input[name="old_price"]').val();

                        data.push({
                            id: id,
                            price: price,
                            old_price: old_price
                        });
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/setPrice',
                    data: {
                        data: data
                    },
                    success: function() {
                        location.reload();
                    }
                })
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

            $('#modal-complectation-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);

                var id = $(this).find('input[name="id"]').val();

                console.log(id);

                // 
                $.ajax({
                    method: 'POST',
                    url: '/getParameter/' + id,
                    beforeSend: function() {
                        // Скрываем списко с результатами
                        $('.search-table tbody').html('');
                    },

                    success: function(data) {
                        for(var key in data) {
                            // Создаем элемент таблтицы и добавляем туда название
                            var tr = $('<tr>').append( $('<td>').text(data[key].name) );
                            // Добавляем значок удаления параметра (danger)
                            $(tr).append( $('#tpl-remove-parameter').html() );
                            // Добавляем скрытый input в tr
                            $(tr).append( $('<input>').attr('type', 'hidden').attr('name', 'parameter[]').val(data[key].id) );
                            // Добавляем строку в основную таблицу
                            $('.search-table tbody').append(tr);                            
                        }
                    }
                })
            })            
        </script>   

        <script type="text/javascript">
            window.search_container = $('.search-container');

            // При нажатии клавиши в форме поиска
            $('.js-search').keyup(function() {
                var val = $(this).val();

                // Если в поле ничего нет, очищаем контейнер
                if(val == "") {
                    $(window.search_container).hide();
                    return;
                }

                // Делаем запрос к серверу на поиск параметра
                $.ajax({
                    method: 'GET',
                    url: '/parameter/search',
                    data: {
                        // Передаем строку для поиска
                        search : val
                    },

                    success: function(data) {
                        // Очищаем контейнер
                        $(window.search_container).html('');

                        for(var key in data) {
                            // Добавляем li элементы резльутатов поиска
                            var li = $('<li>').attr('data-name', data[key].name).attr('data-id', data[key].id).text(data[key].name);

                            $(window.search_container).append(li);
                        }
                    }
                })

                $(window.search_container).show();
            });

            // Клик на результат поиска
            $(document).on('click', '.search-container li', function() {
                // Скрываем списко с результатами
                $(window.search_container).hide();

                // Получаем данные 
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Создаем элемент таблтицы и добавляем туда название
                var tr = $('<tr>').append( $('<td>').text(name) );
                // Добавляем значок удаления параметра (danger)
                $(tr).append( $('#tpl-remove-parameter').html() );
                // Добавляем скрытый input в tr
                $(tr).append( $('<input>').attr('type', 'hidden').attr('name', 'parameter[]').val(id) );
                // Добавляем строку в основную таблицу
                $('.search-table tbody').append(tr);

                // Очищаем поле поиска
                $('.js-search').val('');
            });

            // Удаление параметры из таблицы
            $(document).on('click', '.js-remove-parametr', function() {
                $(this).parents('tr').remove();
            });
        </script> 
    </body>
</html>
