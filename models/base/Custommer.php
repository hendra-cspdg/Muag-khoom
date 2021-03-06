<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "custommer".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 *
 * @property \app\models\StillPay[] $stillPays
 * @property string $aliasModel
 */
abstract class Custommer extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custommer';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStillPays()
    {
        return $this->hasMany(\app\models\StillPay::className(), ['custommer_id' => 'id']);
    }




}
