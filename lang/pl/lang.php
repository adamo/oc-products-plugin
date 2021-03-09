<?php

return [
    'attribute' => [
        'label' => 'Produkty',
        'create_title' => 'Utwórz produkt',
        'update_title' => 'Zaktualizuj produkt',
        'preview_title' => 'Podjerzyj produkt',
        'list_title' => 'Atrybuty',
        'new' => 'Nowy produkt',
    ],
    'values' => [
        'label' => 'Wartość',
        'menu_label' => 'Wartości',
        'value' => [
            'label' => 'Wartość',
        ],
    ],
    'svgicon' => [
        'label' => 'Ikona',
        'description' => '',
        'code' => 'Kod ikony',
        'symbol' => 'Symbol',
        'viewport' => 'Atrybut viewbox',
        'symbol_required' => 'Pole  symbol jest wymagane',
        'symbol_max' => 'depcore.products::lang.svgicon.symbol_max',
        'symbol_unique' => 'Symbol musi mieć unikatowe oznaczenie, takie już jest w systemie',
        'viewport_required' => 'Pole viewbox jest wymagane',
        'viewport_max' => 'depcore.products::lang.svgicon.viewport_max',
        'viewport_min' => 'depcore.products::lang.svgicon.viewport_min',
        'code_required' => 'Kod SVG jest wymagany',
    ],
    'attributes' => [
        'menu_label' => 'Atrybuty',
        'return_to_list' => 'Powrót do listy',
        'delete_confirm' => 'Na pewno usunąć atrybut?',
        'delete_selected_confirm' => 'Na pewno usunąć zaznaczone atrybuty?',
        'delete_selected_success' => 'Pomyślnie usunięto atrybut',
        'delete_selected_empty' => 'Proszę wybrać atrybuty',
        'name' => [
            'label' => 'Nazwa atrybutu',
            'required' => 'Nazwa atrybutu jest polem wymaganym',
        ],
        'is_filterable' => 'Do filtrowania',
        'is_published' => 'Opublikowany',
    ],
    'brand' => [
        'label' => 'Marka',
        'create_title' => 'Utwórz markę',
        'update_title' => 'Zaktualizuj markę',
        'preview_title' => 'Podgląd marki',
        'list_title' => 'List marek',
        'new' => 'Nowa marka',
        'name' => [
            'required' => 'Nazwa marki',
            'max' => 'Maksymalna wartość',
        ],
    ],
    'brands' => [
        'menu_label' => 'Marki',
        'return_to_list' => 'Powrót do listy marek',
        'delete_confirm' => 'Usunąć markę?',
        'delete_selected_confirm' => 'Na pewno usunąć zaznaczone marki?',
        'delete_selected_success' => 'Pomyślnie usunięto marki',
        'delete_selected_empty' => 'Proszę zaznaczyć marki',
    ],
    'category' => [
        'label' => 'Kategoria',
        'create_title' => 'Utwórz kategorię',
        'update_title' => 'Zaktualizuj kategorię',
        'preview_title' => 'Podgląd kategorii',
        'import' => 'Import kategorii',
        'export' => 'Eksport kategorii',
        'list_title' => 'Lista kategorii',
        'new' => 'Nowa kategoria',
        'id' => 'Id',
        'description' => 'Opis',
        'short_description' => 'Krótki opis',
        'name' => 'Nazwa',
        'cover' => 'Okładka',
        'is_published' => 'Opublikuj',
    ],
    'categories' => [
        'menu_label' => 'Kategorie',
        'return_to_list' => 'Powrót do listy kategorii',
        'delete_confirm' => 'Usunąć kategorię?',
        'delete_selected_confirm' => 'Na pewno usunąć zaznaczone kategorie?',
        'delete_selected_success' => 'Pomyślnie usunięto kategorie',
        'delete_selected_empty' => 'Proszę zaznaczyć kategorie',
        'name' => [
            'required' => 'Nazwa marki jest wymagana',
            'max' => 'Za długa nazwa ',
        ],
    ],
    'product' => [
        'label' => 'Produkt',
        'create_title' => 'Utwórz produkt',
        'update_title' => 'Zaktualizuj produkt',
        'preview_title' => 'Podgląd produktu',
        'list_title' => 'Lista produktów',
        'new' => 'Nowy produkt',
        'name' => [
            'label' => 'Nazwa',
            'required' => 'Nazwa jest wymaganym polem',
        ],
        'labels' => [
            'slug' => 'alias',
        ],
        'logo' => [
            'label' => 'Logo',
        ],
        'color' => [
            'label' => 'Kolor',
        ],
        'cover' => 'Okładka',
        'tabs' => [
            'media' => 'Media',
        ],
        'images' => 'Zdjęcia',
        'is_published' => 'Opublikować?',
        'brand' => [
            'required' => 'Proszę wybrać markę',
        ],
        'category' => [
            'required' => 'Proszę wybrać kategorię',
        ],
    ],
    'products' => [
        'import' => 'Import produktów',
        'menu_label' => 'Produkty',
        'return_to_list' => 'Powrót do listy produktów',
        'delete_confirm' => 'Usunąć produkt?',
        'delete_selected_confirm' => 'Na pewno usunąć zaznaczone produkty?',
        'delete_selected_success' => 'Pomyślnie usunięto produkty',
        'delete_selected_empty' => 'Proszę zaznaczyć produkty do usunięcia',
        'name' => [
            'description' => 'Nazwa produktu',
        ],
        'counter_label' => 'Ilość produktów w bazie',
    ],
    'value' => [
        'label' => 'Wartość',
        'name' => [
            'label' => 'Nazwa',
        ],
        'value' => [
            'required' => 'Wartość jest polem wymaganym',
        ],
    ],
    'components' => [
        'categorieslist' => [
            'name' => 'Lista kategorii',
            'description' => 'Pokazuje listę kategorii które powiadają produkty zawartych w systemie zgodnie z ich sortowaniem.',
        ],
        'productslist' => [
            'name' => 'Lista produktów',
            'description' => 'Pokazuje listę produktów wraz z filtrowaniem',
            'no_results_found' => [
                'title' => 'Brak wyników',
                'description' => 'Treść umieszczona w przypadku braku wyników',
                'placeholder' => 'wpisz treść',
            ],
            'show_featured_image' => [
                'title' => 'depcore.products::lang.components.productslist.show_featured_image.title',
                'description' => 'depcore.products::lang.components.productslist.show_featured_image.description',
            ],
            'featured_image_position' => [
                'title' => 'depcore.products::lang.components.productslist.featured_image_position.title',
                'description' => 'depcore.products::lang.components.productslist.featured_image_position.description',
                'top' => 'depcore.products::lang.components.productslist.featured_image_position.top',
                'bottom' => 'depcore.products::lang.components.productslist.featured_image_position.bottom',
            ],
        ],
        'svgicons' => [
            'name' => 'Ikony SVG',
            'description' => 'Pozwala umieścić na stronie generator symboli dla ikon SVG które można używać w całym szablonie za pomocą svg use',
        ],
        'brandslist' => [
            'name' => 'Komponent BrandsList',
            'description' => 'Nie dodano opisu',
        ],
        'productlist' => [
            'show_featured_product' => [
                'title' => 'depcore.products::lang.components.productlist.show_featured_product.title',
                'description' => 'depcore.products::lang.components.productlist.show_featured_product.description',
            ],
        ],
        'svgs' => [
            'name' => 'Komponent Svgs',
            'description' => 'Nie dodano opisu',
        ],
    ],
    'labels' => [
        'slug' => 'Alias',
    ],
    'global' => [
        'no' => 'Nie',
        'yes' => 'Tak',
    ],
    'plugin' => [
        'name' => 'Produkty',
        'description' => 'Prosty sytem zarządzania produktami',
    ],
    'permissions' => [
        'manage_products' => 'Zarządzanie produktami',
    ],
];