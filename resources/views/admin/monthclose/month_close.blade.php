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
                            <h3 class="kt-portlet__head-title">Month Close Report</h3>
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
                    @if(isset($last_date))
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center"><label class="text-center">Last Month Close Time</label>
                                <br>

                                <b class="last_date">{{time_elapsed_string($last_date->closing_date)}}</b>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    @endif
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 mb-5">--}}
{{--                            <button class="btn btn-success  form-control" type="submit" data-toggle="modal" data-target="#monthclose" >Close Month &nbsp;&nbsp;&nbsp;--}}
{{--                                <span class="loading_sp kt-spinner kt-spinner--lg kt-spinner--v2 kt-spinner--brand"></span>--}}
{{--                            </button>--}}


{{--                        </div>--}}
{{--                        <div class="col-md-4"></div>--}}
{{--                    </div>--}}
                    @if(isset($month_dates))
                    <form action=" {{url('monthclose/databydate')}}" method="post">
                        {{csrf_field()}}
                        <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
                            <div class="col-md-3">
                            </div>
{{--                            @if(isset($date))--}}
{{--                            <div class="col-md-3">--}}
{{--                                <label style="text-align: center">Date</label>--}}
{{--                                <input name="date" style="background-color: white!important;" readonly id="daaa" value="{{ $date }}" class="form-control " placeholder="Date" type="text">--}}
{{--                            </div>--}}
{{--                                @else--}}
                                <div class="col-md-3">
                                    <label style="text-align: center">Prev Month Closes</label>
                                    <select class="form-control month_date" id="kt_select2_1" name="dates">
                                        @foreach($month_dates as $dates)
                                        <option value="{{$dates->id}}">{{date('Y/m/d',strtotime($dates->closing_date_from)).' --- '.date('Y/m/d',strtotime($dates->closing_date_to))}}</option>
                                            @endforeach
                                    </select>
                                </div>
{{--                            @endif--}}
                            <div class="col-md-3" style="margin-top: 26px;">
                                <button class="btn btn-primary btn-sm form-control" type="submit" id="loadledgerbydate">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif

                    <div class="container" id="day_close_report">
                        {{--<div class="kt-heading kt-heading--md">Invoice Report</div>--}}
                        <div style="border: 1px solid black;border-radius: 4px;padding: 30px;" >
                            <div class="kt-heading kt-heading--sm">


                                <div class="col-md-12 alert" style="background-color: rgba(0,0,0,0.55);color: white;">
                                    <div class="col-md-6 pl-4">
                                        <h4 class="" style="font-family: sans-serif;">{{credentials()->designation}}</h4>
                                        <h4 class="m-0" style="font-family: sans-serif;">{{credentials()->owner_name}}</h4>
                                        <h2 class=" mr-2 mt-4" style="font-family: sans-serif;text-decoration: underline">Month Close</h2>

                                        {{--                                        <span class=" mr-2" style="font-family: sans-serif;">Secretary Fertilizers Dealers Association Sargodha Devision</span>--}}
                                    </div>
                                    <div class="col-md-6">
                                        {{--                                        <h4 class="ml-4" style="font-family: sans-serif;">Shell Pakistan Limited</h4>--}}
                                        <h3 class="ml-4 m-0" style="font-family: sans-serif;">{{credentials()->address}}</h3>
                                        <span class="ml-4" style="font-family: sans-serif;">{{credentials()->phone1}}</span>
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
                                    @if(isset($add))
                                <div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">
                                    <h5>Total Expected Profit:{{$add}}</h5>
                                </div>
                                    @endif
                                {{--<div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">--}}
                                {{--<h5>Total Amount Paid:6000</h5>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2" style="border: 1px solid grey;border-radius: 6px; padding: 8px 10px; margin: 10px">--}}
                                {{--<h5>Total Amount Received:4000</h5>--}}
                                {{--</div>--}}
                            </div>

                            @if(isset($product_wise_profit))
                                @if($product_wise_profit->count() > 0)
                                    <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Total Sales</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="usertable" class="table table-bordered" >
                                                <thead>
                                                <tr style="background-color: rgba(165,165,171,0.25)">
                                                    <td>Sr.</td>
                                                    <td>Category</td>
                                                    <td>Product Name</td>
                                                    <td>Sale Qty</td>
                                                    <td>Amount</td>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=1 ?>
                                                @foreach($product_wise_profit as $t_sale)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$t_sale->cc_name}}</td>
                                                        <td>{{$t_sale->p_name}}</td>
                                                        <td>{{$t_sale->quantity}}</td>
                                                        <td>{{$t_sale->p_amount}}</td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endif
                            @endif

                            @if(isset($expenses))
                            @if($expenses->count() > 0)
                                <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Expenses</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="usertable" class="table table-bordered" >
                                            <thead>
                                            <tr style="background-color: rgba(165,165,171,0.25)">
                                                <td>Sr.</td>
                                                <td>Expense Head</td>
{{--                                                <td>Expense Name</td>--}}
                                                <td>Expense Amount</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($expenses as $expense)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td id="r_g_1_name">{{$expense->expense_head}}</td>
{{--                                                    <td id="r_g_1_cnic">{{$expense->name}}</td>--}}
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
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            @endif

                            @if(isset($s_receiving))
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
                            @endif
                            @if(isset($c_receiving))
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
                            @endif
                            @if(isset($s_paying))
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
                            @endif

                            @if(isset($c_paying))
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
                            @endif

                            @if(isset($c_stock))
                            @if($c_stock->count() > 0)
                                <div style="text-align: center;background-color: lightgrey;color: black;font-size: 20px;margin-bottom: 10px;">Monthclose Stock</div>
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
    <div class="modal fade" id="monthclose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Month Close Dates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <h4 style="text-align:center">Month close Date</h4><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
{{--                            <h4 style="text-align:center">Month close Date</h4><br>--}}
                            <label>From</label>

                            <input type="text" class="form-control ana_date" autocomplete="off" value="<?php echo date('m/d/Y')?>" id="day_close_date_from">

                        </div>
                        <div class="col-md-3">
{{--                            <h4 style="text-align:center">Month close Date</h4><br>--}}
                            <label>To</label>
                            <input type="text" class="form-control ana_date" autocomplete="off" value="<?php echo date('m/d/Y')?>" id="day_close_date_to">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_wet_stock" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_month_close">Submit</button>
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
            // $('.selectproduct').on('select2:select',function () {
            //
            //
            // });

            $("#sale").keypress(function(e) {
                if(e.which == 13) {
                    $(".save").click();
                }
            });

            $('.selectproduct').on('select2:select',function () {
                var id=$('.selectproduct').val();
                // alert(id);
                $.ajax({
                    url:'{{url('dispose/fetch_prev_data')}}',
                    type: 'post',
                    data:{'id':id,'_token':'{{csrf_token()}}'},
                    success:function (data) {
                        console.log(data);
                        // console.log(data.opening_stock);
                        // $('.').html('');
                        $('#product_prev_stock').val(data.stock.total_qty);
                        if(data.opening_Stock){
                            $('#opening_stock').val(data.opening_stock.closing_stock);
                        }else{
                            $('#opening_stock').val(0);
                        }
                        $('#purchase_price').val(data.stock.purchase_price);
                        $('#prev_purchases').val(data.purchases);
                        $('#prev_sales').val(data.sale);

                        var prev_stock=$('#product_prev_stock').val();
                        var new_stock=$('#new_stock').val();
                        var purchase_price=$('#purchase_price').val();
                        var varience=parseFloat(new_stock-prev_stock);
                        if(new_stock == '' || new_stock ==null) {
                            $('#variance').val('');
                            $('#lost_stock_value').val('');
                        }else{
                            $('#variance').val(varience);
                            $('#lost_stock_value').val(varience*purchase_price);
                        }
                    },
                    error:function (error) {
                        console.log(error.responseText);
                    }
                });
            });


            $("#save_month_close").on('click',function (e) {
                var dayclose_date_from=$('#day_close_date_from').val();
                var dayclose_date_to=$('#day_close_date_to').val();
                // alert(dayclose_date_from);
                // alert(dayclose_date_to);
                $.ajax({
                    url: '{{ url("monthclose/close_month") }}',
                    type: 'post',
                    data: {
                        'dayclose_date_from':dayclose_date_from,
                        'dayclose_date_to':dayclose_date_to,
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
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error.responseText);
                        //
                    }
                });

                // alert('hehe');
            });
                $(".save_wet_stock").click(function (e) {
                    // alert('save');
                    var p_product=$('#p_product').attr('p_id');
                    var p_prev_purchases=$('#p_prev_purchases').val();
                    var p_prev_sales=$('#p_prev_sales').val();
                    var p_opening_stock=$('#p_opening_stock').val();
                    var p_prev_stock=$('#p_product_prev_stock').val();
                    var p_new_stock=$('#p_new_stock').val();
                    var p_lost_stock=$('#p_variance').val();
                    var p_product_testing=$('#p_product_testing').val();
                    var p_lost_stock_value=$('#p_lost_stock_value').val();

                    var d_product=$('#d_product').attr('d_id');
                    var d_prev_purchases=$('#d_prev_purchases').val();
                    var d_prev_sales=$('#d_prev_sales').val();
                    var d_opening_stock=$('#d_opening_stock').val();
                    var d_prev_stock=$('#d_product_prev_stock').val();
                    var d_new_stock=$('#d_new_stock').val();
                    var d_lost_stock=$('#d_variance').val();
                    var d_product_testing=$('#d_product_testing').val();
                    var d_lost_stock_value=$('#d_lost_stock_value').val();

                    var dayclose_date=$('#day_close_date').val();


                    //validation
                    if (p_new_stock == '' || p_new_stock == null) {
                        $('#p_new_stock').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Petrol Actual Value.').addClass('text-danger').show();
                    } else {
                        $('#p_new_stock').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }
                    if (p_product_testing == '' || p_product_testing == null) {
                        $('#p_product_testing').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Petrol Testing qty.').addClass('text-danger').show();
                    } else {
                        $('#p_product_testing').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }

                    if (d_new_stock == '' || d_new_stock == null) {
                        $('#d_new_stock').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Diesel Actual Value.').addClass('text-danger').show();
                    } else {
                        $('#d_new_stock').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }
                    if (d_product_testing == '' || d_product_testing == null) {
                        $('#d_product_testing').addClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('Enter Diesel Testing qty.').addClass('text-danger').show();
                    } else {
                        $('#d_product_testing').removeClass('is-invalid').addClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                    }

                    if ($('.is-invalid').length<1) {
                        $.ajax({
                            url: '{{ url("dispose/insert_new_dispose") }}',
                            type: 'post',
                            data: {
                                'p_product':p_product,
                                'p_prev_purchases':p_prev_purchases,
                                'p_prev_sales':p_prev_sales,
                                'p_opening_stock':p_opening_stock,
                                'p_new_stock':p_new_stock,
                                'p_prev_stock':p_prev_stock,
                                'p_lost_stock':p_lost_stock,
                                'p_lost_stock_value':p_lost_stock_value,
                                'p_product_testing':p_product_testing,

                                'd_product':d_product,
                                'd_prev_purchases':d_prev_purchases,
                                'd_prev_sales':d_prev_sales,
                                'd_opening_stock':d_opening_stock,
                                'd_new_stock':d_new_stock,
                                'd_prev_stock':d_prev_stock,
                                'd_lost_stock':d_lost_stock,
                                'd_lost_stock_value':d_lost_stock_value,
                                'd_product_testing':d_product_testing,

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
                                location.reload();
                                $('.selectproduct').val('defaultproduct').change();
                                $('#product_prev_stock').val('');
                                $('#new_stock').val('');
                                $('#lost_stock').val('');
                                $('#lost_stock_value').val('');
                                $('#analysed_date').val('<?php echo date("m/d/Y"); ?>');

                                $('.selectproduct').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('#product_prev_stock').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('#new_stock').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('#lost_stock').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('#lost_stock_value').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('#analysed_date').removeClass('is-invalid').removeClass('is-valid').closest('div').children('.form-text').text('').addClass('text-danger').hide();
                                $('.close_wet_stock').click();
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


