<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Устройство: ' . $model->serial_number_device;
\yii\web\YiiAsset::register($this);
?>
<div class="device-view">

    <h1><?= Html::encode('Устройство: ' . $model->serial_number_device) ?></h1>

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

    <?php
        $store_name_record = Store::findOne($model->id_store);
        $store_name = $store_name_record->store_name;
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Уникальный номер устройства',
                'attribute' => 'id',
                'value' => $model->id,
            ],
            [
                'label' => 'Серийный номер устройства',
                'attribute' => 'serial_number_device',
                'value' => $model->serial_number_device,
            ],
            [
                'label' => 'Название склада',
                'attribute' => 'id_store',
                'value' => $store_name,
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
