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
 *
 * @property Manufacturer $manufacturer
 * @property Pack[] $packs
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
            [['title', 'description', 'manufacturer_id'], 'required'],
            [['description'], 'string'],
            [['manufacturer_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacks()
    {
        return $this->hasMany(Pack::className(), ['item_id' => 'id']);
    }
}
