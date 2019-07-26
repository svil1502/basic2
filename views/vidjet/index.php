<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VidjetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vidjets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vidjet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vidjet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'ytn'],

        // 'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'нет данных'],
      //  'emptyCell'=>'-',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            [
//                'attribute' => 'name',
//                'format' => 'ntext',
//                'value' => function ($model) {
//                    if ($model->name == null)
//                        return '(не задано)';
//
//                },
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
