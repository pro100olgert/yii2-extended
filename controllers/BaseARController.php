<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

abstract class BaseARController extends Controller
{
    protected $modelName;
    /**
     * @var ActiveRecord
     */
    protected $model;

    protected $form;
    protected $gridView;

    public function init()
    {
        if( class_exists($this->modelName) )
            $this->model = new $this->modelName;
        else
            throw new NotFoundHttpException;
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('/base/index', [
            'gridView' => $this->gridView,
            'model'    => $this->model,
        ]);
    }

    public function actionCreate()
    {

    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {

    }
}
