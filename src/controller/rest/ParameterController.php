<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class ParameterController extends Controller {

		public function search(Request $request, Response $response, array $args) {
			if( ($search = $request->getQueryParam('search')) !== NULL ) {
				$search = "%" . $search . "%";
				$data = $this->container->db->getAll('SELECT * FROM parameter WHERE name LIKE ?s LIMIT 20', $search);
			} else {
				$data = $this->container->db->getAll('SELECT * FROM parameter LIMIT 20');
			}

			$res['results'] = $data;

			return $response->withJson($data);
		}

		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['parameter_category_id']) AND !empty($body['parameter_category_id']) AND isset($body['name']) AND !empty($body['name']) ) {
				$parameter_category_id = intval($body['parameter_category_id']);
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO parameter(parameter_category_id, name) VALUES(?i, ?s)', $parameter_category_id, $name) ) {
					$this->container->flash->addMessage('success', 'Параметр был успешно добавлен');

					return $response->withRedirect('/parameter');
				}
			}
		}

		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM parameter WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Параметр был успешно удален');

		    	return $response->withRedirect('/parameter');
			}			
		}

		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) ) {
				$id = intval($body['id']);
				$name = $body['name'];

				if( $this->container->db->query('UPDATE parameter SET name=?s WHERE id=?i', $name, $id) ) {
					$this->container->flash->addMessage('success', 'параметр был успешно обновлена');

					return $response->withRedirect('/parameter');
				}
			}
		}										
	}