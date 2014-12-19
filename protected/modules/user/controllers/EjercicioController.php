<?php

class EjercicioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ejerciciosCategorias','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ejercicio;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ejercicio']))
		{			
			$model->attributes=$_POST['Ejercicio'];
			$model->id_usuario = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('ejerciciosCategorias'));
		}

		$this->render('create',array(
			'model'=>$model, 
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$velocidad = $model->velocidad;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ejercicio']))
		{
			$model->attributes=$_POST['Ejercicio'];			
			if( $velocidad != $model->velocidad ){
				$model->fecha = date("Y-m-d H:i:s");
			}			
			if($model->save())
				$this->redirect(array('ejerciciosCategorias', 'catvisible' => str_replace(" ","",$model->categoria->nombre)));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if( $model->id_usuario == Yii::app()->user->id )
			$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ejercicio',array(
    			'criteria'=>array(
   		 	    'condition'=>'id_usuario='.Yii::app()->user->id),
    		)
		);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ejercicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ejercicio']))
			$model->attributes=$_GET['Ejercicio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionEjerciciosCategorias( $catvisible = null)
	{
		/*$ejercicios=new CActiveDataProvider('Ejercicio',array(
    			'criteria'=>array(
        		'condition'=>'id_usuario='.Yii::app()->user->id,),
    		)
		);*/

		//$categorias=new CActiveDataProvider('Categoria');

		$ejercicios = Ejercicio::model()->with(array(
		    'categoria'=>array('select'=>'id, nombre'),
		    'together' => true,
		))->findAll('id_usuario = '.Yii::app()->user->id);
		
		$categorias = array();

		foreach ( $ejercicios as $key => $ejercicio ) {
        		if( !in_array($ejercicio->categoria->nombre, $categorias, true) ){
        			array_push( $categorias, $ejercicio->categoria->nombre );
        		}
		}

		$this->render('verEjercicios',array(
			'ejercicios'=>$ejercicios,'categorias'=>$categorias
		));
	}

	public function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
	    /*
	    $interval can be:
	    yyyy - Number of full years
	    q - Number of full quarters
	    m - Number of full months
	    y - Difference between day numbers
	    (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
	    d - Number of full days
	    w - Number of full weekdays
	    ww - Number of full weeks
	    h - Number of full hours
	    n - Number of full minutes
	    s - Number of full seconds (default)
	    */
	    if (!$using_timestamps) {
	    	$datefrom = strtotime($datefrom, 0);
	    	$dateto = strtotime($dateto, 0);
	    }
	    $difference = $dateto - $datefrom; // Difference in seconds
	    switch($interval) {
	    case 'yyyy': // Number of full years
	    $years_difference = floor($difference / 31536000);
	    if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
	    $years_difference--;
	    }
	    if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
	    $years_difference++;
	    }
	    $datediff = $years_difference;
	    break;
	    case "q": // Number of full quarters
	    $quarters_difference = floor($difference / 8035200);
	    while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	    $months_difference++;
	    }
	    $quarters_difference--;
	    $datediff = $quarters_difference;
	    break;
	    case "m": // Number of full months
	    $months_difference = floor($difference / 2678400);
	    while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	    $months_difference++;
	    }
	    $months_difference--;
	    $datediff = $months_difference;
	    break;
	    case 'y': // Difference between day numbers
	    $datediff = date("z", $dateto) - date("z", $datefrom);
	    break;
	    case "d": // Number of full days
	    $datediff = floor($difference / 86400);
	    break;
	    case "w": // Number of full weekdays
	    $days_difference = floor($difference / 86400);
	    $weeks_difference = floor($days_difference / 7); // Complete weeks
	    $first_day = date("w", $datefrom);
	    $days_remainder = floor($days_difference % 7);
	    $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
	    if ($odd_days > 7) { // Sunday
	    $days_remainder--;
	    }
	    if ($odd_days > 6) { // Saturday
	    $days_remainder--;
	    }
	    $datediff = ($weeks_difference * 5) + $days_remainder;
	    break;
	    case "ww": // Number of full weeks
	    $datediff = floor($difference / 604800);
	    break;
	    case "h": // Number of full hours
	    $datediff = floor($difference / 3600);
	    break;
	    case "n": // Number of full minutes
	    $datediff = floor($difference / 60);
	    break;
	    default: // Number of full seconds (default)
	    $datediff = $difference;
	    break;
	    }
	    return $datediff;
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ejercicio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ejercicio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ejercicio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ejercicio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/* Used to debug variables*/
	protected function Debug($var){
		$bt = debug_backtrace();
		$dump = new CVarDumper();
		$debug = '<div style="display:block;background-color:gold;border-radius:10px;border:solid 1px brown;padding:10px;z-index:10000;"><pre>';
		$debug .= '<h4>function: '.$bt[1]['function'].'() line('.$bt[0]['line'].')'.'</h4>';
		$debug .=  $dump->dumpAsString($var);
		$debug .= "</pre></div>\n";
		Yii::app()->params['debugContent'] .=$debug;
	}
}
