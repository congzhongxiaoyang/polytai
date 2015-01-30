<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\db\Query;//数据库类
use common\models\EcsBackOrder;
use common\models\EcsOrderInfo;
use common\models\EcsComment;
class OrderController extends Controller
{	
	public $enableCsrfValidation = false;
	//后台订单列表
    public function actionOrder_list(){
		$model = new Query();
		$data =$model->from(["ecs_order_info","username"])->where("ecs_order_info.user_id=username.user_id")->all();
       $pages = new Pagination(['totalCount' =>$model->count(), 'pageSize' => '5']);
       $model = $model->offset($pages->offset)->limit($pages->limit)->all();
       //print_r($model);die;
       return $this->renderPartial('order_list',['model' => $model,'pages' => $pages]);
        //return $this->renderPartial('order_list');
    }

	//后台订单状态修改
	public function actionOrder_upd(){
		$id=$_GET['id'];
		$model = new Query();
		$data =$model->from(["ecs_order_info","username"])->where("ecs_order_info.user_id=username.user_id and ecs_order_info.order_id='".$id."'")->all();
        return $this->renderPartial('orderupd_list',['data' => $data]);
           
	}
	//后台订单删除
	public function actionOrder_del(){
		$id=$_GET['id'];
		$model=EcsOrderInfo::deleteAll("order_id='".$id."'");
        $this->redirect(['order/order_list']);
	}
	//修改执行
	public function actionUpd_do(){

		$order_id=$_POST['order_id'];
		$order_status=$_POST['order_status'];	
		$pay_status=$_POST['pay_status'];
		$update=EcsOrderInfo::updateall(["order_status" => $order_status,"pay_status" => $pay_status],["order_id"=>$order_id]);
		if($update)
		{
			echo "<script>alert('编辑成功');location.href='index.php?r=order/order_list'</script>";

		}else
		{
			echo "<script>alert('编辑失败');location.href='index.php?r=order/order_list'</script>";

		}
	}
	//后台评论列表
    public function actionGoods_comment(){



		$model = new Query();
		$data =$model->from(["ecs_comment","username","ecs_goods"])->where("ecs_comment.user_id=username.user_id and ecs_comment.goods_id=ecs_goods.goods_id")->all();
       $pages = new Pagination(['totalCount' =>$model->count(), 'pageSize' => '1']);
       $model = $model->offset($pages->offset)->limit($pages->limit)->all();
      // print_r($model);die;
       return $this->renderPartial('goods_comment',['model' => $model,'pages' => $pages]);

    }

	//评论列表修改状态
	public function actionComment_upd(){
		$model = new EcsComment();
		$excute = $model->updateall(["status" =>'1'],["comment_id"=>$_GET['id']]);
		$this->redirect("./index.php?r=order/goods_comment");
	}
	//评论列表删除
	public function actionComment_del(){
		$id=$_GET['id'];
		$model=EcsComment::deleteAll("comment_id='".$id."'");
        $this->redirect(['order/goods_comment']);
	}
}

