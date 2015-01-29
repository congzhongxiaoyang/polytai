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
class CartController extends Controller
{
	 public $enableCsrfValidation = false;
	//支付
	public function actionPayment(){
		return $this->renderPartial('payment');
	}
	//交易信息
	public function actionParmentok(){
		return $this->renderPartial('parmentOK');
	}
	//购物车
	public function actionShoppingcar(){
		return $this->renderPartial('shoppingCar');
	}
	//核对订单
	public function actionShoppingmsg(){
		return $this->renderPartial('shoppingMsg');
	}


}