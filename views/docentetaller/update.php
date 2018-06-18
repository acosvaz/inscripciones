<?php

use yii\helpers\Html;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Docentetaller */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Docentetaller',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Docentetallers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="docentetaller-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'docentes'=>$docentes, 'talleres'=>$talleres,
    ]) ?>

</div>
