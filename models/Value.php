<?php namespace Depcore\Products\Models;

use Model;

/**
 * Values Model
 */
class Value extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'value',
        ['slug', 'index' => true],
    ];


    public $rules = [
        'value' => 'required',
    ];

    public $customMessages = [
        'value.required' => 'depcore.products::lang.value.value.required',
    ];

    public $table = 'depcore_products_values';
    protected $fillable = ['value'];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'attribute' => Attribute::class
    ];

    function scopeListValues(  ){
        $result = self::all(  );
        $list = array();

        foreach ($result as $value) $list[$value->id] = $value->value;
        return $list;
    }
}
