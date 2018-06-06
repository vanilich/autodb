<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	$app->get('/',    	\FrontendController::class . ':index');
	$app->get('/cars',  \FrontendController::class . ':cars');
	$app->get('/model', \FrontendController::class . ':model');
	$app->get('/mark',  \FrontendController::class . ':mark');

	// Информация о автомобиле (комплектации и т.д.)
	$app->get('/car/{id}',  \FrontendController::class . ':car');

	// Ajax таблица с автомобилями
	$app->post('/cars/table',  \CarsController::class . ':table');

	$app->post('/mark/add',    		\MarkController::class . ':add');
	$app->post('/mark/edit',   		\MarkController::class . ':edit');
	$app->any('/mark/remove/{id}',  \MarkController::class . ':remove');

	$app->get('/model/all',    		\ModelController::class . ':all');
	$app->post('/model/add',    	\ModelController::class . ':add');
	$app->post('/model/edit',    	\ModelController::class . ':edit');
	$app->any('/model/remove/{id}', \ModelController::class . ':remove');

	$app->post('/complectation/add',    \ComplectationController::class . ':add');
