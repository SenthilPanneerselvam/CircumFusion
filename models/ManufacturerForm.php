<?php

namespace app\models;

use Yii;
use yii\base\Model;

//use yii\db\ActiveRecord;

class ManufacturerForm extends Model
{
  public $id;
  public $name;
  public $GST;
  public $address;
  public $fax;
  public $phone;
  public $website;
  public $industry_segment;
  public $business_segment;
  public $contact;

    public function rules()
    {
        return [
            [['name', 'GST'], 'required'],
            [['phone', 'fax'], 'number'],
        ];
    }

    public static function tableName()
    {
        return 'manufacturer';
    }
}