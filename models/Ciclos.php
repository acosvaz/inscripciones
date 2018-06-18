<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciclos".
 *
 * @property string $id
 * @property string $ciclo
 * @property string $precio
 *
 * @property Talleres[] $talleres
 */
class Ciclos extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'bedezign\yii2\audit\AuditTrailBehavior'
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciclos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ciclo', 'precio'], 'required'],
            [['ciclo', 'precio'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ciclo' => Yii::t('app', 'Ciclos escolares'),
            'precio' => Yii::t('app', 'Precio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalleres()
    {
        
        return $this->hasMany(Talleres::className(), ['cicloid' => 'id']);
    }
    public static function getAll(){
        $ciclos[] = 'Seleccione un Ciclo Escolar';
        foreach (Ciclos::find()->all() as $registro){
            $ciclos[$registro->id] = $registro->ciclo;
        }
    
        return $ciclos;
        }
        public function getCiclo1()
    {
        return $this->ciclo;
    }
}
