<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class ModificationController extends Controller {

		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['model_id']) AND !empty($body['model_id']) AND isset($body['name']) AND !empty($body['name']) ) {
				$model_id = intval($body['model_id']);
				$name = $body['name'];

				if( $this->container->db->query('INSERT INTO modification(model_id, name) VALUES(?s, ?s)', $model_id, $name) ) {
					$this->container->flash->addMessage('success', 'Модификация была успешно добавлена');

					return $response->withRedirect('/car/' . $model_id);
				}
			}
		}

		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) AND isset($body['model_id']) AND !empty($body['model_id']) ) {
				$id = intval($body['id']); 
				$model_id = intval($body['model_id']);

				$whiteList = [
					"name", "length", "width", "height", "wheel_base", "front_rut", "back_rut", "front_overhang", "back_overhang", 
					"trunk_volume_min", "trunk_volume_max", "tank_volume", "front_brakes", "back_brakes", "front_suspension", 
					"back_suspension", "engine_displacement", "engine_displacement_working_value", "engine_type", "gearbox", 
					"gears", "drive", "power", "consume_city", "consume_track", "consume_mixed", "acceleration_100km", 
					"max_speed", "clearance", "min_mass", "max_mass", "trailer_mass"
				];

				$insertData = [];

				// Сверяем переданные параметры с белым списком
				// Если такой параметр есть в белом списке и он не пустой, то вставляем его в бд
				foreach ($whiteList as $value) {
					if( isset($body[$value]) AND !empty($body[$value]) ) {
						$insertData[$value] = $body[$value];
					}
				}

				if( !empty($insertData) ) {
					if( $this->container->db->query('UPDATE modification SET ?u WHERE id=?i', $insertData, $id) ) {
						$this->container->flash->addMessage('success', 'Модификация автомобиля была успешно обновлена');

			    		return $response->withRedirect('/car/' . $model_id);
					} 									
				}
			}
		}	

		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			if( $this->container->db->query('DELETE FROM modification WHERE id=?i', $id) ) {
				$this->container->flash->addMessage('success', 'Модель автомобиля была успешно удалена');

				if( ($model_id = $request->getQueryParam('model_id')) !== NULL ) {
					return $response->withRedirect('/car/' . $model_id);
				} else {
					return $response->withRedirect('/cars');
				}
			}		    
		}						
	}