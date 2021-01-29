<?php namespace Depcore\Products\Models;

use Model;

/**
 * category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\SimpleTree;
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'description',
        'short_description',
        ['slug', 'index' => true],
    ];


    public $slugs = ['slug' => 'name'];

    public $rules = [
        'name' => 'required|max:60',
    ];

    public $customMessages = [
        'name.required' => 'depcore.products::lang.categories.name.required',
        'name.max' => 'depcore.products::lang.categories.name.max',
    ];

    public $table = 'depcore_products_categories';

    protected $guarded = ['*'];

    protected $fillable = [];


    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'products' => [Product::class],
    ];

    public $attachOne = [
        'cover' => '\System\Models\File',
    ];

    public $morphOne = [
        'iconable' => [SvgIcon::class, 'name' => 'iconable']
    ];

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
