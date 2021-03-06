<?php

/**
 * This is the model class for table "grupo".
 *
 * The followings are the available columns in table 'grupo':
 * @property integer $id
 * @property string $nome
 * @property integer $id_evento
 *
 * The followings are the available model relations:
 * @property Confronto[] $confrontos
 * @property Evento $idEvento
 * @property GrupoPontos[] $grupoPontoses
 * @property GrupoTime[] $grupoTimes
 */
class Grupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Grupo the static model class
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
		return 'grupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, id_evento', 'required'),
			array('id_evento', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, id_evento', 'safe', 'on'=>'search'),
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
			'confrontos' => array(self::HAS_MANY, 'Confronto', 'id_grupo'),
			'idEvento' => array(self::BELONGS_TO, 'Evento', 'id_evento'),
			'grupoPontoses' => array(self::HAS_MANY, 'GrupoPontos', 'id_grupo'),
			'grupoTimes' => array(self::HAS_MANY, 'GrupoTime', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'id_evento' => 'Id Evento',
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('id_evento',$this->id_evento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}