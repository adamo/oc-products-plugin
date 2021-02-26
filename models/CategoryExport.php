<?php namespace Depcore\Products\Models;

class CategoryExport extends \Backend\Models\ExportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
	public function exportData($columns, $sessionKey = null)
    {
        $categorys = Category::all();
        $categorys->each(function($category) use ($columns) {
            $category->addVisible($columns);
        });
        return $categorys->toArray();
    }
}