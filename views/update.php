<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model olgert\yii2\ExtActiveRecord */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => $model->getHumanName(),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Landings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="landing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
