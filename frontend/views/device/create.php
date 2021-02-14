<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
?>
<div class="device-create">

    <h1><?= Html::encode('Добавить новое устройство') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
