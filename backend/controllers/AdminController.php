<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

class AdminController extends Controller
{

	//后台登陆
    public function actionLogin(){
        return $this->renderPartial('login');
    }

	//后台登录成功首页
    public function actionIndex(){
        return $this->renderPartial('index');
    }

	//后台添加商品
    public function actionGoods_add(){
        return $this->renderPartial('goods_add');
    }

	//后台商品列表
    public function actionGoods_list(){
        return $this->renderPartial('goods_list');
    }
	
	//后台商品列表
    public function actionGoods_comment(){
        return $this->renderPartial('goods_comment');
    }

	//后台添加分类
    public function actionCategory_add(){
        return $this->renderPartial('category_add');
    }

	//后台分类列表
    public function actionCategory_list(){
        return $this->renderPartial('category_list');
    }

	//后台添加秒杀
    public function actionMiaosha_add(){
        return $this->renderPartial('miaosha_add');
    }
	
	//后台秒杀列表
    public function actionMiaosha_list(){
        return $this->renderPartial('miaosha_list');
    }

	//后台添加竞拍
    public function actionJingpai_add(){
        return $this->renderPartial('jingpai_add');
    }
	
	//后台竞拍列表
    public function actionJingpai_list(){
        return $this->renderPartial('jingpai_list');
    }

	//后台订单列表
    public function actionOrder_list(){
        return $this->renderPartial('order_list');
    }

	//后台系统信息
    public function actionCopy(){
        return $this->renderPartial('copy');
    }
}