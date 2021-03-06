<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportingPeriodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список отчётных периодов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reporting-period-index">

    <div class="page-header">
    	<h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
            	'attribute' => 'state',
            	'value' => function ($model) {
            		return $model->stateName;
            	},
            	'format' => 'text',
            	'filter' => $searchModel->getStateList()
            ],
            [
            	'attribute' => 'is_988',
            	'value' => function ($model) {
            		return $model->docTypeName;
            	},
            	'format' => 'text',
            	'filter' => $searchModel->getDocTypeList()
            ],
            [
                'attribute' => 'date_start',
                'format' => 'date',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'value' => $searchModel->date_start,
                    'attribute' => 'date_start',
                    'language' => Yii::$app->language,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),
            ],
            [
                'attribute' => 'date_end',
                'format' => 'date',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'value' => $searchModel->date_end,
                    'attribute' => 'date_end',
                    'language' => Yii::$app->language,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
