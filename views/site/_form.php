<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ReportingPeriod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reporting-period-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->dropDownList($model->getStateList()) ?>

    <?= $form->field($model, 'is_988')->dropDownList($model->getDocTypeList()) ?>

    <?= $form->field($model, 'date_start')->widget(DatePicker::className(), [
        'name' => 'check_issue_date', 
        'value' => date('yyyy-mm-dd', strtotime('+2 days')),
        'options' => ['placeholder' => 'Выберите дату начала...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'date_end')->widget(DatePicker::className(), [
        'name' => 'check_issue_date', 
        'value' => date('yyyy-mm-dd', strtotime('+2 days')),
        'options' => ['placeholder' => 'Выберите дату окончания...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
