<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class FrontendController extends Controller {

		public function index(Request $request, Response $response, array $args) {
		    return $this->container->renderer->render($response, 'index.php');			
		}

		public function cars(Request $request, Response $response, array $args) {
			$data = $this->container->db->getAll("SELECT model.id as 'id', model.name as 'name', mark.name as 'mark_name' FROM model INNER JOIN mark ON model.mark_id = mark.id");

		    return $this->container->renderer->render($response, 'cars.php', [
		    	'data' 	=> $data,
		    	'mark' 	=> $this->container->db->getAll('SELECT * FROM mark'),
		    	'model' => $this->container->db->getAll('SELECT * FROM model')
		    ]);			
		}	

		public function model(Request $request, Response $response, array $args) {
		    return $this->container->renderer->render($response, 'model.php', [
		    	'model' => $this->container->db->getAll('SELECT model.id, model.name, mark.name as `mark_name` FROM model INNER JOIN mark ON mark.id = model.mark_id'),
		    	'mark' => $this->container->db->getAll('SELECT * FROM mark')
		    ]);			
		}

		public function mark(Request $request, Response $response, array $args) {
		    return $this->container->renderer->render($response, 'mark.php', [
		    	'mark' => $this->container->db->getAll('SELECT * FROM mark')
		    ]);			
		}	

		public function car(Request $request, Response $response, array $args) {
			$model_id = intval($request->getAttribute('id'));

			$model = $this->container->db->getRow("SELECT model.id, CONCAT(mark.name, ' ', model.name) as 'name' FROM model INNER JOIN mark ON model.mark_id = mark.id AND model.id=?i", $model_id);

			$query = "";
			$query .= "SELECT "; 
			$query .= "	   complectation_has_modification.id as 'id', ";
			$query .= "	   complectation_has_modification.price as 'price', ";
			$query .= "    modification.id as 'modification_id',";
			$query .= "    modification.gearbox as 'modification_gearbox',";
			$query .= "    modification.power as 'modification_power',";
			$query .= "    complectation.id as 'complectation_id', ";
			$query .= "    modification.name as 'modification_name', ";
			$query .= "    complectation.name as 'complectation_name' ";
			$query .= "FROM complectation "; 
			$query .= "	INNER JOIN complectation_has_modification ";
			$query .= "	INNER JOIN modification ";
			$query .= "		ON complectation_has_modification.complectation_id = complectation.id AND ";  
			$query .= "           complectation_has_modification.modification_id = modification.id AND ";
			$query .= "           complectation.model_id = ?i ORDER BY modification.id, complectation_has_modification.id;";

			$car = $this->container->db->getAll($query, $model_id);

			$query = "";
			$query .= "SELECT * FROM complectation_has_modification WHERE ";
			$query .= "	   complectation_id IN (SELECT id FROM complectation WHERE model_id=?i)";
			$query .= "    AND";
			$query .= "    modification_id IN (SELECT id FROM modification WHERE model_id=?i)";

		    return $this->container->renderer->render($response, 'car.php', [
		    	'model' => $model,
		    	'car' => $car,
		    	'parameter' => $this->container->db->getAll('SELECT * FROM parameter'),
		    	'complectation' => $this->container->db->getAll('SELECT * FROM complectation WHERE model_id=?i', $model_id),
		    	'modification' => $this->container->db->getAll('SELECT * FROM modification WHERE model_id=?i', $model_id),
		    	'complectation_has_modification' => $this->container->db->getAll($query, $model_id, $model_id)
		    ]);			
		}	

		public function parameter(Request $request, Response $response, array $args) {
			$query = "SELECT parameter.id as 'id', parameter.name as 'name', paremeter_category.id as 'category_id' FROM parameter INNER JOIN paremeter_category ON paremeter_category.id = parameter.parameter_category_id";

		    return $this->container->renderer->render($response, 'parameter.php', [
		    	'parameter' => $this->container->db->getAll($query),
		    	'parameter_category' => $this->container->db->getAll('SELECT * FROM paremeter_category')
		    ]);				
		}						
	}