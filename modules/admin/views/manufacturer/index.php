<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManufacturerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manufacturers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Manufacturer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'country',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
