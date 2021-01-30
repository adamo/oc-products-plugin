<?php namespace Depcore\Products\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;
use Depcore\Products\Models\Product;
use Depcore\Products\Models\Value;

/**
 * Products Back-end Controller
 */
class Products extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ReorderController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Depcore.Products', 'products', 'products');
    }

    /**
     * Deleted checked products.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $productId) {
                if (!$product = product::find($productId)) continue;
                $product->delete();
            }

            Flash::success(Lang::get('depcore.products::lang.products.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('depcore.products::lang.products.delete_selected_empty'));
        }

        return $this->listRefresh();
    }

    public function onRelationManagePivotForm()
    {
        $this->beforeAjax();

        $this->vars['value_id'] = $this->foreignId ?: post('checked');

        return $this->relationMakePartial('pivot_form');
    }

    // public function onRelationManagePivotCreate()
    // {
    //     $sessionKey = $this->relationGetSessionKey();
    //     $fid = post('value_id', 0);

    // }

    public static function getProductsCount(  ){
        return Product::all(  )->count(  );
    }
}
