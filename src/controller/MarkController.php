<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class MarkController extends Controller {

		/**
		* Добавить марку автомобиля
		**/
		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) ) {
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO mark(name) VALUES(?s)', $name) ) {
					$this->container->flash->addMessage('success', 'Марка автомобиля была успешно добавлена');

					return $response->withRedirect('/mark');	
				}
			}
		}

		/**
		* Редактировать марку автомобиля
		**/
		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) ) {
				$id = intval($body['id']);
				$name = $body['name'];

				if( $this->container->db->query('UPDATE mark SET name=?s WHERE id=?i', $name, $id) ) {
					$this->container->flash->addMessage('success', 'Марка автомобиля была успешно отредактирована');

					return $response->withRedirect('/mark');
				}
			}
		}

		/**
		* Удалить марку автомобился по id
		**/
		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM mark WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Марка автомобиля была успешно удалена');

		    	return $response->withRedirect('/mark');
			}			
		}						
	}