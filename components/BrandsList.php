<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;
use Depcore\Products\Models\Brand;

class BrandsList extends ComponentBase
{

    public $brands;

    public function componentDetails()
    {
        return [
            'name'        => 'depcore.products::lang.components.brandslist.name',
            'description' => 'depcore.products::lang.components.brandslist.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /**
     * get all brands
     *
     * @return void
     * @author Adam
     **/
    public function onRun()
    {
        $this->brands = Brand::all();
    }

}