@extends('mainpages.maindmin')
@section('css')
    <style>

    </style>
    <script type="text/javascript">

    </script>

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
                            <h3 class="kt-portlet__head-title">Add Product</h3>
                        </div>
                        {{--<div class="alert alert-success msg" style="display: none;"><h5 style="margin-bottom: 0">Product was added successfully</h5></div>--}}

                        <div class="kt-portlet__head-toolbar">
                            <a href="/dashboard" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Back</span>
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-brand save">
                                    <i class="la la-check"></i>
                                    <span class="kt-hidden-mobile">Save</span>
                                </button>
                                {{--<button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--</button>--}}
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="/showusers" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-reload"></i>
                                                <span class="kt-nav__link-text">Save & continue</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="/dashboard" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-power"></i>
                                                <span class="kt-nav__link-text">Save & exit</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-edit-interface-symbol-of-pencil-tool"></i>
                                                <span class="kt-nav__link-text">Save & edit</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
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
                                        <h3 class="kt-section__title kt-section__title-lg">Product Info:</h3>
                                        <div class="form-group row">
                                            {{--<div class="col-md-3"></div>--}}
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 selectcategory" id="kt_select2_1" name="param">
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
                                                <button type=button class=" btn btn-primary btn-receive form-control " data-toggle="modal" data-target="#addproduct">
                                                    Add</button>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Company</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 selectcompany" id="kt_select2_2" name="param">
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


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="product" placeholder="Enter Product Name">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <div class="input-group">
                                                        <select class="form-control  selectUnit">
                                                            <option value="default" selected disabled>Select a Unit</option>
                                                            @foreach($units as $unit)
                                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="margin-top: 25px; ">
                                                <button type=button class=" btn btn-primary btn-receive form-control " data-toggle="modal" data-target="#addunit">
                                                    Add</button>
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
{{--                                            <div class="col-md-3"></div>--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Purchase Price</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="purchase" placeholder="Enter Purchase Price">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Sale Price</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="sale" placeholder="Enter Sale Price">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-2">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Unit</label>--}}
{{--                                                    <input type="number" class="form-control" autocomplete="off" id="sale" placeholder="Enter Sale Price">--}}
{{--                                                    <select class="form-control" id="unit">--}}
{{--                                                        <option value="qty">Qty</option>--}}
{{--                                                        <option value="kg">Kg</option>--}}
{{--                                                    </select>--}}
{{--                                                    <span class="form-text error-alert text-danger"></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            {{--<div class="col-md-3"></div>--}}
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
        <div class="modal fade" id="addunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit Name</label>
                                    <input type="text" autocomplete="off" class="form-control" id="unit_name" placeholder="Enter Name">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit Value</label>
                                    <input type="number" autocomplete="off" class="form-control" id="unit_value" placeholder="Enter Value">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeunit" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary saveunit">Submit</button>
                    </div>
                </div>
            </div>
        </div>



        @endsection
        @section('scripts')
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

            <script>
                $(document).ready(function (e) {
                $('.selectUnit').select2();
                    $(document).on('click','.barcodeGenerate',function (e) {
                        var barcode=Math.floor(100000000 + Math.random() * 900000000);
                        $('#barcode').val(parseFloat(barcode));
                    });
                    $("#sale").keypress(function(e) {
                        if(e.which == 13) {
                            $(".save").click();
                        }
                    });

                    $(".save").click(function (e) {
                        var product=$('#product').val();
                        var barcode=$('#barcode').val();
                        var category=$('.selectcategory').val();
                        var company=$('.selectcompany').val();
                        var purchase=$('#purchase').val();
                        var sale=$('#sale').val();
                        var unit=$('.selectUnit').val();

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
                        if (unit == 'default' || unit == null) {
                            $('.selectUnit').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Select a Unit.').addClass('text-danger').show();
                        } else {
                            $('.selectUnit').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (sale == '' || sale == null) {
                        //     $('#sale').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Sale Price is Required.').addClass('text-danger').show();
                        // } else {
                        //     $('#sale').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("product/insert_new_product") }}',
                                type: 'post',
                                data: {
                                    'product': product,
                                    'barcode': barcode,
                                    'category': category,
                                    'company': company,
                                    'purchase': purchase,
                                    'sale': sale,
                                    'unit': unit,
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
                    $(".saveunit").click(function (e) {


                        var unit_name=$('#unit_name').val();
                        var unit_value=$('#unit_value').val();
                        //validation
                        if (unit_name == '' || unit_name == null) {
                            // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                            $('#unit_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Unit Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#unit_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (unit_value == '' || unit_value == null) {
                            $('#unit_value').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Unit Value is required.').addClass('text-danger').show();
                        } else {
                            $('#unit_value').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("product/insert_new_unit") }}',
                                type: 'post',
                                data: {
                                    'name': unit_name,
                                    'value': unit_value,
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
                                    $('.selectUnit').html('');
                                    $('.selectUnit').append('<option value="default">Select a Unit </option>');
                                    for(var l=0;l<data.length;l++){
                                        $('.selectUnit').append('<option value="'+data[l].id+'">'+data[l].name+'</option>');
                                    }
                                    $('#unit_value').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#unit_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#unit_value').val('');
                                    $('#unit_name').val('');
                                    $('.closeunit').click();
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                }
                            });
                        }
                    });
                    $("#product").keypress(function(e) {
                        if(e.which == 13) {
                            $(".save").click();
                        }
                    });
                });
            </script>
@endsection


