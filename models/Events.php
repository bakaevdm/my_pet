<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $IDevent
 * @property string $EventName
 * @property string $EventDate
 * @property int $IDcity
 * @property string $Street
 * @property string $Building
 * @property int $IDpet
 *
 * @property City $iDcity
 * @property Pet $iDpet
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EventName', 'EventDate', 'IDcity', 'Street', 'Building', 'IDpet'], 'required'],
            [['EventDate'], 'safe'],
            [['IDcity', 'IDpet'], 'integer'],
            [['EventName', 'Street', 'Building'], 'string', 'max' => 255],
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
            'IDevent' => 'I Devent',
            'EventName' => 'Event Name',
            'EventDate' => 'Event Date',
            'IDcity' => 'I Dcity',
            'Street' => 'Street',
            'Building' => 'Building',
            'IDpet' => 'I Dpet',
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
