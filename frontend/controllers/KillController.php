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
use app\models\KillOrder;
header("content-type:text/html;charset=utf-8");
/**
 * Site controller
 */
class KillController extends Controller
{
	 public $enableCsrfValidation = false;
	//秒杀详情页
	public function actionKill_detail($id){
		$data=EcsGoodsKill::findOne($id);
        return $this->renderPartial('kill_detail',['data'=>$data]);
	}
	//秒杀列表
	public function actionKill_list(){
		$data=EcsGoodsKill::find()->all();
        return $this->renderPartial('kill_list',['data'=>$data]);
	}
	//秒杀操作
	public function actionKill($g_id){
		$u_id=1;
		$memcache_obj = new \Memcache;
		$memcache_obj->connect('192.168.1.198', 22201);
		$memcache_obj->set('shop',"$u_id:$g_id",0,0);//入栈

		$order=new KillOrder();
		$order->u_id=$u_id;
		$order->g_id=$g_id;
		$order->state=0;
		$order->orders=time().rand(100,999);
		$a=$order->insert();
		$id=Yii::$app->db->getLastInsertID();//刚加入信息的id
		return $this->actionKill_mem($id);
	}
	//秒杀处理
	public function actionKill_mem($id){
		$memcache_obj = new \Memcache;
		$memcache_obj->connect('192.168.1.198', 22201);
		$mem=$memcache_obj->get('shop');
		if(!empty($mem)){
			$mem1=strpos($mem,":");
			$u_id=substr($mem,0,$mem1);
			$g_id=substr($mem,$mem1+1);
			$data=EcsGoodsKill::findOne($g_id);
			if($data['k_number']>0){
			$k_number=$data['k_number']-1;
			$update=EcsGoodsKill::updateall(["k_number"=>$k_number],["k_id"=>$g_id]);
			$updata=KillOrder::updateall(["state"=>1],["id"=>$id]);	
			}
		}else{
			echo "<script>location.href='index.php?r=kill/kill_list'</script>";
		}
		$data=KillOrder::findOne($id);
		if($data['state']==0){
			echo "<script>alert('商品已被抢购一空，请选择其他商品');location.href='index.php?r=kill/kill_list'</script>";
		}else{
			echo "<script>alert('恭喜你，请尽快填写信息');location.href='index.php?r=kill/kill_orders'</script>";
		}
	}

}