<?php

namespace App\DataTables;

use App\Ledger;
use App\Supplier;
use App\User;
//use http\Env\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class SupplierDataTablesEditor extends DataTablesEditor
{
    protected $model = Supplier::class;

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
//        $ledger=Ledger::where('person_id','=',$model->id)->where('person_type','=','supplier')->where('description','<>','New Supplier was Registered with an Opening amount of '.$model->opening_blance.'.')->get()->last()
//        return [$model];
//        if ($ledger->isEpmty()){
        return [];
//        }
    }
    public function deleting(Model $model){
//        Log::debug();
        $ledger=Ledger::where('person_id','=',$model->id)->where('person_type','=','supplier')->where('description','<>','New Supplier was Registered with an Opening amount of '.$model->opening_blance.'.')->get()->last();
        if ($ledger){
            return false;
        }else{
            return true;
        }
    }
}
