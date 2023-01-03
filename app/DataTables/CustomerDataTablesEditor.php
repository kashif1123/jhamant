<?php

namespace App\DataTables;

use App\Customer;
use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class CustomerDataTablesEditor extends DataTablesEditor
{
    protected $model = Customer::class;
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
            'name'  => 'sometimes|required',
            'cnic'  => 'sometimes|required',
            'address'  => 'sometimes|required',
            'opening_balance'  => 'sometimes|required',
            'registration_date'  => 'sometimes|required',
            'type'  => 'sometimes|required',
            'description'  => 'sometimes|required',
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
