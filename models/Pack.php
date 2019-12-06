<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pack".
 *
 * @property int $id
 * @property int $item_id
 * @property int $quantity
 * @property float $price
 * @property int $is_pack
 * @property int $pack_weight
 * @property string $picture
 *
 * @property Item $item
 */
class Pack extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pack';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'price', 'pack_weight', 'picture'], 'required'],
            [['item_id', 'quantity', 'is_pack', 'pack_weight'], 'integer'],
            [['price'], 'number'],
            [['picture'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'is_pack' => 'Is Pack',
            'pack_weight' => 'Pack Weight',
            'picture' => 'Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}
