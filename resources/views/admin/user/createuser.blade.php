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
                            <h3 class="kt-portlet__head-title">Register User</h3>
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
                                            <div class="col-md-2 toggglee" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="user_name" placeholder="Enter Customer Name">
                                                    <span class="form-text error-alert text-danger" >You entered invalid name.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2 toggglee" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>User Email Address</label>
                                                    <input type="email" class="form-control" autocomplete="off" id="user_email" placeholder="Enter Customer Email Address">
                                                    <span class="form-text error-alert text-danger" >You entered invalid name.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>CNIC</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="user_cnic" placeholder="Enter CNIC No">
                                                    <span class="form-text error-alert text-danger">You entered invalid CNIC.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Contact No.</label>
                                                    <input type="text" class="form-control" name="contacts" id="contacts" placeholder="Enter Contact Number">
                                                    <span class="form-text error-alert text-danger">You entered invalid Contact No.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" autocomplete="off" id="password" placeholder="Enter Password">
                                                    <span class="form-text error-alert text-danger">You entered invalid CNIC.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" autocomplete="off" id="confirm_password" placeholder="Enter Password Again">
                                                    <span class="form-text error-alert text-danger">You entered invalid CNIC.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" id="address" placeholder="Enter Address" rows="3"></textarea>
                                                    <span class="form-text error-alert text-danger">You entered invalid address.</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" placeholder="Enter Description" rows="3"></textarea>
                                            <span class="form-text error-alert text-danger">You entered invalid address.</span>
                                            </div>
                                            </div>
                                        </div>
                                        <h2>Choose Permissions:</h2>
                                        <div class="row">

                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Dashboard</label>
                                                <div class="col-2">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="dashboard"  checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Sale</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="sale" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Product</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="product" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Accounts</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="accounts" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Pay/Receive</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="pay_receive" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Purchase/Sale</label>
                                                <div>
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="purchase_sale" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Expenses</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="expense" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Ledger</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="ledger" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Dayclose</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="dayclose" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Monthclose</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="monthclose" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-3 col-form-label">Reports</label>
                                                <div class="col-3">
																<span class="kt-switch">
																	<label>
																		<input type="checkbox" id="reports" checked="checked" name="" />
																		<span></span>
																	</label>
																</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--
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
                    // $('#contacts').tagsinput();
                    $(".save").click(function (e) {
                        var name=$('#user_name').val();
                        var cnic=$('#user_cnic').val();
                        var email=$('#user_email').val();
                        var contacts=$('#contacts').val();
                        var address=$('#address').val();
                        var password=$('#password').val();
                        var confirm_password=$('#confirm_password').val();
                        var description=$('#description').val();

                        var dashboard= $('#dashboard').is(':checked');
                        var sale= $('#sale').is(':checked');
                        var product= $('#product').is(':checked');
                        var account= $('#accounts').is(':checked');
                        var pay_receive= $('#pay_receive').is(':checked');
                        var purchase_sale= $('#purchase_sale').is(':checked');
                        var expenses= $('#expense').is(':checked');
                        var ledger= $('#ledger').is(':checked');
                        var dayclose= $('#dayclose').is(':checked');
                        var monthclose= $('#monthclose').is(':checked');
                        var reports= $('#reports').is(':checked');
                        //validations

                        if (name == '' || name == null) {
                            $('#user_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#user_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (cnic== '' || cnic == null) {
                            $('#user_cnic').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Cnic is Required.').addClass('text-danger').show();
                        } else if(cnic.length != 13){
                            $('#user_cnic').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Invalid Cnic.').addClass('text-danger').show();
                        }else{
                            $('#user_cnic').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (email == '' || email == null) {
                            $('#user_email').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Registration Date is Required.').addClass('text-danger').show();
                        } else {
                            $('#user_email').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (contacts == '' || contacts == null) {
                            $('#contacts').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Contact Number is Required.').addClass('text-danger').show();
                        } else {
                            $('#contacts').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (address == '' || address == null) {
                            $('#address').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('User Address is Required.').addClass('text-danger').show();
                        } else {
                            $('#address').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (description == '' || description == null) {
                            $('#description').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Description  is Required.').addClass('text-danger').show();
                        } else {
                            $('#description').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (password == '' || password == null) {
                            $('#password').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Password is required.').addClass('text-danger').show();
                        }else {
                            $('#password').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (password !== confirm_password) {
                            $('#confirm_password').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Password did not matched.').addClass('text-danger').show();
                        } else {
                            $('#confirm_password').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {
                            $.ajax({
                                url: '{{ url("user/insert_new_user") }}',
                                type: 'post',
                                data: {
                                    'name': name,
                                    'cnic': cnic,
                                    'email': email,
                                    'contacts': contacts,
                                    'password': password,
                                    'address': address,
                                    'description': description,

                                    'dashboard': dashboard,
                                    'sale': sale,
                                    'product': product,
                                    'account': account,
                                    'pay_receive': pay_receive,
                                    'purchase_sale': purchase_sale,
                                    'expenses': expenses,
                                    'ledger': ledger,
                                    'dayclose': dayclose,
                                    'monthclose': monthclose,
                                    'reports': reports,
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
                                    $('#user_name').val('');
                                    $('#user_cnic').val('');
                                    $('#user_email').val('');
                                    $('#address').val('');
                                    $('#description').val('');
                                    $("#contacts").val('');
                                    $('#user_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#user_cnic').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#user_email').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#contacts').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#address').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
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


