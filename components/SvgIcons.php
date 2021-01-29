<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;
use Depcore\Products\Models\SvgIcon;

class SvgIcons extends ComponentBase
{

    public $icons;

    public function componentDetails()
    {
        return [
            'name'        => 'depcore.products::lang.components.svgicons.name',
            'description' => 'depcore.products::lang.components.svgicons.description'
        ];
    }


    public function onRun()
    {
        $this->icons = SvgIcon::all();
    }

}