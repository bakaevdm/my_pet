<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "breed".
 *
 * @property int $IDbreed
 * @property string $BreedName
 *
 * @property Pet[] $pets
 */
class Breed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'breed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BreedName'], 'required'],
            [['BreedName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDbreed' => 'I Dbreed',
            'BreedName' => 'Breed Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['IDbreed' => 'IDbreed']);
    }
}
