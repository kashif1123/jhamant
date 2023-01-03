<?php

namespace App\DataTables;

use App\BankAccount;
use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class BankAccountDataTablesEditor extends DataTablesEditor
{
    protected $model = BankAccount::class;

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
            'branch_name'  => 'sometimes|required',
            'branch_code'  => 'sometimes|required',
            'contact'  => 'sometimes|required',
            'account'  => 'sometimes|required',
            'opening_balance'  => 'sometimes|required',
            'current_balance'  => 'sometimes|required',
            'registration_date'  => 'sometimes|required',
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
