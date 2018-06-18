<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "members_groups".
 *
 * @property string $id
 * @property string $grupoid
 * @property string $alumnoid
 *
 * @property Alumnos $alumno
 * @property Grupos $grupo
 */
class Members extends \yii\db\ActiveRecord
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
        return 'members_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupoid', 'alumnoid'], 'required'],
            [['grupoid', 'alumnoid'], 'integer'],
            [['alumnoid'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::className(), 'targetAttribute' => ['alumnoid' => 'id']],
            [['grupoid'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['grupoid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'grupoid' => Yii::t('app', 'Grupo'),
            'alumnoid' => Yii::t('app', 'Alumno'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumnos::className(), ['id' => 'alumnoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'grupoid']);
    }
}
