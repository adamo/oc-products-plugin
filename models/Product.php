<?php namespace Depcore\Products\Models;

use Model;
use Depcore\Products\Models\Attribute;
/**
 * product Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'description',
        'short_description',
        ['slug', 'index' => true],
    ];

    public $rules = [
        'name' => 'required',
        // 'category' => 'required',
        // 'brand' => 'required',
    ];

    public $customMessages = [
        'name.required' => 'depcore.products::lang.product.name.required',
        'brand.required' => 'depcore.products::lang.product.brand.required',
        'category.required' => 'depcore.products::lang.product.category.required',
    ];

    public $slugs = ['slug'=>'name'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'depcore_products_products';

    // public $jsonable = ['attributes'];
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name','short_description','description'];


    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'category' => [Category::class],
        'brand' => [Brand::class]
    ];

    // public $hasManyThrough = [
    //     'values' => [
    //         Value::class,
    //         'through' => Attribute::class,
    //         'pivot' => ['value_id'],
    //     ]
    // ];

    public $belongsToMany = [
        'attributes' => [
            Attribute::class,
            'table' => 'depcore_products_products_attributes',
            'pivot' => ['value_id'],
            'pivotModel' => 'Depcore\Products\Models\ProductAttributeValuePivot',
        ],
    ];

    public $attachMany = [
        'images' => '\System\Models\File',
    ];

    // function getAttributeIdOptions(){
    //     return Attribute::listName(  );
    // }

    // function getAttributeOptions(){
    //     return Attribute::listName(  );
    // }

    // function getValueOptions(){
    //     return Value::listValues(  );
    // }


    // function getValueIdOptions($value, $data){
    //     if ($value) return Value::where( 'attribute_id',$value )->get(  )->pluck( 'value','id' );
    //     return Value::all(  )->pluck( 'value','id' );
    // }

    // function beforeSave(  ){
    //       \Log::debug( $this );
    // }


}

