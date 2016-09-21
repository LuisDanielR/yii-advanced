<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tabla".
 *
 * @property integer $id_tabla
 * @property string $nombre_tabla
 */
class Tabla extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabla';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tabla'], 'required'],
            [['nombre_tabla'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tabla' => 'Id Tabla',
            'nombre_tabla' => 'Nombre Tabla',
        ];
    }
}
