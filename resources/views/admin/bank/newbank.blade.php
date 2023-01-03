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
                            <h3 class="kt-portlet__head-title">Add Bank Account</h3>
                        </div>
                        {{--<div class="alert alert-success msg" style="display: none;"><h5 style="margin-bottom: 0">Product was added successfully</h5></div>--}}

                        <div class="kt-portlet__head-toolbar">
                            <a href="/" class="btn btn-clean kt-margin-r-10">
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
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Branch Name</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="branch_name" placeholder="Enter Branch Name">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Branch Code</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="branch_code" placeholder="Enter Branch Code">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Account Number</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="account_number" placeholder="Enter Account Number">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" autocomplete="off" id="contact_number" placeholder="Enter Contact Number">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Opening Balance</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="opening_balance" placeholder="Enter Opening Balance">
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="3" autocomplete="off" id="description" placeholder="Enter Description"></textarea>
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
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

            <script>
                $(document).ready(function (e) {

                    $(".save").click(function (e) {


                        var name=$('#branch_name').val();
                        var code=$('#branch_code').val();
                        var account_number=$('#account_number').val();
                        var contact=$('#contact_number').val();
                        var opening_balance=$('#opening_balance').val();
                        var description=$('#description').val();

                        //validation
                        if (name == '' || name == null) {
                            $('#branch_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Branch Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#branch_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (code == '' || code == null) {
                            $('#branch_code').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Branch Code is Required.').addClass('text-danger').show();
                        } else {
                            $('#branch_code').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (account_number == '' || account_number == null) {
                            $('#account_number').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Account Number is Required.').addClass('text-danger').show();
                        } else {
                            $('#account_number').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (contact == '' || contact == null) {
                            $('#contact_number').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Contact Number is Required.').addClass('text-danger').show();
                        }
                        else if (contact.length > 11){
                            $('#contact_number').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Invalid Contact Number.').addClass('text-danger').show();
                        }
                        else if (contact.length < 11){
                            $('#contact_number').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Invalid Contact Number.').addClass('text-danger').show();
                        }  else {
                            $('#contact_number').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (opening_balance == '' || opening_balance == null) {
                            $('#opening_balance').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Opening Balance is Required.').addClass('text-danger').show();
                        } else {
                            $('#opening_balance').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("bank/insert_newbank") }}',
                                type: 'post',
                                data: {
                                    'name': name,
                                    'code': code,
                                    'account_number': account_number,
                                    'contact': contact,
                                    'opening_balance': opening_balance,
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
                                    $('#branch_name').val('');
                                    $('#branch_code').val('');
                                    $('#account_number').val('');
                                    $('#contact_number').val('');
                                    $('#opening_balance').val('');
                                    $('#description').val('');
                                    $('#branch_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#branch_code').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#opening_balance').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#account_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#contact_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
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


