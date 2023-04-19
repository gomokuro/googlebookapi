<?php

namespace App\Database\Type;

use Cake\Database\DriverInterface;
use Cake\Database\Type;
use PDO;

/**
 * 基本はJsonTypeと同じだが、連想配列でなくオブジェクトとして返す
 *
 */
class JsonObjectType extends \Cake\Database\Type\JsonType{

	public function toPHP($value, DriverInterface $driver)
    {
        if ($value === null) {
            return null;
        }
        return json_decode($value);
    }

    public function marshal($value)
    {
        if (is_array($value) || $value === null) {
            return $value;
        }
        return json_decode($value);
    }

    public function toDatabase($value, DriverInterface $driver):?string
	{
		if(is_array($value)){
			return json_encode($value);
		}else{
			return $value;
		}
	}

	public function toStatement($value, DriverInterface $driver):int
	{
		if ($value === null) {
			return PDO::PARAM_NULL;
		}
		return PDO::PARAM_STR;
	}
}
