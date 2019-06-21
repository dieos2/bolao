<?php

/**
 * This is the model class for table "grupo_Pontos".
 *
 * The followings are the available columns in table 'grupo_Pontos':
 * @property integer $int
 * @property integer $id_grupo
 * @property integer $id_pontos
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property Grupo $idGrupo
 * @property Pontos $idPontos
 */
class GrupoPontos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GrupoPontos the static model class
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
		return 'grupo_pontos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_grupo, id_pontos, tipo', 'required'),
			array('id_grupo, id_pontos', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('int, id_grupo, id_pontos, tipo', 'safe', 'on'=>'search'),
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
			'idGrupo' => array(self::BELONGS_TO, 'Grupo', 'id_grupo'),
			'idPontos' => array(self::BELONGS_TO, 'Pontos', 'id_pontos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'int' => 'Int',
			'id_grupo' => 'Id Grupo',
			'id_pontos' => 'Id Pontos',
			'tipo' => 'Tipo',
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

		$criteria->compare('int',$this->int);
		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('id_pontos',$this->id_pontos);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}