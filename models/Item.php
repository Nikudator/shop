<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $manufacturer_id
 * @property int $pack_id
 * @property string $sku
 * @property int $active
 *
 * @property Manufacturer $manufacturer
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'manufacturer_id', 'pack_id', 'sku'], 'required'],
            [['description'], 'string'],
            [['manufacturer_id', 'pack_id', 'active'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['sku'], 'string', 'max' => 10],
            [['title'], 'unique'],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'manufacturer_id' => 'Manufacturer ID',
            'pack_id' => 'Pack ID',
            'sku' => 'Sku',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }
}
