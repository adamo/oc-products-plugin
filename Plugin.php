<?php namespace Depcore\Products;

use Backend;
use System\Classes\PluginBase;

/**
 * products Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'depcore.products::lang.plugin.name',
            'description' => 'depcore.products::lang.plugin.description',
            'author'      => 'depcore',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Depcore\Products\Components\CategoriesList' => 'categoriesList',
            'Depcore\Products\Components\ProductsList' => 'productsList',
            'Depcore\Products\Components\SvgIcons' => 'svgIcons',
            'Depcore\Products\Components\BrandsList' => 'brandsList',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'depcore.products.manage_products' => [
                'tab' => 'depcore.products::lang.plugin.name',
                'label' => 'depcore.products::lang.permissions.manage_products'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'products' => [
                'label'       => 'depcore.products::lang.plugin.name',
                'url'         => Backend::url('depcore/products/products'),
                'icon'        => 'icon-th-list',
                'permissions' => ['depcore.products.*'],
                'order'       => 500,
                'sideMenu' => [
                    'products' => [
                        'label'       => 'depcore.products::lang.products.menu_label',
                        'icon'        => 'icon-th-list',
                        'url'         => Backend::url('depcore/products/products'),
                        'counter'     => ['\Depcore\Products\Controllers\Products', 'getProductsCount'],
                        'counterLabel'=> 'depcore.products::lang.products.counter_label',
                        'permissions' => ['depcore.products.manage_products'],
                    ],
                    'addProduct' => [
                        'label'       => 'depcore.products::lang.product.create_title',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('depcore/products/products/create'),
                        'permissions' => ['depcore.products.manage_products'],
                    ],
                    'categories' => [
                        'label' => 'depcore.products::lang.categories.menu_label',
                        'icon' => 'icon-list',
                        'url' => Backend::url('depcore/products/categories'),
                    ],
                    'brands' => [
                        'label' => 'depcore.products::lang.brands.menu_label',
                        'icon' => 'icon-list',
                        'url' => Backend::url('depcore/products/brands'),
                    ],
                    'attributes' => [
                        'label' => 'depcore.products::lang.attributes.menu_label',
                        'icon' => 'icon-table',
                        'url' => Backend::url('depcore/products/attributes'),
                    ],
                ], // side menu ends
            ],
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'svgicon' => [$this, 'generateSvgIconTag'],
            ],

        ];
    }

    /**
     * Return formated svg iconn tag
     *
     * @return string
     * @author Adam
     **/
    public function generateSvgIconTag($icon)
    {
        return "<svg width='{$icon->width()}' height='{$icon->height()}' viewBox='0 0 {$icon->width()} {$icon->height()}'><use xlink:href='#{$icon->symbol}'></use></svg>";
    }

}
