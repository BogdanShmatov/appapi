<?php


namespace app\controllers;


use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

class BaseApiController extends ActiveController
{


//    public function checkAccess($action, $model = null, $params = [])
//    {
////        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
////            throw new ForbiddenHttpException("You do not have permission to change this record");
////        }
//        return true;
//
//    }
//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
//        $behaviors['authenticator']['authMethods'] = [
//            HttpBearerAuth::class
//        ];
//
//        return $behaviors;
//    }


}