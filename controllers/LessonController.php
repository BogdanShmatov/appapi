<?php


namespace app\controllers;

use app\models\Lesson;
use yii\data\ActiveDataProvider;

class LessonController extends BaseApiController
{
    public $modelClass = 'app\models\Lesson';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    public function actionIndex($course_id = null)
    {
        if ($course_id) {
            return Lesson::findAll(['course_id' => $course_id]);
        }
    }
}