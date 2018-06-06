<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class ComplectationController extends Controller {

		/**
		* Привязка комплектации и модификации автомобиля
		**/
		public function changeModification(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['complectation_id']) AND isset($body['modification_id']) ) {
				$complectation_id = intval($body['complectation_id']);
				$modification_id = intval($body['modification_id']);

				$query = 'SELECT * FROM complectation_has_modification WHERE complectation_id=?i AND modification_id=?i';

				if( !empty($this->container->db->getAll($query, $complectation_id, $modification_id)) ) {
					$query = 'DELETE FROM complectation_has_modification WHERE complectation_id=?i AND modification_id=?i';
				} else {
					$query = 'INSERT INTO complectation_has_modification(complectation_id, modification_id) VALUES(?i, ?i)';
				}

				$this->container->db->query($query, $complectation_id, $modification_id);
			}

		}	

		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['model_id']) AND !empty($body['model_id']) AND isset($body['name']) AND !empty($body['name']) ) {
				$model_id = intval($body['model_id']);
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO complectation(model_id, name) VALUES(?s, ?s)', $model_id, $name) ) {
					$this->container->flash->addMessage('success', 'Комплектация была успешно добавлена');

					return $response->withRedirect('/car/' . $model_id);
				}
			}
		}

		/**
		* Редактируем комплектацию
		**/
		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) AND isset($body['model_id']) AND !empty($body['model_id']) ) {
				$id = intval($body['id']);
				$model_id = intval($body['model_id']);
				$name = $body['name'];

				// Проверяем, пришли ли параметры от клиента
				if( isset($body['parameter']) AND !empty($body['parameter']) ) {
					$category = array_unique($body['parameter']);

					// Узнаем все параметры для данной комплектации
					$complectationHasParameter = $this->container->db->getAll('SELECT * FROM complectation_has_parameter WHERE complectation_id=?i', $id);

					$tmp = [];
					foreach ($complectationHasParameter as $value) {
						$tmp[] = $value['parameter_id'];
					}

					// Сначала удаляем все параметры из комплектации
					$this->container->db->query('DELETE FROM complectation_has_parameter WHERE parameter_id IN(?a)', $tmp);

					foreach ($category as $value) {
						// Потом вставляем все параметры в комплектацию
						$this->container->db->query('INSERT INTO complectation_has_parameter(complectation_id, parameter_id, price) VALUES (?i, ?i, ?i)', $id, $value, 0);
					}
				} else {
					// Если ничего не пришло, то удаляем все!
					$this->container->db->query('DELETE FROM complectation_has_parameter WHERE complectation_id = ?i', $id);
				}

				if( $this->container->db->query('UPDATE complectation SET name=?s WHERE id=?i', $name, $id) ) {
					$this->container->flash->addMessage('success', 'Комплектация автомобиля была успешно обновлена');

					return $response->withRedirect('/car/' . $model_id);
				} 
			}
		}

		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM complectation WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Комплектация автомобиля была успешно удалена');

				if( ($model_id = $request->getQueryParam('model_id')) !== NULL ) {
					return $response->withRedirect('/car/' . $model_id);
				} else {
					return $response->withRedirect('/cars');
				}
			}		    
		}	

		public function getParameter(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			$query = 'SELECT * FROM complectation_has_parameter INNER JOIN parameter ON complectation_has_parameter.parameter_id = parameter.id AND complectation_id = ?i';

			$data = $this->container->db->getAll($query, $id);
		
			return $response->withJson($data);
		}						
	}