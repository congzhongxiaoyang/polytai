<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;//数据库类
use yii\web\session;
use app\models\EcsUsers;
use app\models\Users;

/**
 * Site controller
 */
 //header("content-type:text/html;charset=utf-8");
class IndexController extends Controller
{
	public $enableCsrfValidation = false;

	//前台首页
	public function actionIndex(){
		$session = new Session();
		return $this->renderPartial('index',['info'=>@$_SESSION['uname']]);
	}

	//用户注册
	public function actionRegister(){
		return $this->renderPartial('register');
	}

	//检测用户名
	public function actionCk_name(){
		$find = new EcsUsers();
        $result = $find::findOne($_GET['name']);
		if($result){
			echo @$_GET['callback']."(".json_encode(1).")";
		}else{
			echo @$_GET['callback']."(".json_encode(0).")";
		}
	}

	//前台登录
	public function actionLogin(){
		return $this->renderPartial('login');
	}

	//登陆处理
	public function actionLogin_pro(){
		$name = $_POST['name'];
		$pwd =  md5($_POST['pwd']);
		$session = new Session();
		$model = new Users();
		$result = $model::find()->where(['uname'=>$name])->one();
		if($result){
			if($result['upwd'] == $pwd){
				$session->set('uname',$name);
				$session->set('uid',$result['uid']);
				$this->redirect("./index.php?r=index/index");   
			}else{
				$this->redirect("./index.php?r=index/login");   
			}
		}else{
			$this->redirect("./index.php?r=index/login");   
		}	
	}

	//注册处理
	public function actionRegister_pro(){
		$session = new Session();
		$yzm = $session->get('captcha');
		//if($_POST['yzm'] == $yzm) {
			if($_POST['name']&&$_POST['pwd']) {
				$name = addslashes($_POST['name']);
				$pwd = md5(addslashes($_POST['pwd']));
				$model = new Users();
				$model->uname = $name;
				$model->upwd = $pwd;
				$execute = $model->insert();
				$uid = $model::find()->max('uid');
				if($execute){
					$session->set('uname',$name);
					$session->set('uid',$uid);
					$this->redirect("./index.php?r=index/index");   
				}else{
					$this->redirect("./index.php?r=index/register");		  
				}	
			}else{
				$this->redirect("./index.php?r=index/register");		  
			}
		//}
	}
	
	//验证码
	function actions(){
	$yzm="".substr(md5(time()),5,4);
	$session=new Session();
	$session->set('captcha',$yzm);
		return [
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' :$yzm,
			],
		];
	}

	//退出
	public function actionLogout() {
		//session_start();
		session_destroy();
		$this->redirect("./index.php?r=index/index");		  
	}
}

