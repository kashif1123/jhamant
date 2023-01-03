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
                            <h3 class="kt-portlet__head-title">Purchase Return</h3>
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
                                        <th>Invoice</th>
                                        <th>Supplier</th>
                                        <th>Product Name</th>
                                        <th>Purchase Price</th>
                                        {{--<th>Purchased Quantity</th>--}}
                                        {{--<th>Quantity Available</th>--}}
                                        <th>Date of Purchase</th>
                                        <th>Return Products</th>
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
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Return Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Invoice No.</label>
                                <div class="input-group">
                                    <input id="serial" readonly class="form-control" type="text">
                                    <input id="purchaseid" readonly class="form-control" hidden type="text">
                                    <input id="product_id" readonly class="form-control" hidden type="text">
                                    <input id="supplier_id" readonly class="form-control" hidden type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Supplier</label>
                                <div class="input-group">
                                    <input id="supplier" readonly class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-group">
                                    <input id="product" readonly class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Purchase</label>
                                <div class="input-group">
                                    <input id="date_of_purchase" readonly class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Purchased Quantity</label>
                                <div class="input-group">
                                    <input id="qty_purchased" class="form-control" readonly type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Available Quantity</label>
                                <div class="input-group">
                                    <input id="qty_available" class="form-control" readonly type="text">
                                    <span class="form-text error-alert text-danger" ></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Purchase Price</label>
                                <div class="input-group">
                                    <input id="purchase_price" autocomplete="off" readonly class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Quantity Returned</label>
                                <div class="input-group">
                                    <input id="qty_returned" readonly autocomplete="off" class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Return Quantity</label>
                                <div class="input-group">
                                    <input id="return_qty" autocomplete="off" value="0" class="form-control" type="number"
                                           onblur="if(this.value==''){ this.value='0';}"
                                           onfocus="if(this.value=='0'){ this.value='';}"
                                    >
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Current Date</label>
                                <input type="text" id="kt_datepicker_1" autocomplete="off" value="<?php echo date("m/d/Y"); ?>" class="form-control current_date c_l_o_s_e">
                                <span class="form-text error-alert text-danger">You entered invalid product name.</span>
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Receiving Amount</label>
                                <div class="input-group">
                                    <input id="total_receiving_amount" readonly autocomplete="off"  class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <div class="input-group">
                                    <input id="received_amount" autocomplete="off" value="0" class="form-control" type="text"
                                           onblur="if(this.value==''){ this.value='0';}"
                                           onfocus="if(this.value=='0'){ this.value='';}"
                                    >
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Amount Due</label>
                                <div class="input-group">
                                    <input id="amount_due" readonly autocomplete="off"  class="form-control" type="text">
                                    <span class="form-text error-alert text-danger" >Please Select a valid vompany.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Account</label>
                                <div class="input-group">
                                    <select class="form-control kt-select2 selectbank" id="kt_select2_1" name="param">
                                        <option value="defaultbank" selected disabled>Select an Account</option>
                                        @foreach($banks as $category)
                                            <option value="{{$category->id}}">{{$category->branch_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text error-alert text-danger"></span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close_model_bbooxx" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary savereturn">Return</button>
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
            $(".selectbank").val('1').change();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            editor =  new $.fn.DataTable.Editor({
                ajax: "{{ url('pay_receive/dtgetreturnpurchase') }}",
                table: "#products",
                display: "bootstrap",
                idSrc:'id',
                fields: [
                    {label: "Invoice:", name: "person_type",type:"readonly"},
                    {label: "Product Name:", name: "branch_code",type:"readonly"},
                    {label: "Purchase Price:", name: "branch_name",type:"readonly"},
                    // {label: "Quantity:", name: "total_qty",type:"readonly"},
                    {label: "Date of Purchase:", name: "receiving_amount",type:"readonly"},
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
            });

            var table=  $('#products').DataTable({
                dom: "Blfrtip",
                "processing": true,
                "serverSide": true,
                "ajax": '{{ url('purchase/dtgetreturnpurchase') }}',
                "paging"     : true,
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "autoWidth"  : false,
                "stateSave"  : false,
                "order"      : [[ 0, 'asc' ]],

                idSrc:'id',
                searchDelay: 150,
                scrollX: '100%',
                scrollY: '350',
                buttons: [
                    // { extend: "create", editor: editor ,className:'m-btn--square  btn-outline-primary'},
                    // { extend: "edit",   editor: editor ,className:'m-btn--square  btn-outline-warning'},
                    // { extend: "remove", editor: editor ,className:'m-btn--square  btn-outline-danger'},
                    // {'extend': 'print', className: 'm-btn--square  btn-outline-primary'},
                    // {'extend': 'copy', className: 'm-btn--square  btn-outline-primary'},
                    // {extend: 'excel', className: 'm-btn--square  btn-outline-primary'},
                    // {extend: 'pdf', className: 'm-btn--square  btn-outline-primary'},
                    // {extend: 'csv', className: 'm-btn--square  btn-outline-primary'}
                ],
                columns:[
                    {data:'purchase_invoice_id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data:'invoice','name':'invoice'},
                    {data:'name','name':'name'},
                    {data:'p_name','name':'p_name'},
                    {data:'purchase_price','name':'purchase_price'},
                    // {data:'total_qty','name':'total_qty'},
                    {data:'date_of_purchase','name':'date_of_purchase'},
                    {"data": null,
                        "defaultContent": "<button type=\"button\" class=\"btn btn-primary btn-receive \" data-toggle=\"modal\" data-target=\"#addproduct\">" +
                        "Return"+ "</button>"},
                ]
            });


            $(document).on('click','.btn-receive',function (e) {
                $('#qty_available').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#return_qty').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#qty_returned').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('#received_amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                $('.selectbank').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();

                var data=table.row($(this).closest('tr')).data();
                var product_id = data.p_id;
                var sup_inv_id = data.id;
                $.ajax({
                url:'{{url('purchase/return_qty')}}',
                type: 'post',
                data:{'id':product_id,'s_invoices_id':sup_inv_id,'_token':'{{csrf_token()}}'},
                success:function (data) {
                console.log(data);
                $('#qty_returned').val(data.data);


                },
                error:function (error) {
                console.log(error.responseText);
                }
                });
                console.log(data);
                $('#purchaseid').val(data.id);
                $('#serial').val(data.invoice);
                $('#supplier').val(data.name);
                $('#supplier_id').val(data.s_id);
                $('#qty_available').val(data.total_qty);
                $('#product').val(data.p_name);
                $('#date_of_purchase').val(data.date_of_purchase);
                $('#product_id').val(data.p_id);
                $('#qty_purchased').val(data.quantity);
                $('#invoice_number').val(data.invoice_number);
                $('#purchase_price').val(data.purchase_price);
                $('#total_receiving_amount').val('0');
            });
            $(".savereturn").click(function (e) {
                var return_quantity=parseFloat($('#return_qty').val());
                var purchase_id=$('#purchaseid').val();
                var product_id=$('#product_id').val();
                var supplier_id=$('#supplier_id').val();
                var supplier_name=$('#supplier').val();
                var prod_name=$('#product').val();
                var invoice = $('#serial').val();
                var return_date=$('.current_date').val();
                var total_receiving_amount=parseFloat($('#total_receiving_amount').val());
                var p_qty = parseFloat($('#qty_purchased').val());
                var a_quantity=parseFloat($('#qty_available').val());
                // alert(a_quantity);
                // alert(return_quantity);
                var returned_qty=parseFloat($('#qty_returned'));
                var sum_check=p_qty-returned_qty;
                var received_amount=parseFloat($('#received_amount').val());
                var amount_due=parseFloat($('#amount_due').val());
                var bank=$('.selectbank').val();

                if(return_quantity == '0' || return_quantity == '' || return_quantity == null){
                    $('#return_qty').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Please Enter the quantity you want to return').addClass('text-danger').show();
                }
                else if (return_quantity > p_qty ) {
                    $('#return_qty').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You can not return more than you purchased.').addClass('text-danger').show();
                } else {
                    $('#return_qty').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (return_quantity > a_quantity) {
                    $('#qty_available').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You can not return more than available Quantity.').addClass('text-danger').show();
                }else{
                    $('#qty_available').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (return_quantity > sum_check){
                    $('#qty_returned').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You have already returned This item or You can not return more than you purchased.').addClass('text-danger').show();
                }
                else {
                    $('#qty_returned').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }

                if (received_amount > total_receiving_amount){
                    $('#received_amount').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('You can not Receive more than Total.').addClass('text-danger').show();
                }
                else {
                    $('#received_amount').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if (bank == 'defaultbank' || bank == null) {
                    $('.selectbank').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Select a Paying Account.').addClass('text-danger').show();
                } else {
                    $('.selectbank').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                }
                if ($('.is-invalid').length<1) {
                    $.ajax({
                        url: '{{ url("purchase/post_return_product") }}',
                        type: 'post',
                        data: {
                            'sup_inv_id':purchase_id,
                            'p_id':product_id,
                            's_id':supplier_id,
                            's_name':supplier_name,
                            'invoice':invoice,
                            'product': prod_name,
                            'return_qty': return_quantity,
                            'return_date': return_date,
                            'total_receiving_amount':total_receiving_amount,
                            'received_amount': received_amount,
                            'amount_due': amount_due,
                            'account': bank,
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

                            $('#return_qty').val('0');
                            $('#amount_due').val('');
                            $('#received_amount').val('0');
                            $('#total_receiving_amount').val('');
                            $('#qty_available').val('');
                            $('.current_date').val('<?php echo date("m/d/Y"); ?>');
                            $(".selectbank").val('1').change();
                            $('#return_qty').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#qty_available').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#amount_due').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#received_amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#total_receiving_amount').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                            $('#close_model_bbooxx').click();
                            table.ajax.reload();
                        },
                        error: function (error) {
                            console.log(error.responseText);
                            //
                        }
                    });
                }
            });

            $('#return_qty').keyup(function () {
                var return_qty=$("#return_qty").val();
                var p_price=parseInt($('#purchase_price').val());
                var receiving_amount=p_price*return_qty;
                $('#total_receiving_amount').val(receiving_amount);
            });

            $('#received_amount').keyup(function () {
                var return_qty=$("#return_qty").val();
                var received_amount=$("#received_amount").val();
                var p_price=parseInt($('#purchase_price').val());
                var receiving_amount=p_price*return_qty;
                var due_amount=receiving_amount-received_amount;
                $('#amount_due').val(due_amount);

            });
        });
    </script>
@endsection


