<?php
	function getFileExtension($filename) {
		$tmp = explode('.', $filename);
		return end($tmp);
	}
?>