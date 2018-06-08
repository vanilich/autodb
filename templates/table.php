<?php if(empty($data)) { ?>
    <div class="alert alert-info" role="alert" id="msg-<?php echo $classname; ?>">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> 

        Вы пока не добавили моделей автомобилей
    </div>
<?php } else { ?>
    <p>
        Страница <?php echo $currentPage; ?> из <?php echo $countPages; ?>
    </p>

    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th style="width: 90px;"></th>
                <th style="width: 90px;">ID</th>
                <th style="width: 250px;">Марка</th>
                <th>Модель</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $item) { ?> 
                <tr>
                    <td>
                        <a href="/car/<?php echo $item['id']; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Редактировать комплектации">
                            <i class="fa fa-check" aria-hidden="true"></i> 
                        </a>
                        <button data-toggle="modal" 
                            data-target="#modal-car-edit<?php echo $item['id']; ?>" 
                            class="btn btn-primary btn-sm" 
                        >
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>                        
                    </td>
                    <td><?php echo $item['id'];?></td>
                    <td><?php echo $item['mark_name'];?></td>
                    <td><?php echo $item['name'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if($countPages >= 2) { ?>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if($currentPage == 1) { ?>
                            <li class="disabled">
                                <a href="#">
                                    Назад
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="#" onclick="window.data['page']=<?php echo $currentPage-1; ?>; window.refreshTable(); return false;">
                                    Назад
                                </a>
                            </li>
                        <?php } ?>

                        <?php for ($i=1; $i <= $countPages; $i++) { ?>
                            <?php if($currentPage == $i) { ?>
                                <li class="disabled">
                                    <a href="#" onclick="window.data['page']=<?php echo $i; ?>; window.refreshTable(); return false;"><?php echo $i; ?></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="#" onclick="window.data['page']=<?php echo $i; ?>; window.refreshTable(); return false;"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if($currentPage == $countPages) { ?>
                            <li class="disabled">
                                <a href="#">
                                    Вперед
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="#" onclick="window.data['page']=<?php echo $currentPage+1; ?>; window.refreshTable(); return false;">
                                    Вперед
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    <?php } ?>
    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    <?php foreach($data as $item) { ?> 
        <div class="modal fade modal-car-edit" id="modal-car-edit<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Редактирование автомобиля</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="model_id" value="<?php echo $item['id'];?>">

                        <div class="form-group">
                            <label>Название марки автомобиля</label>
                            <input type="text" name="mark" class="form-control" disabled value="<?php echo $item['mark_name'];?>">
                        </div>

                        <div class="form-group">
                            <label>Название модели автомобиля</label>
                            <input type="text" name="model" class="form-control" disabled value="<?php echo $item['name'];?>">
                        </div>

                        <hr/>

                        <button type="submit" class="btn btn-default" id="js-add-price">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Добавить цвет
                        </button>

                        <br/>
                        <br/>

                        <table class="table table-bordered js-color-table">
                            <thead>
                                <tr>
                                    <th style="width: 150px;">Название цвета</th>
                                    <th style="width: 150px;">Код цвета</th>
                                    <th>Изображения автомобиля</th>
                                    <th style="width: 90px;">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($color as $value) { ?>
                                    <?php if( $value['model_id'] === $item['id'] ) { ?>
                                        <tr>
                                            <th>
                                                <input type="text" name="color_name" class="form-control" required value="<?php echo $value['name']; ?>">
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon2">#</span>
                                                    <input type="color" name="color_value" class="form-control" value="<?php echo $value['hex']; ?>" required>
                                                </div>
                                            </th>  
                                            <th>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="image-item-row">
                                                            <?php if( !empty($value['pictures']) ) { ?>
                                                                <?php $pictures = json_decode($value['pictures']); ?>

                                                                <?php foreach ($pictures as $pic) { ?>
                                                                    <div class="image-item">
                                                                        <a class="thumbnail image-th-car" style="background-image: url(' <?php echo 'res/' . getImageFolderName($pic) . $pic; ?>');"></a>
                                                                    </div>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div> 
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input class="car-picture-upload" type="file" name="pictures[]"  multiple>
                                                    </div>
                                                </div>
                                            </th>  
                                            <th>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Вы действительно хотите удалить эту марку автомобиля?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> 
                                                </a>                                   
                                            </th> 
                                            <input type="hidden" value="<?php echo $value['id']; ?>" name="color_id">
                                        </tr>
                                    <?php } ?>
                                <?php } ?>                           
                            </tbody>
                        </table>  

                        <hr/>

                        <button type="submit" class="btn btn-success js-save-car">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить
                        </button>             
                    </div>
                </div>
            </div>
        </div> 
    <?php } ?>

    <script type="text-template" id="table-row-tempalte">
        <tr>
            <th>
                <input type="text" name="color_name" class="form-control" required>
            </th>
            <th>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">#</span>
                    <input type="color" name="color_value" class="form-control" value="#ffffff" required>
                </div>
            </th>  
            <th>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="image-item-row"></div> 
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input class="car-picture-upload" type="file" name="pictures[]"  multiple>
                    </div>
                </div>
            </th>
            <th>
                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Вы действительно хотите удалить эту марку автомобиля?')">
                    <i class="fa fa-trash" aria-hidden="true"></i> 
                </a>                                   
            </th>                                           
        </tr>
    </script> 

    <script type="text/javascript">
        // Сохранение изменений
        $('.js-save-car').on('click', function() {
            // todo validation


            // Проходимся по всем цветам
            $(this).parents('.modal-car-edit').find('.js-color-table tbody tr').each(function() {
                var self = this;

                // Получаем имя цвета и hex код
                var colorName = $(this).find('input[name="color_name"]').val(); 
                var colorValue = $(this).find('input[name="color_value"]').val(); 

                // Экземпляр формы загрузки файла
                var $input = $(this).find('.car-picture-upload');
                var formData = new FormData; 

                // Получаем данные картинок
                for( var key in $input.prop('files') ) {
                    formData.append('pictures[]', $input.prop('files')[key]);
                }     

                // Добавляем в запрос необходимую информацию
                formData.append('color_name', colorName);      
                formData.append('color_value', colorValue);      
                formData.append('model_id', $(this).parents('.modal-car-edit').find('[name="model_id"]').val() ) ;   

                var id = $(this).find('input[name="color_id"]').val();
                if(id !== undefined) {
                   formData.append('id', id) ;      
                }   
                
                // Отправляем на сервер
                $.ajax({
                    method: 'POST',
                    url: '/car/edit',
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function (data) {
                        // Если с сервера приходит ID, то значит вставлена новая запись
                        if(data.id) {
                            $(self).append( $('<input>').attr('type', 'hidden').val(data.id).attr('name', 'color_id') );
                        }
                    }
                }); 
            });
        });

        // Добавялем в таблицу поле для создания цвета и редактирования изображения
        $('#js-add-price').on('click', function() {
            $('table.js-color-table tbody').append( $('#table-row-tempalte').html() );
        });

        // При изменении картинки, отображаем их в браузере
        $(document).on("change", '.car-picture-upload', function() {
            readURL(this);                                
        });        

        // Функция, которая выводит картинки в браузере
        function readURL(input) {
            if (input.files && input.files[0]) {
                for(var key in input.files) {
                    var reader = new FileReader();

                    var selector = $(input).parents('th');

                    console.log(selector);

                    reader.onload = function(e) {
                        $(selector).find('.image-item-row').append( 
                            $('<div>').addClass('image-item').append( 
                                $('<a>').addClass('thumbnail').addClass('image-th-car').css('background-image', 'url("' + e.target.result + '")')
                            )
                        );
                    }

                    reader.readAsDataURL(input.files[key]);
                }
            }
        }

    </script>  


<?php } ?>