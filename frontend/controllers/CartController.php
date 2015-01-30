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
			$detail->goods_sn=$v['goods_sn'];
			$z=$detail->insert();

			//修改库存
			$goods=new EcsGoods();
			$data=EcsGoods::find()->where("goods_id=".$v['goods_id']."")->one();
			$num=$data['goods_number']-$v['number'];
			$q=$goods->updateall(['goods_number'=>$num],['goods_id'=>$v['goods_id']]);
		}
		
		return $this->actionShoppingmsg($id);
	}
	//核对订单
	public function actionShoppingmsg($id){
		$region=EcsRegion::find()->where('parent_id=0')->all();
		$query=new Query();
		$qingdan=$query->from('ecs_goods,ecs_order_detail')->where("ecs_goods.goods_id=ecs_order_detail.goods_id and ecs_order_detail.order_id=$id")->all();
		//$qingdan=EcsOrderDetail::find()->where("order_id=$id")->all();
		return $this->renderPartial('shoppingMsg',['region'=>$region,'qingdan'=>$qingdan,'id'=>$id]);
	}
	//地区四级联动
	public function actionSelectadd()
	{
		$pid=$_POST['pid'];
		$info=EcsRegion::find()->where("parent_id=$pid")->all();
		return $this->renderPartial('region',['info'=>$info]);
	}
	//新增收货地址
	public function actionRecieve(){
		$uid=1;
		$id=$_POST['aid'];
		//print_r($_POST);die;
		$model=new EcsUserAddress();
		$model->user_id=$uid;
		$model->consignee=$_POST['recieve'];
		$model->country=$_POST['pro'];
		$model->province=$_POST['city'];
		$model->city=$_POST['dis'];
		$model->address=$_POST['detail'];
		$model->mobile=$_POST['mobile'];
		$model->tel=$_POST['tel'];
		$model->email=$_POST['email'];
		$model->flag=1;
		
		$connection = \Yii::$app->db;
		$connection->createCommand()->update('ecs_user_address', ['flag' => 0], "user_id=$uid and flag=1")->execute();
		$model->insert();
		

		//添加收货地址
		$address=EcsUserAddress::find()->where("user_id=$uid and flag=1")->all();
		foreach($address as $k=>$v){
		if($k!='address_id'&&$k!='address_name'&&$k!='user_id'&&$k!='flag'){
			$order=new EcsOrderInfo();
			$y=$order->updateall([$k=>$v],['order_id'=>$id]);
			}
		}
	}


}