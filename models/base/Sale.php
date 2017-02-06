<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "sale".
 *
 * @property integer $id
 * @property string $date
 * @property integer $products_id
 * @property integer $qautity
 * @property integer $user_id
 * @property integer $price
 *
 * @property \app\models\Products $products
 * @property \app\models\User $user
 * @property string $aliasModel
 */
abstract class Sale extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'products_id', 'qautity', 'user_id', 'price'], 'required'],
            [['date'], 'safe'],
            [['products_id', 'qautity', 'user_id', 'price'], 'integer'],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Products::className(), 'targetAttribute' => ['products_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'products_id' => 'Products ID',
            'qautity' => 'Qautity',
            'user_id' => 'User ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['id' => 'products_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }




}
