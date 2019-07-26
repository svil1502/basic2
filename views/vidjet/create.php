<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vidjet */

$this->title = 'Create Vidjet';
$this->params['breadcrumbs'][] = ['label' => 'Vidjets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vidjet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
