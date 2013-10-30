<?php

return call_user_func(

	/**
	 * Generate an application configuration array.
	 *
	 * @return array The CWebApplication configuration.
	 */
	function () {

		/** @var array $cfg The application's base configuration */
		$cfg = array(
			'name' => 'Many Many CGV',
			'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
			'runtimePath' => dirname(__FILE__) . '/../runtime',

			'preload' => array('log'),

			'import' => array(
				'application.models.*',
				'application.components.*',
			),

			'modules' => array(
				'gii' => array(
					'class' => 'system.gii.GiiModule',
					'password' => 'ManyMany',
					'ipFilters' => array('127.0.0.1', '::1'),
				),
			),

			'components' => array(
				'user' => array(
					// enable cookie-based authentication
					'allowAutoLogin' => true,
				),

			 'urlManager'=>array(
				 'urlFormat'=>'path',
                 'showScriptName'=>false,
				 'rules'=>array(
					 '<controller:\w+>/<id:\d+>'=>'<controller>/view',
					 '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					 '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				 ),
			 ),

				'db' => array(
					'connectionString' => 'mysql:host=localhost;dbname=manymany',
					'emulatePrepare' => true,
					'username' => 'root',
					'password' => 'pass',
					'charset' => 'utf8',
                    'enableProfiling'=>true,
					'enableParamLogging' => true,
				),
				'errorHandler' => array(
					'errorAction' => 'site/error',
				),
				'log' => array(
					'class' => 'CLogRouter',
					'routes' => array(
						'file' => array(
							'class' => 'CWebLogRoute',
						),
						array(
                			'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                			// Access is restricted by default to the localhost
                			//'ipFilters'=>array('127.0.0.1','192.168.1.*', 88.23.23.0/24),
                			'ipFilters'=>array('127.0.0.1'),
            			),
					),
				),
			),

			'params' => array(
			),
		);

		return $cfg;
	}
);
