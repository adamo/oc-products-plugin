<?php namespace Depcore\Products\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;
use Depcore\Products\Models\brand;

/**
 * Brands Back-end Controller
 */
class Brands extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend\Behaviors\RelationController',
        'Backend\Behaviors\ReorderController',

    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Depcore.Products', 'products', 'brands');
    }

    /**
     * Deleted checked brands.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $brandId) {
                if (!$brand = brand::find($brandId)) continue;
                $brand->delete();
            }

            Flash::success(Lang::get('depcore.products::lang.brands.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('depcore.products::lang.brands.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}
