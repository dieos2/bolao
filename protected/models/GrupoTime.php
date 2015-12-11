<?php

/**
 * This is the model class for table "grupo_time".
 *
 * The followings are the available columns in table 'grupo_time':
 * @property integer $id
 * @property integer $id_grupo
 * @property integer $id_time
 *
 * The followings are the available model relations:
 * @property Time $idTime
 * @property Grupo $idGrupo
 */
class GrupoTime extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GrupoTime the static model class
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
		return 'grupo_time';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_grupo, id_time', 'required'),
			array('id_grupo, id_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_grupo, id_time', 'safe', 'on'=>'search'),
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
			'idTime' => array(self::BELONGS_TO, 'Time', 'id_time'),
			'idGrupo' => array(self::BELONGS_TO, 'Grupo', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_grupo' => 'Id Grupo',
			'id_time' => 'Id Time',
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
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('id_time',$this->id_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}