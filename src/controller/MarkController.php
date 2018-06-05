<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class MarkController extends Controller {

		/**
		* Добавить марку автомобиля
		**/
		public function add(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($_FILES['picture']) ) {
				$name = $body['name'];
				$picture = $_FILES['picture'];

				$ext = getFileExtension($picture['name']);

				$filename = md5( uniqid() . rand(1, 10000) ) . '.' . $ext;
				$path = $_SERVER['DOCUMENT_ROOT'] . "/res/" . $filename;

				var_dump($_SERVER['DOCUMENT_ROOT']);

				$a = move_uploaded_file($picture['tmp_name'], $path);

				var_dump($path);
				var_dump($a);

				var_dump($_FILES['picture']['error']);
				die();

				$this->container->db->query('INSERT INTO mark(name, picture) VALUES(?s, ?s)', $name, $filename);
			}

		    return $response->withRedirect('/cars');			
		}

		/**
		* Редактировать марку автомобиля
		**/
		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['name']) AND !empty($body['name']) AND isset($body['id']) AND !empty($body['id']) ) {
				$id = intval($body['id']);
				$name = $body['name'];

				$this->container->db->query('UPDATE mark SET name=?s WHERE id=?i', $name, $id);
			}

		    return $response->withRedirect('/cars');			
		}

		/**
		* Удалить марку автомобился по id
		**/
		public function remove(Request $request, Response $response, array $args) {
			$id = intval($request->getAttribute('id'));

			$this->container->db->query('DELETE FROM mark WHERE id=?i', $id);

		    return $response->withRedirect('/cars');			
		}						
	}