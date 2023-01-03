<?php

namespace App\DataTables;

use App\CustomerInvoice;
use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoiceDataTablesEditor extends DataTablesEditor
{
    protected $model = CustomerInvoice::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'email' => 'required|email|unique:users',
            'name'  => 'required',
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
            'invoice'  => 'sometimes|required',
            'total'  => 'sometimes|required',
            'date'  => 'sometimes|required',
            'paid'  => 'sometimes|required',
            'due'  => 'sometimes|required',
            'discount'  => 'sometimes|required',
            'grand_total'  => 'sometimes|required',
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
