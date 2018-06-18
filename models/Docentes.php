<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docentes".
 *
 * @property string $id
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 *
 * @property DocenteTaller[] $docenteTallers
 */
class Docentes extends \yii\db\ActiveRecord
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
        return 'docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'paterno', 'materno'], 'required'],
            [['nombre', 'paterno', 'materno'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'paterno' => Yii::t('app', 'Paterno'),
            'materno' => Yii::t('app', 'Materno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocenteTallers()
    {
        return $this->hasMany(DocenteTaller::className(), ['docenteid' => 'id']);
    }
    public static function getAll(){
        $docentes[] = 'Seleccione un Maestro';
        foreach (Docentes::find()->all() as $registro){
            $docentes[$registro->id] = $registro->nombre.' '.$registro->paterno.' '.$registro->materno;
        }
        return $docentes;
        }
}