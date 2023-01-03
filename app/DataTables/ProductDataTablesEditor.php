<?php

namespace App\DataTables;

use App\Product;
use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class ProductDataTablesEditor extends DataTablesEditor
{
    protected $model = Product::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
//            'email' => 'required|email|unique:users',
            'name'  => 'required',
            'purchase_price'  => 'required',
            'sale_price'  => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
//            'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'name'  => 'sometimes|required',
            'barcode'  => 'sometimes|required',
            'purchase_price'  => 'sometimes|required',
            'sale_price'  => 'sometimes|required',
            'category_id'  => 'sometimes|required',
            'company_id'  => 'sometimes|required',
            'sale_percentage'  => 'sometimes|required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
}
