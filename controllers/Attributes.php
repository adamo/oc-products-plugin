<?php namespace Depcore\Products\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;
use Depcore\Products\Models\attribute;

/**
 * Attributes Back-end Controller
 */
class Attributes extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend\Behaviors\RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Depcore.Products', 'products', 'attributes');
    }

    /**
     * Deleted checked attributes.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $attributeId) {
                if (!$attribute = attribute::find($attributeId)) continue;
                $attribute->delete();
            }

            Flash::success(Lang::get('depcore.products::lang.attributes.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('depcore.products::lang.attributes.delete_selected_empty'));
        }

        return $this->listRefresh();
    }

    // public function onReorderRelation($id)
    // {
    //     $records = Request::input('rcd');
    //     if ( $records and $id)
    //     {
    //         $product = Product::find( $id );

    //         foreach ($records as $order => $id) {
    //             $product->series()->updateExistingPivot($id, ['series_sort_order' => $order]);
    //         }
    //     }
    // }
}
