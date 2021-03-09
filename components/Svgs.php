<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;

class Svgs extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'depcore.products::lang.components.svgs.name',
            'description' => 'depcore.products::lang.components.svgs.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}