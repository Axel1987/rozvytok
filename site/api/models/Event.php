<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $title
 * @property string $background
 * @property double $price
 * @property string $description
 */
class Event extends \yii\db\ActiveRecord
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
            [['title', 'background', 'price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title', 'background'], 'string', 'max' => 255],
        ];
    }
}
