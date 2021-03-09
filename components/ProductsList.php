<?php namespace Depcore\Products\Components;

use Cms\Classes\ComponentBase;
use Depcore\Products\Models\Category;
use Depcore\Products\Models\Brand;
use Depcore\Products\Models\Attribute;
use Depcore\Products\Models\Product;
use Depcore\Products\Models\Value;
use Request;

class ProductsList extends ComponentBase
{
    public $products;
    public $categories;
    public $category;
    public $brands;
    public $values;
    public $attributes;
    public $categoryId;

    public function componentDetails() {
        return [
            'name'        => 'depcore.products::lang.components.productslist.name',
            'description' => 'depcore.products::lang.components.productslist.description'
        ];
    }

    public function defineProperties() {
        return [
            'show_featured_product' => [
                'title'             => 'depcore.products::lang.components.productlist.show_featured_product.title',
                'description'       => 'depcore.products::lang.components.productlist.show_featured_product.description',
                'default'           => 0,
                'type'              => 'checkbox',
                'required' => 'false',
            ],
            'show_featured_image' => [
                'title'             => 'depcore.products::lang.components.productslist.show_featured_image.title',
                'description'       => 'depcore.products::lang.components.productslist.show_featured_image.description',
                'default'           => 1,
                'type'              => 'checkbox',
            ],
            'featured_image_position' => [
                'title'             => 'depcore.products::lang.components.productslist.featured_image_position.title',
                'description'       => 'depcore.products::lang.components.productslist.featured_image_position.description',
                'default'           => 'top',
                'type'              => 'dropdown',
                'required' => 'true',
                'options' => [
                    'top'=>'depcore.products::lang.components.productslist.featured_image_position.top',
                    'bottom'=>'depcore.products::lang.components.productslist.featured_image_position.bottom'
                ]
            ],
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
        $this->setDefaults();
        $this->addJs('assets/js/filter.js');
        $this->categories = Category::published()->get();
        $categoryId = $this->category->id;

        $this->brands = Brand::ordered()->with(['products' => function( $query ) use ($categoryId){
            $query->where( 'category_id', $categoryId );
        }])->get();

        $productIds =  $this->category->products->pluck( 'id' )->all(  );

        $this->values = \Db::table('depcore_products_products_attributes')->select( "value_id" )->whereIn( 'product_id',$productIds )->orderBy('value_id')->distinct()->pluck('value_id')->all(  );
        $this->attributes = Attribute::filterable($this->values)->get();

        $this->page->title = "{$this->page->title}: {$this->category->name}";
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
        $filters = post();
        $categoryId = post( 'category-id' );
        $attributes = Request::input( 'attributes' );

        if (empty(array_filter( $attributes ))) $this->setDefaults(); // no values in arrayd
        else
            $ids =  Product::listFrontEnd( $attributes, $categoryId )->pluck('id')->all();

        $this->brands = Brand::ordered()->with(['products'=> function( $query ) use ( $ids){
            $query->whereIn( 'id',$ids );
        }])->get(  );

    }

    protected function setDefaults(  ){
        $slug = $this->param('slug');
        if (!$slug)
            $category = Category::published()->first();
        else $category = Category::findBySlug( $slug );

        if ($category) {
            $this->products = $category->products()->get();
            $this->categoryId = $category->id;
            $this->category = $category;
        }
    }

}