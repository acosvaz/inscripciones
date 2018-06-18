<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios".
 *
 * @property string $id
 * @property string $tallerid
 * @property string $horario
 *
 * @property Talleres $taller
 */
class Horarios extends \yii\db\ActiveRecord
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
        return 'horarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tallerid', 'horario'], 'required'],
            [['tallerid'], 'integer'],
            [['horario'], 'string'],
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
            'horario' => Yii::t('app', 'Horario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaller()
    {
        return $this->hasOne(Talleres::className(), ['id' => 'tallerid']);
    }
}
