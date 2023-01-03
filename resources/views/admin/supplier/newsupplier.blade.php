@extends('mainpages.maindmin')

@section('css')
    <style>
        .bootstrap-tagsinput{
            display: block;
            width: 100%;
            min-height: calc(1.5em + 1.3rem + 2px);
            height:auto;
            padding: .65rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e2e5ec;
            border-radius: 4px;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
        .bootstrap-tagsinput {
             box-shadow: inset 0 0px 0px rgba(0, 0, 0, 0.0);
        }
        .bootstrap-tagsinput:focus {
            color: #495057;
            background-color: #fff;
            border-color: #9aabff;
            outline: 0;
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: rgba(6, 0, 0, 0.39);
        }
        .salary_field,.commission_field{
            display: none;
        }
    </style>
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
                            <h3 class="kt-portlet__head-title">New Account</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="{{url('/')}}" class="btn btn-clean kt-margin-r-10">
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
                                        <li class="kt-nav__item" id="savetrigger">
                                            <a href="{{ url('supplier/allsupplier') }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-edit-interface-symbol-of-pencil-tool"></i>
                                                <span class="kt-nav__link-text">Save & edit</span>
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
                                        {{--<h3 class="kt-section__title kt-section__title-lg">Supplier info:</h3>--}}
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Account Type</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" checked value="customer" class="account_type" name="account_type"> Customer
                                                            {{--<span></span>--}}
                                                        </label><br>
                                                        <label>
                                                            <input type="radio" class="account_type" value="supplier" name="account_type" > Supplier
                                                            {{--<span></span>--}}
                                                        </label><br>
                                                        <label>
                                                            <input type="radio" class="account_type" value="employee" name="account_type" > Employee
                                                            {{--<span></span>--}}
                                                        </label><br>
                                                        <label>
                                                            <input type="radio" class="account_type" value="owner" name="account_type" > Owner
                                                            {{--<span></span>--}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 toggglee" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Customer Name">
                                                    <span class="form-text error-alert text-danger" >You entered invalid name.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 salary_field" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>Employee Salary</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="salary" placeholder="Enter Employee Salary">
                                                    <span class="form-text error-alert text-danger" >You entered invalid name.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 commission_field" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>Employee Commission (%)</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="commission" placeholder="Enter Employee Commission">
                                                    <span class="form-text error-alert text-danger" >You entered invalid name.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>CNIC <small>(optional)</small></label>
                                                    <input type="text" class="form-control" autocomplete="off" id="cnic" placeholder="Enter CNIC No">
                                                    <span class="form-text error-alert text-danger">You entered invalid CNIC.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contact No.(s)</label>
                                                    <input type="text" class="form-control" name="contacts[]" data-role="tagsinput" id="contacts" placeholder="Enter Contact Number(s)">
                                                    <span class="form-text error-alert text-danger">You entered invalid Contact No.</span>
                                                </div>
                                            </div>

                                        {{--</div>--}}
                                        {{--<div class="form-group row">--}}

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date of Registration</label>
                                                    <input type="text" autocomplete="off" readonly style="background-color: #ffffff!important;" class="form-control registration_date c_l_o_s_e" id="kt_datepicker_1" placeholder="Select date"/>
                                                    <span class="form-text error-alert text-danger">Please select valid date of birth.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Opening Balance</label>
                                                    <input type="number" value="0" autocomplete="off" class="form-control" id="opening_balance" placeholder="Enter Supplier's Opening Balance"
                                                           onblur="if(this.value==''){ this.value='0';}"
                                                           onfocus="if(this.value=='0'){ this.value='';}"
                                                    >
                                                    <span class="form-text error-alert text-danger" style="display: none">You entered invalid opening balance.</span>
                                                </div>
                                            </div>
                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Select Transaction Account</label>--}}
                                                    {{--<div class="input-group">--}}
                                                        {{--<select class="form-control kt-select2 account" id="kt_select2_2" name="param">--}}
                                                            {{--<option value="defaultaccount" selected disabled>Paying Account</option>--}}
                                                            {{--@foreach($accounts as $account)--}}
                                                                {{--<option value="{{$account->id}}">{{$account->branch_name    }}</option>--}}
                                                            {{--@endforeach--}}
                                                        {{--</select>--}}
                                                        {{--<span class="form-text error-alert text-danger"></span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Balance Type</label>
                                                    <div>
                                                        <label>
                                                            <input type="radio" checked="checked" value="credit" class="balance__" name="balance"> Credit
                                                            {{--<span></span>--}}
                                                        </label><br>
                                                        <label>
                                                            <input type="radio" class="balance__" value="debit" name="balance"> Debit
                                                            {{--<span></span>--}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        {{--</div>--}}
                                        {{--<div class="form-group row">--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" id="address" placeholder="Enter Address" rows="3"></textarea>
                                                    <span class="form-text error-alert text-danger">You entered invalid address.</span>
                                                </div>
                                            </div>
                                            {{--<div class="col-md-3">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Description</label>--}}
                                                    {{--<textarea class="form-control" id="description" placeholder="Enter Description" rows="3"></textarea>--}}
                                                    {{--<span class="form-text error-alert text-danger">You entered invalid address.</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
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


        @endsection
        @section('scripts')


            <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
            <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
            <script>
                $(document).ready(function (e) {


                    var hide= $('.account_type:checked').val();
                    $(document).on('click','.account_type',function (e) {
                            var hidee= $('.account_type:checked').val();
                            if (hidee == 'customer'){
                                $('.hide_on_customer').css('display',"none");
                                $('.toggglee').html('');
                                $('.toggglee').append('<div class="form-group"><label>Customer Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Customer Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                                $('.salary_field').css('display',"none");
                                $('.commission_field').css('display',"none");
                            }
                            else if (hidee == 'supplier') {
                                $('.toggglee').html('');
                                $('.toggglee').append('<div class="form-group"><label>Supplier Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Supplier Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                                $('.hide_on_customer').css('display',"block");
                                $('.salary_field').css('display',"none");
                                $('.commission_field').css('display',"none");
                            }
                            else if (hidee == 'employee') {
                                $('.toggglee').html('');
                                $('.toggglee').append('<div class="form-group"><label>Employee Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Employee Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                                $('.hide_on_customer').css('display',"block");
                                $('.salary_field').css('display',"block");
                                $('.commission_field').css('display',"block");
                            }
                            else if (hidee == 'owner') {
                                $('.toggglee').html('');
                                $('.toggglee').append('<div class="form-group"><label>Owner Name</label> <input type="text" class="form-control" autocomplete="off" id="suppliername" placeholder="Enter Owner Name"> <span class="form-text error-alert text-danger" >You entered invalid name.</span></div>');
                                $('.hide_on_customer').css('display',"block");
                                $('.salary_field').css('display',"none");
                                $('.commission_field').css('display',"none");
                            }
                        });


                    if (hide == 'customer'){
                        $('.hide_on_customer').css("display","none");
                    } else if (hide == 'supplier'){
                        $('.hide_on_customer').css("display","block");
                    }

                    // $('#contacts').tagsinput();
                    $(".save").click(function (e) {
                        var name=$('#suppliername').val();
                        var cnic=$('#cnic').val();
                        var registration_date=$('.registration_date').val();
                        var contacts=$('#contacts').val();
                        var opening_balance=$('#opening_balance').val();
                        var balance_type=$('.balance__:checked').val();
                        var address=$('#address').val();
                        var salary=$('#salary').val();
                        var commission=$('#commission').val();
                        var description=$('#description').val();
                        var account_type=$('.account_type:checked').val();
                        var alpha=/[^A-Za-z]/g;
                        var error=false;
                        //validations

                        if (name == '' || name == null) {
                            $('#suppliername').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#suppliername').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (cnic == '' || cnic == null) {
                        //     $('#cnic').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Cnic is Required.').addClass('text-danger').show();
                        // } else {
                        //     $('#cnic').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if (registration_date == '' || registration_date == null) {
                            $('.registration_date').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Registration Date is Required.').addClass('text-danger').show();
                        } else {
                            $('.registration_date').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ( account_type == "employee"){
                            if (salary == "" || salary == null){
                                $('#salary').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Enter Employee Salary.').addClass('text-danger').show();
                            }
                            else{
                                $('#salary').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            }
                            if (commission == "" || commission == null){
                                $('#commission').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Enter Employee Sale Commission.').addClass('text-danger').show();
                            }
                            else{
                                $('#commission').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            }
                        }
                        if (contacts == '' || contacts == null) {
                            $('#contacts').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('At least 1 Contact Number is Required.').addClass('text-danger').show();
                        } else {
                            $('#contacts').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (opening_balance == '' || opening_balance == null) {
                        //     $('#opening_balance').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Atleast 1 Contact Number is Required.').addClass('text-danger').show();
                        // } else {
                        //     $('#opening_balance').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if (address == '' || address == null) {
                            $('#address').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Supplier Address is Required.').addClass('text-danger').show();
                        } else {
                            $('#address').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (description == '' || description == null) {
                        //     $('#description').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Opening Balance is Required.').addClass('text-danger').show();
                        // } else {
                        //     $('#description').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("supplier/insert_new_supplier") }}',
                                type: 'post',
                                data: {
                                    'name': name,
                                    'cnic': cnic,
                                    'account_type': account_type,
                                    'registration_date': registration_date,
                                    'contacts': contacts,
                                    'opening_balance': opening_balance,
                                    'balance_type': balance_type,
                                    'address': address,
                                    'description': description,
                                    'salary': salary,
                                    'commission': commission,
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
                                    $('#suppliername').val('');
                                    $('#cnic').val('');
                                    $('.registration_date').val('<?php date('m/d/Y'); ?>');
                                    $('#opening_balance').val(0);
                                    $('#address').val('');
                                    $('#salary').val('');
                                    $('#commission').val('');
                                    $('#description').val('');
                                    $("#contacts").tagsinput('removeAll');
                                    $('#suppliername').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#cnic').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#salary').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#commission').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.registration_date').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#contacts').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#opening_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#address').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    // $('#description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
                                }
                            });
                        }
                    });
                    $(".savetrigger").click(function (e) {
                        $(".save").click();
                    });

                });
                //
                // function numbersonly(e){
                //     var unicode=e.charCode? e.charCode : e.keyCode
                //     if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
                //         if (unicode<48||unicode>57) //if not a number
                //             return false //disable key press
                //     }
                // }
                // function validateAlpha(){
                //     var textInput = document.getElementById("suppliername").value;
                //     textInput = textInput.replace(/[^A-Za-z]/g, "");
                //     document.getElementById("suppliername").value = textInput;
                // }
            </script>

@endsection


