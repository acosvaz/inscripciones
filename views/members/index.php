<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buscar integrantes del grupo');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Añadir un alumno al grupo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'id',
            
            [ 
                'attribute'=>'grupoid',
                'value'=> 'grupo.grupo'
            ],
            
            [ 
                'attribute'=>'alumnoid',
                'value'=> function($model){
                $alumnos= app\models\Alumnos::find()->where(['nombre'=>$model->alumno])->one();
                return $alumnos->nombre.' '.$alumnos->paterno.' '.$alumnos->materno;
                }   
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
