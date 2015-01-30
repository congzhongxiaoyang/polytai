<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\captcha\Captcha;
use yii\web\session;
use app\models\Users;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller{

   public $enableCsrfValidation = false;
//验证码
	public function actions(){
        $yzm="".substr(md5(time()),5,4);
		//$yzm=rand(1000,9999);
        //$session=new Session();
        //$session->set('captcha',$yzm);
        return [
					'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' :$yzm,
                ],
        ];
    }


	
	//登录验证
	public function actionLoginpro(){
		$session=new Session();
		$name=$_GET['name'];
		$pwd=$_GET['pwd'];
		//echo $pwd;
		$user=Users::find()->where(['uname'=>$name])->one();
		if($user){
			if($user['upwd']==$pwd){
				$session->set('name',$name);
				echo 2;
			}else{
				echo 1;
			}
		}else{
			echo 0;
		}
	}


	//退出登录
	public function actionLogout(){
		$session=new Session();
		$session->set('name','',time()-1);
		echo "<script>alert('退出成功');location.href='index.php?r=admin/login'</script>";
	}


	//注册
	public function actionRegist(){
		return $this->renderPartial('regist');
	}

	public function actionRegistpro(){
		$name=$_GET['name'];
		$pwd=$_GET['pwd'];
		$repwd=$_GET['repwd'];
		if(Users::find()->where(['uname'=>$name])->one())
		{
			echo 0;
			die;
		}
		if($pwd!=$repwd){
			echo 1;
			die;
		}
		$users = new Users();
		$users->uname=$name;
		$users->upwd=$pwd;
		if($users->insert())
		{
			echo 2;
		}else{
			echo "注册失败";
		}
		
		
		
	}


}