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
use yii\db\Query;//数据库类
use yii\web\session;
use app\models\EcsAdminUser;

/**
 * Site controller
 */
 header("content-type:text/html;charset=utf-8");
class IndexController extends Controller
{
	 public $enableCsrfValidation = false;
	//首页
	public function actionIndex(){
		//print_r();
		return $this->renderPartial('index');
	}
	//用户注册
	public function actionRegister(){
		return $this->renderPartial('register');
	}
	//验证用户名唯一
	public function actionCheck(){
		$name=$_GET['name'];
		$model = new Query();
		$data=$model->from(["ecs_admin_user"])->where(" user_name='".$name."'")->all();
		if($data){
			echo 1;
		}else{
			echo 0;
		}
	}
	//登录
	public function actionLogin(){
		return $this->renderPartial('login');
	}
	//执行登陆
	public function actionLogin_do(){
		$name="admin";
		$pwd="admin";
		//$name=$_GET['name'];
		//$pwd=$_GET['pwd'];
		$user=EcsAdminUser::find()->where(['user_name'=>$name])->one();
		if($user){
			if($user['password']==md5($pwd)){
				$session->set('username',$name);
				echo 2;
			}else{
				echo 1;
			}
		}else{
			echo 0;
		}
	
	}
	//执行注册
	public function actionRegister_do(){
		
		//$session=new session();
			
		$name="123123";
		$pwd=md5("123123");
		$model=new EcsAdminUser();
		$model->user_name=$name;
		$model->password=$pwd;
		$data=$model->insert();
		
		if($data){
			echo "<script>alert('注册成功');location.href='index.php?r=index/login'</script>";
			
    
		}else{
			echo "<script>alert('注册失败');location.href='index.php?r=index/register'</script>";
			  
		}
	}
	
	//验证码
	 function actions(){
        $yzm="".substr(md5(time()),5,4);
        //$_SESSION['captcha']="".substr(md5(time()),5,4);
        $session=new Session();
        $session->set('captcha',$yzm);
        //$_SESSION['captcha']=$yzm;
		//$a=$session->get('captcha');
			
        //$yzm='1234'.$a;
		//echo $yzm;die;
        return [
					'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' :$yzm,
                ],
        ];
    }

}



