<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ciclos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciclos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'ciclo')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>
    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
