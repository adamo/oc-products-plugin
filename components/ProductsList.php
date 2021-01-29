<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;

class ProductsList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'depcore.products::lang.components.productslist.name',
            'description' => 'depcore.products::lang.components.productslist.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}