<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "platillos".
 *
 * @property integer $id_platillos
 * @property string $nombre
 * @property string $descripcion
 * @property double $precio
 * @property string $imagen
 * @property string $tipo
 */
class Platillos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'platillos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'precio'], 'required'],
            [['precio'], 'number'],
            [['nombre', 'tipo'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
            [['imagen'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_platillos' => 'Id Platillos',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'imagen' => 'Imagen',
            'tipo' => 'Tipo',
        ];
    }
}
