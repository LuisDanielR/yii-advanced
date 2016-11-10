<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "direccion_item".
 *
 * @property integer $id_direccion
 * @property string $direccion
 * @property string $tipo
 * @property integer $id_usuario
 *
 * @property Usuario $idUsuario
 */
class DireccionItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion', 'tipo', 'id_usuario'], 'required'],
            [['direccion', 'tipo'], 'string'],
            [['id_usuario'], 'integer'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_direccion' => 'Id Direccion',
            'direccion' => 'Direccion',
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
