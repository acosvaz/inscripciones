<?php

use yii\helpers\Html;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);


/* @var $this yii\web\View */
/* @var $model app\models\Horarios */

$this->title = Yii::t('app', 'Crear Horario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'talleres' => $talleres,
    ]) ?>

</div>
