<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')
        ->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '(999)-999-99-99',
        ])
        ->textInput(array('placeholder' => '(XXX)-XXX-XX-XX', 'class'=>'form-control text-center')); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
