@extends('mainpages.maindmin')


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .note-editor {
            width: 100%;
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
                            <h3 class="kt-portlet__head-title">Settings</h3>
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
{{--                                        <h3 class="kt-section__title kt-section__title-lg">Product Info:</h3>--}}
                                        <div class="form-group row">
                                            {{--<div class="col-md-3"></div>--}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="{{$credentials->company_name}}" id="company_name">
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Company Owner Name</label>
                                                    <div class="input-group">
                                                        <input class="form-control" value="{{$credentials->owner_name}}" type="text" id="owner_name">
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <div class="input-group">
                                                        <input class="form-control" value="{{$credentials->designation}}" type="text" id="designation">
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Phone : 1</label>
                                                    <div class="input-group">
                                                        <input class="form-control" value="{{$credentials->phone1}}" type="text" id="phone1">
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Phone : 2</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="{{$credentials->phone2}}" id="phone2">
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Phone : 3</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="{{$credentials->phone3}}" id="phone3">
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <div class="input-group">
                                                        <input class="form-control" value="{{$credentials->address}}" type="text" id="address">
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Policies</label>
                                                    <div class="input-group">
{{--                                                        <div class="form-control">--}}
                                                        <div id="summernote">Hello Summernote</div>
{{--                                                        </div>--}}
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
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

            <script>
                $(document).ready(function (e) {
                    $(document).ready(function() {
                        $('#summernote').summernote({
                            height: 300,
                            toolbar: [
                                [ 'style', [ 'style' ] ],
                                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                                [ 'fontname', [ 'fontname' ] ],
                                [ 'fontsize', [ 'fontsize' ] ],
                                [ 'color', [ 'color' ] ],
                                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
                            ]
                        });
                    });

                    $(document).on('click','.barcodeGenerate',function (e) {
                        var barcode=Math.floor(1000000000000 + Math.random() * 9000000000000);
                        $('#barcode').val(barcode);
                    });
                    $("#sale").keypress(function(e) {
                        if(e.which == 13) {
                            $(".save").click();
                        }
                    });

                    $(".save").click(function (e) {
                        var company_name=$('#company_name').val();
                        var owner=$('#owner_name').val();
                        var designation=$('#designation').val();
                        var phone1=$('#phone1').val();
                        var phone2=$('#phone2').val();
                        var phone3=$('#phone3').val();
                        var address=$('#address').val();
                        //validation
                        if (company_name == '' || company_name == null) {
                            // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                            $('#company_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#company_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (owner == '' || owner == null) {
                            $('#owner_name').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Category is Required.').addClass('text-danger').show();
                        } else {
                            $('#owner_name').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (designation == '' || designation == null) {
                            // $('.selectcompany').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company is Required.').addClass('text-danger').show();
                            designation='Chief Executive';
                        } else {
                            $('#designation').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (phone1 == '' || phone1 == null) {
                            $('#phone1').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter 1 phone at least.').addClass('text-danger').show();
                        } else {
                            $('#phone1').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        // if (sale == '' || sale == null) {
                        //     $('#sale').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Sale Price is Required.').addClass('text-danger').show();
                        // } else {
                        //     $('#sale').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        // }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("setting/apply_new_setting") }}',
                                type: 'post',
                                data: {
                                    'company_name': company_name,
                                    'owner': owner,
                                    'designation': designation,
                                    'phone1': phone1,
                                    'phone2': phone2,
                                    'phone3': phone3,
                                    'address': address,
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
                                    // $(".selectcategory").val("defaultcategory").change();
                                    $('#product').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#purchase').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#sale').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.selectcategory').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    location.reload();
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
                    $("#product").keypress(function(e) {
                        if(e.which == 13) {
                            $(".save").click();
                        }
                    });


                });
            </script>

@endsection


