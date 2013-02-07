<?php

/**
 * Register the core libraries and vendor libraries that PagSeguro uses with the autoloader.
 */
Autoloader::map(array(
	'PagSeguro\\pgs'				=> __DIR__ . DS . 'classes' . DS . 'pgs.php',
	'PagSeguro\\PgsFrete'			=> __DIR__ . DS . 'classes' . DS . 'frete.php',
	'PagSeguro\\RetornoPagSeguro'	=> __DIR__ . DS . 'classes' . DS . 'retorno.php',
));

Autoloader::alias('PagSeguro\\pgs', 'PagSeguro');
Autoloader::alias('PagSeguro\\PgsFrete', 'PagSeguro\\Frete');
Autoloader::alias('PagSeguro\\RetornoPagSeguro', 'PagSeguro\\Retorno');
