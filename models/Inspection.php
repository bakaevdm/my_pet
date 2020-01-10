<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection".
 *
 * @property int $IDinspection
 * @property int $IDpet
 * @property string $InspectionDate
 * @property int $IDcity
 * @property string $Street
 * @property int $Building
 *
 * @property City $iDcity
 * @property Pet $iDpet
 */
class Inspection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inspection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDpet', 'InspectionDate', 'IDcity', 'Street', 'Building'], 'required'],
            [['IDpet', 'IDcity', 'Building'], 'integer'],
            [['InspectionDate'], 'safe'],
            [['Street'], 'string', 'max' => 255],
            [['IDcity'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['IDcity' => 'IDcity']],
            [['IDpet'], 'exist', 'skipOnError' => true, 'targetClass' => Pet::className(), 'targetAttribute' => ['IDpet' => 'IDpet']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDinspection' => 'I Dinspection',
            'IDpet' => 'I Dpet',
            'InspectionDate' => 'Inspection Date',
            'IDcity' => 'I Dcity',
            'Street' => 'Street',
            'Building' => 'Building',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDcity()
    {
        return $this->hasOne(City::className(), ['IDcity' => 'IDcity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDpet()
    {
        return $this->hasOne(Pet::className(), ['IDpet' => 'IDpet']);
    }
}
