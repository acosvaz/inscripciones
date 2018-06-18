<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property string $id
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property integer $edad
 * @property string $correo
 * @property string $direccion
 * @property string $folio
 *
 * @property MembersGroups[] $membersGroups
 */
class Alumnos extends \yii\db\ActiveRecord
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
        return 'alumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'paterno', 'materno', 'edad', 'direccion', 'folio'], 'required'],
            [['nombre', 'paterno', 'materno', 'correo', 'direccion', 'folio'], 'string'],
            [['edad'], 'integer'],
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
            'edad' => Yii::t('app', 'Edad'),
            'correo' => Yii::t('app', 'Correo'),
            'direccion' => Yii::t('app', 'Direccion'),
            'folio' => Yii::t('app', 'Folio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembersGroups()
    {
        return $this->hasMany(MembersGroups::className(), ['alumnoid' => 'id']);
    }
    public static function getAll(){
        $alumnos[] = 'Seleccione un Alumno';
        foreach (Alumnos::find()->all() as $registro){
            $alumnos[$registro->id] = $registro->nombre.' '.$registro->paterno.' '.$registro->materno;
        }
    
        return $alumnos;
        }
}
