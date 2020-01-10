<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaccination".
 *
 * @property int $IDvaccination
 * @property int $IDvaccine
 * @property string $VaccinationDate
 * @property int $IDpet
 *
 * @property Pet $iDpet
 * @property Vaccine $iDvaccine
 */
class Vaccination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDvaccine', 'VaccinationDate', 'IDpet'], 'required'],
            [['IDvaccine', 'IDpet'], 'integer'],
            [['VaccinationDate'], 'safe'],
            [['IDpet'], 'exist', 'skipOnError' => true, 'targetClass' => Pet::className(), 'targetAttribute' => ['IDpet' => 'IDpet']],
            [['IDvaccine'], 'exist', 'skipOnError' => true, 'targetClass' => Vaccine::className(), 'targetAttribute' => ['IDvaccine' => 'IDvaccine']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDvaccination' => 'I Dvaccination',
            'IDvaccine' => 'I Dvaccine',
            'VaccinationDate' => 'Vaccination Date',
            'IDpet' => 'I Dpet',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDpet()
    {
        return $this->hasOne(Pet::className(), ['IDpet' => 'IDpet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDvaccine()
    {
        return $this->hasOne(Vaccine::className(), ['IDvaccine' => 'IDvaccine']);
    }
}
