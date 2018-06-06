<?php
	$container = $app->getContainer();

	$container['renderer'] = function ($container) {
	    $settings = $container->get('settings')['renderer'];
	    return new \MyPhpRenderer($container, $settings['template_path']);
	};

	$container['logger'] = function ($container) {
	    $settings = $container->get('settings')['logger'];
	    $logger = new Monolog\Logger($settings['name']);
	    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
	    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
	    return $logger;
	};

	$container['db'] = function ($container) {
	    return new SafeMySQL($container->get('settings')['db']);
	};

	$container['flash'] = function () {
	    return new \Slim\Flash\Messages();
	};	