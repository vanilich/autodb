<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class ParameterCategoryController extends Controller {
		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) ) {
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO paremeter_category(name) VALUES(?s)', $name) ) {
					$this->container->flash->addMessage('success', 'Категория была успешно добавлена');

					return $response->withRedirect('/parameter');	
				}
			}
		}

		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) ) {
				$id = intval($body['id']);
				$name = $body['name'];

				if( $this->container->db->query('UPDATE paremeter_category SET name=?s WHERE id=?i', $name, $id) ) {
					$this->container->flash->addMessage('success', 'Категория была успешно обновлена');

					return $response->withRedirect('/parameter');
				}
			}
		}

		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM paremeter_category WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Категория была успешно удалена');

		    	return $response->withRedirect('/parameter');
			}			
		}				
	}