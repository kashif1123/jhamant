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
                            <h3 class="kt-portlet__head-title">Bank Ledger</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="box">
                        {{--<div class="box-header">--}}
                        {{--<h3 class="box-title">User Report </h3>--}}
                        {{--</div>--}}
                        <!-- /.box-header -->
                            <div class="box-body" style="overflow-x:auto;">
                                <div style="text-align: center">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Bank Ledger of:</label>
                                                <div class="input-group">
                                                    <select class="form-control kt-select2 ledger_of" id="kt_select2_2">
                                                            <option value="all" selected>All Bank Ledger</option>
{{--                                                        <optgroup label="Customers">--}}
{{--                                                            @foreach($customers as $customer)--}}
{{--                                                                <option value="{{$customer->id}}">{{$customer->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </optgroup>--}}
{{--                                                        <optgroup label="Suppliers">--}}
{{--                                                            @foreach($suppliers as $supplier)--}}
{{--                                                                <option value="{{$supplier ->id}}">{{$supplier->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </optgroup>--}}
{{--                                                        <optgroup label="Owners">--}}
{{--                                                            @foreach($owners as $owner)--}}
{{--                                                                <option value="{{$owner ->id}}">{{$owner->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </optgroup>--}}
{{--                                                        <optgroup label="Munshis">--}}
{{--                                                            @foreach($munshis as $munshi)--}}
{{--                                                                <option value="{{$munshi ->id}}">{{$munshi->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </optgroup>--}}
{{--                                                        <optgroup label="Expenses">--}}
{{--                                                            @foreach($expenses as $expense)--}}
{{--                                                                <option value="{{$expense ->id}}">{{$expense->expense_head}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </optgroup>--}}
                                                        <optgroup label="Banks">
                                                            @foreach($banks as $bank)
                                                                <option value="{{$bank ->id}}">{{$bank->branch_name}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <span class="form-text error-alert text-danger" >Please Select a Valid Bank Name.</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>From</label>
                                            <input name="fromdate" style="background-color: white!important;" readonly id="kt_datepicker_1" class="form-control c_l_o_s_e min js-example-basic-single" placeholder="From Date" type="text">
                                        </div>
                                        <div class="col-md-2">
                                            <label>To</label>
                                            <input name="todate" style="background-color: white!important;" readonly id="kt_datepicker_2" class="form-control max c_l_o_s_e js-example-basic-single" placeholder="To Date" type="text" >

                                        </div>
                                        <div class="col-md-2" style="margin-top: 26px;">
                                            <button class="btn btn-primary btn-sm form-control" id="loadledgerbydate">Submit</button>
                                        </div>
                                    </div>

                                </div>
                                {{--<table id="ledger1" class="table table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>Sr</th>--}}
                                        {{--<th>Account Type</th>--}}
                                        {{--<th>Name</th>--}}
                                        {{--<th>Account</th>--}}
                                        {{--<th>Phone Number</th>--}}
                                        {{--<th>Transaction Account</th>--}}
                                        {{--<th>Date</th>--}}
                                        {{--<th>Description</th>--}}
                                        {{--<th class="sum">Debit</th>--}}
                                        {{--<th class="sum">Credit</th>--}}
                                        {{--<th>Balance</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead></table>--}}
                                <table id="ledger" class="table table-bordered">
{{--                                    <thead class="newhead">--}}
{{--                                    <tr>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                        <th></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
                                    <thead class="original">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Account Type</th>
                                        <th>Name</th>
                                        <th>Account</th>
                                        {{--<th>Phone Number</th>--}}
                                        <th>Transaction Account</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th class="sum">Debit</th>
                                        <th class="sum">Credit</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    {{--<tr style="border: 1px solid black!important; background-color: #eeeeee;">--}}
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="debit" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                        <td class="credit" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                        <td class="balance1" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    {{--</tr>--}}
                                    </tfoot>
                                </table>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-md-10"></div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <button class="btn btn-danger delete_last_entry form-control">Delete Last Entry</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- /.box-body -->
                        </div>

                    </div>
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
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}

    <script>
        var editor;
        jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
            return this.flatten().reduce( function ( a, b ) {
                if ( typeof a === 'string' ) {
                    a = a.replace(/[^\d.-]/g, '') * 1;
                }
                if ( typeof b === 'string' ) {
                    b = b.replace(/[^\d.-]/g, '') * 1;
                }

                return a + b;
            }, 0 );
        });
        $(document).ready(function (e) {
            $('.delete_last_entry').on('click',function (e) {
                if (confirm("Are You Sure to delete the last entry of Ledger?") == true) {
                    $.ajax({
                        url: '{{ url("ledger/delete_last_entry") }}',
                        type: 'get',
                        success: function (data) {
                            console.log(data);
                            // alert("It is a success");
                            $.notify('<strong>Deleting</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            table.ajax.reload();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });



                } else {

                }
            })




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });


            editor =  new $.fn.DataTable.Editor({
                ajax: "{{ url('b-ledger/dtpostledger') }}",
                table: "#ledger",
                display: "bootstrap",
                idSrc:'id',
                fields: [
                    {label: "Person Type:", name: "person_type",type:"readonly"},
                    {label: "Name:", name: "person_name",type:"readonly"},
                    {label: "Account:", name: "cnic",type:"readonly"},
                    // {label: "Phone Number:", name: "phone_no",type:"readonly"},
                    {label: "Transaction Account:", name: "bank_accounts.branch_name",type:"readonly"},
                    {label: "Transaction Date:", name: "date",type:"readonly"},
                    {label: "Description:", name: "description",type:"readonly"},
                    {label: "Debit:", name: "debit",type:"readonly"},
                    {label: "Credit:", name: "credit",type:"readonly"},
                    {label: "Balance:", name: "balance",type:"readonly"},
                ]
            });


            $('#ledger thead tr').clone(true).appendTo('#ledger thead ');
            $('#ledger thead tr:eq(1) th').each( function (i) {


                if (i==0) {
                }else {
                    $(this).html( '<input type="text" class="form-control" style="width:100%;" placeholder="Search" />' );

                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
            } );


            var sum1=0;
            var sum2=0;
            var table=  $('#ledger').DataTable({
                dom: "Blfrtip",
                "processing": true,
                "serverSide": true,
                "ajax": '{{ url('b-ledger/dtgetledgerr') }}',


                "columnDefs": [
                    // { "targets": [3,4,5,6], "searchable": false }
                ],
                "paging"     : true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "autoWidth"  : false,
                "stateSave"  : false,
                "order"      : [[ 0, 'asc' ]],
                idSrc:'id',
                fixedHeader: {
                    header: true,
                    footer: true
                },
                columnDefs: [
                    { orderable: false, targets: 2 },
                    { "width": "15%", "targets": 2 }
                ],

                select: {
                    style: 'os',
                    selector: 'td:first-child',
                    blurable: true
                },
                searchDelay: 150,
                // scrollX: '100%',
                // scrollY: '350',

                buttons: [
                    // { extend: "create", editor: editor ,className:'m-btn--square  btn-outline-primary'},
                    // { extend: "edit",   editor: editor ,className:'m-btn--square  btn-outline-warning'},
                    // { extend: "remove", editor: editor ,className:'m-btn--square  btn-outline-danger'},
                    {'extend': 'print', className: 'm-btn--square  btn-outline-primary',
                        customize: function ( win ) {
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                            $(win.document.body).find( 'table' )
                                .prepend (
                                    '<tr>' +
                                    '<th style="text-align: center;">Sr.</th>' +
                                    '<th style="text-align: center;">Account Type</th>' +
                                    '<th style="text-align: center;">Name</th>' +
                                    '<th style="text-align: center;">Account</th>' +
                                    '<th style="text-align: center;">Transaction Account</th>' +
                                    '<th style="text-align: center;">Date</th>' +
                                    '<th style="text-align: center;">Description</th>' +
                                    '<tH style="text-align: center;">Debit</tH>' +
                                    '<tH style="text-align: center;">Credit</tH>' +
                                    '<tH style="text-align: center;">Balance</tH>' +
                                    '</tr>'
                                );
                            $(win.document.body).find('table thead tr').css('display','none');
                            // .css( 'font-size', 'inherit' );

                        },
                        title: function(){
                            var printTitle = '' +
                                '<div class="col-md-12 alert" style="background-color: rgba(0,0,0,0.55);color: white;">\n' +
                                '                                    <div class="col-md-6 pl-4">\n' +
                                '                                        <h4 class="" style="font-family: sans-serif;">{{credentials()->designation}}</h4>\n' +
                                '                                        <h4 class="m-0 mb-2" style="font-family: sans-serif;">{{credentials()->owner_name}}</h4>\n' +
                                '                                        <h4 class="m-0" style="margin-bottom: 2px; font-family: sans-serif;">{{credentials()->phone1.' . '.credentials()->phone2.' . '.credentials()->phone3}}</h4>\n' +
                                '                                        <h1 class=" mr-2" style="font-family: sans-serif;text-decoration: underline">Ledger</h5>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="col-md-6">\n' +
                                // '                                        <h5 class="ml-4 m-0" style="font-family: sans-serif;">Fertilizers Dealers</h5>\n' +
                                '                                        <h1 class="ml-4 m-0" style="font-family: sans-serif;">{{credentials()->company_name}}</h1>\n' +
                                '                                        <h5 class="ml-4" style="margin-bottom: 30px; font-family: sans-serif;">{{credentials()->address}}</h5>\n' +
                                '                                        <h5 class="ml-4" style="margin-bottom: 30px; font-family: sans-serif;">(A Software By BRAINIACCS 0303-2600069)</h5>\n' +
                                '                                        <small class="ml-4" style="font-style:italic;float: right;  font-size: 16px;  font-family: sans-serif;">Printing Date: '+ new Date().toJSON().slice(0,10).replace(/-/g,'/') +'</small>\n' +

                                '                                    </div>\n' +
                                '\n' +
                                '                                    <div>\n' +
                                '                                    </div>\n' +
                                '                                </div>';
                            return printTitle
                        },footer:'true'


                    },
                    {'extend': 'copy', className: 'm-btn--square  btn-outline-primary', footer: 'true'},
                    {extend: 'excel', className: 'm-btn--square  btn-outline-primary', footer: 'true',},
                    {extend: 'pdf', className: 'm-btn--square  btn-outline-primary', footer: 'true',},
                    {extend: 'csv', className: 'm-btn--square  btn-outline-primary', footer: 'true',}
                ],


                // keys: {
                //     columns: ':not(:first-child)',
                //     editor:  editor
                // },
                columns:[
                    {data:'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },
                    {data:'person_type','name':'person_type'},
                    {data:'person_name','name':'person_name'},
                    {data:'cnic','name':'cnic'},
                    // {data:'phone_no','name':'phone_no'},
                    {data:'branch_name','name':'branch_name'},
                    {data:'date','name':'date'},
                    {data:'description','name':'description'},
                    {data:'debit','name':'debit'},
                    {data:'credit','name':'credit'},
                    {data:'balance','name':'balance'},
                ],

                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    sum1= api.column( 7, {page:'current'} ).data().sum();
                    sum2= api.column( 8, {page:'current'} ).data().sum();
                    $('.debit').html(sum1);
                    $('.credit').html(sum2);
                    var last_row = table.row(':last').data();
                    if (last_row!=undefined) {
                        $('.balance1').html(last_row.balance);
                    }else{
                        $('.balance1').html('0');
                    }
                },
                // initComplete: function () {
                //     this.api().columns().every( function () {
                //         // var api= this.api();
                //         var column_data = table.column(2).data().toArray();
                //         var column = this.column(2);
                //         console.log(column_data);
                //         var select = $('<select class="select2_for_datatable form-control"><option value=""></option></select>')
                //             .appendTo( $(column.header()).empty() )
                //             .on( 'change', function () {
                //                 var val = $.fn.dataTable.util.escapeRegex(
                //                     $(this).val()
                //                 );
                //
                //                 column
                //                     .search( val ? '^'+val+'$' : '', true, false )
                //                     .draw();
                //             } );
                //
                //         column.data().unique().sort().each( function ( d, j ) {
                //             select.append( '<option value="'+d+'">'+d+'</option>' )
                //         } );
                //     } );
                // },
                // drawCallback: function() {
                //     $('.select2_for_datatable').select2();
                // }

            });
            $('.select2_for_datatable').select2();

            $('#loadledgerbydate').click(function (e) {
                console.log('load by date');
                var min=$('.min').val();
                var max=$('.max').val();
                var ledger_of=$('.ledger_of').val();

                var ledger_of_label = $('.ledger_of :selected').closest('optgroup').prop('label');
                // alert(ledger_of_label);
                // alert(ledger_of);

                console.log("Testing: ", min, max, ledger_of);
                // table.ajax.load('getdatabydateledger?min='+min+'&'+'max='+max).draw();
                table.ajax.url("{{url('b-ledger/dtgetledgerbydatedetails')}}?min="+min+'&'+'max='+max+'&'+'ledger_of='+ledger_of+'&'+'ledger_of_label='+ledger_of_label).load().draw();
            });
        });
        // $(document).ready(function($) {
        setTimeout(function () {
            $('.select2_for_datatable').select2();
        },2000);

        // });
    </script>


@endsection


