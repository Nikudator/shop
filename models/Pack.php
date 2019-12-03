<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pack".
 *
 * @property int $id
 * @property float $weight_pack
 * @property float $quantity
 * @property float $price
 * @property string $picture
 * @property int $is_pack
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
            [['weight_pack', 'quantity', 'price', 'picture'], 'required'],
            [['weight_pack', 'quantity', 'price'], 'number'],
            [['is_pack'], 'integer'],
            [['picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weight_pack' => 'Weight Pack',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'picture' => 'Picture',
            'is_pack' => 'Is Pack',
        ];
    }
}
