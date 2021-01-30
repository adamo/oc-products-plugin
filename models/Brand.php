<?php namespace Depcore\Products\Models;

use Model;

/**
 * brand Model
 */
class Brand extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    public $slugs = ['slug' => 'name'];


    public $rules = [
        'name' => 'required|max:30',
    ];

    public $customMessages = [
        'name.required' => 'depcore.products::lang.brand.name.required',
        'name.max' => 'depcore.products::lang.brand.name.max',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'depcore_products_brands';
    protected $fillable = ['name'];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'products' => [Product::class],
    ];

    public $attachOne = [
        'logo' => '\System\Models\File',
    ];

    public $morphOne = [
        'iconable' => [SvgIcon::class, 'name' => 'iconable']
    ];


    /**
     * Get ordered brands that have products
     *
     * @return Object
     * @author Adam
     **/
    public function scopeOrdered($query)
    {
        $this->has( 'products' )->orderBy( 'sort_order' );
    }

}
