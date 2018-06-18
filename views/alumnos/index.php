<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buscar Alumnos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumnos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear nuevo Alumno'), ['create'], ['class' => 'btn btn-success']) ?>
        <!-- Html::a(Yii::t('app', 'Generar PDF'), ['gen-pdf'], ['class' => 'btn btn-primary']) -->

    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'id',
            'nombre:ntext',
            'paterno:ntext',
            'materno:ntext',
            'edad',
            'correo:ntext',
            'direccion:ntext',
            'folio:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
