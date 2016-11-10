<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "agenda_item".
 *
 * @property integer $id_agenda
 * @property integer $telefono
 * @property string $tipo
 * @property integer $id_usuario
 *
 * @property Usuario $idUsuario
 */
class AgendaItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agenda_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefono', 'tipo'], 'required'],
            [['telefono', 'id_usuario'], 'integer'],
            [['tipo'], 'string'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_agenda' => 'Id Agenda',
            'telefono' => 'Telefono',
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
