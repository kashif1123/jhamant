<?php

use App\UserPermissions;
use Illuminate\Database\Seeder;

class initialization extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new \App\User();
        $admin->name='admin';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('admin123');
        $admin->save();
        $permissions= new UserPermissions();
        $permissions->user_id=$admin->id;
        $permissions->access_type='standard';
        $permissions->standard_dashboard='true';
        $permissions->standard_sale='true';
        $permissions->standard_product='true';
        $permissions->standard_account='true';
        $permissions->standard_pay_receive='true';
        $permissions->standard_purchase_sale='true';
        $permissions->standard_expenses='true';
        $permissions->standard_ledger='true';
        $permissions->standard_day_close='true';
        $permissions->standard_month_close='true';
        $permissions->standard_reports='true';
        $permissions->save();
        $date=date("Y/m/d");
        $walk_in= new \App\Customer();
        $walk_in->name='Walk-In';
        $walk_in->opening_balance='0';
        $walk_in->registration_date=$date;
        $walk_in->description='Walk_in Customer';
        $walk_in->save();
        $ledger=new \App\Ledger();
        $ledger->person_type='customer';
        $ledger->person_id=$walk_in->id;
        $ledger->person_name=$walk_in->name;
//        $ledger->cnic=$walk_in->cnic;
        $ledger->date=date('Y-m-d H:i:s');
        $ledger->description='This is the default Walk-In account';
        $ledger->debit=0;
        $ledger->balance=0;
        $ledger->save();
//        $category= new \App\Category();
//        $category->name="Main";
//        $category->description="Default Category";
//        $category->save();
//        $company=new \App\Company();
//        $company->company_name="Main";
//        $company->description="Default Company";
//        $company->save();
//        $product= new \App\Product();
//        $product->name="Super";
//        $product->category_id=$category->id;
//        $product->company_id=$company->id;
//        $product->total_qty=0;
//        $product->description="This is one of the main Product ";
//        $product->save();
//        $product2= new \App\Product();
//        $product2->name="Diesel";
//        $product2->category_id=$category->id;
//        $product2->company_id=$company->id;
//        $product2->total_qty=0;
//        $product2->description="This is one of the main Product ";
//        $product2->save();
        $setting= new \App\Credential();
        $setting->company_name="Shareef Hotel";
        $setting->designation="Mr";
        $setting->owner_name="Jhon Wick";
        $setting->phone1="0000-0000000";
        $setting->phone2="0000-0000000";
        $setting->phone3="0000-0000000";
        $setting->address="Your Address goes here";
        $setting->save();


//        $cash=new BankAccount();
//        $cash->branch_name='Cash in Hand';
    }
}
