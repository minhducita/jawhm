<?php

class AdminModule extends CWebModule {
    /*
     * Add parameters here. You can access them using Yii::app()->controller->module->myParameter
     */

    //public $db;
    ///public $defaultController = "admin/admin";
    private $_assetsUrl;

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            //'admin.models.*',
            'admin.assets.*',
            //'admin.components.*',
            'application.models.*',
            //'application.components.*',
            'application.components.CounterColumn',
        ));
        $this->defaultController = 'admin/interview/index';
        Yii::app()->setComponents(
            array(
                'db' => array(
                    'class' => 'CDbConnection',
                    //'tablePrefix' => 'tbl_',
                    'connectionString' => 'mysql:host=db1;port=3306;dbname=jawhminterview', //'sqlite:' . dirname(__FILE__) . '/data/admin.sqlite',
                    'username' => '',
                    'password' => '',
                    'charset' => 'utf8',
                ),
                'errorHandler' => array(
                    'errorAction' => 'admin/site/error'
                ),
                'user' => array(
                    'class' => 'CWebUser',
                    'loginUrl' => Yii::app()->createUrl('admin/admin/index'),
                ),
                'authManager' => array(
                    'class' => 'CDbAuthManager',
                    'connectionID' => 'db',
                ),
                'urlManager' => array(
                    'urlFormat' => 'path',
                    'showScriptName' => false,
                    'rules' => array( 
                        'admin/' => 'admin/admin/index',
                        'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        'admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'admin/<controller>/<action>',
                        //'admin/interview/<action:\w+>' => 'admin/interview/<action>',
                        //'interview/<office:\w+>/<name:[a-zA-Z0-9\-]+>.php' => 'interview/ViewName',
                    //JN:end
                    ),
                ),
            )
        );
    }

    public function getAssetsUrl() {
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'));

        return $this->_assetsUrl;
    }

}
