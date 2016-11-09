<?php

namespace app\Http;


class Helperfunctions {
	
	public static function getDistinctValues($model, $column_name)
	{
		$obj_collection = $model::distinct()->get([$column_name]);
		foreach ($obj_collection as $obj) {
			$distinctValues[] = $obj->$column_name;
		}
		return $distinctValues;
	}
}