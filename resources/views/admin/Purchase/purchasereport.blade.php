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
{{--    <link rel="stylesheet" type="text/css" href="{{ url('assets/editor/css/editor.bootstrap.css') }}">--}}



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
                            <h3 class="kt-portlet__head-title">Purchase Report</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">

                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="box">
                        <div class="box-header">
                        <h3 class="box-title">Purchases from Suppliers </h3>
                        </div>
                        <!-- /.box-header -->
                            <div class="box-body" style="overflow-x:auto;">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Invoice</th>
                                        <th>Employee Name</th>
                                        <th>Supplier Name</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Grand Total</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Date</th>
{{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr style="border: 1px solid black!important; background-color: #eeeeee;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="f_total" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td></td>
                                    <td class="f_grand_total" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td class="f_paid" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td class="f_due" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="kt-portlet__body">
                        <div class="box">
                        <div class="box-header">
                        <h3 class="box-title">Purchases from Customers</h3>
                        </div>
                        <!-- /.box-header -->
                            <div class="box-body" style="overflow-x:auto;">
                                <table id="products2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Invoice</th>
                                        <th>Employee Name</th>
                                        <th>Customer Name</th>
                                        <th>Total</th>
                                        <th>Discount</th>
                                        <th>Grand Total</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Date</th>
{{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    <tr style="border: 1px solid black!important; background-color: #eeeeee;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="f_total2" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td></td>
                                    <td class="f_grand_total2" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td class="f_paid2" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td class="f_due2" style="background-color: #DADADA; font-weight: bold !important;"></td>
                                    <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
@section('scripts')


    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script src="{{ url('DataTables/datatables.js') }}"></script>
{{--    <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>--}}
{{--    <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>--}}
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}

    <script>
        // var editor;
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });


            $('#products thead tr').clone(true).appendTo('#products thead');
            $('#products thead tr:eq(1) th').each( function (i) {
                if (i==0) {
                }else {
                    var title = $(this).text();
                    $(this).html( '<input type="text" class="form-control" style="width:100%;" placeholder="'+title+'" />' );
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

            function format ( d ,row) {
                console.log(d);
                // `d` is the original data object for the row
                var table2='';
                // table2 += '<table border="1px" style="padding-left:200px;" width="20%">'+
                //     '<thead><tr><th>Contact Numbers</th></tr>' +
                //     '</thead><tbody>' +
                //     '<tr>' +
                //     '<td>'+d.data.contact+'</td>' +
                //     '</tr>' +
                //     '</tbody></table>';
                table2 += '<table border="1px solid #a1e9ff";  style="padding-left:50px;" class="table">'+
                    '<thead><tr style="height:7px;">' +
                    '<th>Sr</th>' +
                    '<th>Company</th>' +
                    '<th>Product Name</th>' +
                    '<th>Quantity</th>' +
                    '<th>Sale Rate</th>' +
                    '<th>Total</th>' +
                    '</tr></thead>' +
                    '</tbody>';
                // setTimeout(function () {
                for (var i=0;i<d.subtable_data.length;i++) {
                    table2+='<tr>' +
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+d.subtable_data[i].c_name+'</td>' +
                        '<td>'+d.subtable_data[i].name+'</td>' +
                        '<td>'+d.subtable_data[i].quantity+'</td>' +
                        '<td>'+d.subtable_data[i].purchase_price+'</td>' +
                        '<td>'+parseFloat(d.subtable_data[i].purchase_price *d.subtable_data[i].quantity )+'</td>' +
                        '</tr>';
                }
                '<tbody>';

                // },400);
                return table2;
            }

            $('#products tbody').on('click', 'td.fa-plus-circle', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                console.log(row.data());

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    tr.find('fa-plus-circle').attr('data-icon', 'plus-circle');
                }
                else {
                    // Open this row
                    $.ajax({
                        url:'{{ url('purchase/dtgetpurchase_report_subtable') }}',
                        type:'get',
                        data:{'invoice':row.data().id},
                        success:function (data) {
                            console.log(data);
                            row.child( format(data,row) ).show();
                            tr.addClass('shown');
                            tr.find('fa-plus-circle').attr('data-icon', 'minus-circle');
                        }
                    });
                }
            } );
            $('#products2 tbody').on('click', 'td.fa-plus-circle', function () {
                var tr = $(this).closest('tr');
                var row = table2.row( tr );
                console.log(row.data());

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    tr.find('fa-plus-circle').attr('data-icon', 'plus-circle');
                }
                else {
                    // Open this row
                    $.ajax({
                        url:'{{ url('purchase/dtgetpurchase_report_subtable') }}',
                        type:'get',
                        data:{'invoice':row.data().id},
                        success:function (data) {
                            console.log(data);
                            row.child( format(data,row) ).show();
                            tr.addClass('shown');
                            tr.find('fa-plus-circle').attr('data-icon', 'minus-circle');
                        }
                    });
                }
            } );
            var table=  $('#products').DataTable({
                dom: "Blfrtip",
                "processing": true,
                "serverSide": true,
                "ajax": '{{ url('purchase/dtgetallpurchaseforsuppliers') }}',
                // "columnDefs": [
                //     { "targets": [1,2,3,4], "searchable": false }
                // ],
                "paging"     : true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "autoWidth"  : false,
                "stateSave"  : false,
                "order"      : [[ 0, 'asc' ]],
                idSrc:'id',
                // select: {
                // style: 'os',
                // selector: 'td:first-child',
                // blurable: true
                // },
                searchDelay: 150,
                scrollX: '100%',
                scrollY: '350',
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
                                    '<th style="text-align: center;">Invoice</th>' +
                                    '<th style="text-align: center;">Employee Name</th>' +
                                    '<th style="text-align: center;">Supplier Name</th>' +
                                    '<th style="text-align: center;">Total</th>' +
                                    '<th style="text-align: center;">Discount</th>' +
                                    '<th style="text-align: center;">Grand Total</th>' +
                                    '<th style="text-align: center;">Paid</th>' +
                                    '<tH style="text-align: center;">Due</tH>' +
                                    '<tH style="text-align: center;">Date</tH>' +
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
                                '                                        <h1 class=" mr-2" style="font-family: sans-serif;text-decoration: underline">Purchase Report</h5>\n' +
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
                        }

                    },
                    {'extend': 'copy', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'excel', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'pdf', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'csv', className: 'm-btn--square  btn-outline-primary'}
                ],

                //
                // keys: {
                //     columns: ':not(:first-child)',
                //     editor:  editor
                // },
                columns:[
                    // {data:'id',
                    //     render: function (data, type, row, meta) {
                    //         return meta.row + meta.settings._iDisplayStart + 1;
                    //
                    //     }
                    // },
                    {
                        "className":'fa fa-plus-circle',
                        "orderable": false,
                        "data": 'id',
                        'name':'id',
                    },
                    {data:'invoice','name':'invoice'},
                    {data:'user_name','name':'user_name'},
                    {data:'name','name':'name'},
                    {data:'total','name':'total'},
                    {data:'discount','name':'discount'},
                    {data:'grand_total','name':'grand_total'},
                    {data:'paid','name':'paid'},
                    {data:'due','name':'due'},
                    {data:'date_of_purchase','name':'date_of_purchase'},
                    // {data:'action','name':'action'},
                ],
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var f_total= api.column( 3, {page:'current'} ).data().sum();
                    var f_grand_total= api.column( 5, {page:'current'} ).data().sum();
                    var f_paid= api.column( 6, {page:'current'} ).data().sum();
                    var f_due= api.column( 7, {page:'current'} ).data().sum();
                    $('.f_total').html(f_total);
                    $('.f_grand_total').html(f_grand_total);
                    $('.f_paid').html(f_paid);
                    $('.f_due').html(f_due);
                    // var last_row = table.row(':last').data();
                    // if (last_row!=undefined) {
                    //     $('.balance1').html(last_row.balance);
                    // }else{
                    //     $('.balance1').html('0');
                    // }
                }
            });
            var table2=  $('#products2').DataTable({
                dom: "Blfrtip",
                "processing": true,
                "serverSide": true,
                "ajax": '{{ url('purchase/dtgetallpurchaseforcustomers') }}',
                // "columnDefs": [
                //     { "targets": [1,2,3,4], "searchable": false }
                // ],
                "paging"     : true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "autoWidth"  : false,
                "stateSave"  : false,
                "order"      : [[ 0, 'asc' ]],
                idSrc:'id',
                // select: {
                // style: 'os',
                // selector: 'td:first-child',
                // blurable: true
                // },
                searchDelay: 150,
                scrollX: '100%',
                scrollY: '350',
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
                                    '<th style="text-align: center;">Invoice</th>' +
                                    '<th style="text-align: center;">Customer Name</th>' +
                                    '<th style="text-align: center;">Total</th>' +
                                    '<th style="text-align: center;">Discount</th>' +
                                    '<th style="text-align: center;">Withholding Tax</th>' +
                                    '<th style="text-align: center;">Munshiana</th>' +
                                    '<th style="text-align: center;">Grand Total</th>' +
                                    '<th style="text-align: center;">Paid</th>' +
                                    '<tH style="text-align: center;">Due</tH>' +
                                    '<tH style="text-align: center;">Truck No</tH>' +
                                    '<tH style="text-align: center;">No of Bags</tH>' +
                                    '<tH style="text-align: center;">Date</tH>' +
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
                                '                                        <h1 class=" mr-2" style="font-family: sans-serif;text-decoration: underline">Purchase Report</h5>\n' +
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
                        }

                    },
                    {'extend': 'copy', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'excel', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'pdf', className: 'm-btn--square  btn-outline-primary'},
                    {extend: 'csv', className: 'm-btn--square  btn-outline-primary'}
                ],

                //
                // keys: {
                //     columns: ':not(:first-child)',
                //     editor:  editor
                // },
                columns:[
                    // {data:'id',
                    //     render: function (data, type, row, meta) {
                    //         return meta.row + meta.settings._iDisplayStart + 1;
                    //
                    //     }
                    // },
                    {
                        "className":'fa fa-plus-circle',
                        "orderable": false,
                        "data": 'id',
                        'name':'id',
                    },
                    {data:'invoice','name':'invoice'},
                    {data:'user_name','name':'user_name'},
                    {data:'name','name':'name'},
                    {data:'total','name':'total'},
                    {data:'discount','name':'discount'},
                    {data:'grand_total','name':'grand_total'},
                    {data:'paid','name':'paid'},
                    {data:'due','name':'due'},
                    {data:'date_of_purchase','name':'date_of_purchase'},
                    // {data:'action','name':'action'},
                ],
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var f_total2= api.column( 4, {page:'current'} ).data().sum();
                    var f_grand_total2= api.column( 6, {page:'current'} ).data().sum();
                    var f_paid2= api.column( 7, {page:'current'} ).data().sum();
                    var f_due2= api.column( 8, {page:'current'} ).data().sum();
                    $('.f_total2').html(f_total2);
                    $('.f_grand_total2').html(f_grand_total2);
                    $('.f_paid2').html(f_paid2);
                    $('.f_due2').html(f_due2);
                    // var last_row = table.row(':last').data();
                    // if (last_row!=undefined) {
                    //     $('.balance1').html(last_row.balance);
                    // }else{
                    //     $('.balance1').html('0');
                    // }
                }
            });
        });

        // $('#products').on('click', 'tbody td:not(:first-child)', function (e) {
        //     editor.inline(this);
        // });
    </script>

@endsection


