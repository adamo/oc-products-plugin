<?php namespace Depcore\Products\Models;

use Model;

/**
 * attribute Model
 */
class Attribute extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
    ];


    public $slugs = ['slug' => 'name'];


    public $rules = [
        'name' => 'required',
    ];

    public $customMessages = [
        'name.required' => 'depcore.products::lang.attributes.name.required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'depcore_products_attributes';
    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'values' => [Value::class],
    ];

    public $morphOne = [
        'iconable' => [SvgIcon::class, 'name' => 'iconable']
    ];

    public $belongsToMany = [
        'products' => [
            Product::class,
            'table' => 'depcore_products_products_attributes',
            'pivot' => ['value_id'],
        ],
    ];

    /**
     * Get only attributes with filterable set
     *
     * @return Object
     * @author Adam
     **/
    public function scopeFilterable($query, $valueIds)
    {
        return $query->whereNotNull( 'is_filterable' )->where( 'is_filterable',true )->whereHas( 'values', function( $query ) use(  $valueIds ){
            $query->whereIn( 'id',$valueIds );
        } );
    }

    function scopeListName( $query ){
        $result = self::all(  );
        $list = array();

        foreach ($result as $value) $list[$value->id] = $value->name;
        return $list;
    }

    function getValueOptions(){
        return Value::listValues(  );
    }
}
