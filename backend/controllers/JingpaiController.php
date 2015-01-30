<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\EcsGoods;
use app\models\Jingpai;
use yii\db\Query;
use yii\web\session;
use yii\data\Pagination;

class JingpaiController extends Controller
{
	public $enableCsrfValidation = false;
	//后台添加竞拍商品
    public function actionJingpai_add(){
        $data=EcsGoods::find()->all();
        return $this->renderPartial('jingpai_add',['data'=>$data]);
    }

	//添加后台
	public function actionJingpai_addpro(){
		$session = new Session();
		$uid = $session->get('uid');
		$model=new Jingpai();
		$model->gid = $_POST['gid'];
		$model->uid = $uid;
		$model->price = $_POST['price'];
		$model->lowest = 1;
		$model->highest = $_POST['highest'];
		$model->start_time = $_POST['start_time'];
		$model->end_time = $_POST['end_time'];
		$model->now_price = $_POST['price'];
		$ecxcute = $model->insert();
		if($ecxcute){
			$this->redirect("./index.php?r=jingpai/jingpai_list");
		}else{
			$this->redirect("./index.php?r=jingpai/jingpai_add");
		}
    }

	//后台秒杀列表
    public function actionJingpai_list(){
		$model = new Query();
		$result = $model->from(["ecs_goods","jingpai"])->where("ecs_goods.goods_id=jingpai.gid")->orderby("jingpai.j_id desc")->all();
		$pages = new Pagination(['totalCount' =>$model->count(), 'pageSize' => '5']);
		$data = $model->offset($pages->offset)->limit($pages->limit)->all();
		return $this->renderPartial('jingpai_list',[
			'info' => $data,
			'pages' => $pages,
		]);
    }

	//删除
	public function actionJingpai_del(){
		$res=Jingpai::deleteAll('j_id = '.$_GET['j_id']);
		if($res){
			$this->redirect("./index.php?r=jingpai/jingpai_list");
		}else{
			$this->redirect("./index.php?r=jingpai/jingpai_list");
		}
    }
}