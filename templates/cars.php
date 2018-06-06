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
                                </div>

                                <div class="table-container">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <?php echo $this->fetch('scripts.php'); ?>

        <script type="text/javascript">
            window.data = {};

            $('.js-select-mark').change(function() {
                var id = $(this).val();

                window.data['mark_id'] = id;
                window.data['page'] = 1;
                refreshTable();
            });

            window.refreshTable = function() {
                $.ajax({
                    method: 'POST',
                    url: '/cars/table',
                    data: window.data,

                    success: function(data) {
                        $('.table-container').html(data);
                    }
                })
            }

            window.refreshTable();
        </script>
    </body>
</html>
