<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DrumTeach',
	'theme'=>'blackboot',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
        'rights'=>array(
            'superuserName'=>'Admin', // Name of the role with super user privileges. 
           'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
           'userIdColumn'=>'id', // Name of the user id column in the database. 
           'userNameColumn'=>'username',  // Name of the user name column in the database. 
           'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
           'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
           'displayDescription'=>true,  // Whether to use item description instead of name. 
           'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
           'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
           'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
           'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
           'appLayout'=>'application.views.layouts.main', // Application layout. 
           'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
           'install'=>false,  // Whether to enable installer. 
           'debug'=>false, 
		),
 		'user'=>array(
            'tableUsers' => 'dt_users',
            'tableProfiles' => 'dt_profiles',
            'tableProfileFields' => 'dt_profiles_fields',
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            //'registrationUrl' => array('/user/registration'),
		
			//'registrationCompanyUrl' => array('/user/registrationcompany'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/user/profile'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
                'bootstrap.gii',
			),
		
		),

    ),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
		),
		'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
        ),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'gii'=>'gii',
            	'gii/<controller:\w+>'=>'gii/<controller>',
            	'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
	/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=drumteachbd_',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '523360',
			'charset' => 'utf8',
			'tablePrefix' => 'dt_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, trace, warning, info',
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'debugContent'=>'',
		'images' => '/images/',
		// this is used in contact page
		'adminEmail'=>'hlanga@hlanga.es',
	),
);