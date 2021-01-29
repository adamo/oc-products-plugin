<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;
use Depcore\Products\Models\Category;

class CategoriesList extends ComponentBase
{

    public $categories;

    public function componentDetails()  {
        return [
            'name'        => 'depcore.products::lang.components.categorieslist.name',
            'description' => 'depcore.products::lang.components.categorieslist.description'
        ];
    }

    public function defineProperties() {
        return [];
    }

    function onRun(  ) {
        $this->categories = Category::published(  )->get(  );
    }

}