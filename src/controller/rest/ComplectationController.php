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

		/**
		* Устанавливаем цену для соотвествующей комплектации и модификации
		**/
		public function setPrice(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['data']) AND !empty($body['data']) ) {
				foreach ($body['data'] as $value) {
					$id = intval($value['id']);
					$price = intval($value['price']);
					$old_price = intval($value['old_price']);

					$this->container->db->query('UPDATE complectation_has_modification SET price=?i, old_price=?i WHERE id=?i', $price, $old_price, $id);
				}

				$this->container->flash->addMessage('success', 'Комплектация была успешно обновлена');
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

				// Список параметров из базы данных
				$complectation_has_parameter = $this->container->db->getAll('SELECT * FROM complectation_has_parameter WHERE complectation_id = ?i', $id);

				if( isset($body['parameter']) AND !empty($body['parameter']) ) {
					// Получаем список параметров от пользователя
					$parameterFromUser = array_unique($body['parameter']);

					// Преобразуем список параметров из базы данных в одномерный массив
					$parameterFromDB = [];
					foreach ($complectation_has_parameter as $value) {
						$parameterFromDB[] = $value['parameter_id'];
					}

					// Проходимся по параметрам, которые пришли от пользователя
					foreach ($parameterFromUser as $parameterKeyUser => $parameter) {
						if( ($parameterKeyDB = array_search($parameter, $parameterFromDB)) !== false ) {
							// Если параметр найден в базе данных
							// То удаляем его из массива, что-бы потом найти лишние элементы
							unset($parameterFromUser[$parameterKeyUser]);
							unset($parameterFromDB[$parameterKeyDB]);
						}
					}

					// Массив с ID комплектация для удаления и создания
					$dataToInsert = $parameterFromUser;
					$dataToDelete = $parameterFromDB;

					if( is_array($dataToDelete) AND !empty($dataToDelete) ) {
						$this->container->db->query('DELETE FROM complectation_has_parameter WHERE complectation_id = ?i AND parameter_id IN (?a)', $id, $dataToDelete);
					}

					if( is_array($dataToInsert) AND !empty($dataToInsert) ) {
						$rows = [];
						// Проходимся по массиву с id комплектаций и генерируем строку для запроса
						foreach ($dataToInsert as $row) {
						    $rows[] = $this->container->db->parse("(?i, ?i)", $id, $row);
						}
						// Переводим массив в строку
						$queryInsertPart = implode(",", $rows);

						$this->container->db->query('INSERT INTO complectation_has_parameter(complectation_id, parameter_id) VALUES ?p', $queryInsertPart);
					}					
				} else {
					// Если параметры не пришли от пользователя и они есть в бд, соответсвенно их нужно все удалить
					if( !empty($complectation_has_parameter) ) {
						$this->container->db->query('DELETE FROM complectation_has_parameter WHERE complectation_id = ?i', $id);
					}
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