@extends('mainpages.maindmin')

@section('css')
@endsection
@section('content')
    <div class="kt-container  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Products Sale </h3>
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
                                            <div class="col-md-3 supp_cust_toggle">
                                                <div class="form-group">
                                                    <label>Select Sale By</label>
                                                    <div class="input-group">
                                                        <select class="form-control kt-select2 sale_type" id="kt_select2_1" name="param">
                                                            <option value="default" selected disabled>Select Sale By</option>
                                                            <option value="company">Company</option>
                                                            <option value="category">Category</option>
                                                            <option value="product">Product</option>
                                                        </select>
                                                        <span class="form-text error-alert text-danger" ></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Select an item</label>
                                                    <select name="param" class="form-control kt-select3 sale_type_item">
                                                        <option value="default" disabled selected>Select Sale By First</option>
                                                    </select>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Sale (%)</label>
                                                    <input type="number" class="form-control" autocomplete="off" id="sale_percentage" placeholder="Sale in Percentage">
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

                    $('.sale_type').change(function () {
                        var type=$(".sale_type").val();
                        if (type !== "default" && type !==null) {
                            $.ajax({
                                url: '{{url('product/fetch_sale_type_items')}}',
                                type: 'post',
                                data: {'type': type, '_token': '{{csrf_token()}}'},
                                success: function (data) {
                                    console.log(data);
                                    if (data.data !== null) {
                                        $('.sale_type_item').html('');
                                        $('.sale_type_item').append('<option value="default">Select a ' + type + '</option>');
                                        if (type == 'company') {
                                            for (var q = 0; q < data.data.length; q++) {
                                                $('.sale_type_item').append('<option value="' + data.data[q].id + '">' + data.data[q].company_name + '</option>');
                                            }
                                        } else if (type == 'category') {
                                            for (var q2 = 0; q2 < data.data.length; q2++) {
                                                $('.sale_type_item').append('<option value="' + data.data[q2].id + '">' + data.data[q2].name + '</option>');
                                            }
                                        } else {
                                            for (var q3 = 0; q3 < data.data.length; q3++) {
                                                $('.sale_type_item').append('<option value="' + data.data[q3].id + '">' + data.data[q3].name + '</option>');
                                            }
                                        }
                                    }
                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                }
                            });
                        }
                    });

                    $(".save").click(function (e) {


                        var sale_type=$('.sale_type').val();
                        var sale_type_item=$('.sale_type_item').val();
                        var sale_percentage=$('#sale_percentage').val();
                        //validations
                        if (sale_type == 'defaut' || sale_type == null) {
                            $('.sale_type').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select a Sale Type.').addClass('text-danger').show();
                        } else {
                            $('.sale_type').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (sale_type_item == 'default' || sale_type_item == null) {
                            $('.sale_type_item').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select Sale Type Item.').addClass('text-danger').show();
                        } else {
                            $('.sale_type_item').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (sale_percentage == '' || sale_percentage == null) {
                            $('.sale_percentage').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select Sale Percentage.').addClass('text-danger').show();
                        } else {
                            $('.sale_percentage').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("product/insert_sale") }}',
                                type: 'post',
                                data: {
                                    'sale_type': sale_type,
                                    'sale_type_item': sale_type_item,
                                    'sale_percentage': sale_percentage,
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
                                    $('.sale_type').val('default').change();
                                    $('.sale_type_item').html('');
                                    $('.sale_type_item').append('<option value="default" selected disabled>Select a Sale Type First</option');
                                    $('#sale_percentage').val('');
                                    $('.sale_type').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.sale_type_item').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#sale_percentage').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

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


