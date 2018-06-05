<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.php');
});

$app->get('/mark', function (Request $request, Response $response, array $args) use($app) {
	$mark = $
    return $this->renderer->render($response, 'mark.php');
});