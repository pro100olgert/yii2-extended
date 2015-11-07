<?php

namespace olgert\yii2;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class ExtARController
 * @package olgert\yii2
 *
 * @property ExtActiveRecord $model
 */
abstract class ExtARController extends Controller
{
    protected $form;
    protected $gridView;

    /**
     * @return string Name of a model
     * Example: app\models\ModelName
     */
    abstract public function getModelName();

    abstract public function initScopes();

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Landing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = $this->getModel();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        return $this->render('@olgert/yii2/views/index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new model.
     * @return mixed
     */
    public function actionCreate()
    {
        return $this->actionUpdate();
    }

    /**
     * Updates an existing Landing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate( $id = null )
    {
        $model = isset($id) ? $this->findModel($id) : $this->getModel();

        if( $model->load(Yii::$app->request->post()) && $model->validate() )
        {
            if( $model->save() )
                return $this->redirect(['index']);
        }

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Landing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete( $id )
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return ExtActiveRecord
     * @throws NotFoundHttpException
     */
    public function getModel()
    {
        $modelName = $this->getModelName();
        if( class_exists($modelName) )
            return new $modelName;
        throw new NotFoundHttpException();
    }

    /**
     * Finds the ExtActiveRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExtActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel( $id )
    {
        $model = $this->getModel();
        $model = $model::findOne($id);
        if( $model !== null )
            return $model;
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
