<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class IndexController extends Controller
{
	 public $enableCsrfValidation = false;
	//首页
	public function actionIndex(){
		return $this->renderPartial('index');
	}
	//用户注册
	public function actionRegister(){
		return $this->renderPartial('register');
	}
	//登录
	public function actionLogin(){
		return $this->renderPartial('login');
	}


}