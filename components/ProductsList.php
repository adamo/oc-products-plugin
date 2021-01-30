<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;
use Depcore\Products\Models\Category;
use Depcore\Products\Models\Brand;
use Depcore\Products\Models\Attribute;

class ProductsList extends ComponentBase
{
    public $products;
    public $categories;
    public $brands;
    public $attributes;

    public function componentDetails() {
        return [
            'name'        => 'depcore.products::lang.components.productslist.name',
            'description' => 'depcore.products::lang.components.productslist.description'
        ];
    }

    public function defineProperties() {
        return [
            'no_results_found' => [
                'title'             => 'depcore.products::lang.components.productslist.no_results_found.title',
                'description'       => 'depcore.products::lang.components.productslist.no_results_found.description',
                'default'           => '',
                'type'              => 'string',
                'placeholder' => 'depcore.products::lang.components.productslist.no_results_found.placeholder',
                'required' => 'false',
            ],
        ];
    }

    /**
     * Get categories functions by slug
     *
     * @return void
     * @author Adam
     **/
    public function onRun()
    {
        $slug = $this->param('slug');
        $this->categories = Category::published()->get();
        $this->products = Category::findBySlug( $slug )->products()->get();
        $this->brands = Brand::ordered()->get();
        $this->attributes = Attribute::has('products')->get();

    }

    /**
     * Ajax request to filter products by submitted values
     *
     * @return void
     * @author Adam
     **/
    public function onFilterProducts()
    {
        $filters = [];
        $filters = Request::input('Filter');

        $this->page['products'] = Product::listFrontEnd( $filters );
        $this->page['filters'] = $filters;
    }


}