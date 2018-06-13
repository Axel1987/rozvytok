<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lecturers_portfolio".
 *
 * @property int $id
 * @property int $lecturer_id
 * @property string $title
 * @property string $link
 * @property string $description
 *
 * @property Lecturer $lecturer
 */
class LecturerPortfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lecturers_portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lecturer_id', 'title', 'description'], 'required'],
            [['lecturer_id'], 'integer'],
            [['description'], 'string'],
            [['title', 'link'], 'string', 'max' => 255],
            [['lecturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lecturer::class, 'targetAttribute' => ['lecturer_id' => 'id']],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecturer()
    {
        return $this->hasOne(Lecturer::class, ['id' => 'lecturer_id']);
    }
}
