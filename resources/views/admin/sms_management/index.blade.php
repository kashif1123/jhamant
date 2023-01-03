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
                            <h3 class="kt-portlet__head-title">SMS Management</h3>
                        </div>
                        {{--<div class="alert alert-success msg" style="display: none;"><h5 style="margin-bottom: 0">Product was added successfully</h5></div>--}}

                        <div class="kt-portlet__head-toolbar">
                            <a href="/dashboard" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Back</span>
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-brand send_sms">
                                    <i class="la la-check"></i>
                                    <span class="kt-hidden-mobile">Send Message</span>
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
                                        {{--<h3 class="kt-section__title kt-section__title-lg">Product Info:</h3>--}}
                                        <div class="form-group row">
                                            {{--<div class="col-md-3"></div>--}}
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Select Phone Numbers </label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 phone_numbers" multiple id="kt_select2_1">
                                                            @foreach($numbers as $number)
                                                                <option value="{{$number->id}}">{{$number->customer_name}}{{$number->customer_number}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger"></span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 25px; ">
                                                <button type=button class=" btn btn-primary btn-receive form-control " data-toggle="modal" data-target="#addproduct">
                                                    Add</button>
                                            </div>
                                            <div class="col-md-2" style="text-align: center">
                                                {{--<label>Or</label>--}}
                                                <label>OR Send to All</label>
                                                <input type="checkbox" id="send_to_all" class="form-control">
                                            </div>

                                            <hr>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Type the message You want to send</label>
                                                    <textarea placeholder="Type the message" id="sending_message" class="form-control sending_message" ></textarea>
                                                    {{--<input type="" class="form-control" autocomplete="off" id="product" placeholder="Enter Product Name">--}}
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="text-align: center">
                                                {{--<label>Or</label>--}}
                                                <label>OR Select Previous Message</label>
                                                <input type="checkbox" id="previous_message" class="form-control">
                                            </div>
                                            <div class="col-md-5">
                                                {{--<label style="font-size: 20px;text-align: center" >Or</label>--}}
                                                <div class="form-group">
                                                    <label>Select Previous Message </label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 selectmessage" id="kt_select2_2" name="param">
                                                            <option value="defaultmessage" selected disabled>Select Message</option>
                                                            @foreach($messages as $message)
                                                            <option value="{{$message->id}}">{{$message->message}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger"></span>

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
                        <h5 class="modal-title" id="exampleModalLabel">Contact Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer Name <small>nullable</small></label>
                                    <input type="text" autocomplete="off" class="form-control" id="customer_name" placeholder="Enter Name">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="customer_number" placeholder="Enter Customer Number" value="+923">
                                    <span class="form-text error-alert text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closecategory" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary savecontact_number">Submit</button>
                    </div>
                </div>
            </div>
        </div>



        @endsection
        @section('scripts')
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>

            <script>
                $(document).ready(function (e) {
                    $('#kt_select2_1').select2();
                    $('#kt_select2_2').select2();

                    $("#send_to_all").change(function() {
                        if(this.checked) {
                            $('.phone_numbers').attr("disabled", true);
                        }else {
                            $('.phone_numbers').removeAttr("disabled");
                        }
                    });
                    $("#previous_message").change(function() {
                        if(this.checked) {
                            $('#sending_message').attr("disabled", true);
                        }else {
                            $('#sending_message').removeAttr("disabled");
                        }
                    });

                    $(".save").click(function (e) {


                        var product=$('#product').val();
                        var barcode=$('#barcode').val();
                        var category=$('.selectcategory').val();
                        var purchase=$('#purchase').val();
                        var sale=$('#sale').val();

                        //validation
                        if (product == '' || product == null) {
                            // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                            $('#product').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Product Name is Required.').addClass('text-danger').show();
                        } else {
                            $('#product').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (category == 'defaultcategory' || category == null) {
                            $('.selectcategory').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Company is Required.').addClass('text-danger').show();
                        } else {
                            $('.selectcategory').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
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
                                url: '{{ url("product/insert_new_product") }}',
                                type: 'post',
                                data: {
                                    'product': product,
                                    'barcode': barcode,
                                    'category': category,
                                    'purchase': purchase,
                                    'sale': sale,
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
                                    $('#purchase').val('');
                                    $('#sale').val('');
                                    $(".selectcategory").val("defaultcategory").change();
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
                    $(".savecontact_number").click(function (e) {
                        var name=$('#customer_name').val();
                        var customer_number=$('#customer_number').val();
                        var selected=$('.phone_numbers').val();
                        //validation
                        if (customer_number == '' || customer_number == null || customer_number.length > '13') {
                            // $('#name_error').removeClass('is-valid').addClass('is-invalid').closest('div').children('.form-text').text('Name is Required').removeClass('error-alert').show();
                            $('#customer_number').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Invalid Number.').addClass('text-danger').show();
                        } else {
                            $('#customer_number').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("sms/insert_new_contact_number") }}',
                                type: 'post',
                                data: {
                                    'name': name,
                                    'selected':selected,
                                    'customer_number': customer_number,
                                    '_token': '{{csrf_token()}}'
                                },
                                success: function (data) {
                                    // console.log(selected);

                                    $.notify('<strong>Saving</strong> Do not close this page...', {
                                        type: 'success',
                                        allow_dismiss: false,
                                        showProgressbar: true,
                                        timer: 700,
                                        delay: 1000,
                                    });
                                    $('.customer_number').html('');
                                    for(var l=0;l<data.data.length;l++){
                                        // var k= data.data.[l].id;
                                        // for (i=0;i<data.selected.length;i++){
                                        //     if(k = data.selected[i]){
                                        //
                                        //     }
                                        //         }
                                        $('.phone_numbers').append('<option value="'+data.data[l].id+'">'+data.data[l].customer_name+''+data.data[l].customer_number+'</option>');
                                    }
                                    $('#customer_number').val('');
                                    $('#customer_number').val('');
                                    $('#customer_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#customer_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.closecategory').click();
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
                                }
                            });
                        }
                    });
                    $(".send_sms").click(function (e) {
                        if ($('#send_to_all').prop("checked" ) == true){
                            var send_check='yes';
                        }else{
                            var send_check='no';
                        }
                        var phone_numbers= $('.phone_numbers').val();
                        var sending_message =$('#sending_message').val();
                        var selected_message =$('.selectmessage').val();
                        console.log(selected_message);
                        if ($('#previous_message').prop("checked") == true){
                            var message_check='yes';
                        }else {
                            var message_check='no';
                        }
                        console.log('this is'+send_check);
                        $.ajax({
                                url: '{{ url("sms/sendsms") }}',
                            type: 'post',
                            data: {
                                'send_check': send_check,
                                'message_check':message_check,
                                'phone_numbers': phone_numbers,
                                'sending_message':sending_message,
                                'selected_message': selected_message,
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (data) {
                                console.log(data);
                                // console.log(data.numbers);
                                // console.log(data.sending_message);

                                $.notify('<strong>Saving</strong> Do not close this page...', {
                                    type: 'success',
                                    allow_dismiss: false,
                                    showProgressbar: true,
                                    timer: 700,
                                    delay: 1000,
                                });
                                // $('.customer_number').html('');
                                // for(var l=0;l<data.data.length;l++){
                                //     // var k= data.data.[l].id;
                                //     // for (i=0;i<data.selected.length;i++){
                                //     //     if(k = data.selected[i]){
                                //     //
                                //     //     }
                                //     //         }
                                //     $('.phone_numbers').append('<option value="'+data.data[l].id+'">'+data.data[l].customer_name+''+data.data[l].customer_number+'</option>');
                                // }
                                $('.phone_numbers').val('');
                                $('#sending_message').val('');
                                $('.selectmessage').val('');
                                // $('#customer_number').val('');
                                // $('#customer_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                // $('#customer_number').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            },
                            error: function (error) {
                                console.log(error.responseText);
                                //
                            }
                        });
                    });
                    $("#product").keypress(function(e) {
                        if(e.which == 13) {
                            $(".save").click();
                        }
                    });


                });
            </script>

@endsection


