<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Устройство: ' . $model->serial_number_device, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="device-update">

    <h1><?= Html::encode('Изменить устройство: ' . $model->serial_number_device) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
