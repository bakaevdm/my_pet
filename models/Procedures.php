<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedures".
 *
 * @property int $IDprocedure
 * @property string $ProcedureName
 * @property int $Period
 * @property int $IDpet
 *
 * @property Pet $iDpet
 */
class Procedures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProcedureName', 'Period', 'IDpet'], 'required'],
            [['Period', 'IDpet'], 'integer'],
            [['ProcedureName'], 'string', 'max' => 255],
            [['IDpet'], 'exist', 'skipOnError' => true, 'targetClass' => Pet::className(), 'targetAttribute' => ['IDpet' => 'IDpet']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDprocedure' => 'I Dprocedure',
            'ProcedureName' => 'Procedure Name',
            'Period' => 'Period',
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
}
