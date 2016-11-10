<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property integer $manufacturer_id
 * @property string $product_code
 * @property string $purchase_cost
 * @property integer $quantity_on_hand
 * @property string $markup
 * @property string $available
 * @property string $description
 *
 * @property Manufacturer $manufacturer
 * @property ProductCode $productCode
 * @property PurchaseOrder[] $purchaseOrders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'manufacturer_id', 'product_code'], 'required'],
            [['product_id', 'manufacturer_id', 'quantity_on_hand'], 'integer'],
            [['purchase_cost', 'markup'], 'number'],
            [['product_code'], 'string', 'max' => 2],
            [['available'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 50],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'manufacturer_id']],
            [['product_code'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCode::className(), 'targetAttribute' => ['product_code' => 'prod_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'manufacturer_id' => 'Manufacturer ID',
            'product_code' => 'Product Code',
            'purchase_cost' => 'Purchase Cost',
            'quantity_on_hand' => 'Quantity On Hand',
            'markup' => 'Markup',
            'available' => 'Available',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['manufacturer_id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCode()
    {
        return $this->hasOne(ProductCode::className(), ['prod_code' => 'product_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::className(), ['product_id' => 'product_id']);
    }
}
