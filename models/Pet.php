<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet".
 *
 * @property int $IDpet
 * @property int $IDbreed
 * @property string $Nickname
 * @property string $DoB
 * @property int $Sex
 * @property int $Sterilization
 * @property int $IDwool
 * @property float $Weight
 * @property int $IDfeed
 *
 * @property Events[] $events
 * @property Inspection[] $inspections
 * @property Owner[] $owners
 * @property Breed $iDbreed
 * @property Wool $iDwool
 * @property Feed $iDfeed
 * @property Procedures[] $procedures
 * @property Vaccination[] $vaccinations
 */
class Pet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDbreed', 'Nickname', 'DoB', 'Sex', 'Sterilization', 'IDwool', 'Weight', 'IDfeed'], 'required'],
            [['IDbreed', 'Sex', 'Sterilization', 'IDwool', 'IDfeed'], 'integer'],
            [['DoB'], 'safe'],
            [['Weight'], 'number'],
            [['Nickname'], 'string', 'max' => 255],
            [['IDbreed'], 'exist', 'skipOnError' => true, 'targetClass' => Breed::className(), 'targetAttribute' => ['IDbreed' => 'IDbreed']],
            [['IDwool'], 'exist', 'skipOnError' => true, 'targetClass' => Wool::className(), 'targetAttribute' => ['IDwool' => 'IDwool']],
            [['IDfeed'], 'exist', 'skipOnError' => true, 'targetClass' => Feed::className(), 'targetAttribute' => ['IDfeed' => 'IDfeed']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDpet' => 'I Dpet',
            'IDbreed' => 'I Dbreed',
            'Nickname' => 'Nickname',
            'DoB' => 'Do B',
            'Sex' => 'Sex',
            'Sterilization' => 'Sterilization',
            'IDwool' => 'I Dwool',
            'Weight' => 'Weight',
            'IDfeed' => 'I Dfeed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['IDpet' => 'IDpet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspections()
    {
        return $this->hasMany(Inspection::className(), ['IDpet' => 'IDpet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(Owner::className(), ['IDpet' => 'IDpet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDbreed()
    {
        return $this->hasOne(Breed::className(), ['IDbreed' => 'IDbreed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDwool()
    {
        return $this->hasOne(Wool::className(), ['IDwool' => 'IDwool']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDfeed()
    {
        return $this->hasOne(Feed::className(), ['IDfeed' => 'IDfeed']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcedures()
    {
        return $this->hasMany(Procedures::className(), ['IDpet' => 'IDpet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinations()
    {
        return $this->hasMany(Vaccination::className(), ['IDpet' => 'IDpet']);
    }
}
