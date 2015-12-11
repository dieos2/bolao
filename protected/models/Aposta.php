<?php

/**
 * This is the model class for table "aposta".
 *
 * The followings are the available columns in table 'aposta':
 * @property integer $id
 * @property integer $id_confronto
 * @property integer $id_user
 * @property string $data
 * @property integer $placar_casa
 * @property integer $placar_visitante
 *
 * The followings are the available model relations:
 * @property TblUser $idUser
 * @property Confronto $idConfronto
 * @property Rank[] $ranks
 */
class Aposta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Aposta the static model class
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
		return 'aposta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_confronto, id_user, data, placar_casa, placar_visitante', 'required'),
			array('id_confronto, id_user, placar_casa, placar_visitante', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_confronto, id_user, data, placar_casa, placar_visitante', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'idConfronto' => array(self::BELONGS_TO, 'Confronto', 'id_confronto'),
			'ranks' => array(self::HAS_MANY, 'Rank', 'id_aposta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_confronto' => 'Id Confronto',
			'id_user' => 'Id User',
			'data' => 'Data',
			'placar_casa' => 'Placar Casa',
			'placar_visitante' => 'Placar Visitante',
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
		$criteria->compare('id_confronto',$this->id_confronto);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('placar_casa',$this->placar_casa);
		$criteria->compare('placar_visitante',$this->placar_visitante);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}