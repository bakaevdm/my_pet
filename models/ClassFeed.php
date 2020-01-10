<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class_feed".
 *
 * @property int $IDclass
 * @property string $ClassName
 *
 * @property Feed[] $feeds
 */
class ClassFeed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class_feed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ClassName'], 'required'],
            [['ClassName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDclass' => 'I Dclass',
            'ClassName' => 'Class Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeds()
    {
        return $this->hasMany(Feed::className(), ['IDclass' => 'IDclass']);
    }
}
