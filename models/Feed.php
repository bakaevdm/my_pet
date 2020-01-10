<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feed".
 *
 * @property int $IDfeed
 * @property int $TypeFeed
 * @property int $IDclass
 * @property string $FeedName
 *
 * @property ClassFeed $iDclass
 * @property Pet[] $pets
 */
class Feed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TypeFeed', 'IDclass', 'FeedName'], 'required'],
            [['TypeFeed', 'IDclass'], 'integer'],
            [['FeedName'], 'string', 'max' => 255],
            [['IDclass'], 'exist', 'skipOnError' => true, 'targetClass' => ClassFeed::className(), 'targetAttribute' => ['IDclass' => 'IDclass']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDfeed' => 'I Dfeed',
            'TypeFeed' => 'Type Feed',
            'IDclass' => 'I Dclass',
            'FeedName' => 'Feed Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDclass()
    {
        return $this->hasOne(ClassFeed::className(), ['IDclass' => 'IDclass']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['IDfeed' => 'IDfeed']);
    }
}
