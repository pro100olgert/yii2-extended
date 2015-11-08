<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model olgert\yii2\ExtActiveRecord */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $columns array */

$this->title = Yii::t('app', 'List of {model}', ['model' => $model->getHumanName()]);

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $model,
        'columns'      => $columns,
        'export'       => false,
        'panel'        => [
            'type'    => GridView::TYPE_PRIMARY,
            'heading' => $this->title,
        ],
        'toolbar'      => [
            ['content' =>
                 Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                     ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => Yii::t('app', 'Add')]) . ' ' .
                 Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'],
                     ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset')]),
            ],
        ],
    ]); ?>

</div>
