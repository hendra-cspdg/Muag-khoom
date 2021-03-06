<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "user".
 *
 * @property integer $id
 * @property string $photo
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $user_type
 * @property string $date
 * @property string $height_screen
 *
 * @property \app\models\Products[] $products
 * @property \app\models\Sale[] $sales
 * @property string $aliasModel
 */
abstract class User extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const USER_TYPE_ADMIN = 'Admin';
    const USER_TYPE_USER = 'User';
    const USER_TYPE_POS = 'POS';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'username', 'password', 'user_type', 'date'], 'required'],
            [['status'], 'integer'],
            [['user_type'], 'string'],
            [['date'], 'safe'],
            [['photo'], 'string', 'max' => 45],
            [['first_name', 'last_name', 'username', 'password'], 'string', 'max' => 255],
            [['height_screen'], 'string', 'max' => 10],
            ['user_type', 'in', 'range' => [
                    self::USER_TYPE_ADMIN,
                    self::USER_TYPE_USER,
                    self::USER_TYPE_POS,
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'user_type' => 'User Type',
            'date' => 'Date',
            'height_screen' => 'Height Screen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\Products::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(\app\models\Sale::className(), ['user_id' => 'id']);
    }




    /**
     * get column user_type enum value label
     * @param string $value
     * @return string
     */
    public static function getUserTypeValueLabel($value){
        $labels = self::optsUserType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column user_type ENUM value labels
     * @return array
     */
    public static function optsUserType()
    {
        return [
            self::USER_TYPE_ADMIN => self::USER_TYPE_ADMIN,
            self::USER_TYPE_USER => self::USER_TYPE_USER,
            self::USER_TYPE_POS => self::USER_TYPE_POS,
        ];
    }

}
