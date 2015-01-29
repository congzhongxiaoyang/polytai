<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\EcsGoods;
use app\models\EcsCategory;//使用对应的表
use yii\data\Pagination;//分页对象
use yii\db\Query;//数据库类
use yii\web\Controller;

class GoodsController extends Controller
{
	public $enableCsrfValidation = false;

	//后台添加商品
    public function actionGoods_add(){
		$find = new EcsCategory();
        $result = $find::find()->all();
		return $this->renderPartial('goods_add',['info'=>$result]);
	}

	//后台添加商品处理
    public function actionGoods_add_pro(){
		$model = new EcsGoods();
        $total = $model::find()->max('goods_id');
		$goods_sn = "ESC0000".$total;
		$rootPath = "./resource/uploads/";
        $upload = move_uploaded_file($_FILES['myfile']['tmp_name'],$rootPath.$_FILES['myfile']['name']);
		if($upload) {
			$model->goods_name = addslashes($_POST['name']);
			$model->goods_sn = $goods_sn;
			$model->cat_id = $_POST['cat_id'];
			$model->shop_price = addslashes($_POST['price']);
			$model->keywords = addslashes($_POST['key']);
			$model->goods_desc = addslashes($_POST['editorValue']);
			$model->goods_thumb = $rootPath.$_FILES['myfile']['name'];
			$model->goods_img = $rootPath.$_FILES['myfile']['name'];
			$model->original_img = $rootPath.$_FILES['myfile']['name'];
			$model->add_time = time();
			if($model->insert()) {
				$this->redirect("./index.php?r=goods/goods_list");
			}else {
				$this->redirect("./index.php?r=goods/goods_list");
			}
		}
	}

	//后台商品列表
    public function actionGoods_list(){
		$model = new Query();
		$result = $model->from(["ecs_goods","ecs_category"])->where("ecs_goods.cat_id=ecs_category.cat_id and ecs_goods.is_real=1")->orderby("ecs_goods.add_time desc")->all();
		$pages = new Pagination(['totalCount' =>$model->count(), 'pageSize' => '5']);
		$data = $model->offset($pages->offset)->limit($pages->limit)->all();
		return $this->renderPartial('goods_list',[
			'info' => $data,
			'pages' => $pages,
		]);
	}

	//后台商品加入回收站
    public function actionGoods_join(){
		$model = new EcsGoods();
        $excute = $model::updateall(['is_real'=>0],['goods_id'=>$_GET['goods_id']]);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_list");
        }else{
            $this->redirect("./index.php?r=goods/goods_list");
        }
    }

	//后台回收站列表
    public function actionGoods_recycle(){
		$model = new Query();
		$result = $model->from(["ecs_goods","ecs_category"])->where("ecs_goods.cat_id=ecs_category.cat_id and ecs_goods.is_real=0")->orderby("ecs_goods.add_time desc")->all();
		$pages = new Pagination(['totalCount' =>$model->count(), 'pageSize' => '5']);
		$data = $model->offset($pages->offset)->limit($pages->limit)->all();
		return $this->renderPartial('goods_recycle',[
			'info' => $data,
			'pages' => $pages,
		]);
	}

	//后台商品还原
    public function actionGoods_restore(){
		$model = new EcsGoods();
        $excute = $model::updateall(['is_real'=>1],['goods_id'=>$_GET['goods_id']]);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_recycle");
        }else{
            $this->redirect("./index.php?r=goods/goods_recycle");
        }
    }


	//后台删除商品
    public function actionGoods_del(){
		$id = $_GET['goods_id'];
		$model = new EcsGoods();	
        $excute = $model::deleteAll("goods_id=".$id);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_recycle");
        }else{
            $this->redirect("./index.php?r=goods/goods_recycle");
        }
    }

	//后台修改上下架
    public function actionGoods_sale(){
		if($_GET['on_sale']==0) {
			$on_sale=1;
		}else {
			$on_sale=0;
		}
		$model = new EcsGoods();
        $excute = $model::updateall(['is_on_sale'=>$on_sale],['goods_id'=>$_GET['goods_id']]);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_list");
        }else{
            $this->redirect("./index.php?r=goods/goods_list");
        }
	}

	//后台修改是否为新品
    public function actionGoods_new(){
		if($_GET['is_new']==0) {
			$is_new=1;
		}else {
			$is_new=0;
		}
		$model = new EcsGoods();
        $excute = $model::updateall(['is_new'=>$is_new],['goods_id'=>$_GET['goods_id']]);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_list");
        }else{
            $this->redirect("./index.php?r=goods/goods_list");
        }
	}

	//后台修改是否促销
    public function actionGoods_promote(){
		if($_GET['is_promote']==0) {
			$is_promote=1;
		}else {
			$is_promote=0;
		}
		$model = new EcsGoods();
        $excute = $model::updateall(['is_promote'=>$is_promote],['goods_id'=>$_GET['goods_id']]);
        if($excute){
            $this->redirect("./index.php?r=goods/goods_list");
        }else{
            $this->redirect("./index.php?r=goods/goods_list");
        }
	}
}