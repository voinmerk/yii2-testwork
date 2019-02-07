<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportingPeriod */

$this->title = 'Обновить отчётный период';
$this->params['breadcrumbs'][] = ['label' => 'Список отчётных периодов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="reporting-period-update">

    <div class="page-header">
    	<h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
