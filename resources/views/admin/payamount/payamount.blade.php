@extends('mainpages.maindmin')

@section('css')
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
                            <h3 class="kt-portlet__head-title">Pay Accounts</h3>
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
                                            <div class="col-md-3 supp_cust_toggle">
                                                <div class="form-group">
                                                    <label>Select Name</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 customer" id="kt_select2_1" name="param">
                                                            <option value="defaultsupplier" selected disabled>Select a Customer</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 supp_cust_balance_toggle">
                                                <div class="form-group">
                                                    <label>Customer Balance</label>
                                                    <input type="text" readonly class="form-control" autocomplete="off" id="cus_supp_balance" placeholder="Customer Balance">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Paying Amount</label>
                                                    <input type="number" class="form-control" autocomplete="off" value="0" id="p_amount" placeholder="Enter Paying Amount"
                                                           onblur="if(this.value==''){ this.value='0';}"
                                                           onfocus="if(this.value=='0'){ this.value='';}"
                                                    >
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" autocomplete="off" value="<?php echo date("m/d/Y"); ?>" style="background-color: #ffffff!important;" readonly class="form-control registration_date c_l_o_s_e" id="kt_datepicker_1" placeholder="Select date"/>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Select Paying Account</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 account" id="kt_select2_2" name="param">
                                                            <option value="defaultaccount" selected disabled>Paying Account</option>
                                                            @foreach($accounts as $account)
                                                            <option value="{{$account->id}}">{{$account->branch_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Selected Account Balance</label>
                                                    <input type="text" readonly class="form-control" autocomplete="off" id="account_balance" placeholder="Account Balance">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="description" placeholder="Enter Description" rows="3"></textarea>
                                                    <span class="form-text error-alert text-danger"></span>
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
                            $.ajax({
                                url: '{{ url("pay_receive/fetch_customers") }}',
                                type: 'post',
                                data: {'_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    $('.customer').html('');
                                    $('.customer').append('<option value="defaultsupplier">Select a Customer</option>');
                                    $('.supp_cust_balance_toggle').html('');
                                    $('.supp_cust_balance_toggle').append('<div class="form-group">\n' +
                                        '                                                    <label>Customer Balance</label>\n' +
                                        '                                                    <input type="text" readonly class="form-control" autocomplete="off" id="cus_supp_balance" placeholder="Customer Balance">\n' +
                                        '                                                    <span class="form-text error-alert text-danger"></span>\n' +
                                        '                                                </div>');
                                        for(var q=0;q<data.data.length;q++){
                                        $('.customer').append('<option value="'+data.data[q].id+'">'+data.data[q].name+'</option>');
                                    }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
                                }
                            });
                        } else if (hidee == 'supplier') {
                            $.ajax({
                                url: '{{ url("pay_receive/fetch_suppliers") }}',
                                type: 'post',
                                data: {'_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    $('.customer').html('');
                                    $('.customer').append('<option value="defaultsupplier">Select a Supplier</option>');
                                    $('.supp_cust_balance_toggle').html('');
                                    $('.supp_cust_balance_toggle').append('<div class="form-group">\n' +
                                        '                                                    <label>Supplier Balance</label>\n' +
                                        '                                                    <input type="text" readonly class="form-control" autocomplete="off" id="cus_supp_balance" placeholder="Supplier Balance">\n' +
                                        '                                                    <span class="form-text error-alert text-danger"></span>\n' +
                                        '                                                </div>');
                                    for(var q=0;q<data.data.length;q++){
                                        $('.customer').append('<option value="'+data.data[q].id+'">'+data.data[q].name+'</option>');
                                    }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
                                }
                            });
                        }
                        else if (hidee == 'employee') {
                            $.ajax({
                                url: '{{ url("pay_receive/fetch_employees") }}',
                                type: 'post',
                                data: {'_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    $('.customer').html('');
                                    $('.customer').append('<option value="defaultsupplier" disabled selected>Select an Employee</option>');
                                    $('.supp_cust_balance_toggle').html('');
                                    $('.supp_cust_balance_toggle').append('<div class="form-group">\n' +
                                        '                                                    <label>Employee Balance</label>\n' +
                                        '                                                    <input type="text" readonly class="form-control" autocomplete="off" id="cus_supp_balance" placeholder="Employee Balance">\n' +
                                        '                                                    <span class="form-text error-alert text-danger"></span>\n' +
                                        '                                                </div>');
                                    for(var q=0;q<data.data.length;q++){
                                        $('.customer').append('<option value="'+data.data[q].id+'">'+data.data[q].name+'</option>');
                                    }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                }
                            });
                        }else if (hidee == 'owner') {
                            $.ajax({
                                url: '{{ url("pay_receive/fetch_owners") }}',
                                type: 'post',
                                data: {'_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    $('.customer').html('');
                                    $('.customer').append('<option value="defaultsupplier" disabled selected>Select an Owner</option>');
                                    $('.supp_cust_balance_toggle').html('');
                                    $('.supp_cust_balance_toggle').append('<div class="form-group">\n' +
                                        '                                                    <label>Owner Balance</label>\n' +
                                        '                                                    <input type="text" readonly class="form-control" autocomplete="off" id="cus_supp_balance" placeholder="Owner Balance">\n' +
                                        '                                                    <span class="form-text error-alert text-danger"></span>\n' +
                                        '                                                </div>');
                                    for(var q=0;q<data.data.length;q++){
                                        $('.customer').append('<option value="'+data.data[q].id+'">'+data.data[q].name+'</option>');
                                    }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                }
                            });
                        }
                    });
                    $('.customer').change(function () {
                        var id=$(".customer").val();
                        var type= $('.account_type:checked').val();
                            $.ajax({
                                url:'{{url('pay_receive/fetch_person_balance')}}',
                                type: 'post',
                                data:{'id':id ,'type':type,'_token':'{{csrf_token()}}'},
                                success:function (data) {
                                    console.log(data);
                                    if (data.data !== null){
                                        $('#cus_supp_balance').val(data.data.balance);
                                    }
                                },
                                error:function (error) {
                                    console.log(error.responseText);
                                }
                            });
                    });
                    $('.account').change(function () {
                        var id=$(".account").val();
                        if (id !== 'defaultaccount') {
                            $.ajax({
                                url: '{{url('pay_receive/fetch_account_balance')}}',
                                type: 'post',
                                data: {'id': id, '_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    // if (data.data !== null) {
                                        $('#account_balance').val(data.data.current_balance);
                                    // }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                }
                            });
                        }
                    });


                    $(".save").click(function (e) {


                        var name=$('#suppliername').val();
                        var paying_date=$('.registration_date').val();
                        var description=$('#description').val();
                        var person_id=$('.customer').val();
                        var account_id=$('.account').val();
                        var person_last_balance=$('#cus_supp_balance').val();
                        var paying_amount=parseFloat($('#p_amount').val());
                        var account_balance=parseFloat($('#account_balance').val());
                        var account_type=$('.account_type:checked').val();
                        //validations
                        if (account_id == 'defaultaccount' || account_id == null) {
                            $('.account').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select a Paying Account.').addClass('text-danger').show();
                        } else {
                            $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (person_id == '' || person_id == null) {
                            $('.customer').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select Customer/Supplier.').addClass('text-danger').show();
                        } else {
                            $('.customer').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (description == '' || description == null) {
                            $('#description').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Enter Description.').addClass('text-danger').show();
                        } else {
                            $('#description').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (paying_amount == '0' || paying_amount == null || paying_amount == '') {
                            $('#p_amount').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Paying Amount.').addClass('text-danger').show();
                        }else if (paying_amount > account_balance){
                            $('#p_amount').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Not enough Amount in Account.').addClass('text-danger').show();
                        }
                        else {
                            $('#p_amount').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (account_id == '' || account_id == null) {
                        //     $('.account').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select Paying Account.').addClass('text-danger').show();
                        // } else {
                        //     $('.account').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("pay_receive/insert_payamount") }}',
                                type: 'post',
                                data: {
                                    'paying_date': paying_date,
                                    'person_id': person_id,
                                    'account_type': account_type,
                                    'paying_amount': paying_amount,
                                    'paying_account': account_id,
                                    'person_last_balance': person_last_balance,
                                    'description': description,
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
                                    $('.registration_date').val('<?php date('y/m/d'); ?>');
                                    $('#contacts').val('');
                                    $('#account_balance').val('');
                                    $('#3').val('');
                                    $('#address').val('');
                                    $('#cus_supp_balance').val('');
                                    $('#description').val('');
                                    $('#account_balance').val('');
                                    $('#p_amount').val('');
                                    $('.account').val('defaultaccount').change();
                                    $('.customer').val('defaultsupplier').change();
                                    $('#suppliername').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#cnic').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#cus_supp_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.registration_date').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.account').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.customer').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#p_amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#opening_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

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
            </script>

@endsection


