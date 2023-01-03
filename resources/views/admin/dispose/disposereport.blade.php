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
    {{--    <link rel="stylesheet" type="text/css" href="{{ url('DataTables/datatables.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ url('assets/editor/css/editor.bootstrap.css') }}">--}}
    {{--    <link href="{{ url('/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--    <link href="{{ url('DataTables/dataTables.css') }}" rel="stylesheet" type="text/css"/>--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ url('assets/ladda/ladda-themeless.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ url('assets/taginput/tagsinput.css') }}">--}}
    {{--    <link href="{{ url('/assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />--}}

    <link href="{{ url('DataTables/dataTables.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    {{--    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">--}}

    {{--    <link rel="stylesheet "href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">--}}

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
                            <h3 class="kt-portlet__head-title">Wet Stock Report</h3>
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
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Product Name</th>
                                        <th>Opening Stock</th>
                                        <th>Deliveries</th>
                                        <th>Sales</th>
                                        <th>Product Testing</th>
                                        <th>Book Stock</th>
                                        <th>Actual Stock</th>
                                        <th>Variance</th>
                                        <th>Variance Value</th>
                                        <th>Analysed Date</th>

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
    <div class="barcodecontainer" style="display: none;">
        <svg class="barcode"></svg>
    </div>


@endsection
@section('scripts')


    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    {{--    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>--}}
    {{--    <script src="{{ url('DataTables/datatables.js') }}"></script>--}}
    {{--    <script src="{{ url('js/select2custom.js') }}"></script>--}}
    {{--    <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>--}}
    {{--    <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>--}}
    <script type="text/javascript" src="{{ url('js/barcode.js') }}"></script>
    <script src="{{ url('/DataTables/datatables.js') }}" type="text/javascript"></script>
    {{--    <script src="{{ url('/DataTables/Buttons-1.5.4/js/dataTables.buttons.js') }}" type="text/javascript"></script>--}}

    {{--<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>--}}
    <script src="{{ url('/assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>
    <script src="{{ url('/assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/select2custom.js') }}"></script>
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}

    <script>
        var editor;
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

            var table=  $('#products').DataTable({
                dom: "Blfrtip",
                "processing": true,
                "serverSide": true,
                "ajax": '{{ url('dispose/dtgetshowdispose') }}',


                // "columnDefs": [
                //     { "targets": [1,2,3,4], "searchable": false }
                // ],
                "paging"     : true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "autoWidth"  : false,
                "stateSave"  : false,
                "order"      : [[ 0, 'asc' ]],



                idSrc:'id',


                select: {
                    style: 'os',
                    selector: 'td:first-child',
                    blurable: true
                },
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
                                    '<th style="text-align: center;">Product Name</th>' +
                                    '<th style="text-align: center;">Opening Stock</th>' +
                                    '<th style="text-align: center;">Deliveries</th>' +
                                    '<th style="text-align: center;">Sales</th>' +
                                    '<th style="text-align: center;">Product Testing</th>' +
                                    '<th style="text-align: center;">Book Stock</th>' +
                                    '<th style="text-align: center;">Actual Stock</th>' +
                                    '<th style="text-align: center;">Variance</th>' +
                                    '<th style="text-align: center;">Variance Value</th>' +
                                    '</tr>'
                                );
                            $(win.document.body).find('table thead tr').css('display','none');
                            // .css( 'font-size', 'inherit' );

                        },
                        title: function(){
                            var printTitle = '' +
                                '<div class="col-md-12 alert" style="background-color: rgba(0,0,0,0.55);color: white;">\n' +
                                '                                    <div class="col-md-6 pl-4">\n' +
                                '                                        <h4 class="" style="font-family: sans-serif;">Chief Executive</h4>\n' +
                                '                                        <h4 class="m-0" style="font-family: sans-serif;">Mr Waqar</h4><br>\n' +
                                '                                        <h1 class=" mr-2" style="font-family: sans-serif;text-decoration: underline">Wet Stock Report</h5>\n' +
                                '                                    </div>\n' +
                                '                                    <div class="col-md-6">\n' +
                                // '                                        <h5 class="ml-4 m-0" style="font-family: sans-serif;">Fertilizers Dealers</h5>\n' +
                                '                                        <h2 class="ml-4 m-0" style="font-family: sans-serif;">Quaid Abad Filling Station)</h2>\n' +
                                '                                        <h5 class="ml-4" style="margin-bottom: 30px; font-family: sans-serif;">0454-770337</h5>\n' +
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


                // keys: {
                    // columns: ':not(:first-child)',
                    // editor:  editor
                // },
                columns:[
                    {data:'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data:'name','name':'name'},
                    {data:'opening_stock','name':'opening_stock'},
                    {data:'purchases','name':'purchases'},
                    {data:'sales','name':'sales'},
                    {data:'product_testing','name':'product_testing'},
                    {data:'prev_stock','name':'prev_stock'},
                    {data:'new_stock','name':'new_stock'},
                    {data:'stock_disposed','name':'stock_disposed'},
                    {data:'stock_value','name':'stock_value'},
                    {data:'analysed_date','name':'analysed_date'},



                ]
            });

            $('#products').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline( this ,{
                    onBlur: 'submit',
                    scope:'cell'
                });
            });
            $(document).on('click','.itemBarcode',function (e) {
                var current_row = $(this).closest('tr');//Get the current row
                // if (current_row.hasClass('child')) {//Check if the current row is a child row
                //     current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')
                // }
                var myData = table.row(current_row).data();//At this point, current_row refers to a valid row in the table, whether is a child row (collapsed by the DataTable's responsiveness) or a 'normal' row
                console.log('Row data:'+myData);
                console.log(myData);
                var barcode= myData.barcode;
                var name=myData.name.substring(0,60);

                var price=myData.sale_price;
                var mywindow= window.open("",200,300);


                // JsBarcode(".barcode", barcode,{
                //     format:'CODE128',
                //     height:31,
                //     marginTop: 2,
                //     width:1.5,
                //     font: "Arial",
                //     fontSize: 11,
                //     textMargin: 0,
                //     flat: true,
                //     textAlign: "left",
                //     fontoptions:'bold'
                // });

                JsBarcode(".barcode", barcode,{
                    format:'CODE128',
                    height:20,
                    margin:0,
                    marginTop: 0,
                    marginBottom:0,
                    width:0.9,
                    font: "Arial",
                    fontSize: 11,
                    textMargin: 0,
                    flat: true,
                    textAlign: "left",
                    fontoptions:'bold'
                });
                        {{--mywindow.document.write('<html><head><title>Barcode</title><link rel="stylesheet" type="text/css" href="{{ url('css/barcode.css') }}"></head><body>');--}}
                        {{--mywindow.document.write('<div class="container"><h6>Shareef Hotel</h6><span id="company">'+name+'</span><span style="font-size: 8pt;"> <br>Rs: '+parseFloat(price).toFixed(2)+'</span><br>'+$('.barcodecontainer').html()+'<br>&nbsp;&nbsp;Exp: '+expiry+"</div>");--}}
                        {{--mywindow.document.write('</body></html>');--}}
                var html=smallBarocde(name,price);
                mywindow.document.write(html);
                setTimeout(function () {
                    mywindow.print();
                    mywindow.close();
                },1000);


            });

            function smallBarocde(name,price){
                var html='' +
                    '<html>' +
                    '<head><title>Barcode</title><link rel="stylesheet" type="text/css" href="{{ url('css/barcode.css') }}"></head>' +
                    '<body>';
                html+='<div style="padding:1px !important;"  >' +
                    '<div style="margin-top:-5px !important;margin-bottom:2px!important;    width:100%;font-size: 9pt;">' +
                    '<b style="font-family: sans-serif" >Hashmi Traders</b><span style="font-size: 8pt !important;float: right; font-family: sans-serif;margin-bottom:0px">Rs:'+parseFloat(price)+' </span><br>'+
                    // '<b style="font-family: sans-serif">Kid\'s Clothing</b><br>'+
                    '<span style="font-size: 7pt;font-family: sans-serif;" >'+name+'</span>'+
                    // '   ' +
                    '</div>'+
                    $('.barcodecontainer').html()+
                    // '<br><span style="font-size: 6pt;">&nbsp;&nbsp;Mfg: '+mfg+'&nbsp;&nbsp;~&nbsp;&nbsp;Exp: '+exp+'</span>'+
                    "</div>";
                html+='</body></html>';

                return html;
            }


        });


    </script>

@endsection


