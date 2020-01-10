<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $IDcity
 * @property string $CityName
 *
 * @property Events[] $events
 * @property Inspection[] $inspections
 * @property Owner[] $owners
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CityName'], 'required'],
            [['CityName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDcity' => 'I Dcity',
            'CityName' => 'City Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['IDcity' => 'IDcity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspections()
    {
        return $this->hasMany(Inspection::className(), ['IDcity' => 'IDcity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(Owner::className(), ['IDcity' => 'IDcity']);
    }
}
