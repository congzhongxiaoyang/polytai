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
use app\models\Cart;
use app\models\EcsRegion;
use app\models\EcsOrderGoods;
use app\models\EcsUserAddress;
use app\models\EcsOrderInfo;
use app\models\EcsOrderDetail;
use app\models\EcsGoods;
use yii\web\session;
use yii\db\Query;//数据库类
/**
 * Site controller
 *$session=new Session();
		$session->set('name','admin');
		$a=$session->get('name');
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
	//购物车列表
	public function actionShoppingcar(){
		//$session=new Session();
		//$uid=$session->get('uid');
		$uid=1;
		$query=new Query();
		$data=$query->from('cart,ecs_goods')->where("cart.goods_id=ecs_goods.goods_id")->all();
		$cc=count($data);
		$total=0;
		foreach($data as $k=>$v){
			$total+=$v['price']*$v['number'];
		}
		return $this->renderPartial('shoppingCar',['data'=>$data,'cc'=>$cc,'total'=>$total]);
	}
	//数量加一
	public function actionPlus(){
		$gid=$_GET['gid'];
		$num=$_GET['num'];
		$num=$_GET['num']+1;
		
		$data=EcsGoods::find($gid)->one();
		echo $data['goods_number'];
		if($num>$data['goods_number']){
			echo 0;
		}else{

			echo $num;
		}
	}
	//数量减一
	public function actionMinus(){
		$gid=$_GET['gid'];
		$num=$_GET['num'];
		$num=$_GET['num']-1;
		
		$data=EcsGoods::find($gid)->one();
		//echo $data['goods_number'];
		if($num<=0){
			echo 0;
		}else{

			echo $num;
		}
	
	}
	//删除
	public function actionDel(){
		$id=$_GET['gid'];
		//echo $id;
		$res=Cart::findOne($id)->delete();
		if($res){
			return $this->redirect(['cart/shoppingcar']);
		}else{
			echo 0;
		}
	}
	//提交订单
	public function actionOrdera(){
		//$status=2;
		$order=new EcsOrderInfo();
		$order->user_id=1;
		$order->pay_status=0;
		$order->order_status=0;
		$order->order_sn=time().rand(100,999);
		$order->goods_amount=$_POST['total_price'];
		$x=$order->insert();
		$id=Yii::$app->db->getLastInsertID();//刚加入信息的id
		//添加收货地址
		$uid=1;
		$address=EcsUserAddress::find()->where("user_id=$uid")->one();
		foreach($address as $k=>$v){
		if($k!='address_id'&&$k!='address_name'&&$k!='user_id'){
			$add=new EcsUserAddress();
			$y=$order->updateall([$k=>$v],['order_id'=>$id]);
			}
		}
		//加入订单详细表
		$a=Cart::find()->all();
		foreach($a as $k=>$v){
			$detail=new EcsOrderDetail();
			$detail->goods_name=$v['goods_name'];
			$detail->order_id=$id;
			$detail->goods_id=$v['goods_id'];
			$detail->goods_num=$v['number'];
			$detail->market_price=$v['market_price'];
			$detail->goods_price=$v['price'];
			$z=$detail->insert();

			//修改库存
			$goods=new EcsGoods();
			$data=EcsGoods::find()->where("goods_id=".$v['goods_id']."")->one();
			$num=$data['goods_number']-$v['number'];
			$q=$goods->updateall(['goods_number'=>$num],['goods_id'=>$v['goods_id']]);
		}
		if($x&&$y&&$z&&$q){
			echo "<script>alert</script>";
		}
	}
	//核对订单
	public function actionShoppingmsg(){
		$region=EcsRegion::find()->where('parent_id=0')->all();
		//print_r($region);die;

		return $this->renderPartial('shoppingMsg',['region'=>$region]);
	}
	//地区四级联动
	function actionSelectadd()
	{
		$pid=$_POST['pid'];
		$info=EcsRegion::find()->where("parent_id=$pid")->all();
		//print_r($info);
		echo json_encode($info);
		//foreach($info as $k=>$v){
			//print_r($v);
		//}
		//return $this->renderPartial('shoppingMsg',['info'=>$info]);
	}


}