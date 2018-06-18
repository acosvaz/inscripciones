<?php

use yii\helpers\Html;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Ciclos */

$this->title = Yii::t('app', 'Crear Ciclo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciclos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
