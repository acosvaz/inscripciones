<?php

use yii\helpers\Html;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);


/* @var $this yii\web\View */
/* @var $model app\models\Docentes */

$this->title = Yii::t('app', 'Añadir Maestro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Docentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
