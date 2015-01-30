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
	public function actionKill(){
		$memcache_obj = new \Memcache;
		$memcache_obj->connect('192.168.1.198', 22201);
		$memcache_obj->set('shop',"$u_id:$g_id",0,0);//入栈
		//echo $memcache_obj->get('asd');      //出栈
	
	}

}