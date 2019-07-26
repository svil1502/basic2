<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vidjet */

$this->title = 'Update Vidjet: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vidjets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vidjet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
