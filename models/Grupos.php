<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property string $id
 * @property string $grupo
 * @property string $tallerid
 *
 * @property Talleres $taller
 * @property MembersGroups[] $membersGroups
 */
class Grupos extends \yii\db\ActiveRecord
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
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupo', 'tallerid'], 'required'],
            [['grupo'], 'string'],
            [['tallerid'], 'integer'],
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
            'grupo' => Yii::t('app', 'Grupo'),
            'tallerid' => Yii::t('app', 'Taller'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaller()
    {
        return $this->hasOne(Talleres::className(), ['id' => 'tallerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembersGroups()
    {
        return $this->hasMany(MembersGroups::className(), ['grupoid' => 'id']);
    }
    public static function getAll(){
        $grupos[] = 'Seleccione un Grupo';
        foreach (Grupos::find()->all() as $registro){
            $grupos[$registro->id] = $registro->grupo;
        }
    
        return $grupos;
        }
}
