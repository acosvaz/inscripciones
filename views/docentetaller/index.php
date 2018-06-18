<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\DocentetallerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buscar Taller-Docente');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentetaller-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Añadir docente al taller'), ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute'=>'docenteid',
                'value'=>function($model){
                $docentes= app\models\Docentes::find()->where(['nombre'=>$model->docente])->one();
                return $docentes->nombre.' '.$docentes->paterno.' '.$docentes->materno;
                }
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
