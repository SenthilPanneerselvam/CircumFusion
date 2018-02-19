<?php

namespace app\models;

class Category extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $name;
    public $parent;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * @inheritdoc
     */
    public static function getRootCategory()
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    public function getParent($id)
    {
      
    }
  }
  ?>