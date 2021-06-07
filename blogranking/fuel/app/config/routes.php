<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => '404',    // The main 404 route

	'prof' => '404',
	'prof/(:segment)' => 'prof/index/$1',
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);