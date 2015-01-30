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
class KillController extends Controller
{
	 public $enableCsrfValidation = false;
	//首页
	public function actionKill_detail(){
		return $this->renderPartial('kill_detail');
	}
	public function actionKill_list(){
		return $this->renderPartial('kill_list');
	}


}