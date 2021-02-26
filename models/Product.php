<?php namespace Depcore\Products\Models;

use Model;
use Depcore\Products\Models\Attribute;
use Db;
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

    public $hasMany = [
        'values' => Values::class,
        'table' => 'depcore_products_products_attributes',
        'key' => 'product_id',
        'foregin_key' => 'value_id',
    ];

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

    public function scopeListFrontEnd( $query, $attributes, $categoryId ) {
        // "select `products`.`product_ID` from `depcore_products_products_attributes` as `products`
        // inner join `depcore_products_products_attributes` as `products1` on `products`.`product_id` = `products1`.`product_id`
        // inner join `depcore_products_products_attributes` as `products2` on `products`.`product_id` = `products2`.`product_id`
        // where `products1`.`attribute_id` = 51 and `products1`.`value_id` = 200 and `products2`.`attribute_id` = 53 and `products2`.`value_id` = 4";
        $productIds = [];
        $attributes= array_filter( $attributes, function( $value ) { return !is_null( $value ) && $value !== ''; } );

        $tableName = 'depcore_products_products_attributes';

        $query = Db::table($tableName . ' AS products')->select( "products.product_id" );

        foreach ($attributes as $attributeId => $valueId)
        {
            $tempName = "products$attributeId";
            $query->join( "$tableName as $tempName",'products.product_id','=', "$tempName.product_id")
            ->where( "$tempName.attribute_id", $attributeId)
            ->where( "$tempName.value_id",$valueId );
        }
        $productIds = $query->distinct()->get();

        return Product::published()->where( 'category_id',$categoryId )->whereIn('id', json_decode(json_encode($productIds), true));

    }

    /**
     * Get only published elements from database
     *
     * @return Object
     * @author Adam
     **/
    public function scopePublished($query)
    {
        return $query->whereNotNull('is_published')->where ( 'is_published',true )->orderBy( 'sort_order' );
    }

}

