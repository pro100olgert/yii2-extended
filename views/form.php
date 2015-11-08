<?php

use kartik\widgets\ActiveForm;
use olgert\yii2\ExtActiveRecord;
use olgert\yii2\ExtARController;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model olgert\yii2\ExtActiveRecord */
/* @var $form yii\widgets\ActiveForm */
/* @var $formFields yii\widgets\ActiveForm */

$modelName = $model->getHumanName();
if( $model->isNewRecord )
{
    $this->title = Yii::t('app', 'Create {model}', ['model' => $modelName]);

    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', '{model}', ['model' => $modelName]), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
} else
{
    $this->title = Yii::t('app', 'Update {model}: ', ['model' => $modelName]);

    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', '{model}', ['model' => $modelName]), 'url' => ['index']];
    $this->params['breadcrumbs'][] = Yii::t('app', 'Update {model}', ['model' => $modelName]) . '#' . $model->id;
}

?>

<div class="landing-form">

    <?php $form = ActiveForm::begin([
        'type'       => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan'  => 3,
            'deviceSize' => ActiveForm::SIZE_SMALL,
        ],
    ]); ?>

    <?php
    foreach( $formFields as $field )
    {
        switch($field->type) {
            case ExtARController::INPUT_TEXT:
                echo $form->field($model, $field->name)->textInput($field->options);
                break;
            case ExtARController::INPUT_SELECT:
                $items = $field->options['items'];
                $options = $field->options['options'];
                echo $form->field($model, $field->name)->dropDownList($items, $options);
                break;

        }
    }
    ?>


    <?php
//    $form->field($model, 'user_id')->textInput();
//    $form->field($model, 'name')->textInput(['maxlength' => true]);
//    $form->field($model, 'domain_id')->textInput();
//    $form->field($model, 'status')->dropDownList(['new' => 'New', 'enabled' => 'Enabled', 'disabled' => 'Disabled',], ['prompt' => '']);
//    $form->field($model, 't_created')->textInput();
//    $form->field($model, 't_updated')->textInput()
    ?>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
