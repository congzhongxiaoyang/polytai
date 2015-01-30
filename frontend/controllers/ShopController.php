<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf-8");
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
use app\models\EcsGoods;
use app\models\EcsComment;
use app\models\EcsCart;
use app\models\Cart;
use yii\db\Query;//数据库类
use yii\data\Pagination;//分页对象
/**
 * Site controller
 */
class ShopController extends Controller
{
	 public $enableCsrfValidation = false;
	//商品列表页
	public function actionProtype(){
		$query=new Query();
		$data=EcsGoods::find()->orderby("add_time desc")->all();
		$cc=count($data);
		$comment=EcsComment::find()->count();
		$page_size=9;
		$pagination=new Pagination(['defaultPageSize'=>$page_size,'totalCount'=>$cc]);
		$info=EcsGoods::find()->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->renderPartial('proType',['data'=>$info,'comment'=>$comment,'count'=>$cc,'pagination'=>$pagination]);
	}
	//商品详情
	public function actionMall(){
		$gid=$_GET['gid'];
		$data=EcsGoods::find()->where("goods_id=".$gid."")->one();
		return $this->renderPartial('mall',['data'=>$data]);
	}
	//数量加一
	public function actionPlus(){
		$gid=$_GET['gid'];
		$num=$_GET['num'];
		$num=$_GET['num']+1;
		
		$data=EcsGoods::find($gid)->one();
		//echo $data['goods_number'];
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
	//加入购物车
	public function actionCart(){
		$model=new Cart();
		$model->goods_id=$_POST['goods_id'];
		$gid=$_POST['goods_id'];
		$model->goods_name=$_POST['goods_name'];
		$model->price=$_POST['shop_price'];
		$model->market_price=$_POST['market_price'];
		$model->number=$_POST['goods_num'];
		$model->user_id=1;
		//print_r($_POST);die;
		$data=Cart::find()->where("goods_id=".$gid."")->one();
		if(!empty($data)){
			echo "<script>alert('您已加入购物车，请去修改数量');location.href='index.php?r=cart/shoppingcar'</script>";
		}else{
			$a=$model->insert();
			if($a){
				echo "<script>alert('添加成功');location.href='index.php?r=shop/protype'</script>";
			}else{
				echo 0;
			}
		}
	}
	

}