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
                                Список моделей автомобилей
                            </div>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default">
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
                                                <tr>
                                                    <td colspan="4">1.6 МТ5 (109 л.с.)</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
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
                                                    <td colspan="4">1.6 МТ5 (109 л.с.)</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
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
                                                    <td colspan="4">1.6 МТ5 (109 л.с.)</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
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
                                                    <td>LS</td>
                                                    <td>МКПП</td>
                                                    <td>109 л.с.</td>
                                                    <td>от 478 000 руб.</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm">
                                                             <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm">
                                                             <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>                                                        
                                                    </td>                                                    
                                                </tr>                                                                                                                                               
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

        <?php echo $this->fetch('scripts.php'); ?>
    </body>
</html>
