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
                        <h1 class="page-header">Панель управления</h1>
                    </div>
                </div>
            </div>

        </div>

        <?php echo $this->fetch('scripts.php'); ?>
    </body>
</html>
