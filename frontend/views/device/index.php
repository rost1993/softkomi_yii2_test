<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use frontend\models\Store;
use kartik\select2\Select2;

use kartik\grid\GridView as GridViewKartik;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тестовый проект Softkomi';
$this->params['breadcrumbs'][] = 'Устройства';
?>
<div class="device-index">

    <h1><?= Html::encode('Устройства') ?></h1>

    <p>
        <?= Html::a('Добавить новое устройство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= 
        GridViewKartik::widget([
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Серийный номер',
                'attribute' => 'serial_number_device',
                'value' => 'serial_number_device',
            ],            

            [
                'label' => 'Склад',
                'attribute' => 'id_store',
                'value' => 'store.store_name',

                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_store',
                    'data' => ArrayHelper::map(Store::find()->all(), 'id', 'store_name'),
                    'value' => $searchModel->id_store,
                    'language' => 'ru',
                    'options' => [
                        'placeholder' => 'Выберите...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                    ],
                ]),

            ],

            [
                'label' => 'Дата создания',
                'attribute' => 'create_date',
                'value' => 'create_date',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
            'responsive'=> true,
            'hover'=> true,
        ]);
    ?>


</div>
