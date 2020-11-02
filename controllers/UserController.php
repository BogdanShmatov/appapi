<?php


namespace app\controllers;


use app\models\User;
use yii\filters\RateLimitInterface;

class UserController extends BaseApiController
{
    public $modelClass = 'app\models\User';


   
}