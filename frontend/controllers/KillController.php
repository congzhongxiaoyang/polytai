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
use app\models\EcsGoodsKill;

/**
 * Site controller
 */
class KillController extends Controller
{
	 public $enableCsrfValidation = false;
	//首页
	public function actionKill_detail($id){
		$data=EcsGoodsKill::findOne($id);
        return $this->renderPartial('kill_detail',['data'=>$data]);
	}
	public function actionKill_list(){
		$data=EcsGoodsKill::find()->all();
        return $this->renderPartial('kill_list',['data'=>$data]);
	}


}