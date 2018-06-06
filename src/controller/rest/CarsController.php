<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class CarsController extends Controller {

		/**
		* Получить информацию о автомобилях
		**/
		public function table(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			$query = "SELECT SQL_CALC_FOUND_ROWS model.id as 'id', model.name as 'name', mark.name as 'mark_name' FROM model INNER JOIN mark ON model.mark_id = mark.id";


			// Получаем марку автомобиля и подставляем ее в запрос
			if( isset($body['mark_id']) AND ($mark_id = intval($body['mark_id'])) !== 0 ) {
				$query .= $this->container->db->parse(" AND mark.id = ?i", $mark_id);
			}

			// Пагинация
			$page = 1;
			if( isset($body['page']) AND ($page = intval($body['page'])) !== 0 ) {
				$query .= $this->container->db->parse(" LIMIT ?i, 5", 5 * intval(($page-1)) );
			} else {
				$query .= $this->container->db->parse(" LIMIT 0, 5");
			}

			$data = $this->container->db->getAll($query);
			$countRows = $this->container->db->getOne("SELECT FOUND_ROWS()");

			$countPages = intval($countRows / 5) + 1;

		    return $this->container->renderer->render($response, 'table.php', [
		    	'data' => $data,
		    	'currentPage' => $page,
		    	'countPages'  => $countPages
		    ]);	
		}			
	}