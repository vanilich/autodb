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
                <th>ID</th>
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
                        <a href="/car/<?php echo $item['id']; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Цвет автомобиля">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </a>                        
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
<?php } ?>