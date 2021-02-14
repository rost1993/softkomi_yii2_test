<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

use kartik\select2\Select2;

use kartik\grid\GridView as GridViewKartik;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = 'Склады';
?>
<div class="store-index">

    <h1><?= Html::encode('Склады') ?></h1>

    <p>
        <?= Html::a('Добавить склад', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= 
        GridViewKartik::widget([
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Название склада',
                'attribute' => 'store_name',
                'format' => 'raw',
                'value' => function($searchModel) {
                    return Html::tag('span', $searchModel->store_name, ['class' => 'yii-softkomi-class-test', 'data-id' => $searchModel->id]);
                },
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

    <?php Modal::begin([
        'header' => '<h2>Список устройств на складе</h2>',
        'size' => Modal::SIZE_LARGE,
    ]);
    Modal::end(); ?>

</div>
