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
        'symbol.required' => 'depcore.products::lang.svgicon.symbol_required',
        'symbol.max' => 'depcore.products::lang.svgicon.symbol_max',
        'symbol.unique' => 'depcore.products::lang.svgicon.symbol_unique',
        'viewport.required' => 'depcore.products::lang.svgicon.viewport_required',
        'viewport.max' => 'depcore.products::lang.svgicon.viewport_max',
        'viewport.min' => 'depcore.products::lang.svgicon.viewport_min',
        'code.required' => 'depcore.products::lang.svgicon.code_required',
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



    /**
     * get svg width from the viewport information
     *
     * @return Float
     * @author Adam
     **/
    public function width()
    {
        return explode(" ", $this->viewport)[2];
    }

    public function height()
    {
        return explode(" ", $this->viewport)[3];
    }
}
