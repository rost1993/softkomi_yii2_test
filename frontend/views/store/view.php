<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Store */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = ['label' => 'Склады', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Склад: ' . $model->store_name;
\yii\web\YiiAsset::register($this);
?>
<div class="store-view">

    <h1><?= Html::encode('Склад: ' . $model->store_name) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
            	'label' => 'Уникальный номер склада',
            	'attribute' => 'id',
            	'value' => $model->id,
            ],
            [
            	'label' => 'Название склада',
            	'attribute' => 'store_name',
            	'value' => $model->store_name,
            ],
            [
            	'label' => 'Дата создания',
            	'attribute' => 'create_date',
            	'value' => $model->create_date,
        	],
            [
            	'label' => 'Дата изменения',
            	'attribute' => 'update_date',
            	'value' => $model->update_date,
        	],
        ],
    ]) ?>

</div>
