<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

/* localhost
return array(
	'active' => 'whblog',

	'whblog' => array(
		'type'   => 'mysqli',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => DB_NAME,
			'username'   => 'root',
			'password'   => 'tomokinakamaru',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => true,
	),

);*/

return array(
	'active' => 'whblog',

	'whblog' => array(
		'type'   => 'mysqli',
		'connection' => array(
			'hostname'   => DB_HOST,
			'database'   => DB_NAME,
			'username'   => DB_USER,
			'password'   => DB_PASSWD,
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => false,
		'profiling'    => true,
	),

);
