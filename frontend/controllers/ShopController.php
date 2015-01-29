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
class ShopController extends Controller
{
	 public $enableCsrfValidation = false;
	//商品分类页
	public function actionProtype(){
		return $this->renderPartial('proType');
	}
	//商品详情
	public function actionMall(){
		return $this->renderPartial('mall');
	}


}