<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property int $IDowner
 * @property string $LastName
 * @property string $FirstName
 * @property string $Patronymic
 * @property int $IDcity
 * @property string $Street
 * @property string $Building
 * @property int $IDpet
 * @property int $PhoneNumber
 * @property int $IDuser
 *
 * @property City $iDcity
 * @property Pet $iDpet
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LastName', 'FirstName', 'Patronymic', 'IDcity', 'Street', 'Building', 'IDpet', 'PhoneNumber', 'IDuser'], 'required'],
            [['IDcity', 'IDpet', 'PhoneNumber', 'IDuser'], 'integer'],
            [['LastName', 'FirstName', 'Patronymic', 'Street', 'Building'], 'string', 'max' => 255],
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
            'IDowner' => 'I Downer',
            'LastName' => 'Last Name',
            'FirstName' => 'First Name',
            'Patronymic' => 'Patronymic',
            'IDcity' => 'I Dcity',
            'Street' => 'Street',
            'Building' => 'Building',
            'IDpet' => 'I Dpet',
            'PhoneNumber' => 'Phone Number',
            'IDuser' => 'I Duser',
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
