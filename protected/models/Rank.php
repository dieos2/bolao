<?php

/**
 * This is the model class for table "rank".
 *
 * The followings are the available columns in table 'rank':
 * @property integer $id
 * @property integer $id_user
 * @property string $data
 * @property integer $id_aposta
 * @property integer $id_ponto
 *
 * The followings are the available model relations:
 * @property Pontos $idPonto
 * @property TblUser $idUser
 * @property Aposta $idAposta
 */
class Rank extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rank the static model class
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
		return 'rank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, data, id_aposta, id_ponto', 'required'),
			array('id_user, id_aposta, id_ponto', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, data, id_aposta, id_ponto', 'safe', 'on'=>'search'),
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
			'idPonto' => array(self::BELONGS_TO, 'Pontos', 'id_ponto'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'idAposta' => array(self::BELONGS_TO, 'Aposta', 'id_aposta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'data' => 'Data',
			'id_aposta' => 'Id Aposta',
			'id_ponto' => 'Id Ponto',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('id_aposta',$this->id_aposta);
		$criteria->compare('id_ponto',$this->id_ponto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}