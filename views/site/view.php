<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportingPeriod */

$this->title = 'Просмотр отчётного периода';
$this->params['breadcrumbs'][] = ['label' => 'Список отчётных периодов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="reporting-period-view">

    <div class="page-header">
        <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Список', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'stateName',
            'docTypeName',
            'date_start:date',
            'date_end:date',
        ],
    ]) ?>

</div>
