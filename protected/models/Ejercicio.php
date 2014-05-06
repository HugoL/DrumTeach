<?php

/**
 * This is the model class for table "{{ejercicios}}".
 *
 * The followings are the available columns in table '{{ejercicios}}':
 * @property integer $id
 * @property string $nombre
 * @property string $velocidad
 * @property string $observaciones
 * @property integer $id_usuario
 * @property integer $id_categoria
 *
 * The followings are the available model relations:
 * @property Users $idUsuario
 * @property Categorias $idCategoria
 */
class Ejercicio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ejercicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ejercicios}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, velocidad, id_categoria', 'required'),
			array('id_usuario, id_categoria', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>512),
			array('velocidad', 'length', 'max'=>128),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, velocidad, observaciones, id_usuario, id_categoria', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUsuario' => array(self::BELONGS_TO, 'Users', 'id_usuario'),
			'idCategoria' => array(self::BELONGS_TO, 'Categorias', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'velocidad' => 'Velocidad',
			'observaciones' => 'Observaciones',
			'id_usuario' => 'Id Usuario',
			'id_categoria' => 'Id Categoria',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('velocidad',$this->velocidad,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_categoria',$this->id_categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}