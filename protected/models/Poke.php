<?php

/**
 * This is the model class for table "poke".
 *
 * The followings are the available columns in table 'poke':
 * @property integer $id
 * @property string $nome
 * @property string $foto
 * @property integer $numero
 * @property integer $pego
 * @property string $onde
 */
class Poke extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Poke the static model class
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
		return 'poke';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pego, onde', 'required'),
			array('numero, pego', 'numerical', 'integerOnly'=>true),
			array('nome, foto', 'length', 'max'=>100),
			array('onde', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, foto, numero, pego, onde', 'safe', 'on'=>'search'),
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
			'foto' => 'Foto',
			'numero' => 'Numero',
			'pego' => 'Pego',
			'onde' => 'Onde',
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
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('pego',$this->pego);
		$criteria->compare('onde',$this->onde,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}