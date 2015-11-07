<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model olgert\yii2\ExtActiveRecord */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'List of {model}', ['model' => $model->getHumanName()]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create {model}', ['model' => $model->getHumanName()]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider'     => $dataProvider,
        'filterModel'      => $model,
        'columns'          => [
            'id',
            'user_id',
            'name',
            'domain_id',
            'status',
            // 't_created',
            // 't_updated',

            ['class' => 'kartik\grid\ActionColumn'],
            ['class' => '\kartik\grid\CheckboxColumn']
        ],
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
//        'pjax'             => true,
        'pjaxSettings'     => [
            'neverTimeout' => true,
        ],
        'export'           => false,
    ]); ?>

</div>
