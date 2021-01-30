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
    protected $fillable = ['name','short_description','description','category_id','brand_id'];


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

    // public $hasMany = [
    //     'values' => Values::class,
    //     'table' => 'depcore_products_products_attributes',
    //     'key' => 'product_id',
    //     'foregin_key' => 'value_id',
    // ];

    public $belongsToMany = [
        'attributes' => [
            Attribute::class,
            'table' => 'depcore_products_products_attributes',
            'pivot' => ['value_id'],
            // 'order' => 'sort_order asc',
            'pivotModel' => 'Depcore\Products\Models\ProductAttributeValuePivot',
        ],
    ];

    public $attachOne = [
        'cover' => '\System\Models\File',
    ];

    public $attachMany = [
        'images' => '\System\Models\File',
    ];


}

