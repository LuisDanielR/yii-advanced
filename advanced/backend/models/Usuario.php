<?php

namespace backend\models;

use Yii;
use \himiklab\yii2\recaptcha\ReCaptchaValidator;


/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 *
 * @property AgendaItem[] $agendaItems
 * @property CorreoItem[] $correoItems
 * @property DireccionItem[] $direccionItems
 * @property SocialItem[] $socialItems
 */
class Usuario extends \yii\db\ActiveRecord
{
    public $reCaptcha;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'required'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 100],
            [['reCaptcha'],ReCaptchaValidator::className(),'secret'=>'6Le7HQkUAAAAAFORWmbVFPqQ638FiXuTG8Y_i7TU'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaItems()
    {
        return $this->hasMany(AgendaItem::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorreoItems()
    {
        return $this->hasMany(CorreoItem::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionItems()
    {
        return $this->hasMany(DireccionItem::className(), ['id_usuario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialItems()
    {
        return $this->hasMany(SocialItem::className(), ['id_usuario' => 'id']);
    }
}
