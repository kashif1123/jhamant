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
        .loading_sp{
            display: none;
        }




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
                            <h3 class="kt-portlet__head-title">Day Close Report</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">

                        </div>
                    </div>
{{--                    <div class="row text-center">--}}
{{--                        <div class="col-md-4"></div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <h2>this is asdfnsda</h2>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4"></div>--}}

{{--                    </div>--}}
                    <?php
                    function time_elapsed_string($datetime, $full = false) {
                        $now = new DateTime;
                        $ago = new DateTime($datetime);
                        $diff = $now->diff($ago);

                        $diff->w = floor($diff->d / 7);
                        $diff->d -= $diff->w * 7;
                        $string = array(
                            'y' => 'year',
                            'm' => 'month',
                            'w' => 'week',
                            'd' => 'day',
                            'h' => 'hour',
                            'i' => 'minute',
                            's' => 'second',
                        );
                        foreach ($string as $k => &$v) {
                            if ($diff->$k) {
                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                            } else {
                                unset($string[$k]);
                            }
                        }

                        if (!$full) $string = array_slice($string, 0, 1);
                        return $string ? implode(', ', $string) . ' ago' : 'just now';
                    }
                    ?>
                    @if($last_date)
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><label class="text-center">Last Day Close Time</label>
                        <br>

                            <b class="last_date">{{time_elapsed_string($last_date->closing_date)}}</b>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success  form-control" type="submit" data-toggle="modal" data-target="#daycloase_modal">Close Day &nbsp;&nbsp;&nbsp;
                                    <span class="loading_sp kt-spinner kt-spinner--lg kt-spinner--v2 kt-spinner--brand"></span>
                            </button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <form action=" {{url('dayclose/databydate')}}" method="post">
                        {{csrf_field()}}
                    <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                            <label style="text-align: center">Date</label>
                            <input name="date" style="background-color: white!important;" readonly id="daaa" value="{{ $date }}" class="form-control " placeholder="Date" type="text">
                        </div>
                        <div class="col-md-3" style="margin-top: 26px;">
                            <button class="btn btn-primary btn-sm form-control" type="submit" id="loadledgerbydate">Submit</button>
                        </div>
                    </div>
                    </form>

                    <div class="container" id="day_close_report">
                        {{--<div class="kt-heading kt-heading--md">Invoice Report</div>--}}
                        <div style="border: 1px solid black;border-radius: 4px;padding: 30px;" >
                            <div class="kt-heading kt-heading--sm">


                                <div class="col-md-12 alert" style="background-color: rgba(0,0,0,0.55);color: white;">
                                    <div class="col-md-6 pl-4">
                                        <h4 class="" style="font-family: sans-serif;">{{credentials()->designation}}</h4>
                                        <h4 class="m-0" style="font-family: sans-serif;">{{credentials()->owner_name}}</h4>
                                        <span class="" style="font-family: sans-serif;">{{credentials()->phone1.' . '.credentials()->phone2.' . '.credentials()->phone3}}</span>

                                        <h2 class=" mr-2 mt-4" style="font-family: sans-serif;text-decoration: underline">Day Close</h2>

                                        {{--                                        <span class=" mr-2" style="font-family: sans-serif;">Secretary Fertilizers Dealers Association Sargodha Devision</span>--}}
                                    </div>
                                    <div class="col-md-6">
{{--                                        <h4 class="ml-4" style="font-family: sans-serif;">Shell Pakistan Limited</h4>--}}
                                        <h3 class="ml-4 m-0" style="font-family: sans-serif;">{{credentials()->company_name}} </h3>
                                        <h5 class="ml-4 m-0" style="font-family: sans-serif;">{{credentials()->address}} </h5>
                                        <h5 class="ml-4 m-0" style="font-family: sans-serif;">Day Close Date: {{$date}} </h5>
                                        <h5 class="ml-4 mt-3" style="margin-bottom: 30px; font-size: 12px; font-family: sans-serif;">(A Software By BRAINIACCS 0303-2600069)</h5>
                                       <small class="ml-4" style="font-style:italic;float: right;  font-size: 16px;  font-family: sans-serif;">Printing Date: {{date('Y/m/d')}}</small>

                                    </div>

                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div style="font-weight:bolder;text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">SUMMARY</div>
                            <div class="row">
                                @if(isset($cash_in_hand))
                                @foreach($cash_in_hand as $cash)
                                <div class="col-md-2" style="border: 1px solid grey; border-radius: 6px; padding: 8px 10px;  margin: 10px">
                                    <h5>Total Expected Amount in {{$cash->branch_name}} is: {{$cash->current_balance}}.</h5>
                                </div>
                                @endforeach
                                @endif
                                    @if(isset($cash_in_hand_date))
                                @foreach($cash_in_hand_date as $cash)
                                <div class="col-md-2" style="border: 1px solid grey; border-radius: 6px; padding: 8px 10px;  margin: 10px">
                                    <h5>Total Expected Closing Balance of "{{$cash->account_name}}"is: {{$cash->closing_balance}}.</h5>
                                </div>
                                @endforeach
                                @endif
                                <div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">
                                    <h5>Total Expected Profit:{{$add}}</h5>
                                </div>
                                {{--<div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">--}}
                                    {{--<h5>Total Amount Paid:6000</h5>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">--}}
                                {{--<h5>Total Amount Received:4000</h5>--}}
                                {{--</div>--}}
                            </div>

                            @if($sales_cash_customers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sales to Customers (Cash) </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Total</td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                      <?php $i=1 ?>
                                        @foreach($sales_cash_customers as $sale)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$sale->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$sale->name}}</td>
                                            <td class="sale_cash">{{$sale->grand_total}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_sale_cash" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($sales_cash_suppliers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sales to Suppliers (Cash) </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Total</td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                      <?php $i=1 ?>
                                        @foreach($sales_cash_suppliers as $sale)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$sale->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$sale->name}}</td>
                                            <td class="sale_cash">{{$sale->grand_total}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_sale_cash" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif



                            @if($sales_credit_customers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sales to Customers (Credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Total</td>
                                            <td>Received</td>
                                            <td>Due</td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1 ?>
                                        @foreach($sales_credit_customers as $sale)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$sale->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$sale->name}}</td>
                                            <td class="sale_credit_total">{{$sale->grand_total}}</td>
                                            <td class="sale_credit_paid">{{$sale->paid}}</td>
                                            <td class="sale_credit_due">{{$sale->due}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_sale_credit_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_sale_credit_paid" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_sale_credit_due" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($sales_credit_suppliers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sales to Suppliers (Credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Total</td>
                                            <td>Received</td>
                                            <td>Due</td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1 ?>
                                        @foreach($sales_credit_suppliers as $sale)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$sale->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$sale->name}}</td>
                                            <td class="sale_credit_total">{{$sale->grand_total}}</td>
                                            <td class="sale_credit_paid">{{$sale->paid}}</td>
                                            <td class="sale_credit_due">{{$sale->due}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_sale_credit_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_sale_credit_paid" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_sale_credit_due" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif



                            @if($purchase_cash_suppliers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase fro Suppliers (Cash) </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Total</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1 ?>
                                        @foreach($purchase_cash_suppliers as $p_cash)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_cash->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_cash->name}}</td>
                                            <td class="purchase_cash_total">{{$p_cash->grand_total}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_purchase_cash_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($purchase_cash_customers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase from Customers (Cash)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Total</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1 ?>
                                        @foreach($purchase_cash_customers as $p_cash)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_cash->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_cash->name}}</td>
                                            <td class="purchase_cash_total">{{$p_cash->grand_total}}</td>
                                        </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_purchase_cash_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($purchase_credit_suppliers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase from Suppliers (Credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Total</td>
                                            <td>Paid</td>
                                            <td>Due</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1;
$sum_grand_total=0;
$sum_paid=0;
$sum_due=0;
 @endphp
                                        @foreach($purchase_credit_suppliers as $p_credit)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_credit->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_credit->name}}</td>
                                            <td class="purchase_credit_total">{{$p_credit->grand_total}}</td>
                                            <td class="purchase_credit_paid">{{$p_credit->paid}}</td>
                                            <td class="purchase_credit_due">{{$p_credit->due}}</td>
                                        </tr>
                                            @php $i++;
$sum_grand_total+=$p_credit->grand_total;
$sum_paid+=$p_credit->paid;
$sum_due+=$p_credit->due;
 @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td  style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_grand_total}}</td>
                                            <td  style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_paid}}</td>
                                            <td  style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_due}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($purchase_credit_customers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase from Customers (Credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Total</td>
                                            <td>Paid</td>
                                            <td>Due</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1;
                                        $sum_grand_total=0;
                                        $sum_paid=0;
                                        $sum_due=0;

                                         @endphp
                                        @foreach($purchase_credit_customers as $p_credit)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_credit->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_credit->name}}</td>
                                            <td class="purchase_credit_total">{{$p_credit->grand_total}}</td>
                                            <td class="purchase_credit_paid">{{$p_credit->paid}}</td>
                                            <td class="purchase_credit_due">{{$p_credit->due}}</td>
                                        </tr>
                                        @php
                                            $sum_grand_total+=$p_credit->grand_total;
                                            $sum_paid+=$p_credit->paid;
                                            $sum_due+=$p_credit->due;
                                            $i++;
                                        @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_grand_total}}</td>
                                            <td style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_paid}}</td>
                                            <td style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_due}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($purchase_return->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase Return (cash)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Return Total Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($purchase_return as $p_return)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_return->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_return->name}}</td>
                                            <td class="p_return_cash_total">{{$p_return->received_amount}}</td>
                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="p_return_cash_total_display" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($purchase_return2->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Purchase Return (credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Supplier Name</td>
                                            <td>Return Total Amount</td>
                                            <td>Paid</td>
                                            <td>Due</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($purchase_return2 as $p_return)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$p_return->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$p_return->name}}</td>
                                            <td class="p_return_total_receiving_amount" >{{$p_return->total_receiving_amount}}</td>
                                            <td class="p_return_received_amount">{{$p_return->received_amount}}</td>
                                            <td class="p_return_due">{{$p_return->amount_due}}</td>
                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_p_return_total_receiving_amount" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_p_return_received_amount" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_p_return_due" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($sale_return->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sale Return (Cash)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Return Total Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($sale_return as $s_return)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$s_return->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$s_return->name}}</td>
                                            <td  class="s_return_total">{{$s_return->total_paying_amount}}</td>
                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_s_return_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($sale_return2->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Sale Return (Credit)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Invoice</td>
                                            <td>Customer Name</td>
                                            <td>Return Total Amount</td>
                                            <td>Paid</td>
                                            <td>Due</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($sale_return2 as $s_return2)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$s_return2->invoice}}</td>
                                            <td id="r_g_1_cnic">{{$s_return2->name}}</td>
                                            <td class="s_return_credit_total">{{$s_return2->total_paying_amount}}</td>
                                            <td class="s_return_credit_paid">{{$s_return2->paid_amount}}</td>
                                            <td class="s_return_credit_due">{{$s_return2->amount_due}}</td>
                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_s_return_credit_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_s_return_credit_paid" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            <td class="t_s_return_credit_due" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($expenses->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Expenses</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Expense Head</td>
                                            <td>Expense Name</td>
                                            <td>Expense Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_g_1_name">{{$expense->expense_head}}</td>
                                            <td id="r_g_1_cnic">{{$expense->name}}</td>
                                            <td class="e_total">{{$expense->amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_e_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif

                            @if($s_receiving->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Received Amounts from Suppliers</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Supplier Name</td>
                                            <td>Description</td>
                                            <td>Receiving Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($s_receiving as $received)
                                        <tr>
                                            <td>{{$i}}</td>
                                            {{--<td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td id="r_g_1_cnic">{{$received->name}}</td>
                                            <td id="r_g_1_cnic">{{$received->description}}</td>
                                            <td class="s_r_total">{{$received->receiving_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_s_r_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($c_receiving->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Received Amounts from Customers</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Customer Name</td>
                                            <td>Description</td>
                                            <td>Received Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($c_receiving as $received)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td id="r_g_1_cnic">{{$received->name}}</td>
                                            <td id="r_g_1_cnic">{{$received->description}}</td>
                                            <td class="c_r_total">{{$received->receiving_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_c_r_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($o_receiving->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Received Amounts from Owners</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Owner Name</td>
                                            <td>Description</td>
                                            <td>Received Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($o_receiving as $received)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td id="r_g_1_cnic">{{$received->name}}</td>
                                            <td id="r_g_1_cnic">{{$received->description}}</td>
                                            <td class="c_r_total">{{$received->receiving_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_c_r_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($m_receiving->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Received Amounts from Owners</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Munshi Name</td>
                                            <td>Description</td>
                                            <td>Received Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($m_receiving as $received)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td id="r_g_1_cnic">{{$received->name}}</td>
                                            <td id="r_g_1_cnic">{{$received->description}}</td>
                                            <td class="c_r_total">{{$received->receiving_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_c_r_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif



                            @if($s_paying->count() > 0)
                                <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Paid Amounts to Suppliers</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="usertable" class="table table-bordered" >
                                            <thead>
                                            <tr style="background-color: rgba(165,165,171,0.25)">
                                                <td>Sr.</td>
                                                {{--<td>Person Type</td>--}}
                                                <td>Supplier Name</td>
                                                <td>Description</td>
                                                <td>Paid Amount</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($s_paying as $received)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    {{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                                    <td id="r_g_1_cnic">{{$received->name}}</td>
                                                    <td id="r_g_1_cnic">{{$received->description}}</td>
                                                    <td class="s_p_total">{{$received->paying_amount}}</td>

                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="t_s_p_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            @if($c_paying->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Paid Amounts to Customers</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Customer Name</td>
                                            <td>Description</td>
                                            <td>Paying Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($c_paying as $received)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td id="r_g_1_cnic">{{$received->name}}</td>
                                            <td id="r_g_1_cnic">{{$received->description}}</td>
                                            <td class="c_p_total">{{$received->paying_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_c_p_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($o_paying->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Paid Amounts to Owners</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Owner Name</td>
                                            <td>Description</td>
                                            <td>Paying Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1;
                                            $sum_total_paying_amount=0;
                                             @endphp
                                        @foreach($o_paying as $o_pay)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td>{{$o_pay->name}}</td>
                                            <td >{{$o_pay->description}}</td>
                                            <td >{{$o_pay->paying_amount}}</td>

                                        </tr>
                                            @php $i++;
$sum_total_paying_amount+=$o_pay->paying_amount;
 @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_total_paying_amount}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @if($m_paying->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Paid Amounts to Owners</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Munshi Name</td>
                                            <td>Description</td>
                                            <td>Paying Amount</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($m_paying as $m_pay)
                                        <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td>{{$m_pay->name}}</td>
                                            <td >{{$m_pay->description}}</td>
                                            <td >{{$m_pay->paying_amount}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="t_c_p_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif


                            @if($bank_trnsfers->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Bank Transfers</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            {{--<td>Person Type</td>--}}
                                            <td>Transfer From</td>
                                            <td>Transfer To</td>
                                            <td>Transfer Amount</td>
                                            <td>Description</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($bank_trnsfers as $bank_trnsfer)

                                            <tr>
                                            <td>{{$i}}</td>
{{--                                            <td id="r_g_1_name">{{$received->person_type}}</td>--}}
                                            <td >{{$bank_trnsfer->transfer_from}}</td>
                                            <td>{{$bank_trnsfer->transfer_to}}</td>
                                            <td>{{$bank_trnsfer->amount}}</td>
                                            <td>{{$bank_trnsfer->description}}</td>

                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
{{--                                        <tfoot>--}}
{{--                                        <tr>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td class="t_c_p_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
                                    </table>
                                </div>
                            </div>
                            @endif



                            @if(isset($c_stock))
                            @if($c_stock->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Dayclose Stock</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Product Name</td>
                                            <td>Closing Stock</td>
                                            <td>Purchase Price</td>
                                            <td>Sale Price</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($c_stock as $stock)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td id="r_c_p_name">{{$stock->name}}</td>
                                            <td id="r_c_p_stock">{{$stock->closing_stock}}</td>
                                            <td id="r_c_p_price">{{$stock->closing_p_rate}}</td>
                                            <td class="r_c_s_price">{{$stock->closing_s_rate}}</td>
                                        </tr>
                                            @php $i++; @endphp
                                            @endforeach
                                        </tbody>
{{--                                        <tfoot>--}}
{{--                                        <tr>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td></td>--}}
{{--                                            <td class="t_c_p_total" style="font-weight: bold;background-color: rgba(225,225,225,0.18);"></td>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
                                    </table>
                                </div>
                            </div>
                            @endif
                            @endif





                            @if(isset($employee_commission))
                                @if($employee_commission->count() > 0)
                                    <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Employee Commissions</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="usertable" class="table table-bordered" >
                                                <thead>
                                                <tr style="background-color: rgba(165,165,171,0.25)">
                                                    <td>Sr.</td>
                                                    <td>Employee Name</td>
                                                    <td>Employee Commission</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i=1; @endphp
                                                @foreach($employee_commission as $e_commission)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td id="r_p_p_name">{{$e_commission->name}}</td>
                                                        <td id="r_p_p_p_p">{{$e_commission->sum}}</td>
                                                    </tr>
                                                    @php $i++; @endphp
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="r_p_t_m_p_" style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$total_employee_commission}}</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endif



















                            @if(isset($margin_profit))
                            @if($margin_profit->count() > 0)
                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Margin Profit</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Sr.</td>
                                            <td>Product Name</td>
                                            <td>Purchase Price</td>
                                            <td>Sale Price</td>
                                            <td>Margin Profit</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($margin_profit as $m_profit)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td id="r_p_p_name">{{$m_profit->name}}</td>
                                                <td id="r_p_p_p_p">{{$m_profit->purchase_price}}</td>
                                                <td id="r_p_p_s_p">{{$m_profit->sale_price}}</td>
                                                <td id="r_p_p_m_p">{{$m_profit->margin_profit}}</td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                        </tbody>
                                                                                <tfoot>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td class="r_p_t_m_p_" style="font-weight: bold;background-color: rgba(225,225,225,0.18);">{{$sum_margin}}</td>
                                                                                </tr>
                                                                                </tfoot>
                                    </table>
                                </div>
                            </div>
                            @endif
                            @endif




                            <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Net Profit</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="usertable" class="table table-bordered" >
                                        <thead>
                                        <tr style="background-color: rgba(165,165,171,0.25)">
                                            <td>Margin Profit +</td>
                                            <td>WithHolding Tax Profit -</td>
                                            <td>Employees Commission -</td>
                                            <td>Expenses = </td>
                                            <td>Net Profit</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$sum_margin}}</td>
                                                <td>{{$withholding_profit}}</td>
                                                <td>{{$total_employee_commission}}</td>
                                                <td>{{$total_expanses}}</td>
                                                <td>{{$net_profit - $total_employee_commission}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-family: sans-serif; text-align: center;background-color: rgba(0,0,0,0.55);color: white;">
                                    <h7>A Software by Brainiac Creative Solutions (03032600069)</h7>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span style="margin-right: 75px;">
                    <button class="btn btn-info" id="print" style="float: right;margin-top: 4px;">Print Report</button>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="daycloase_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Day Close Date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <h4 style="text-align:center">Day close Date</h4><br>
                            <input type="text" class="form-control ana_date" autocomplete="off" value="<?php echo date('m/d/Y')?>" id="day_close_date">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_dayclose" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save_dayclose">Submit</button>
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
    <script>
        $(document).ready(function (e) {
            setInterval(function () {
                console.log('this is sadf');
                var p_prev_stock=$('#p_product_prev_stock').val();
                var p_new_stock=$('#p_new_stock').val();
                var p_purchase_price=$('#p_purchase_price').val();
                var p_varience=parseFloat(p_new_stock-p_prev_stock);
                var d_prev_stock=$('#d_product_prev_stock').val();
                var d_new_stock=$('#d_new_stock').val();
                var d_purchase_price=$('#d_purchase_price').val();
                var d_varience=parseFloat(d_new_stock-d_prev_stock);

                // var stock_disposed= parseFloat(-1*(new_stock-prev_stock));
                // var lost_stock_value= parseFloat(stock_disposed*purchase_priec);

                $( "#p_new_stock" ).keyup(function(){
                    if(p_new_stock == ''|| p_new_stock == null){
                        $('#p_variance').val('');
                        $('#p_lost_stock_value').val('');
                    }else{
                        $('#p_variance').val(p_varience);
                        $('#p_lost_stock_value').val(p_varience*p_purchase_price);
                    }
                });
                $( "#d_new_stock" ).keyup(function(){
                    if(d_new_stock == ''|| d_new_stock == null){
                        $('#d_variance').val('');
                        $('#d_lost_stock_value').val('');
                    }else{
                        $('#d_variance').val(d_varience);
                        $('#d_lost_stock_value').val(d_varience*d_purchase_price);
                    }
                });
            },100);


            $(".save_dayclose").click(function (e) {

                var dayclose_date=$('#day_close_date').val();

                if ($('.is-invalid').length<1) {
                    $.ajax({
                        url: '{{ url("dayclose/closeday") }}',
                        type: 'get',
                        data: {
                            'dayclose_date':dayclose_date,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            console.log("this is data");
                            console.log(data);
                            $.notify('<strong>Saving</strong> Do not close this page...', {
                                type: 'success',
                                allow_dismiss: false,
                                showProgressbar: true,
                                timer: 700,
                                delay: 1000,
                            });
                            window.location.assign("{{url('dayclose/report')}}");
                           $('#analysed_date').val('<?php echo date("m/d/Y"); ?>');
                           $('.close_dayclose').click();
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
    {{--<script src="{{ url('js/pipline.js') }}"></script>--}}
    <script>
        $(document).ready(function (e) {




            var t_sale_cash = 0;
            // iterate through each td based on class and add the values
            $(".sale_cash").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_sale_cash += parseFloat(value);
                }
                console.log(t_sale_cash);
            });
            $(".t_sale_cash").text(t_sale_cash);



            var t_sale_credit_due = 0;
            // iterate through each td based on class and add the values
            $(".sale_credit_due").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_sale_credit_due += parseFloat(value);
                }
                console.log(t_sale_credit_due);
            });
            $(".t_sale_credit_due").text(t_sale_credit_due);

            var t_sale_credit_total = 0;
            // iterate through each td based on class and add the values
            $(".sale_credit_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_sale_credit_total += parseFloat(value);
                }
                console.log(t_sale_credit_total);
            });
            $(".t_sale_credit_total").text(t_sale_credit_total);


            var t_sale_credit_paid = 0;
            // iterate through each td based on class and add the values
            $(".sale_credit_paid").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_sale_credit_paid += parseFloat(value);
                }
                console.log(t_sale_credit_paid);
            });
            $(".t_sale_credit_paid").text(t_sale_credit_paid);

            var t_purchase_credit_total = 0;
            // iterate through each td based on class and add the values
            $(".purchase_credit_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_purchase_credit_total += parseFloat(value);
                }
                console.log(t_purchase_credit_total);
            });
            $(".t_purchase_credit_total").text(t_purchase_credit_total);

            var t_purchase_credit_paid = 0;
            // iterate through each td based on class and add the values
            $(".purchase_credit_paid").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_purchase_credit_paid += parseFloat(value);
                }
                console.log(t_purchase_credit_paid);
            });
            $(".t_purchase_credit_paid").text(t_purchase_credit_paid);


            var t_purchase_credit_due = 0;
            // iterate through each td based on class and add the values
            $(".purchase_credit_due").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_purchase_credit_due += parseFloat(value);
                }
                console.log(t_purchase_credit_due);
            });
            $(".t_purchase_credit_due").text(t_purchase_credit_due);


            var t_purchase_cash_total = 0;
            // iterate through each td based on class and add the values
            $(".purchase_cash_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    t_purchase_cash_total += parseFloat(value);
                }
                console.log(t_purchase_cash_total);
            });
            $(".t_purchase_cash_total").text(t_purchase_cash_total);

            var p_return_cash_total = 0;
            // iterate through each td based on class and add the values
            $(".p_return_cash_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_cash_total += parseFloat(value);
                }
                console.log(p_return_cash_total);
            });
            $(".p_risplayeturn_cash_total_d").text(p_return_cash_total);



            var p_return_total_receiving_amount = 0;
            // iterate through each td based on class and add the values
            $(".p_return_total_receiving_amount").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_total_receiving_amount += parseFloat(value);
                }
                console.log(p_return_total_receiving_amount);
            });
            $(".t_p_return_total_receiving_amount").text(p_return_total_receiving_amount);




            var p_return_total_receiving_amount = 0;
            // iterate through each td based on class and add the values
            $(".p_return_total_receiving_amount").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_total_receiving_amount += parseFloat(value);
                }
                console.log(p_return_total_receiving_amount);
            });
            $(".t_p_return_total_receiving_amount").text(p_return_total_receiving_amount);



            var p_return_received_amount = 0;
            // iterate through each td based on class and add the values
            $(".t_p_return_received_amount").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_received_amount += parseFloat(value);
                }
                console.log(p_return_received_amount);
            });
            $(".t_p_return_received_amount").text(p_return_received_amount);


            var p_return_received_amount = 0;
            // iterate through each td based on class and add the values
            $(".p_return_received_amount").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_received_amount += parseFloat(value);
                }
                console.log(p_return_received_amount);
            });
            $(".t_p_return_received_amount").text(p_return_received_amount);


            var p_return_due = 0;
            // iterate through each td based on class and add the values
            $(".p_return_due").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    p_return_due += parseFloat(value);
                }
                console.log(p_return_due);
            });
            $(".t_p_return_due").text(p_return_due);


            var s_return_total = 0;
            // iterate through each td based on class and add the values
            $(".s_return_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_return_total += parseFloat(value);
                }
                console.log(s_return_total);
            });
            $(".t_s_return_total").text(s_return_total);


            var s_return_credit_total = 0;
            // iterate through each td based on class and add the values
            $(".s_return_credit_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_return_credit_total += parseFloat(value);
                }
                console.log(s_return_credit_total);
            });
            $(".t_s_return_credit_total").text(s_return_credit_total);


            var s_return_credit_paid = 0;
            // iterate through each td based on class and add the values
            $(".s_return_credit_paid").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_return_credit_paid += parseFloat(value);
                }
                console.log(s_return_credit_paid);
            });
            $(".t_s_return_credit_paid").text(s_return_credit_paid);


            var s_return_credit_due = 0;
            // iterate through each td based on class and add the values
            $(".s_return_credit_due").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_return_credit_due += parseFloat(value);
                }
                console.log(s_return_credit_due);
            });
            $(".t_s_return_credit_due").text(s_return_credit_due);


            var e_total = 0;
            // iterate through each td based on class and add the values
            $(".e_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    e_total += parseFloat(value);
                }
                console.log(e_total);
            });
            $(".t_e_total").text(e_total);



            var s_r_total = 0;
            // iterate through each td based on class and add the values
            $(".s_r_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_r_total += parseFloat(value);
                }
                console.log(s_r_total);
            });
            $(".t_s_r_total").text(s_r_total);

            var c_r_total = 0;
            // iterate through each td based on class and add the values
            $(".c_r_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    c_r_total += parseFloat(value);
                }
                console.log(c_r_total);
            });
            $(".t_c_r_total").text(c_r_total);

            var c_p_total = 0;
            // iterate through each td based on class and add the values
            $(".c_p_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    c_p_total += parseFloat(value);
                }
                console.log(c_p_total);
            });
            $(".t_c_p_total").text(c_p_total);

            var s_p_total = 0;
            // iterate through each td based on class and add the values
            $(".s_p_total").each(function() {
                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    s_p_total += parseFloat(value);
                }
                console.log(s_p_total);
            });
            $(".t_s_p_total").text(s_p_total);



            $('#print').click(function (e) {
                var html = $('#day_close_report').html();
                var myWindow = window.open("", '', 'width=900,height=800');
                myWindow.document.write('<head>' + '<link href="{{asset('assets/css/demo10/style.bundle.css ')}}" rel="stylesheet" type="text/css" />' + '</head>');
                myWindow.document.write(html);

            });
            $('#closeday').click(function (e) {
                $('.loading_sp').css('display','inline');
                $.ajax({
                    url:'{{url('dayclose/closeday')}}',
                    type: 'get',

                    success:function (data) {
                        console.log(data);
                        $.notify('<strong>Saving</strong> Do not close this page...', {
                            type: 'success',
                            allow_dismiss: false,
                            showProgressbar: true,
                            timer: 700,
                            delay: 1000,
                        });
                        $('.loading_sp').css('display','none');
                    },
                    error:function (error) {
                        console.log(error.responseText);
                    }
                });

            });
        });
    </script>


@endsection


