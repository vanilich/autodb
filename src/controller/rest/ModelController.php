<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class ModelController extends Controller {

		/**
		* Получить информацию о модели автомобиля
		**/
		public function all(Request $request, Response $response, array $args) {
			if( ($mark_id = $request->getQueryParam('mark_id')) !== NULL ) {
				$mark_id = intval($mark_id);

				$model = $this->container->db->getAll('SELECT * FROM model WHERE mark_id=?i', $mark_id);
			} else {
				$model = $this->container->db->getAll('SELECT * FROM model');
			}

		    if($model) {
				return $response->withJson($model);
		    }
		}

		/**
		* Добавляем модель автомобиля
		**/
		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['mark_id']) AND !empty($body['mark_id']) AND isset($body['name']) AND !empty($body['name']) ) {
				$mark_id = intval($body['mark_id']);
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO model(mark_id, name) VALUES(?i, ?s)', $mark_id, $name) ) {
					$this->container->flash->addMessage('success', 'Модель автомобиля была успешно добавлена');

					return $response->withRedirect('/model');
				}
			}
		}

		/**
		* Редактируем модель автомобиля
		**/
		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) ) {
				$id = intval($body['id']);
				$name = $body['name'];

				if( $this->container->db->query('UPDATE model SET name=?s WHERE id=?i', $name, $id) ) {
					$this->container->flash->addMessage('success', 'Модель автомобиля была успешно обновлена');
				} 
			}

		    return $response->withRedirect('/model');
		}

		/**
		* Удаляем модель автомобиля по переданному id
		**/
		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM model WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Модель автомобиля была успешно удалена');

		    	return $response->withRedirect('/model');
			}		    
		}				
	}