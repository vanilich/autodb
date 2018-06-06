<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	$app->get('/',    		 \FrontendController::class . ':index');
	$app->get('/cars',  	 \FrontendController::class . ':cars');
	$app->get('/model', 	 \FrontendController::class . ':model');
	$app->get('/mark',  	 \FrontendController::class . ':mark');
	$app->get('/parameter',  \FrontendController::class . ':parameter');

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

	$app->post('/changeModification',   	\ComplectationController::class . ':changeModification');
	$app->post('/complectation/add',    	\ComplectationController::class . ':add');
	$app->post('/complectation/edit',   	\ComplectationController::class . ':edit');
	$app->any('/complectation/remove/{id}', \ComplectationController::class . ':remove');
	

	$app->post('/modification/edit',    	\ModificationController::class . ':edit');
	$app->post('/modification/add',    		\ModificationController::class . ':add');
	$app->any('/modification/remove/{id}',  \ModificationController::class . ':remove');

	$app->get('/parameter/search',    	\ParameterController::class . ':search');
	$app->post('/parameter/add',    	\ParameterController::class . ':add');
	$app->post('/parameter/edit',    	\ParameterController::class . ':edit');
	$app->any('/parameter/remove/{id}', \ParameterController::class . ':remove');

	$app->post('/parameter_category/edit',     	 \ParameterCategoryController::class . ':edit');
	$app->post('/parameter_category/add',      	 \ParameterCategoryController::class . ':add');
	$app->any('/parameter_category/remove/{id}', \ParameterCategoryController::class . ':remove');
