@extends('mainpages.maindmin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/editor/css/editor.bootstrap.css') }}">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="{{ url('DataTables/datatables.js') }}"></script>
    <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>
    <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>
    <style>
        input:read-only{
            background-color: rgba(158, 158, 158, 0.21) !important;
        }
    </style>
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}
@endsection
@section('content')
    <!-- begin:: Content Head -->
    {{--<div class="kt-subheader   kt-grid__item" id="kt_subheader">--}}
        {{--<div class="kt-container ">--}}
            {{--<div class="kt-subheader__main">--}}

                {{--<h3 class="kt-subheader__title"></h3>--}}

                {{--<span class="kt-subheader__separator kt-subheader__separator--v"></span>--}}

                {{--<span class="kt-subheader__desc">#XRS-45670</span>--}}

                {{--<a href="#" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">--}}
                    {{--Add New--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="kt-subheader__toolbar">--}}
                {{--<div class="kt-subheader__wrapper">--}}
                    {{--<a href="#" class="btn kt-subheader__btn-primary">--}}
                        {{--Actions &nbsp;--}}
                        {{--<!--<i class="flaticon2-calendar-1"></i>-->--}}
                    {{--</a>--}}

                    {{--<a href="#" class="btn kt-subheader__btn-primary btn-icon">--}}
                        {{--<i class="flaticon2-file"></i>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="btn kt-subheader__btn-primary btn-icon">--}}
                        {{--<i class="flaticon-download-1"></i>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="btn kt-subheader__btn-primary btn-icon">--}}
                        {{--<i class="flaticon2-fax"></i>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="btn kt-subheader__btn-primary btn-icon">--}}
                        {{--<i class="flaticon2-settings"></i>--}}
                    {{--</a>--}}

                    {{--<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">--}}
                        {{--<a href="#" class="btn btn-icon"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">--}}
                                {{--<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                                    {{--<polygon id="Shape" points="0 0 24 0 24 24 0 24"/>--}}
                                    {{--<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
                                    {{--<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000"/>--}}
                                {{--</g>--}}
                            {{--</svg>                        <!--<i class="flaticon2-plus"></i>-->--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">--}}
                            {{--<!--begin::Nav-->--}}
                            {{--<ul class="kt-nav">--}}
                                {{--<li class="kt-nav__head">--}}
                                    {{--Export Options:--}}
                                    {{--<i class="flaticon2-correct kt-font-warning" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>--}}
                                {{--</li>--}}
                                {{--<li class="kt-nav__separator"></li>--}}
                                {{--<li class="kt-nav__item">--}}
                                    {{--<a href="#" class="kt-nav__link">--}}
                                        {{--<i class="kt-nav__link-icon flaticon2-drop"></i>--}}
                                        {{--<span class="kt-nav__link-text">Orders</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-nav__item">--}}
                                    {{--<a href="#" class="kt-nav__link">--}}
                                        {{--<i class="kt-nav__link-icon flaticon2-new-email"></i>--}}
                                        {{--<span class="kt-nav__link-text">Members</span>--}}
                                        {{--<span class="kt-nav__link-badge">--}}
                                        {{--<span class="kt-badge kt-badge--brand kt-badge--rounded">15</span>--}}
                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-nav__item">--}}
                                    {{--<a href="#" class="kt-nav__link">--}}
                                        {{--<i class="kt-nav__link-icon flaticon2-calendar-8"></i>--}}
                                        {{--<span class="kt-nav__link-text">Reports</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-nav__item">--}}
                                    {{--<a href="#" class="kt-nav__link">--}}
                                        {{--<i class="kt-nav__link-icon flaticon2-link"></i>--}}
                                        {{--<span class="kt-nav__link-text">Finance</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="kt-nav__separator"></li>--}}
                                {{--<li class="kt-nav__foot">--}}
                                    {{--<a class="btn btn-label-brand btn-bold btn-sm" href="#">More options</a>--}}
                                    {{--<a class="btn btn-clean btn-bold btn-sm kt-hidden" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<!--end::Nav-->--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- end:: Content Head -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Purchase Products</h3>
                            {{--<button type="button" class="kt-margin-l-100 btn btn-primary" data-toggle="modal" data-target="#addproduct">--}}
                                {{--Add Product--}}
                            {{--</button>--}}
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            {{--<a href="#" class="btn btn-clean kt-margin-r-10">--}}
                            {{--<i class="la la-arrow-left"></i>--}}
                            {{--<span class="kt-hidden-mobile">Back</span>--}}
                            {{--</a>--}}
                            <div class="btn-group"><button type=button class=" btn btn-success btn-receive form-control mr-3"  data-toggle="modal" data-target="#addproduct">
                                    <span class="kt-hidden-mobile">Add New  Product</span>
                                </button></div>
                            <div class="btn-group">

                                <button type="button" id="addtocartbtn" class=" px-4 btn btn-brand save">
                                    <i class="la la-check"></i>
                                    <span class="kt-hidden-mobile" id="save">Add to Cart</span>
                                </button>
                                {{--<button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--</button>--}}
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item save">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-reload"></i>
                                                <span class="kt-nav__link-text">Save & continue</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item save">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-power"></i>
                                                <span class="kt-nav__link-text">Save & exit</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item save">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-edit-interface-symbol-of-pencil-tool"></i>
                                                <span class="kt-nav__link-text">Save & edit</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link save">
                                                <i class="kt-nav__link-icon flaticon2-add-1"></i>
                                                <span class="kt-nav__link-text">Save & add new</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        {{--<form class="kt-form" id="kt_form">--}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        {{--<h3 class="kt-section__title kt-section__title-lg">Purchase Info:</h3>--}}
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Supplier Name</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 supplier" id="kt_select2_2" name="param">
                                                            <option value="defaultsupplier" selected disabled>Select a Supplier</option>
                                                            <optgroup label="Suppliers">
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                            @endforeach
                                                            </optgroup>
                                                            <optgroup label="Customers">
                                                                @foreach($customers as $customer)
                                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        <span class="form-text error-alert text-danger" >Please Select a Valid supplier Name.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Invoice No</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="invoice">
                                                    <span class="form-text error-alert text-danger">You entered invalid invoice no.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date of Purchase</label>
                                                    <input type="text" class="form-control dop_dop c_l_o_s_e" style="background-color: white !important;" value="<?php echo date("m/d/Y"); ?>" id="kt_datepicker_1" readonly placeholder="Select date of Purchase"/>
                                                    <span class="form-text error-alert text-danger" >Please select valid date of purchase.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Balance</label>
                                                    <input type="text" class="form-control" readonly id="last_balance">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <div class="input-group" id="name_of_product">
                                                        <select class="form-control kt-select2 product_id" id="kt_select2_7" name="param">
                                                            <option value="default" disabled selected>Select a Product</option>
                                                            @foreach($products as $product)
                                                                <option value="{{$product->id}}">{{$product->name.'. ('.$product->barcode.')'}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger" >Please Select a Valid Product Name.</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <input type="text" readonly class="unit_name form-control" placeholder="Unit">
                                                    <span class="form-text error-alert text-danger">You entered quantity.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="number" min="0" value="1"  class="triggeraddbutton select_qty form-control" id="qty" placeholder="Quantity">
                                                    <span class="form-text error-alert text-danger">You entered quantity.</span>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-2">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Expiry</label>--}}
{{--                                                    <input type="text" readonly style="background-color: white !important;" class="triggeraddbutton c_l_o_s_e product_expiry form-control" id="product_expiry" placeholder="Enter Expiry Date">--}}
{{--                                                    <span class="form-text error-alert text-danger">You entered quantity.</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Purchase Price</label>
                                                    <input type="number" autocomplete="off" class="triggeraddbutton form-control" id="p_price" placeholder="Purchase Price">
                                                    <span class="form-text error-alert text-danger">You entered invalid purchase price.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Sale Price</label>
                                                    <input type="number" autocomplete="off" class="triggeraddbutton form-control" id="s_price" placeholder="Sale Price">
                                                    <span class="form-text error-alert text-danger">You entered invalid sale price.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="box">
                                                {{--<div class="box-header">--}}
                                                {{--<h3 class="box-title">User Report </h3>--}}
                                                {{--</div>--}}
                                                <!-- /.box-header -->
                                                    <div class="box-body" style="overflow-x:auto;border: #5e5e5e solid 1px;border-radius:6px;padding: 40px;">
                                                        <div style="text-align: center"><h3>Your Cart</h3></div>
                                                        <table id="purchase" class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Sr</th>
                                                                <th>Product Name</th>
                                                                <th>Purchase Price</th>
                                                                <th>Sale Price</th>
                                                                <th>Qty</th>
                                                                <th>Total Price</th>
{{--                                                                <th>Expiry Date</th>--}}

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.box-body -->
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <input type="number" class="form-control" id="total" readonly placeholder="Total">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="kt-margin-b-10">
                                                            <label>Discount</label>
                                                            <div class="input-group">
                                                                <input type="number" min="0" class="form-control" id="discount" value="0"  max="100" placeholder="Discount" aria-describedby="basic-addon2"
                                                                       onblur="if(this.value==''){ this.value='0';}"
                                                                       onfocus="if(this.value=='0'){ this.value='';}"
                                                                >
                                                                <div class="input-group-append"><span class="input-group-text" id="basic-addon2" >%</span></div>
                                                            </div>
                                                            <span class="form-text error-alert text-danger">You entered invalid discount percent.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-12">--}}
                                                        {{--<div class="kt-margin-b-10">--}}
                                                            {{--<label>Net Total</label>--}}
                                                            {{--<input type="number" class="form-control" id="nettotal" readonly placeholder="Net Total">--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-6">--}}
                                                        {{--<div class="kt-margin-b-10">--}}
                                                            {{--<label>Wages</label>--}}
                                                            {{--<input type="number" value="0" min="0" autocomplete="off" class="form-control" id="wages" placeholder="Wages"--}}
                                                                   {{--onblur="if(this.value==''){ this.value='0';}"--}}
                                                                   {{--onfocus="if(this.value=='0'){ this.value='';}"--}}
                                                            {{-->--}}
                                                            {{--<span class="form-text error-alert text-danger">You entered invalid amount.</span>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-md-6">--}}
                                                        {{--<div class="kt-margin-b-10">--}}
                                                            {{--<label>Other Expenses</label>--}}
                                                            {{--<input type="number" value="0" min="0" autocomplete="off" class="form-control" id="expenses" placeholder="Expenses"--}}
                                                                   {{--onblur="if(this.value==''){ this.value='0';}"--}}
                                                                   {{--onfocus="if(this.value=='0'){ this.value='';}"--}}
                                                            {{-->--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="kt-margin-b-10">
                                                            <label>Grand Total</label>
                                                            <input type="number" class="form-control" id="grandtotal" readonly placeholder="Grand Total">
                                                            <span class="form-text error-alert text-danger" >Please select valid date of purchase.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="kt-margin-b-10">
                                                            <label>Paying Amount</label>
                                                            <input type="number" min="0" value="0" class="form-control" id="paid" placeholder="Amt Paid"
                                                                   onblur="if(this.value==''){ this.value='0';}"
                                                                   onfocus="if(this.value=='0'){ this.value='';}"
                                                            >
                                                            <span class="form-text error-alert text-danger">You entered invalid amount.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="kt-margin-b-10">
                                                            <label>Remaining</label>
                                                            <input type="number" class="form-control" id="remaining" readonly placeholder="Remaining Amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 zero_hide">
                                                        <div class="form-group">
                                                            <label>Select Paying Account</label>
                                                            <div class="input-group">
                                                                <select class="form-control kt-select2 account" id="kt_select2_1" name="param">
                                                                    <option value="defaultaccount" disabled>Paying Account</option>
                                                                    @foreach($accounts as $account)
                                                                        @if($account->id == 1)
                                                                        <option value="{{$account->id}}" selected>{{$account->branch_name}}</option>
                                                                        @else
                                                                            <option value="{{$account->id}}">{{$account->branch_name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-text error-alert text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 zero_hide">
                                                        <div class="kt-margin-b-10">
                                                            <label>Account Balance</label>
                                                            <input type="text" class="form-control" id="account_balance" readonly placeholder="Account Balance">
                                                            <span class="form-text error-alert text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <button class="btn btn-primary mx-12 form-control" id="submitcart">Submit</button>
                                                    <button class="btn btn-dark mx-12 form-control mt-3" id="resetallform">Reset</button>
                                                    <span class="form-text error-alert text-danger">Cart is empty.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content container">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group row">
                            {{--<div class="col-md-3"></div>--}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="input-group">
                                        <select class="form-control kt-select2 selectcategory" id="kt_select2_9" name="param">
                                            <option value="defaultcategory" selected disabled>Select a Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text error-alert text-danger"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px; ">
                                <button type=button class=" btn btn-primary btn-receive form-control " data-toggle="modal" data-target="#addcategory">
                                    Add</button>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Company</label>
                                    <div class="input-group">
                                        <select class="form-control kt-select2 selectcompany" id="kt_select2_4" name="param">
                                            <option value="defaultcompany" selected disabled>Select a Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text error-alert text-danger"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1" style="margin-top: 25px; ">
                                <button type=button class=" btn btn-primary btn-receive form-control " data-toggle="modal" data-target="#addcompany">
                                    Add</button>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" autocomplete="off" id="product" placeholder="Enter Product Name">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Product Barcode</label>
                                    <input type="text" class="form-control" autocomplete="off" id="barcode" placeholder="Scan Product Barcode">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 25px; ">
                                <button type=button class=" btn btn-primary btn-receive form-control barcodeGenerate">
                                    Generate</button>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Purchase Price</label>
                                    <input type="number" class="form-control" autocomplete="off" id="new_purchase" placeholder="Enter Purchase Price">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input type="number" class="form-control" autocomplete="off" id="new_sale" placeholder="Enter Sale Price">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
{{--                            <div class="col-md-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Unit</label>--}}
{{--                                    --}}{{--                                                    <input type="number" class="form-control" autocomplete="off" id="sale" placeholder="Enter Sale Price">--}}
{{--                                    <select class="form-control" id="unit">--}}
{{--                                        <option value="qty">Qty</option>--}}
{{--                                        <option value="kg">Kg</option>--}}
{{--                                    </select>--}}
{{--                                    <span class="form-text error-alert text-danger"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            {{--<div class="col-md-3"></div>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closenewproduct" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savenewproduct">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" autocomplete="off" class="form-control" id="category" placeholder="Enter Category">
                                <span class="form-text error-alert text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" id="category_description" placeholder="Enter Category Description"></textarea>
                                <span class="form-text error-alert text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closecategory" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savecategory">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" autocomplete="off" class="form-control" id="company_name" placeholder="Enter Company">
                                <span class="form-text error-alert text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Description</label>
                                <textarea class="form-control" id="company_description" placeholder="Enter Company Description"></textarea>
                                <span class="form-text error-alert text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closecompany" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savecompany">Submit</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script src="{{ url('DataTables/datatables.js') }}"></script>
    <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>
    <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>
    <script>


        $(document).ready(function (e) {
            //add product
            $(document).on('click','.barcodeGenerate',function (e) {
                var barcode=Math.floor(1000000000000 + Math.random() * 9000000000000);
                $('#barcode').val(barcode);
            });
            $('.munshi').select2();
            $(".savenewproduct").click(function (e) {
                var product=$('#product').val();
                var barcode=$('#barcode').val();
                var category=$('.selectcategory').val();
                var company=$('.selectcompany').val();
                var purchase=$('#new_purchase').val();
                var sale=$('#new_sale').val();
                // var unit=$('#unit').val();

                //validation
                if (product == '' || product == null) {
                    // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                    $('#product').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Product Name is Required.').addClass('text-danger').show();
                } else {
                    $('#product').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (category == 'defaultcategory' || category == null) {
                    $('.selectcategory').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Category is Required.').addClass('text-danger').show();
                } else {
                    $('.selectcategory').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (company == 'defaultcompany' || company == null) {
                    $('.selectcompany').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company is Required.').addClass('text-danger').show();
                } else {
                    $('.selectcompany').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                // if (purchase == '' || purchase == null) {
                //     $('#purchase').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Purchase Price is Required.').addClass('text-danger').show();
                // } else {
                //     $('#purchase').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                // }
                // if (sale == '' || sale == null) {
                //     $('#sale').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Sale Price is Required.').addClass('text-danger').show();
                // } else {
                //     $('#sale').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                // }
                if ($('.is-invalid').length<1) {

                    $.ajax({
                        url: '{{ url("product/insert_new_product_modal") }}',
                        type: 'post',
                        data: {
                            'product': product,
                            'barcode': barcode,
                            'category': category,
                            'company': company,
                            'purchase': purchase,
                            'sale': sale,
                            'unit': "qty",
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            console.log(data);
                            $.notify('<strong>Saving</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            $('.product_id').html('');
                            $('.product_id').append('<option value="default">Select a Product</option>');
                            for(var q=0;q<data.product.length;q++){
                                $('.product_id').append('<option value="'+data.product[q].id+'"  >'+data.product[q].name+'</option>');
                            }
                            $('#product').val('');
                            $('#product').focus();
                            $('#barcode').val('');
                            $('#purchase').val('');
                            $('#sale').val('');
                            // $('#unit').val('qty').change();
                            // $(".selectcategory").val("defaultcategory").change();
                            $('#product').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#purchase').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#sale').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.selectcategory').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.closenewproduct').click();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                }
            });
            $(".savecategory").click(function (e) {
                var category=$('#category').val();
                var category_desc=$('#category_description').val();
                //validation
                if (category == '' || category == null) {
                    // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                    $('#category').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Product Name is Required.').addClass('text-danger').show();
                } else {
                    $('#category').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (category_desc == '' || category_desc == null) {
                    $('#category_description').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company is Required.').addClass('text-danger').show();
                } else {
                    $('#category_description').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if ($('.is-invalid').length<1) {
                    $.ajax({
                        url: '{{ url("product/insert_new_category") }}',
                        type: 'post',
                        data: {
                            'name': category,
                            'description': category_desc,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            console.log(data);
                            $.notify('<strong>Saving</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            $('.selectcategory').html('');
                            $('.selectcategory').append('<option value="defaultcategory">Select a Category</option>');
                            for(var l=0;l<data.data2.length;l++){
                                $('.selectcategory').append('<option value="'+data.data2[l].id+'">'+data.data2[l].name+'</option>');
                            }
                            $('#category').val('');
                            $('#category_description').val('');
                            // $(".selectcompany").val("default").change();
                            $('#category').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#category_description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.closecategory').click();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                }
            });
            $(".savecompany").click(function (e) {


                var company=$('#company_name').val();
                var company_desc=$('#company_description').val();
                //validation
                if (company == '' || company == null) {
                    // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                    $('#company').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company Name is Required.').addClass('text-danger').show();
                } else {
                    $('#company').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (company_desc == '' || company_desc == null) {
                    $('#company_description').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Description is Required.').addClass('text-danger').show();
                } else {
                    $('#company_description').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if ($('.is-invalid').length<1) {

                    $.ajax({
                        url: '{{ url("product/insert_new_company") }}',
                        type: 'post',
                        data: {
                            'name': company,
                            'description': company_desc,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            console.log(data);

                            $.notify('<strong>Saving</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            $('.selectcompany').html('');
                            $('.selectcompany').append('<option value="defaultcompany">Select a Company</option>');
                            for(var l=0;l<data.data2.length;l++){
                                $('.selectcompany').append('<option value="'+data.data2[l].id+'">'+data.data2[l].company_name+'</option>');
                            }

                            // $(".selectcompany").val("default").change();
                            $('#company_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#company_description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#company_name').val('');
                            $('#company_description').val('');

                            $('.closecompany').click();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                }
            });

















            $(document).keypress("q",function(e) {
                if(e.ctrlKey){
                    $('#paid ').focus();
                    $('.product_id').select2('close');
                    $('#paid ').focus();
                    setTimeout(function () {
                        $('.product_id').select2('close');
                        $("#paid").focus()
                    },100) ;

                }
            });

            $('.product_id').on('click',function () {
                $(this).select2('open');
            });
            $('.select_qty').on('click',function () {
                // $(this).focus();
                // alert('asdfasdf');
            });

            $('.product_id').on('select2:select',function () {
                setTimeout(function () {
                    $(".select_qty").focus()
                },100) ;
                // alert('ho gya');
            });
            // $('.product_id').on('select2:close',function () {
            //     $(".select_qty").focus();
            //     // alert('ho gya');
            // });
            $('.product_id').click();





















            //Add Product
            {{--$(".saveproduct").click(function (e) {--}}


            {{--    var name=$('#product').val();--}}
            {{--    var sale_price=$('#insert_sale_price').val();--}}
            {{--    var purchase_price=$('#insert_purchase_price').val();--}}
            {{--    var vehicle=$('.insert_vehicle:checked').val();--}}

            {{--    //validation--}}
            {{--    if (name == '' || name == null) {--}}
            {{--        $('#product').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Product Name is Required.').addClass('text-danger').show();--}}
            {{--    } else {--}}
            {{--        $('#product').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--    }--}}
            {{--    if (company == 'default' || company == null) {--}}
            {{--        $('.selectcompany').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company is Required.').addClass('text-danger').show();--}}
            {{--    } else {--}}
            {{--        $('.selectcompany').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--    }--}}
            {{--    if (sale_price == '' || sale_price == null) {--}}
            {{--        $('#insert_sale_price').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Purchase Price is Required.').addClass('text-danger').show();--}}
            {{--    } else {--}}
            {{--        $('#insert_sale_price').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--    }--}}
            {{--    if (purchase_price == '' || purchase_price == null) {--}}
            {{--        $('#insert_purchase_price').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Purchase Price is Required.').addClass('text-danger').show();--}}
            {{--    } else {--}}
            {{--        $('#insert_purchase_price').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--    }--}}




            {{--    if ($('.is-invalid').length<1) {--}}

            {{--        $.ajax({--}}
            {{--            url: '{{ url("product/insert_new_product") }}',--}}
            {{--            type: 'post',--}}
            {{--            data: {--}}
            {{--                'name': name,--}}
            {{--                'company': company,--}}
            {{--                'sale': sale_price,--}}
            {{--                'purchase': purchase_price,--}}
            {{--                'vehicle': vehicle,--}}
            {{--                '_token': '{{csrf_token()}}'--}}
            {{--            },--}}
            {{--            success: function (data) {--}}
            {{--                console.log(data);--}}
            {{--                $('#product').val('');--}}
            {{--                $('#insert_sale_price').val('');--}}
            {{--                $('#insert_purchase_price').val('');--}}
            {{--                $(".selectcompany").val("default").change();--}}
            {{--                $('#insert_sale_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--                $('#insert_purchase_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--                $('#product').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}


            {{--            },--}}
            {{--            error: function (error) {--}}
            {{--                console.log(error.responseText);--}}
            {{--                //--}}
            {{--            }--}}
            {{--        }),--}}
            {{--        $.ajax({--}}
            {{--            url: '{{ url("purchase/after_product_save") }}',--}}
            {{--            type: 'post',--}}
            {{--            data: {'_token': '{{csrf_token()}}'},--}}
            {{--            success: function (data) {--}}
            {{--                alert("asdffdsa");--}}
            {{--                console.log(data);--}}
            {{--                $('.product_id').html('');--}}
            {{--                $('.product_id').append('<option value="default">Select a Product</option>');--}}
            {{--                for(var q=0;q<data.data.length;q++){--}}
            {{--                    $('.product_id').append('<option value="'+data.data[q].id+'">'+data.data[q].name+'</option>');--}}
            {{--                }--}}
            {{--                $('#product').val('');--}}
            {{--                $('#insert_sale_price').val('');--}}
            {{--                $('#insert_purchase_price').val('');--}}
            {{--                $(".selectcompany").val("default").change();--}}
            {{--                $('#insert_sale_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--                $('#insert_purchase_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--                $('#product').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();--}}
            {{--            },--}}
            {{--            error: function (error) {--}}
            {{--                console.log(error.responseText);--}}
            {{--                //--}}
            {{--            }--}}
            {{--        });--}}

            {{--    }--}}
            {{--});--}}


            $("#product").keypress(function(e) {
                if(e.which == 13) {
                    $(".saveproduct").click();
                }
            });
            //Product Previous Data
            // $('.munshi').change(function () {
            //     if ($('.munshi').val() !== "" && $('.munshi').val() !=="defaultmunshi" && $('.munshi').val() !== null){
            //         $('#munshiana').attr('readonly',false);
            //     }else{
            //         $('#munshiana').attr('readonly',true);
            //         $('#munshiana').val(0);
            //     }
            //
            // });



            $('.product_id').change(function () {
                var id=$(".product_id").val();
                if (id !== "" && id !==null){
                $.ajax({
                    url:'{{url('purchase/fetch_product_data')}}',
                    type: 'post',
                    data:{'id':id ,'_token':'{{csrf_token()}}'},
                    success:function (data) {
                        console.log(data.unit);
                        if (data.data !== null){
                            $('#p_price').val(data.data.purchase_price);
                            $('#s_price').val(data.data.sale_price);
                            $('.unit_name').val(data.unit.name);
                            // $('#show_product_unit').val(data.data.unit);

                        }
                         },
                    error:function (error) {
                        console.log(error.responseText);
                        //
                    }
                });
                }


            });
            $('.supplier').change(function () {
                var id=$(".supplier").val();
                var label=$(".supplier :selected").closest('optgroup').prop('label');
                // alert(label);
                if (id !== 'defaultsupplier'){
                $.ajax({
                    url:'{{url('purchase/fetch_supplier_balance')}}',
                    type: 'post',
                    data:{'id':id,'label':label ,'_token':'{{csrf_token()}}'},
                    success:function (data) {
                        console.log(data);
                        if (data.data !== null){
                            $('#last_balance').val(data.data.balance);
                        }
                    },
                    error:function (error) {
                        console.log(error.responseText);
                    }
                });
                }
            });
            $('.account').val(1).change();
            $.ajax({
                url:'{{url('purchase/fetch_account_balance')}}',
                type: 'post',
                data:{'id':1 ,'_token':'{{csrf_token()}}'},
                success:function (data) {
                    console.log(data);
                    if (data.data !== null){
                        $('#account_balance').val(data.data.current_balance);
                    }
                },
                error:function (error) {
                    console.log(error.responseText);
                }
            });
            $('.account').change(function () {
                var id=$(".account").val();
                if (id !== 'defaultsupplier'){
                $.ajax({
                    url:'{{url('purchase/fetch_account_balance')}}',
                    type: 'post',
                    data:{'id':id ,'_token':'{{csrf_token()}}'},
                    success:function (data) {
                        console.log(data);
                        if (data.data !== null){
                            $('#account_balance').val(data.data.current_balance);
                        }
                    },
                    error:function (error) {
                        console.log(error.responseText);
                    }
                });
                }
            });



            //cart/Datatble
            editor =  new $.fn.dataTable.Editor({
                table: "#purchase",
                display: "bootstrap",
                idSrc:'id',
                fields: [
                    // {label: "Sr:", name: "id",type : "readonly"},
                    // {label: "product:", name: "product",type : "readonly" },
                    // {label: "Purchase Price:", name: "purchase_price" },
                    // {label: "Sale Price:", name: "sale_price" },
                    // {label: "Qty:", name: "qty"},
                    // {label: "Total Amount:", name: "amount",type : "readonly"}
                ]
            });
            var table=  $('#purchase').DataTable({
                dom: "Bfrtip",
                select: true,
                idSrc: 'id',
                bPaginate: false,
                bInfo: false,
                // aoColumnDefs: [{ "bVisible": false, "aTargets": [2,4,5,7,8,9,10,13] }],

                buttons: [
                    { extend: "print",  editor: editor},
                    // { extend: "edit",  editor: editor},
                    { extend: "remove",  editor: editor}
                ],
                columns:[
                    {data:'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }},
                    {data:'product'},
                    {data:'purchase_price'},
                    {data:'sale_price'},
                    {data:'qty'},
                    {data:'amount'},
                    // {data:'expiry'},
                ]
            });
            // editor.field('purchase_price').input().keyup(function (e) {
            //     var myData=table.row($(this).closest('tr')).data();
            //     var purchase_price=$(this).val();
            //     var total=myData.qty*purchase_price;
            //     table.cell($(this).closest('tr'), 5).data(total);
            // });
            // editor.field('qty').input().keyup(function (e) {
            //     var myData=table.row($(this).closest('tr')).data();
            //     var qty=$(this).val();
            //     var total=myData.purchase_price*qty;
            //     table.cell($(this).closest('tr'), 5).data(total);
            // });
            $('#purchase').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            var productdata;

            //Add To Cart
            $('#addtocartbtn').click(function (e) {
                var qty1=$('#qty').val();
                if(qty1<0 || qty1=='' || qty1==null){
                    return;
                }
                    // cart variables
                var product_id=$(".product_id").val();
                var name=$( ".product_id option:selected" ).text();
                var p_price=$("#p_price").val();
                var s_price=$("#s_price").val();
                var qty=$("#qty").val();

                //Validation for cart
                if (product_id == 'default' || product_id == null) {
                    $('.product_id').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select a Product.').addClass('text-danger').show();
                } else {
                    $('.product_id').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (p_price == '' || p_price == null) {
                    $('#p_price').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Purchase price.').addClass('text-danger').show();
                } else {
                    $('#p_price').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (s_price == '' || s_price == null) {
                    $('#s_price').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Sale price.').addClass('text-danger').show();
                } else {
                    $('#s_price').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                    if ($('.is-invalid').length<1) {
                        // var checkIfTrue=false;
                        // table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                        //     var d = this.data();
                        //     console.log("This is Data");
                        //     console.log(d);
                        //     if (product_id===d.id){
                        //         d.qty=parseFloat(d.qty)+parseFloat(qty1);
                        //         d.amount=parseFloat(p_price)*(parseFloat(d.qty));
                        //         d.discount=dicount;
                                // checkIfTrue=true;
                                // d.counter++;
                                // this.draw();
                                // this.invalidate();
                                // return;
                            // }
                            // d.name="waqar";
                            // d.counter++; // update data source for the row

                            // this.invalidate(); // invalidate the data DataTables has cached for this row
                        // } );
                        // table.draw();
                        // if (!checkIfTrue){
                        //     table.row.add(cart1).select().draw();
                        // }
                        table.row.add({
                            'id': product_id,
                            'product': name,
                            'purchase_price': p_price,
                            'sale_price': s_price,
                            'qty': qty,
                            // 'expiry': expiry,
                            'amount': (qty * p_price),
                        }).draw();
                        var data1 = table
                            .rows()
                            .data().toArray();
                        productdata=data1;
                        $('#p_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        $('#s_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        $("#p_price").val('');
                        $("#s_price").val('');
                        $(".product_id").val('default').change();
                        $("#qty").val(1);
                        $('.product_id').click();
                    }


                // $('#ISr').text(product_id);
                // $('#IPName').text(product_name);
                // $('#Iqty').text(qty);
                // $('#IPrice').text(price);
                // var myTable='';
                // for(var i=0;i<data1.length;i++){
                //     myTable+='<tr><td>'+data1[i].product_id+'</td>';
                //     myTable+='<td>'+data1[i].product+'</td>';
                //     myTable+='<td>'+data1[i].qty+'</td>';
                //     myTable+='<td>'+data1[i].price+'</td><tr>';
                // }
                // $('.carttable1').html(myTable);
                // id=product_id;
                // dat=data1;
                // invice=invoice_no;
                // datee=datetime;
                // SR=sr;
                // sr++;


                // PAID=grandtotal;
                // REMAINING=grandtotal;

                // console.log(data1);
                // $('.diss').prop('disabled', true);
                // $('.empty').value ='';
            });
            //total calculations

            $(".triggeraddbutton").keypress(function(e) {
                if(e.which == 13) {
                    $("#addtocartbtn").click();
                }
            });

            setInterval(function () {
                var data = table
                    .rows()
                    .data();
                var total=0;
                for (var i=0;i<data.length;i++){
                    total+=data[i].amount;
                }
                var discount=parseFloat($("#discount").val());
                var paid=parseFloat($("#paid").val());
                // var no_installments =parseFloat($("#no_install").val());
                if (discount > 0){
                    var grandtotal_calculation=parseFloat(discount*total/100);
                    var grandtotal=parseFloat(total-grandtotal_calculation);
                } else {
                    var grandtotal=parseFloat(total);
                }
                var remaining=parseFloat(grandtotal-paid);
                $('#total').val(parseInt(total));
                $('#grandtotal').val(parseInt(grandtotal));
                $('#remaining').val(parseInt(remaining));
            },300);

                $('.zero_hide').css("display","none");
                $('#paid').keyup(function (e) {
                var zero_check=parseFloat($('#paid').val());
                if (zero_check > 0){
                   $('.zero_hide').css("display","block");
                } else if (zero_check == 0){
                   $('.zero_hide').css("display","none");
               }
                });
                // var hidee= $('.account_type:checked').val();
                // if (hidee == 'customer'){
                //     $('.hide_on_customer').css('display',"none");
                //     $('.toggglee').html('');
                //     $('.toggglee').append('<div class="form-group"><label>Customer Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Customer Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                //
                // }
                // else if (hidee == 'supplier') {
                //     $('.toggglee').html('');
                //     $('.toggglee').append('<div class="form-group"><label>Supplier Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Supplier Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                //     $('.hide_on_customer').css('display',"block");
                // }

            //submit request
            $("#submitcart").click(function () {
                $('#p_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#s_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.product_id').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                // Clearing Fields
                $("#p_price").val('');
                $("#s_price").val('');
                $(".product_id").val('default').change();
                $("#qty").val(1);


                var suplier_id=$(".supplier").val();
                var suplier_label=$(".supplier :selected").closest('optgroup').prop('label');
                var s_invoice=$("#invoice").val();
                var s_date=$(".dop_dop").val();
                var s_products_data=productdata;
                var s_total=$("#total").val();
                var account=$('.account').val();
                var account_balance=parseInt($('#account_balance').val());
                var s_grand_total=parseInt($("#grandtotal").val());
                var s_discountper=$('#discount').val();
                var s_discount=s_total*s_discountper/100;
                var s_paid=parseFloat($("#paid").val());
                var s_remaining=$("#remaining").val();
                // var s_no_installment=$("#no_install").val();
                // var s_install_amount=$("#install_amt").val();

                if (suplier_id == 'defaultsupplier' || suplier_id == null) {
                    $('.supplier').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select a Supplier.').addClass('text-danger').show();
                } else {
                    $('.supplier').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (s_invoice == '' || s_invoice == null) {
                    $('#invoice').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Insert a unique Invoice Id.').addClass('text-danger').show();
                } else {
                    $('#invoice').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    // $('#resetallform').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (s_paid > s_grand_total){
                    $('#grandtotal').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You can not pay more than Grand Total.').addClass('text-danger').show();

                    if (account == 'defaultaccount' || account == null){
                        $('.account').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Select Paying Account.').addClass('text-danger').show();
                    } else {
                        $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }
                }
                else if (s_paid > 0 ) {
                    $('#grandtotal').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    if (account == 'defaultaccount' || account == null){
                        $('.account').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Select Paying Account.').addClass('text-danger').show();
                    } else {
                        $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }
                    if (s_paid > account_balance){
                        $('#account_balance').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You do not have enough amount in selected account').addClass('text-danger').show();

                        if (account == 'defaultaccount' || account == null){
                            $('.account').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Select Paying Account.').addClass('text-danger').show();
                        } else {
                            $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                    }
                    else {
                        $('#account_balance').removeClass('is-invalid').addClass('isalid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }
                }
                else {
                    $('#grandtotal').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    $('#account_balance').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (table.data().length <= 0){
                    $('#submitcart').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Cart is Empty.').addClass('text-danger').show();
                }

                if ($('.is-invalid').length<1) {
                    $.ajax({
                        url:'{{ url('purchase/postpurchasecart') }}',
                        type: 'post',
                        data:{'data':s_products_data ,
                            'supplier':suplier_id,
                            'supplier_label':suplier_label,
                            'invoice':s_invoice,
                            'datetime':s_date,
                            'total':s_total,
                            'grand_total':s_grand_total,
                            'discount':s_discount,
                            'account':account,
                            'paid':s_paid,
                            'remaining':s_remaining,
                            '_token':'{{csrf_token()}}'},
                        success:function (data) {
                            console.log(data);
                            $.notify('<strong>Saving</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            $('#invoice').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.supplier').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.account').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#submitcart').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#grandtotal').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#account_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#grandtotal').val(0);
                            $('#last_balance').val('');
                            $('#invoice').val('');
                            $('#account_balance').val('');
                            $('#paid').val(0);
                            $('#remaining').val(0);

                            $('.supplier').val('defaultsupplier').change();
                            $('.account').val(1).change();
                            $('.zero_hide').css("display","none");

                            table.clear().draw();
                        },
                        error:function (error) {
                            console.log(error.responseText);
                        }
                    });
                }
            });

            $("#resetallform").click(function (){
                $('#invoice').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.supplier').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.supplier').val('defaultsupplier').change();
                $('.account').val(1).change();
                $('#zero_hide').css("display","none");
                $('#serial').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.account').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#chassis').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#engine').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#color').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#modal').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#p_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#s_price').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#vehicle').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#submitcart').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#grandtotal').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#account_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

                $('#invoice').val('');
                $('#account_balance').val('');
                $('#vehicle').val('');
                $('#paid').val(0);
                $('#remaining').val(0);
                $('#install_amt').val(0);
                $('#no_install').val(1);
                $('#withholding_tax').val(0);
                $("#p_price").val('');
                $("#s_price").val('');
                $("#serial").val('');
                $("#engine").val('');
                $("#modal").val('');
                $("#color").val('');
                $("#companyname").val('');
                $(".product_id").val('default').change();
                $("#grandtotal").val(0);
                $("#qty").val(1);

                table.clear().draw();

            });
        });
    </script>

@endsection
