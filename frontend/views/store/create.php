<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Store */

$this->title = 'Create Store';
$this->params['breadcrumbs'][] = ['label' => 'Склады', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить новый склад';
?>
<div class="store-create">

    <h1><?= Html::encode('Добавить новый склад') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
