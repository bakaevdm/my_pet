<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaccine".
 *
 * @property int $IDvaccine
 * @property int $VaccineName
 * @property int $Period
 *
 * @property Vaccination[] $vaccinations
 */
class Vaccine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VaccineName', 'Period'], 'required'],
            [['VaccineName', 'Period'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDvaccine' => 'I Dvaccine',
            'VaccineName' => 'Vaccine Name',
            'Period' => 'Period',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinations()
    {
        return $this->hasMany(Vaccination::className(), ['IDvaccine' => 'IDvaccine']);
    }
}
