<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wool".
 *
 * @property int $IDwool
 * @property string $TypeWool
 * @property string $ColorWool
 * @property int $IDcosmetics
 *
 * @property Pet[] $pets
 * @property Cosmetics $iDcosmetics
 */
class Wool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TypeWool', 'ColorWool', 'IDcosmetics'], 'required'],
            [['IDcosmetics'], 'integer'],
            [['TypeWool', 'ColorWool'], 'string', 'max' => 255],
            [['IDcosmetics'], 'exist', 'skipOnError' => true, 'targetClass' => Cosmetics::className(), 'targetAttribute' => ['IDcosmetics' => 'IDcosmetics']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDwool' => 'I Dwool',
            'TypeWool' => 'Type Wool',
            'ColorWool' => 'Color Wool',
            'IDcosmetics' => 'I Dcosmetics',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['IDwool' => 'IDwool']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDcosmetics()
    {
        return $this->hasOne(Cosmetics::className(), ['IDcosmetics' => 'IDcosmetics']);
    }
}
