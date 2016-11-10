<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "correo_item".
 *
 * @property integer $id_correo
 * @property string $correo
 * @property string $tipo
 * @property integer $id_usuario
 *
 * @property Usuario $idUsuario
 */
class CorreoItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'correo_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['correo', 'tipo', 'id_usuario'], 'required'],
            [['tipo'], 'string'],
            [['id_usuario'], 'integer'],
            [['correo'], 'string', 'max' => 100],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_correo' => 'Id Correo',
            'correo' => 'Correo',
            'tipo' => 'Tipo',
            'id_usuario' => 'Id Usuario',
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
