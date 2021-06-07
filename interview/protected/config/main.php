<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'JAWHM',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'defaultController' => 'interview',
    // modules
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'admin',
        ),
        'admin' => array(
           //'defaultController' => 'admin/admin/index',
        ), // ADD THIS
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:protected/data/blog.db',
          'tablePrefix' => 'tbl_',
          ),
         */
        // uncomment the following to use a MySQL database
//        'db' => array(
//            'connectionString' => 'mysql:host=;port=;dbname=',
//            'emulatePrepare' => true,
//            'username' => '',
//            'password' => '',
//            'charset' => 'utf8',
//        //'tablePrefix' => 'tbl_',
//        ),
        'db' => array(
            'connectionString' => 'mysql:host=;port=;dbname=',
            'emulatePrepare' => true,
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
        //'tablePrefix' => 'tbl_',
        ),
		'dbadvert' => array(
                'connectionString' => 'mysql:host=;dbname=',
                'username'         => '',
                'password'         => '',
                'charset' => 'utf8',
                'class'            => 'CDbConnection'          // DO NOT FORGET THIS!
            ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'post/<id:\d+>/<title:.*?>' => 'post/view',
                'posts/<tag:.*?>' => 'post/index',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'admin' => 'admin/admin/index', // ADD THIS
                'admin/<lang:\w+>' => 'admin/site/login', // ADD THIS
                //JN:interview
                '<office:\w+>/<name:[a-zA-Z0-9\-]+>.php' => 'interview/ViewName',
                //'office/<action:\w+>'
                //JN:end
				'qa/category/<slug:[a-zA-Z\x{3041}-\x{3096}\x{30A0}-\x{30FF}\x{3400}-\x{4DB5}\x{4E00}-\x{9FAF}\x{F900}-\x{FA6A}\x{2E80}-\x{2FD5}0-9=\s—–-]+>' => 'qa/category', 
				// qa category chính
                'qa/categoryson/<slug:[a-zA-Z\x{3041}-\x{3096}\x{30A0}-\x{30FF}\x{3400}-\x{4DB5}\x{4E00}-\x{9FAF}\x{4f4f}\x{5c45}\x{F900}-\x{FA6A}\x{2E80}-\x{2FD5}0-9=\s—–-]+>' => 'qa/categoryson',
                'qa.html' => 'qa',
                // 'qa/<action:\w+>.html' => 'qa/categoryqa',
                'qa/<action:\w+>.html' => 'qa/<action>',
				'qa/sitemap.html' => 'qa/sitemap',
                'qa_aus.html' => 'qa/qa_aus',

            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);
