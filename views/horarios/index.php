<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\HorariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buscar Horarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Horario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'id',
            [
                'attribute'=>'tallerid',
                'value'=>'taller.taller'
            ],
            
            'horario:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
