<?php

use yii\helpers\Html;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);


/* @var $this yii\web\View */
/* @var $model app\models\Talleres */

$this->title = Yii::t('app', 'Crear Talleres');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Talleres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talleres-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'ciclos' => $ciclos,
    ]) ?>

</div>
