<?php

return [
    'plugin' => [
        'name' => 'Products',
        'description' => 'Create and manage products on site',
    ],
    'permissions' => [
        'some_permission' => 'Permission example',
        'manage_products' => 'depcore.products::lang.permissions.manage_products',
    ],
    'attribute' => [
        'new' => 'New Attribute',
        'label' => 'Attribute',
        'create_title' => 'Create Attribute',
        'update_title' => 'Edit Attribute',
        'preview_title' => 'Preview Attribute',
        'list_title' => 'Manage Attributes',
    ],
    'attributes' => [
        'delete_selected_confirm' => 'Delete the selected Attributes?',
        'menu_label' => 'Attributes',
        'return_to_list' => 'Return to Attributes',
        'delete_confirm' => 'Do you really want to delete this Attribute?',
        'delete_selected_success' => 'Successfully deleted the selected Attributes.',
        'delete_selected_empty' => 'There are no selected Attributes to delete.',
        'name' => [
            'label' => 'depcore.products::lang.attributes.name.label',
            'required' => 'depcore.products::lang.attributes.name.required',
        ],
        'is_filterable' => 'depcore.products::lang.attributes.is_filterable',
        'is_published' => 'depcore.products::lang.attributes.is_published',
    ],
    'product' => [
        'new' => 'New Product',
        'label' => 'Product',
        'create_title' => 'Create Product',
        'update_title' => 'Edit Product',
        'preview_title' => 'Preview Product',
        'list_title' => 'Manage Products',
        'name' => [
            'label' => 'depcore.products::lang.product.name.label',
            'required' => 'depcore.products::lang.product.name.required',
        ],
        'labels' => [
            'slug' => 'depcore.products::lang.product.labels.slug',
        ],
        'logo' => [
            'label' => 'depcore.products::lang.product.logo.label',
        ],
        'color' => [
            'label' => 'depcore.products::lang.product.color.label',
        ],
        'cover' => 'depcore.products::lang.product.cover',
        'tabs' => [
            'media' => 'depcore.products::lang.product.tabs.media',
        ],
        'images' => 'depcore.products::lang.product.images',
        'is_published' => 'depcore.products::lang.product.is_published',
        'brand' => [
            'required' => 'depcore.products::lang.product.brand.required',
        ],
        'category' => [
            'required' => 'depcore.products::lang.product.category.required',
        ],
    ],
    'products' => [
        'delete_selected_confirm' => 'Delete the selected Products?',
        'menu_label' => 'Products',
        'return_to_list' => 'Return to Products',
        'delete_confirm' => 'Do you really want to delete this Product?',
        'delete_selected_success' => 'Successfully deleted the selected Products.',
        'delete_selected_empty' => 'There are no selected Products to delete.',
        'import' => 'depcore.products::lang.products.import',
        'name' => [
            'description' => 'depcore.products::lang.products.name.description',
        ],
        'counter_label' => 'depcore.products::lang.products.counter_label',
    ],
    'category' => [
        'new' => 'New Category',
        'label' => 'Category',
        'create_title' => 'Create Category',
        'update_title' => 'Edit Category',
        'preview_title' => 'Preview Category',
        'list_title' => 'Manage Categories',
        'import' => 'depcore.products::lang.category.import',
        'export' => 'depcore.products::lang.category.export',
        'id' => 'depcore.products::lang.category.id',
        'description' => 'depcore.products::lang.category.description',
        'short_description' => 'depcore.products::lang.category.short_description',
        'name' => 'depcore.products::lang.category.name',
        'cover' => 'depcore.products::lang.category.cover',
        'is_published' => 'depcore.products::lang.category.is_published',
    ],
    'categories' => [
        'delete_selected_confirm' => 'Delete the selected Categories?',
        'menu_label' => 'Categories',
        'return_to_list' => 'Return to Categories',
        'delete_confirm' => 'Do you really want to delete this Category?',
        'delete_selected_success' => 'Successfully deleted the selected Categories.',
        'delete_selected_empty' => 'There are no selected Categories to delete.',
        'name' => [
            'required' => 'depcore.products::lang.categories.name.required',
            'max' => 'depcore.products::lang.categories.name.max',
        ],
    ],
    'brand' => [
        'new' => 'New Brand',
        'label' => 'Brand',
        'create_title' => 'Create Brand',
        'update_title' => 'Edit Brand',
        'preview_title' => 'Preview Brand',
        'list_title' => 'Manage Brands',
        'name' => [
            'required' => 'depcore.products::lang.brand.name.required',
            'max' => 'depcore.products::lang.brand.name.max',
        ],
    ],
    'brands' => [
        'delete_selected_confirm' => 'Delete the selected Brands?',
        'menu_label' => 'Brands',
        'return_to_list' => 'Return to Brands',
        'delete_confirm' => 'Do you really want to delete this Brand?',
        'delete_selected_success' => 'Successfully deleted the selected Brands.',
        'delete_selected_empty' => 'There are no selected Brands to delete.',
    ],
    'components' => [
        'categorieslist' => [
            'name' => 'CategoriesList Component',
            'description' => 'No description provided yet...',
        ],
        'productslist' => [
            'name' => 'ProductsList Component',
            'description' => 'No description provided yet...',
            'no_results_found' => [
                'title' => 'depcore.products::lang.components.productslist.no_results_found.title',
                'description' => 'depcore.products::lang.components.productslist.no_results_found.description',
                'placeholder' => 'depcore.products::lang.components.productslist.no_results_found.placeholder',
            ],
        ],
        'svgicons' => [
            'name' => 'SvgIcons Component',
            'description' => 'No description provided yet...',
        ],
        'brandslist' => [
            'name' => 'BrandsList Component',
            'description' => 'No description provided yet...',
        ],
    ],
    'values' => [
        'label' => 'depcore.products::lang.values.label',
        'menu_label' => 'depcore.products::lang.values.menu_label',
        'value' => [
            'label' => 'depcore.products::lang.values.value.label',
        ],
    ],
    'svgicon' => [
        'label' => 'depcore.products::lang.svgicon.label',
        'description' => 'depcore.products::lang.svgicon.description',
        'code' => 'depcore.products::lang.svgicon.code',
        'symbol' => 'depcore.products::lang.svgicon.symbol',
        'viewport' => 'depcore.products::lang.svgicon.viewport',
        'symbol_required' => 'depcore.products::lang.svgicon.symbol_required',
        'symbol_max' => 'depcore.products::lang.svgicon.symbol_max',
        'symbol_unique' => 'depcore.products::lang.svgicon.symbol_unique',
        'viewport_required' => 'depcore.products::lang.svgicon.viewport_required',
        'viewport_max' => 'depcore.products::lang.svgicon.viewport_max',
        'viewport_min' => 'depcore.products::lang.svgicon.viewport_min',
        'code_required' => 'depcore.products::lang.svgicon.code_required',
    ],
    'value' => [
        'label' => 'depcore.products::lang.value.label',
        'name' => [
            'label' => 'depcore.products::lang.value.name.label',
        ],
        'value' => [
            'required' => 'depcore.products::lang.value.value.required',
        ],
    ],
    'labels' => [
        'slug' => 'depcore.products::lang.labels.slug',
    ],
    'global' => [
        'no' => 'depcore.products::lang.global.no',
        'yes' => 'depcore.products::lang.global.yes',
    ],
];