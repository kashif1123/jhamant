<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'role' ], function() {
        Route::get('reset_software_page','RestController@reset_software_page')->name('Reset Software');
        Route::post('post_reset','RestController@post_reset');
        Route::get('get_categories_for_products', 'ProductController@get_categories_for_products');
        Route::get('get_companies_for_products', 'ProductController@get_companies_for_products');
        Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'product'], function () {
        Route::get('/newproduct', 'ProductController@newproduct');
        Route::get('/allcategories', 'ProductController@allcategories');
        Route::get('/allcompany', 'ProductController@allcompany');
        Route::get('/allproducts', 'ProductController@allproducts');
        Route::get('/product_sale', 'ProductController@product_sale');
        Route::post('/fetch_sale_type_items', 'ProductController@fetch_sale_type_items');
        Route::post('/insert_sale', 'ProductController@insert_sale');
        Route::post('/insert_new_product', 'ProductController@insert_new_product');
        Route::post('/insert_new_product_modal', 'ProductController@insert_new_product_modal');
        Route::post('/insert_new_category', 'ProductController@insert_new_category');
        Route::post('/fetch_categories', 'ProductController@fetch_categories');
        Route::get('/getchartdata', 'DashboardController@getChartData');
        Route::post('/insert_new_unit', 'ProductController@insert_new_unit');

        //datatables
        Route::get('/dtgetcategory', 'ProductController@dtgetcategory');
        Route::get('/dtgetcompany', 'ProductController@dtgetcompany');
        Route::post('/dtpostcategory', 'ProductController@dtpostcategory');
        Route::post('/dtpostcompany', 'ProductController@dtpostcompany');

        Route::get('/dtgetshowproducts', 'ProductController@dtgetshowproducts');
        Route::post('/dtpostshowproducts', 'ProductController@dtpostshowproducts');
        Route::post('/insert_new_company', 'ProductController@insert_new_company');
    });
    Route::group(['prefix' => 'expense'], function () {
        Route::get('/expense', 'ExpenseController@expense');
        Route::get('/showexpenses', 'ExpenseController@showexpenses');
        Route::post('/insert_new_expensehead', 'ExpenseController@insert_new_expensehead');
        Route::post('/fetch_account_balance', 'ExpenseController@fetch_account_balance');
        Route::post('/insert_new_expensedetail', 'ExpenseController@insert_new_expensedetail');
        Route::get('/dtgetexpensedetails', 'ExpenseController@dtgetexpensedetails');
        Route::post('/dtpostexpensedetail', 'ExpenseController@dtpostexpensedetail');
        Route::get('/dtgetexpensebydatedetails', 'ExpenseController@dtgetexpensebydatedetails');


        Route::get('/showexpenseheads', 'ExpenseController@showexpenseheads');
        Route::get('/dtgetexpenseheads', 'ExpenseController@dtgetexpenseheads');
        Route::post('/dtpostexpenseheads', 'ExpenseController@dtpostexpenseheads');
        Route::get('/dtgetexpenseheadsbydate', 'ExpenseController@dtgetexpenseheadsbydate');
    });
    Route::group(['prefix' => 'dispose'], function () {
        Route::get('/dispose', 'DipController@newdispose');
        Route::post('/fetch_prev_data', 'DipController@fetch_prev_data');
        Route::post('/insert_new_dispose', 'DipController@insert_new_dispose');
        Route::get('/dispose_report', 'DipController@dispose_report');
        Route::get('/dtgetshowdispose', 'DipController@dtgetshowdispose');
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/newsupplier', 'SupplierController@newsupplier');
        Route::get('/allsupplier', 'SupplierController@allsupplier');
        Route::get('/allmunshi', 'SupplierController@allmunshi');
        Route::get('/allowners', 'SupplierController@allowners');
        Route::get('/allemployees', 'SupplierController@allemployees');
        Route::get('/allcustomer', 'SupplierController@allcustomer');
        Route::get('/suppliercontacts', 'SupplierController@suppliercontacts');
        Route::get('/customercontacts', 'SupplierController@customercontacts');
        Route::post('/insert_new_supplier', 'SupplierController@insert_new_supplier');
        Route::post('/delete_supplier', 'SupplierController@delete_supplier');
        Route::post('/delete_customer', 'SupplierController@delete_customer');
        Route::post('/delete_munshi', 'SupplierController@delete_munshi');
        Route::post('/delete_employee', 'SupplierController@delete_employee');

        Route::get('/dtgetshowsupplier', 'SupplierController@dtgetshowsupplier');
        Route::get('/dtget_s_contacts', 'SupplierController@dtget_s_contacts');
        Route::get('/dtget_c_contacts', 'SupplierController@dtget_c_contacts');
        Route::get('/dtget_m_contacts', 'SupplierController@dtget_m_contacts');
        Route::get('/dtget_e_contacts', 'SupplierController@dtget_e_contacts');
        Route::get('/dtget_o_contacts', 'SupplierController@dtget_o_contacts');
        Route::get('/dtgetshowsuppliercontacts', 'SupplierController@dtgetshowsuppliercontacts');
        Route::post('/dtpostshowsupplier', 'SupplierController@dtpostshowsupplier');
        Route::post('/dtpost_s_contacts', 'SupplierController@dtpost_s_contacts');
        Route::post('/dtpost_c_contacts', 'SupplierController@dtpost_c_contacts');
        Route::post('/dtpost_e_contacts', 'SupplierController@dtpost_e_contacts');
        Route::post('/dtposteditemployee', 'SupplierController@dtposteditemployee');
        Route::get('/dtgetshowcustomers', 'SupplierController@dtgetshowcustomers');
        Route::get('/dtgetshowmunshis', 'SupplierController@dtgetshowmunshis');
        Route::get('/dtgetshowemployees', 'SupplierController@dtgetshowemployees');
        Route::get('/dtgetshowowners', 'SupplierController@dtgetshowowners');
        Route::post('/dtpostshowcustomers', 'SupplierController@dtpostshowcustomers');
        Route::get('/dtgetshowsupplierinvoices_date', 'SupplierController@dtgetshowsupplierinvoices_date');
        Route::get('/dtgetshowcustomerinvoices_date', 'SupplierController@dtgetshowcustomerinvoices_date');

        Route::get('/supplierinvoices', 'SupplierController@supplierinvoices');
        Route::get('/dtgetshowsupplierinvoices', 'SupplierController@dtgetshowsupplierinvoices');


        Route::get('/customerinvoices', 'SupplierController@customerinvoices');
        Route::get('/dtgetshowcustomerinvoices', 'SupplierController@dtgetshowcustomerinvoices');

    });
    Route::group(['prefix'=>'user'], function (){
        Route::get('/newuser', 'UserController@newUser');
        Route::get('/allusers', 'UserController@allusers');
        Route::post('/insert_new_user', 'UserController@insert_new_user');
        Route::get('/dtgetshowuser', 'UserController@dtgetshowuser');
    });
    Route::group(['prefix' => 'balance'], function () {
        Route::get('/supplierbalance', 'BalanceController@supplierbalance');
        Route::get('/customerbalance', 'BalanceController@customerbalance');
    });
    Route::group(['prefix' => 'dayclose'], function () {
        Route::get('/report', 'DayCloseController@report');
        Route::get('/closeday', 'DayCloseController@closeday');
        Route::post('/databydate', 'DayCloseController@databydate');
    });

    Route::group(['prefix' => 'monthclose'], function () {
        Route::get('/report', 'MonthCloseController@report');
        Route::post('/close_month', 'MonthCloseController@close_month');
        Route::post('/databydate', 'MonthCloseController@databydate');
        Route::get('/mini_monthly_close', 'MonthCloseController@mini_monthly_close');
    });
    Route::group(['prefix' => 'profit_reconciliation'], function () {
        Route::get('/', 'ProfitController@index');
        Route::post('/fetch_month_profit', 'ProfitController@fetch_month_profit');
        Route::post('/fetch_owner_balance', 'ProfitController@fetch_owner_balance');
        Route::post('/databydate', 'MonthCloseController@databydate');
        Route::post('/close_month_and_reconcile_profit', 'ProfitController@close_month_and_reconcile_profit');
        Route::get('/profit_reconciliation_report', 'ProfitController@profit_report');
        Route::get('/dt_get_all_reconciliations', 'ProfitController@dt_get_all_reconciliations');
    });

    Route::group(['prefix' => 'sms'], function () {
        Route::get('/sms_management', 'sms_management@index');
        Route::post('/insert_new_contact_number', 'sms_management@insert_new_contact_number');
        Route::post('/sendsms', 'sms_management@sendsms');
    });
    Route::group(['prefix' => 'bank'], function () {
        Route::get('/newbank', 'BankController@newbank');
        Route::get('/accounttopup', 'BankController@accounttopup');
        Route::get('/topupreport', 'BankController@topupreport');
        Route::get('/allbank', 'BankController@allbank');
        Route::post('/insert_newbank', 'BankController@insert_newbank');
        Route::post('/topup', 'BankController@topup');
        Route::get('/dtgetshowbank', 'BankController@dtgetshowbank');
        Route::post('/dtpostshowbank', 'BankController@dtpostshowbank');

        Route::get('/dtgettopup', 'BankController@dtgettopup');
        Route::get('/dtgetshowtopup_date', 'BankController@dtgetshowtopup_date');
        Route::post('/dtposttopup', 'BankController@dtposttopup');



        Route::get('/transfermoney', 'BankController@transfermoney');
        Route::get('/transfermoneyreport', 'BankController@transfermoneyreport');
        Route::post('/posttransfer', 'BankController@postTransfer');
        Route::get('/dtgettransferreport', 'BankController@dtgettransferreport');


    });
    Route::group(['prefix' => 'ledger'], function () {
        Route::get('/ledger1', 'LedgerController@ledger');
        Route::get('/dtgetledgerr', 'LedgerController@dtgetledgerr');
        Route::get('/dtgetledgerbydatedetails', 'LedgerController@dtgetledgerbydatedetails');
        Route::get('/delete_last_entry', 'LedgerController@delete_last_entry');
        Route::post('/dtpostledger', 'LedgerController@dtpostledger');
    });
    Route::group(['prefix' => 'b-ledger'], function () {
        Route::get('/ledger1', 'BankLedgerController@ledger');
        Route::get('/dtgetledgerr', 'BankLedgerController@dtgetledgerr');
        Route::get('/dtgetledgerbydatedetails', 'BankLedgerController@dtgetledgerbydatedetails');
        Route::get('/delete_last_entry', 'BankLedgerController@delete_last_entry');
        Route::post('/dtpostledger', 'BankLedgerController@dtpostledger');
    });
    Route::group(['prefix' => 'purchase'], function () {
        Route::get('/purchaseproduct', 'PurchaseController@purchaseproduct');
        Route::get('/returnpurchase', 'PurchaseController@returnpurchase');
        Route::get('/purchase_return_report', 'PurchaseController@purchase_return_report');
        Route::get('/return_sale_report', 'PurchaseController@sale_return_report');
        Route::get('/returnsale', 'PurchaseController@returnsale');
        Route::post('/return_qty', 'PurchaseController@return_qty');
        Route::post('/get_returned_qty_sale', 'PurchaseController@get_returned_qty_sale');
        Route::post('/post_return_product', 'PurchaseController@post_return_product');
        Route::post('/post_accept_return', 'PurchaseController@post_accept_return');
        Route::get('/dtgetreturnpurchase', 'PurchaseController@dtgetreturnpurchase');
        Route::get('/dtgetreturnsale', 'PurchaseController@dtgetreturnsale');
        Route::get('/dtgetshow_p_return', 'PurchaseController@dtgetshow_p_return');
        Route::get('/dtgetshow_s_return', 'PurchaseController@dtgetshow_s_return');
        Route::post('/bank_balancef', 'PurchaseController@bank_balance');
        Route::post('/randomnumber', 'PurchaseController@randomnumber');
        Route::post('/fetch_product_data', 'PurchaseController@fetch_product_data');
        Route::post('/fetch_supplier_balance', 'PurchaseController@fetch_supplier_balance');
        Route::post('/fetch_account_balance', 'PurchaseController@fetch_account_balance');
        Route::post('/after_product_save', 'PurchaseController@after_product_save');
        Route::get('/allpurchase', 'PurchaseController@allpurchases');
        Route::get('/purchasereport', 'PurchaseController@purchasereport');
        Route::get('/dtgetpurchase_report_subtable', 'PurchaseController@dtgetpurchase_report_subtable');
        Route::get('/dtgetallpurchaseforsuppliers', 'PurchaseController@dtgetallpurchaseforsuppliers');
        Route::get('/dtgetallpurchaseforcustomers', 'PurchaseController@dtgetallpurchaseforcustomers');
        Route::get('/dtgetshowallpurchase', 'PurchaseController@dtgetshowallpurchase');
        Route::post('/postpurchasecart', 'PurchaseController@postpurchasecart');

    });
    Route::group(['prefix' => 'sale'], function () {
//      Route::get('/newproduct','ProductController@newProduct');
        Route::get('/saleproduct', 'SaleController@saleproduct');
        Route::post('/randomnumber', 'SaleController@randomnumber');
        Route::post('/fetch_product_data', 'SaleController@fetch_product_data');
        Route::post('/fetch_available_products', 'SaleController@fetch_available_products');
        Route::post('/fetch_company_products', 'SaleController@fetch_company_products');
        Route::post('/fetch_customer_balance', 'SaleController@fetch_customer_balance');
        Route::post('/fetch_customer_data', 'SaleController@fetch_customer_data');
        Route::post('/fetch_account_balance', 'SaleController@fetch_account_balance');
        Route::post('/fetch_employee_commission', 'SaleController@fetch_employee_commission');
        Route::get('/allsale', 'SaleController@allsale');
        Route::get('/dtgetshowallsale', 'SaleController@dtgetshowallsale');
        Route::post('/postsalecart', 'SaleController@postsalecart');
        Route::get('/salereport', 'SaleController@salereport');
        Route::get('/dtgetallsale_customers', 'SaleController@dtgetallsale_customers');
        Route::get('/dtgetallsale_suppliers', 'SaleController@dtgetallsale_suppliers');
        Route::get('/dtgetsale_report_subtable', 'SaleController@dtgetsale_report_subtable');
        Route::post('/get_reprintdata', 'SaleController@get_reprintdata');
    });
    Route::group(['prefix' => 'pay_receive'], function () {
        //pay amount
        Route::get('/payamount', 'PayReceiveController@payamount');
        Route::get('/allpaiddamounts', 'PayReceiveController@allpaiddamounts');
        Route::post('/fetch_customers', 'PayReceiveController@fetch_customers');
        Route::post('/fetch_suppliers', 'PayReceiveController@fetch_suppliers');
        Route::post('/fetch_munshis', 'PayReceiveController@fetch_munshis');
        Route::post('/fetch_employees', 'PayReceiveController@fetch_employees');
        Route::post('/fetch_owners', 'PayReceiveController@fetch_owners');
        Route::post('/fetch_person_balance', 'PayReceiveController@fetch_person_balance');
        Route::post('/fetch_account_balance', 'SaleController@fetch_account_balance');
        Route::post('/insert_payamount', 'PayReceiveController@insert_payamount');
        Route::post('/dtpostshowallpaid', 'PayReceiveController@dtpostshowallpaid');
        Route::get('/dtgetshowallpaid', 'PayReceiveController@dtgetshowallpaid');
        Route::get('/dtgetshowallpaid2', 'PayReceiveController@dtgetshowallpaid2');
        Route::get('/dtgetshowallpaid3', 'PayReceiveController@dtgetshowallpaid3');
        Route::get('/dtgetshowallpaid4', 'PayReceiveController@dtgetshowallpaid4');
        // Receive Amount
        Route::get('/receiveamount', 'PayReceiveController@receiveamount');
        Route::get('/allreceivedamounts', 'PayReceiveController@allreceivedamounts');
        Route::get('/dtgetshowallreceived2', 'PayReceiveController@dtgetshowallreceived2');
        Route::get('/dtgetshowallreceived3', 'PayReceiveController@dtgetshowallreceived3');
        Route::post('/insert_receiveamont', 'PayReceiveController@insert_receiveamont');
        Route::post('/insert_receiveamount', 'PayReceiveController@insert_receiveamount');
        Route::post('/randomnumber', 'PayReceiveController@randomnumber');
        Route::get('/dtgetshowallreceived', 'PayReceiveController@dtgetshowallreceived');
        Route::post('/dtpostshowallreceived', 'PayReceiveController@dtpostshowallreceived');
        Route::post('/delete_customer_paid', 'PayReceiveController@delete_customer_paid');
        Route::post('/delete_supplier_paid', 'PayReceiveController@delete_supplier_paid');
        Route::post('/delete_employee_paid', 'PayReceiveController@delete_employee_paid');
        Route::post('/delete_owner_paid', 'PayReceiveController@delete_owner_paid');
        Route::post('/delete_customer_received', 'PayReceiveController@delete_customer_received');
        Route::post('/delete_supplier_received', 'PayReceiveController@delete_supplier_received');
        Route::post('/delete_owner_received', 'PayReceiveController@delete_owner_received');

//        salary
        Route::get('/pay_salary', 'SalaryController@paySalary');
        Route::post('/insert_salary', 'SalaryController@insert_salary');
        Route::get('/allpaidsalaries', 'SalaryController@allpaidsalaries');
        Route::get('/dtgetshowallpaidsalaries', 'SalaryController@dtgetshowallpaidsalaries');
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/setting', 'SettingController@setting');
        Route::post('/apply_new_setting', 'SettingController@apply_new_setting');

    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    dd('Storage Link Created Successfully...');
});
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    dd('Cache Configured Successfully...');
});
Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    dd('Cache Cleared Successfully...');
});
Route::get('/route-clear', function () {
    Artisan::call('route:clear');
    dd('Route Cleared Successfully...');
});
Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    dd('View Cleared Successfully...');
});
