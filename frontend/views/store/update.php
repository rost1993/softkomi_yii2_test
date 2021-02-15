<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Store */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = ['label' => 'Склады', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Склад: ' . $model->store_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="store-update">

    <h1><?= Html::encode('Изменить склад: ' . $model->store_name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
