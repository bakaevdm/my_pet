<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cosmetics".
 *
 * @property int $IDcosmetics
 * @property string $CosmeticsName
 * @property string $CosmeticsType
 *
 * @property Wool[] $wools
 */
class Cosmetics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cosmetics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CosmeticsName', 'CosmeticsType'], 'required'],
            [['CosmeticsName', 'CosmeticsType'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDcosmetics' => 'I Dcosmetics',
            'CosmeticsName' => 'Cosmetics Name',
            'CosmeticsType' => 'Cosmetics Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWools()
    {
        return $this->hasMany(Wool::className(), ['IDcosmetics' => 'IDcosmetics']);
    }
}
