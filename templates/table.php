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
                <th>Марка</th>
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
                            data-target="#modal-car-edit" 
                            class="btn btn-primary btn-sm" 
                            data-id="<?php echo $item['id'];?>"
                            data-mark="<?php echo $item['mark_name'];?>"
                            data-model="<?php echo $item['name'];?>"
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

    <div class="modal fade" id="modal-car-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Редактирование автомобиля</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="">

                    <div class="form-group">
                        <label>Название марки автомобиля</label>
                        <input type="text" name="mark" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Название модели автомобиля</label>
                        <input type="text" name="model" class="form-control" disabled>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <input type="text" name="color_name[]" class="form-control" required>
                                </th>
                                <th>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon2">#</span>
                                        <input type="color" name="color_value[]" class="form-control" value="#ffffff" required>
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
                            </tr>
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

    <script type="text-template" id="table-row-tempalte">
        <tr>
            <th>
                <input type="text" name="color_name[]" class="form-control" required>
            </th>
            <th>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">#</span>
                    <input type="color" name="color_value[]" class="form-control" value="#ffffff" required>
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
        </tr>
    </script> 

    <script type="text/javascript">
        $(document).on('show.bs.modal', '#modal-car-edit', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('data');

            $(this).find('[name="id"]').val( $(button).attr('data-id') );
            $(this).find('[name="mark"]').val( $(button).attr('data-mark') );
            $(this).find('[name="model"]').val( $(button).attr('data-model') );

        });

        // Сохранение изменений
        $('.js-save-car').on('click', function() {

            $('#modal-car-edit input[name="color_name[]"]').each(function() {
                if( $(this).val() == '' ) {
                    $(this).focus();
                    return false;
                }
            });
        });

        // Добавялем в таблицу поле для создания цвета и редактирования изображения
        $('#js-add-price').on('click', function() {
            $('table.js-color-table tbody').append( $('#table-row-tempalte').html() );
        });

        // При изменении картинки, отображаем их в браузере
        $(document).on("change", '.car-picture-upload', function() {
            readURL(this);

            /*
            var self = this;

            var $input = $(this);
            var formData = new FormData; 

            for( var key in $input.prop('files') ) {
                formData.append('pictures[]', $input.prop('files')[key]);
            }           
            
            $.ajax({
                url: '/car/picture/upload',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',

                success: function (data) {
                    readURL(self);
                }
            });  
            */                                
        });        

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