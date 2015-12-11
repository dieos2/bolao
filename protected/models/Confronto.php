<?php

/**
 * This is the model class for table "confronto".
 *
 * The followings are the available columns in table 'confronto':
 * @property integer $id
 * @property integer $id_grupo
 * @property integer $id_time_casa
 * @property integer $id_time_visitante
 * @property string $data
 * @property integer $placar_casa
 * @property integer $placar_visitante
 * @property integer $vencedor
 * @property integer $empate
 *
 * The followings are the available model relations:
 * @property Aposta[] $apostas
 * @property Grupo $idGrupo
 * @property Time $idTimeCasa
 * @property Time $idTimeVisitante
 * @property Time $vencedor0
 */
class Confronto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Confronto the static model class
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
		return 'confronto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_grupo, id_time_casa, id_time_visitante, data', 'required'),
			array('id_grupo, id_time_casa, id_time_visitante, placar_casa, placar_visitante, vencedor, empate', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_grupo, id_time_casa, id_time_visitante, data, placar_casa, placar_visitante, vencedor, empate', 'safe', 'on'=>'search'),
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
			'apostas' => array(self::HAS_MANY, 'Aposta', 'id_confronto'),
			'idGrupo' => array(self::BELONGS_TO, 'Grupo', 'id_grupo'),
			'idTimeCasa' => array(self::BELONGS_TO, 'Time', 'id_time_casa'),
			'idTimeVisitante' => array(self::BELONGS_TO, 'Time', 'id_time_visitante'),
			'vencedor0' => array(self::BELONGS_TO, 'Time', 'vencedor'),
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
			'id_time_casa' => 'Id Time Casa',
			'id_time_visitante' => 'Id Time Visitante',
			'data' => 'Data',
			'placar_casa' => 'Placar Casa',
			'placar_visitante' => 'Placar Visitante',
			'vencedor' => 'Vencedor',
			'empate' => 'Empate',
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
		$criteria->compare('id_time_casa',$this->id_time_casa);
		$criteria->compare('id_time_visitante',$this->id_time_visitante);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('placar_casa',$this->placar_casa);
		$criteria->compare('placar_visitante',$this->placar_visitante);
		$criteria->compare('vencedor',$this->vencedor);
		$criteria->compare('empate',$this->empate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}