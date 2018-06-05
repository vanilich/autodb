<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	$app->get('/', function (Request $request, Response $response, array $args) {
	    return $this->renderer->render($response, 'index.php');
	});

	/**
	* Вывод автомобилей по марке и модели
	**/
	$app->get('/cars', function (Request $request, Response $response, array $args) use($app) {
		$data = $this->db->getAll("SELECT model.id as 'id', model.name as 'name', mark.name as 'mark_name' FROM model INNER JOIN mark ON model.mark_id = mark.id");

	    return $this->renderer->render($response, 'cars.php', [
	    	'data' 	=> $data,
	    	'mark' 	=> $this->db->getAll('SELECT * FROM mark'),
	    	'model' => $this->db->getAll('SELECT * FROM model')
	    ]);
	});

	$app->get('/model', function (Request $request, Response $response, array $args) use($app) {
	    return $this->renderer->render($response, 'model.php', [
	    	'model' => $this->db->getAll('SELECT * FROM model')
	    ]);			
	});

	$app->get('/mark', function (Request $request, Response $response, array $args) use($app) {
	    return $this->renderer->render($response, 'mark.php', [
	    	'mark' => $this->db->getAll('SELECT * FROM mark')
	    ]);			
	});

	$app->post('/mark/add', \MarkController::class . ':add');
