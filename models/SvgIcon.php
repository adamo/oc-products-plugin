<?php namespace Depcore\Products\Models;

use Model;

/**
 * SvgIcon Model
 */
class SvgIcon extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $rules = [
        'symbol' => 'required|max:255|unique:depcore_products_svg_icons',
        'viewport' => 'required|max:255|min:6',
        'code' => 'required',
    ];

    public $customMessages = [
        'symbol.required' => 'depcore.products::lang.svgicon.symbol.required',
        'symbol.max' => 'depcore.products::lang.svgicon.symbol.max',
        'symbol.unique' => 'depcore.products::lang.svgicon.symbol.unique',
        'viewport.required' => 'depcore.products::lang.svgicon.viewport.required',
        'viewport.max' => 'depcore.products::lang.svgicon.viewport.max',
        'viewport.min' => 'depcore.products::lang.svgicon.viewport.min',
        'code.required' => 'depcore.products::lang.svgicon.code.required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'depcore_products_svg_icons';

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
    public $morphTo = ['iconable' => []];
}
