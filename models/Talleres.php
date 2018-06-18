<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talleres".
 *
 * @property string $id
 * @property string $cicloid
 * @property string $taller
 *
 * @property DocenteTaller[] $docenteTallers
 * @property Grupos[] $grupos
 * @property Horarios[] $horarios
 * @property Ciclos $ciclo
 */
class Talleres extends \yii\db\ActiveRecord
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
        return 'talleres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cicloid', 'taller'], 'required'],
            [['cicloid'], 'integer'],
            [['taller'], 'string'],
            [['cicloid'], 'exist', 'skipOnError' => true, 'targetClass' => Ciclos::className(), 'targetAttribute' => ['cicloid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cicloid' => Yii::t('app', 'Ciclo'),
            'taller' => Yii::t('app', 'Taller'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocenteTallers()
    {
        return $this->hasMany(DocenteTaller::className(), ['tallerid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['tallerid' => 'id']);
    }
    public static function getAll(){
        $talleres[] = 'Seleccione un Taller';
        foreach (Talleres::find()->all() as $registro){
            $talleres[$registro->id] = $registro->taller;
        }
    
        return $talleres;
        }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horarios::className(), ['tallerid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiclo()
    {
        return $this->hasOne(Ciclos::className(), ['id' => 'cicloid']);
    }
    
}
