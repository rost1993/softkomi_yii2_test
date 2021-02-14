<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = 'Зарегистрироваться';
?>
<div class="site-signup">
    <h1><?= Html::encode('Форма регистрации') ?></h1>

    <p>Пожалуйста, заполните все поля для прохождения регистрации:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин пользователя') ?>

                <?= $form->field($model, 'email')->label('Email адрес пользователя') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль пользователя') ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
