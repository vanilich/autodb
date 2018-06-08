<?php
	function getFileExtension($filename) {
		$tmp = explode('.', $filename);
		return end($tmp);
	}

	function getImageFolderName($filename) {
		$path = '';

        $folderOne = $filename[0];
        $folderTwo = $filename[1];
        $folderThree = $filename[2];

        // Проходимся по названиям папок, и, если их нет, создаем
        foreach ([$folderOne, $folderTwo, $folderThree] as $currentFolder) {
        	// Прибивляем папку к основному пути
        	$path .= $currentFolder . '/';
        }

        return $path;
	}
?>