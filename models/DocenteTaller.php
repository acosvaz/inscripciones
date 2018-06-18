<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente_taller".
 *
 * @property string $id
 * @property string $tallerid
 * @property string $docenteid
 *
 * @property Docentes $docente
 * @property Talleres $taller
 */
class Docentetaller extends \yii\db\ActiveRecord
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
        return 'docente_taller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tallerid', 'docenteid'], 'required'],
            [['tallerid', 'docenteid'], 'integer'],
            [['docenteid'], 'exist', 'skipOnError' => true, 'targetClass' => Docentes::className(), 'targetAttribute' => ['docenteid' => 'id']],
            [['tallerid'], 'exist', 'skipOnError' => true, 'targetClass' => Talleres::className(), 'targetAttribute' => ['tallerid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tallerid' => Yii::t('app', 'Taller'),
            'docenteid' => Yii::t('app', 'Maestro'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docentes::className(), ['id' => 'docenteid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaller()
    {
        return $this->hasOne(Talleres::className(), ['id' => 'tallerid']);
    }
}
