<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lecturers".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $photo
 * @property string $specialty
 * @property string $rank
 * @property string $achievements
 *
 * @property Course[] $courses
 * @property LecturerPortfolio $portfolio
 */
class Lecturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lecturers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'photo', 'specialty'], 'required'],
            [['achievements'], 'string'],
            [['name', 'surname', 'photo', 'specialty', 'rank'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::class, ['lecturer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasMany(LecturerPortfolio::class, ['lecturer_id' => 'id']);
    }
}
