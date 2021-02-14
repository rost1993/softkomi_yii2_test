<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use frontend\models\Store;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number_device')->textInput(['maxlength' => true])->label('Серийный номер устройства') ?>

    <?= $form->field($model, 'id_store')->widget(Select2::classname(), [
        'data' => array_merge(['0' => ' '], ArrayHelper::map(Store::find()->all(), 'id', 'store_name')),
        'language' => 'ru',
        'options' => [
            'placeholder' => 'Выберите...',
            'options' => [
                '0' => ['disabled' => true],
            ],
        ],
        'pluginOptions' => [
        'allowClear' => true
        ],
    ])->label('Склад'); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
