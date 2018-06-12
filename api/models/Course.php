<?php

namespace app\models;

use Yii;
use app\models\Lecturer;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $title
 * @property string $background
 * @property int $lecturer_id
 * @property double $price
 * @property string $description
 *
 * @property Lecturer $lecturer
 * @property LecturerPortfolio[] $lecturerPortfolio
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'background', 'lecturer_id', 'price', 'description'], 'required'],
            [['lecturer_id'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['title', 'background'], 'string', 'max' => 255],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLecturerPortfolio()
    {
        return $this->hasMany(LecturerPortfolio::class, ['lecturer_id' => 'id'])->viaTable('lecturers', ['id' => 'lecturer_id']);
    }
}
