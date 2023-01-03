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
                            <h3 class="kt-portlet__head-title">Money Transfer Report</h3>
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
                                        <th>Transfer From</th>
                                        <th>Transfer To</th>
                                        <th>Transfer Amount</th>
                                        <th>Transfer Date</th>
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


@endsection
@section('scripts')


    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/demo10/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script src="{{ url('DataTables/datatables.js') }}"></script>
    <script src="{{ url('assets/editor/js/dataTables.editor.js') }}"></script>
    <script src="{{ url('assets/editor/js/editor.bootstrap.js') }}"></script>
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}

    <script>
        var editor;
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            editor =  new $.fn.dataTable.Editor({
                ajax: "{{ url('bank/dtpostshowbank') }}",
                table: "#products",
                display: "bootstrap",
                idSrc:'id',
                fields: [

                ]
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



            var table=  $('#products').dataTable({
                dom: "Blfrtip",
                "processing": false,
                "serverSide": false,
                "ajax": '{{ url('bank/dtgettransferreport') }}',
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
                    // blurable: true
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
                                    '<th style="text-align: center;">Transfer From</th>' +
                                    '<th style="text-align: center;">Transfer To</th>' +
                                    '<th style="text-align: center;">Transfer Amount</th>' +
                                    '<th style="text-align: center;">Transfer Date</th>' +
                                    '<tH style="text-align: center;">Description</tH>' +
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
                                '                                        <h1 class=" mr-2" style="font-family: sans-serif;text-decoration: underline">All Bank Accounts</h5>\n' +
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


                keys: {
                    columns: ':not(:first-child)',
                    editor:  editor
                },
                columns:[
                    {data:'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;

                        }
                    },
                    {data:'transfer_from','name':'transfer_from'},
                    {data:'transfer_to','name':'transfer_to'},
                    {data:'amount','name':'amount'},
                    {data:'transfer_date','name':'transfer_date'},
                    {data:'description','name':'description'},
                ]
            });

        });

        $('#products').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this);
        });
    </script>

@endsection


