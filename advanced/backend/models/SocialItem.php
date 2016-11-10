<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "social_item".
 *
 * @property integer $id_red_social
 * @property string $tipo
 * @property integer $id_usuario
 * @property string $enlace
 *
 * @property Usuario $idUsuario
 */
class SocialItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'social_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'id_usuario', 'enlace'], 'required'],
            [['tipo'], 'string'],
            [['id_usuario'], 'integer'],
            [['enlace'], 'string', 'max' => 200],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_red_social' => 'Id Red Social',
            'tipo' => 'Tipo',
            'id_usuario' => 'Id Usuario',
            'enlace' => 'Enlace',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }
}
