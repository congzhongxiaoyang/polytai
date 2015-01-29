<?php
namespace backend\controllers;

use Yii;
use common\models\LoginForm;
use yii\filters\AccessControl;
use app\models\EcsCategory;//使用对应的表
use yii\data\Pagination;//分页对象
use yii\db\Query;//数据库类
use yii\web\Controller;

class CategoryController extends Controller
{
	public $enableCsrfValidation = false;
	//后台添加分类
    public function actionCategory_add(){
		
        return $this->renderPartial('category_add');
    }

	//后台添加分类处理
    public function actionCategory_addpro(){
		//public $enableCsrfValidation = false;
		//var_dump($_POST);die;
        $model = new EcsCategory();
        $model->cat_name = addslashes($_POST['name']);
        $model->keywords = addslashes($_POST['key']);
		$model->is_show = $_POST['show'];
		$model->cat_desc = addslashes($_POST['desc']);
        if($model->insert()) {
            $this->redirect("./index.php?r=category/category_list");
        }else {
            $this->redirect("./index.php?r=category/category_list");
        }
    }


	//后台分类列表
    public function actionCategory_list(){
		$query=EcsCategory::find();
		//print_r($data);die;
		$pagination=new Pagination(['defaultPageSize'=>5,'totalCount'=>$query->count()]);
		$info=$query->offset($pagination->offset)->orderby('cat_id desc')->limit($pagination->limit)->all();
		//var_dump($info);
		return $this->renderPartial('category_list',['info'=>$info,'pages'=>$pagination]);
    }

	
	//后台分类状态
    public function actionCategory_show(){
		$model = new EcsCategory();
        $excute = $model::updateall(['is_show'=>$_GET['is_show']],['cat_id'=>$_GET['cat_id']]);
        if($excute){
            $this->redirect("./index.php?r=category/category_list");
        }else{
            $this->redirect("./index.php?r=category/category_list");
        }
    }
	
	//后台修改分类
    public function actionCategory_edit(){
		$find = new EcsCategory();
        $result = $find::findOne($_GET['cat_id']);
        return $this->renderPartial('category_edit',['info'=>$result]);
    }
	
	//后台修改分类
    public function actionCategory_editpro(){
		$model = new EcsCategory();
		$h_id = $_POST['h_id']; 
        $cat_name = addslashes($_POST['name']);
        $keywords = addslashes($_POST['key']);
		$is_show = $_POST['show'];
		$cat_desc = addslashes($_POST['desc']);
		$result = $model->updateall(["cat_name" => $cat_name,"keywords" => $keywords,"is_show" => $is_show,"cat_desc" => $cat_desc],["cat_id"=>$h_id]);
        if($result) {
            $this->redirect("./index.php?r=category/category_list");
        }else {
            $this->redirect("./index.php?r=category/category_list");
        }
    }
	
	//后台删除分类
    public function actionCategory_del(){
		//var_dump($_GET);
		$id = $_GET['cat_id'];
		$model = new EcsCategory();
		//var_dump($model);		
        $excute = $model::deleteAll("cat_id=".$id);
		//die;
		//var_dump($excute);
        if($excute){
            $this->redirect("./index.php?r=category/category_list");
        }else{
            $this->redirect("./index.php?r=category/category_list");
        }
    }
}