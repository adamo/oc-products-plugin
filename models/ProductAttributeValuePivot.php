<?php namespace Depcore\Products\Models;

use October\Rain\Database\Pivot;

class ProductAttributeValuePivot extends Pivot {
	public $belongsTo = [
		'value' => [
			Value::class
		],
	];
}