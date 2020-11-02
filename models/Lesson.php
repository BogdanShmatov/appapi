<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lesson}}".
 *
 * @property int $id
 * @property string $lesson_name
 * @property string $lesson_url
 * @property int|null $course_id
 *
 * @property Course $course
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_name', 'lesson_url'], 'required'],
            [['course_id'], 'integer'],
            [['lesson_name', 'lesson_url'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_name' => 'Lesson Name',
            'lesson_url' => 'Lesson Url',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
