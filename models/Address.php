<?php

namespace app\models;

use Yii;
use yii\base\Model; 

use yii\db\ActiveRecord;

class Address extends ActiveRecord
{
  public $id;
  public $line1;
  public $line2;
  public $city;
  public $state;
  public $pincode;
  public $country;

    public function rules()
    {
        return [
            [['line1', 'city', 'state', 'pincode'], 'required'],
            ['pincode', 'number'],
        ];
    }
}