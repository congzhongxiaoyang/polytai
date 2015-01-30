<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\EcsGoodsKill;
use app\models\EcsGoods;
use yii\db\Query;
use yii\data\Pagination;

class KillController extends Controller
{
	public $enableCsrfValidation = false;
	//后台添加秒杀
    public function actionKill_add(){
		$data=EcsGoods::find()->all();
        return $this->renderPartial('kill_add',['data'=>$data]);
    }
	//添加后台
	public function actionKill_addpro(){
		$data=EcsGoods::findOne($_POST['goods']);
		$p=$data['shop_price'];
		$a=strpos($p,".");
		$b=substr($p,0,$a);
		$model=new EcsGoodsKill();
		$model->k_name=$data['goods_name'];
		$model->g_price=$b;
		$model->k_img=$data['goods_img'];
		$model->k_price=$_POST['k_price'];
		$model->k_times=$_POST['k_times'];
		$model->k_timed=$_POST['k_timed'];
		//print_r($data['shop_price']);die;
		$a=$model->insert();
		if($a){
			$this->redirect("./index.php?r=kill/kill_list");
		}else{
			$this->redirect("./index.php?r=kill/kill_list");
		}
    }
	//后台秒杀列表
    public function actionKill_list(){
		$model=new Query();
		$data=$model->from(["ecs_goods_kill"])->orderby("k_id desc")->all(); 
		$pages =new Pagination(['totalCount' =>$model->count(), 'pageSize' => '5']);
        $list = $model->offset($pages->offset)->limit($pages->limit)->all();
        return $this->renderPartial('kill_list',['data'=>$list,'pages'=>$pages]);
    }
	//删除
	public function actionKill_del($id){
		$res=EcsGoodsKill::deleteAll('k_id = '.$id);
		if($res){
			$this->redirect("index.php?r=kill/kill_list");
		}else{
			$this->redirect("index.php?r=kill/kill_list");
		}
    }
	//编辑
    public function actionKill_edit($id){
		$list=EcsGoodsKill::findOne($id);
		$data=EcsGoods::find()->all();
        return $this->renderPartial('kill_edit',['list'=>$list,'data'=>$data]);
    }
	//编辑后台
	public function actionKill_editpro($id){
		$update=EcsGoodsKill::updateall(["k_price"=>$_POST['k_price'],"k_times"=>$_POST['k_times'],"k_timed"=>$_POST['k_timed']],["k_id"=>$id]);
		if($update){
			$this->redirect("./index.php?r=kill/kill_list");
		}else{
			$this->redirect("./index.php?r=kill/kill_list");
		}
    }
}