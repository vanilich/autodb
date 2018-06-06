<?php
	class MyPhpRenderer extends Slim\Views\PhpRenderer {

		protected $container;

	    public function __construct($container, $templatePath = "", $attributes = []) {
	    	$this->container = $container;

	        parent::__construct($templatePath, $attributes);
	    }		
	}