<?php

namespace frontend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use frontend\models\Store;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property int|null $id_store
 * @property string $serial_number_device
 * @property string|null $create_date
 * @property string|null $update_date
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_date',
                'updatedAtAttribute' => 'update_date',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getStore() {
        return $this->hasOne(Store::className(), ['id' => 'id_store']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_store'], 'integer'],
            [['serial_number_device', 'id_store'], 'required'],
            [['create_date', 'update_date'], 'safe'],
            [['serial_number_device'], 'string', 'max' => 100],
            [['serial_number_device'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_store' => 'Id Store',
            'serial_number_device' => 'Serial Number Device',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
        ];
    }
}
