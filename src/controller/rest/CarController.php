<?php
	use Slim\Http\Request;
	use Slim\Http\Response;

	class CarController extends Controller {

		// Редактирование информации об автомобиле
		public function edit(Request $request, Response $response, array $args) {
			$body = $request->getParsedBody();

			if( isset($body['color_name']) AND isset($body['color_value']) AND isset($body['model_id']) ) {
				$model_id = intval($body['model_id']);
				$color_value = trim($body['color_value']);
				$color_name = trim($body['color_name']);

				$pictures = [];
				if( isset($_FILES["pictures"]) AND !empty($_FILES["pictures"]) ) {
					foreach ($_FILES["pictures"]["error"] as $key => $error) {
					    if ($error == UPLOAD_ERR_OK) {
					        // Расширение картинки
					        $ext = getFileExtension($_FILES["pictures"]["name"][$key]);

					        // Имя файла
					        $filename = sha1( rand(1, 10000) . uniqid() ) . '.' . $ext;

					        // Полный путь до папки с файлами
					        $path = $_SERVER['DOCUMENT_ROOT'] . '/res/';

					        // Названия вложенных папок в соотвествии с именем файла
					        $folderOne = $filename[0];
					        $folderTwo = $filename[1];
					        $folderThree = $filename[2];

					        // Проходимся по названиям папок, и, если их нет, создаем
					        foreach ([$folderOne, $folderTwo, $folderThree] as $currentFolder) {
					        	// Если такая папка не существует, то создаем ее
					        	if( !file_exists( $path . $currentFolder . '/' ) ) {
					        		mkdir( $path . $currentFolder . '/' );
					        	}

					        	// Прибивляем папку к основному пути
					        	$path .= $currentFolder . '/';
					        }

					        // Полный путь до файла
					        $pathToFile = $path . $filename;

					        // Загружаем файл
					        move_uploaded_file($_FILES["pictures"]["tmp_name"][$key], $pathToFile);

					        $pictures[] = $filename;
					    }
					}
				}

				if( isset($body['id']) AND !empty($body['id']) ) {
					$id = intval($body['id']);

					if( !empty($pictures) ) {
						$this->container->db->query("UPDATE colors SET name=?s, hex=?s, pictures=?s WHERE id=?i", $color_name, $color_value, json_encode($pictures), $id);
					} else {
						$this->container->db->query("UPDATE colors SET name=?s, hex=?s WHERE id=?i", $color_name, $color_value, $id);
					}

				} else {
					if( !empty($pictures) ) {
						$this->container->db->query("INSERT INTO colors (model_id, name, hex, pictures) VALUES(?i, ?s, ?s, ?s)", $model_id, $color_name, $color_value, json_encode($pictures));
					} else {
						$this->container->db->query("INSERT INTO colors (model_id, name, hex) VALUES(?i, ?s, ?s)", $model_id, $color_name, $color_value);
					}

					$lastInsertId = $this->container->db->getOne('SELECT LAST_INSERT_ID()');

					return $response->withJson([
						'id' => $lastInsertId
					]);										
				}
			}
		}
	}
