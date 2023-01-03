@extends('mainpages.maindmin')
@section('css')
    <style>
        .imagewrap {display:inline-block;position:relative;
            border: 2px solid #403d36;
            box-shadow: 2px 1px 10px #403d36;
        }
        .button1 {position:absolute;top:-20px;right:-20px;
            border-radius: 50%;
            border: 1px solid white;
            height: 35px;
            width: 35px;

        }
        .error-alert{
            display: block;!important;
        }
        .my_invoice{
            display: none;
        }
        .button1 i{
            margin: auto;
        }
        .button2 {position:absolute;bottom:0;right:0;}
        .button3 {position:absolute;right:50%;top:50%;}
        .grid-item { width: 200px; }
        .grid-item--width2 { width: 200px; }




    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/editor/css/editor.bootstrap.css') }}">
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
                            <h3 class="kt-portlet__head-title">Profit/Loss Reconciliation and MonthClose</h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        {{--<form class="kt-form" id="kt_form">--}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">Reconcile Profit/Loss and Close Month:</h3>
                                        <div class="form-group row">

                                            <div class="col-md-3">
                                                {{--                            <h4 style="text-align:center">Month close Date</h4><br>--}}
                                                <label>MonthClose Date Range</label>
                                                <input type='text'  style="background-color: white !important;"  class="form-control month_close_date_range" id="kt_daterangepicker_1" readonly placeholder="Select time" type="text" />

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Total Profit/Loss <small class="ml-4 indication_profit_loss text-right"></small></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="total_profit" placeholder="Total Profit">
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Owner</label>
                                                    <div class="input-group">
                                                        <select class="form-control selectowner" >
                                                            <option value="defaultowner" selected disabled>Select an Owner</option>
                                                            @foreach($owners as $owner)
                                                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="form-text error-alert text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Owner Balance</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" readonly id="owner_balance" placeholder="Owner Balance">
                                                    </div>

                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Reconcile Amount</label>
                                                    <div class="input-group">
                                                        <input type="number" autocomplete="off" value="0" class="form-control amount" id="amount" max="100" placeholder="Reconcile Amount"
                                                               onblur="if(this.value==''){ this.value='0';}"
                                                               onfocus="if(this.value=='0'){ this.value='';}"
                                                        >
                                                    </div>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>

                                            {{--<div class="col-md-3"></div>--}}

                                            <div class="col-md-3">
                                                <label>Description</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" id="description" placeholder="Description "></textarea>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>&nbsp;</label>
                                                <div class="input-group">
                                                    <button class="form-control btn btn-primary" id="addtocartbtn">Confirm Profit/Loss Reconcile</button>
                                                    <span class="form-text error-alert text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Submit</label>
                                                <div class="input-group">
                                                    <button class="form-control btn btn-success" id="close_month_and_reconcile_profit">Close Month and Reconcile Profit/Loss</button>
                                                    <span class="form-text error-alert text-success"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="box">
                                            {{--<div class="box-header">--}}
                                            {{--<h3 class="box-title">User Report </h3>--}}
                                            {{--</div>--}}
                                            <!-- /.box-header -->
                                                <div class="box-body" style="overflow-x:auto;border: #5e5e5e solid 1px;border-radius:6px;padding: 40px;">
                                                    <div style="text-align: center"><h3>Summary</h3></div>
                                                    <table id="purchase" class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Sr</th>
                                                            <th>Owner Name</th>
                                                            <th>Reconcile Amount</th>
                                                            <th>Description</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
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


            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/dropzone.js') }}" type="text/javascript"></script>
            <script src="{{ url('DataTables/datatables.js') }}"></script>
            <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>
            <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>
{{--            <script src="{{ url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}" type="text/javascript"></script>--}}

            <script>
                $(document).ready(function (e) {

                    setInterval(function () {
                        if ($('#total_profit').val() > 0){
                            $('.indication_profit_loss').css('display','inline');
                            $('.indication_profit_loss').html('(Profit)');
                            $('.indication_profit_loss').addClass('text-success');
                            $('.indication_profit_loss').removeClass('text-danger');
                        }
                        if ($('#total_profit').val() < 0){
                            $('.indication_profit_loss').css('display','inline');
                            $('.indication_profit_loss').html('(Loss)');
                            $('.indication_profit_loss').addClass('text-danger');
                            $('.indication_profit_loss').removeClass('text-success');
                        }
                    },300);




                    $('.selectowner').select2();
                    $("#kt_daterangepicker_1, #kt_daterangepicker_1_modal").daterangepicker({
                        buttonClasses: " btn",
                        applyClass: "btn-primary",
                        cancelClass: "btn-secondary",
                    });

                    $('.month_close_date_range').on('change.datepicker', function(ev){
                        // var picker = $(ev.target).data('daterangepicker');
                        // console.log(picker.startDate);
                        // console.log(picker.endDate);
                        var selected_month=$(this).val();
                        console.log(selected_month);
                        $.ajax({
                            url: '{{ url("profit_reconciliation/fetch_month_profit") }}',
                            type: 'post',
                            data: {
                                'month': selected_month,
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (data) {
                                console.log(data);
                                $('#total_profit').val(data);
                                if (parseFloat(data) > 0){
                                    $('.indication_profit_loss').css('display','inline');
                                    $('.indication_profit_loss').html('(Profit)');
                                    $('.indication_profit_loss').addClass('text-success');
                                    $('.indication_profit_loss').removeClass('text-danger');
                                }
                                if (parseFloat(data) < 0){
                                    $('.indication_profit_loss').css('display','inline');
                                    $('.indication_profit_loss').html('(Loss)');
                                    $('.indication_profit_loss').addClass('text-danger');
                                    $('.indication_profit_loss').removeClass('text-success');
                                }
                                $('.month_close_date_range').attr('disabled',true);
                                $('.month_close_date_range').css('background-color','gray');

                            },
                            error: function (error) {
                                console.log(error.responseText);
                                //
                            }
                        });
                    });

                    $('.selectowner').change(function (e) {
                        var owner=$('.selectowner').val();
                        $.ajax({
                            url: '{{ url("profit_reconciliation/fetch_owner_balance") }}',
                            type: 'post',
                            data: {
                                'owner': owner,
                                '_token': '{{csrf_token()}}'
                            },
                            success: function (data) {
                                console.log(data);
                                $('#owner_balance').val(data.balance);
                            },
                            error: function (error) {
                                console.log(error.responseText);
                                //
                            }
                        });

                    });
                    editor =  new $.fn.DataTable.Editor({
                        table: "#purchase",
                        display: "bootstrap",
                        idSrc:'id',
                        fields: [
                            // {label: "Sr:", name: "id",type : "readonly"},
                            // {label: "product:", name: "product",type : "readonly" },
                            // {label: "Purchase Price:", name: "purchase_price" },
                            // {label: "Sale Price:", name: "sale_price" },
                            // {label: "Qty:", name: "qty"},
                            // {label: "p_discount:", name: "p_discount"},
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
                            // { extend: "print",  editor: editor},
                            // { extend: "edit",  editor: editor},
                            { extend: "remove",  editor: editor}
                        ],
                        columns:[
                            {data:'id',
                                render: function (data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;

                                }},
                            {data:'owner_name'},
                            {data:'reconcile_amount'},
                            {data:'description'},
                        ]
                    });
                    var ownerdata;
                    $('#addtocartbtn').click(function (e) {
                        // cart variables
                        var p_distributed=0;
                        var t_data = table.rows().data().toArray();
                        if (t_data){
                            for (var i=0;i<t_data.length;i++){
                                p_distributed+=t_data[i].reconcile_amount;
                            }
                        }
                        var owner_id=$(".selectowner").val();
                        var owner_name=$( ".selectowner option:selected" ).text();
                        var reconcile_amount=parseFloat(Math.abs($("#amount").val()));
                        var description=$("#description").val();
                        var total_profit=Math.abs($("#total_profit").val());
                        console.log(total_profit+"total Profit");
                        console.log(p_distributed+"total Distributed");
                        console.log(reconcile_amount+"reconcile amount");

                        if (owner_id == null || owner_id == "" || owner_id == "defaultowner"){
                            $('.selectowner').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Select an Owner First.').addClass('text-danger').show();
                        }  else {
                            $('.selectowner').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if (reconcile_amount == 0 || reconcile_amount == null || reconcile_amount == "") {
                            $('#amount').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Enter Reconcile Amount.').addClass('text-danger').show();
                        } else {
                            $('#amount').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                            if (parseFloat(p_distributed+reconcile_amount) > total_profit ) {
                                $('#total_profit').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You Can not Distribute more than Total Profit/Loss.').addClass('text-danger').show();
                            } else {
                                $('#total_profit').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            }


                        if ($('.is-invalid').length<1) {
                            table.row.add({
                                'id': owner_id,
                                'owner_name': owner_name,
                                'reconcile_amount': reconcile_amount,
                                'description': description,
                            }).draw();
                            var data1 = table
                                .rows()
                                .data().toArray();
                            ownerdata=data1;
                            $('#total_profit').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('.selectowner').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#total_profit').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

                            $('.selectowner').val('defaultowner').change();
                            $('#amount').val(0);
                            $('#owner_balance').val("");
                            // $('.').val(0);
                            $('.product_id').click();
                        }
                    });

                    $("#close_month_and_reconcile_profit").click(function (e) {
                        $('.selectowner').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        $('#amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        $('#total_profit').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

                        $('#close_month_and_reconcile_profit').attr("disabled", true);
                        $('#close_month_and_reconcile_profit').prop("disabled",'disabled');
                        var monthclose_date=$('.month_close_date_range').val();
                        var total_profit_check=Math.abs($('#total_profit').val());
                        var total_profit=$('#total_profit').val();
                        var p_l_distributed=0;
                        var t_data = table.rows().data().toArray();
                        if (t_data){
                            for (var i=0;i<t_data.length;i++){
                                p_l_distributed+=t_data[i].reconcile_amount;
                            }
                        }
                        var data=ownerdata;
                        if (table.data().length <= 0){
                            $('#close_month_and_reconcile_profit').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Reconcile Profit First.').addClass('text-danger').show();
                            $('#close_month_and_reconcile_profit').attr("disabled", false);
                            $('#close_month_and_reconcile_profit').removeAttr("disabled");
                        }
                        if (p_l_distributed > total_profit_check){
                            $('#total_profit').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You Can not Distribute more than Total Profit/Loss.').addClass('text-danger').show();
                        }
                        if (monthclose_date == '' || monthclose_date == null) {
                            $('.month_close_date_range').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Expense Head is Required.').addClass('text-danger').show();
                        } else {
                            $('.month_close_date_range').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                        }
                        if ($('.is-invalid').length<1) {

                            $.ajax({
                                url: '{{ url("profit_reconciliation/close_month_and_reconcile_profit") }}',
                                type: 'post',
                                data: {
                                    'data': data,
                                    'month': monthclose_date,
                                    'total_profit': total_profit,
                                    'total_reconciled': p_l_distributed,
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
                                    location.reload();
                                    $('.selectexpensehead').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.expensedate').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#description').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('#e_name').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                    $('.selectexpensehead').val('defaultexpensehead').change();
                                    $('.expensedate').val('');
                                    $('#amount').val('');
                                    $('#e_name').val('');
                                    $('#description').val('');

                                },
                                error: function (error) {
                                    console.log(error.responseText);
                                    //
                                }
                            });
                        }
                    });

                });

            </script>


@endsection
