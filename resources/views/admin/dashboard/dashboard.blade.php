@extends('mainpages.maindmin')
@section('content')
    {{--<div class="kt-subheader kt-grid__item" id="kt_subheader">--}}
        {{--<div class="kt-container ">--}}
            {{--<div class="kt-subheader__main">--}}

                {{--<h3 class="kt-subheader__title">Dashboard</h3>--}}

                {{--<span class="kt-subheader__separator kt-subheader__separator--v"></span>--}}

                {{--<span class="kt-subheader__desc">#XRS-45670</span>--}}

                {{--<a href="#" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">--}}
                    {{--Add New--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="kt-subheader__toolbar">--}}
                {{--<div class="kt-subheader__wrapper">--}}
                    {{--<a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">--}}
                        {{--<span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;--}}
                        {{--<span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>--}}
                        {{--<i class="flaticon2-calendar-1"></i>--}}
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

        <!--Begin::Row-->
        <!--End::Row-->

        <!--Begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                            <h3 class="kt-portlet__head-title">
                                Income and Expense
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div id="kt_amcharts_2" style="height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                        <i class="la la-gear"></i>
                    </span>
                            <h3 class="kt-portlet__head-title">
                                Business Worth
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-portlet">
                            <div class="kt-portlet__body  kt-portlet__body--fit">
                                <div class="row row-no-padding row-col-separator-lg">
                                    <div class="col-md-12 col-lg-6 col-xl-3">

                                        <!--begin::Total Profit-->
                                        <div class="kt-widget24">
                                            <div class="kt-widget24__details">
                                                <div class="kt-widget24__info">
                                                    <h4 class="kt-widget24__title">
                                                        Total Amount
                                                    </h4>
                                                    <span class="kt-widget24__desc">
																	Sum of currently available amount in Accounts
																</span>
                                                </div>

                                            </div>
                                            <span class=" kt-font-brand kt-widget24__stats" style="font-size: 24px;">
{{--																{{$totalamount}}--}}
                                                <?php echo number_format((float)$totalamount, 2, '.', ''); ?>

															</span>
                                            <div class="progress progress--sm">
                                                <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
{{--                                            <div class="kt-widget24__action">--}}
{{--															<span class="kt-widget24__change">--}}
{{--																Change--}}
{{--															</span>--}}
{{--                                                <span class="kt-widget24__number">--}}
{{--																78%--}}
{{--															</span>--}}
{{--                                            </div>--}}
                                        </div>

                                        <!--end::Total Profit-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">

                                        <!--begin::New Feedbacks-->
                                        <div class="kt-widget24">
                                            <div class="kt-widget24__details">
                                                <div class="kt-widget24__info">
                                                    <h4 class="kt-widget24__title">
                                                        Payable Amounts
                                                    </h4>
                                                    <span class="kt-widget24__desc">
																	Total payable amount to suppliers and customers.
																</span>
                                                </div>
                                            </div>
                                            <span class="kt-widget24__stats kt-font-warning" style="font-size: 24px;">
{{--																{{abs($payable)}}--}}
                                                <?php echo number_format((float)abs($payable), 2, '.', ''); ?>

															</span>
                                            <div class="progress progress--sm">
                                                <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
{{--                                            <div class="kt-widget24__action">--}}
{{--															<span class="kt-widget24__change">--}}
{{--																Change--}}
{{--															</span>--}}
{{--                                                <span class="kt-widget24__number">--}}
{{--																84%--}}
{{--															</span>--}}
{{--                                            </div>--}}
                                        </div>

                                        <!--end::New Feedbacks-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">

                                        <!--begin::New Orders-->
                                        <div class="kt-widget24">
                                            <div class="kt-widget24__details">
                                                <div class="kt-widget24__info">
                                                    <h4 class="kt-widget24__title">
                                                        Receivable Amount
                                                    </h4>
                                                    <span class="kt-widget24__desc">
																	Total Receivable amount from customers and suppliers.
																</span>
                                                </div>

                                            </div>
                                            <span class="kt-widget24__stats kt-font-danger" style="font-size: 24px;">
{{--																{{$receivable}}--}}
                                                <?php echo number_format((float)$receivable, 2, '.', ''); ?>
															</span>
                                            <div class="progress progress--sm">
                                                <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
{{--                                            <div class="kt-widget24__action">--}}
{{--															<span class="kt-widget24__change">--}}
{{--																Change--}}
{{--															</span>--}}
{{--                                                <span class="kt-widget24__number">--}}
{{--																69%--}}
{{--															</span>--}}
{{--                                            </div>--}}
                                        </div>

                                        <!--end::New Orders-->
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-3">

                                        <!--begin::New Users-->
                                        <div class="kt-widget24">
                                            <div class="kt-widget24__details">
                                                <div class="kt-widget24__info mb-4">
                                                    <h4 class="kt-widget24__title">
                                                        Stock Worth
                                                    </h4>
                                                    <span class="kt-widget24__desc ">
																	Total amount of available Stock
																</span>
                                                </div>
                                            </div>
                                            <span class="kt-widget24__stats kt-font-success" style="font-size: 24px;">
{{--																{{$productsworth  }}--}}
																<?php echo number_format((float)$productsworth, 2, '.', ''); ?>
															</span>
                                            <div class="progress progress--sm">
                                                <div class="progress-bar kt-bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
{{--                                            <div class="kt-widget24__action">--}}
{{--															<span class="kt-widget24__change">--}}
{{--																Change--}}
{{--															</span>--}}
{{--                                                <span class="kt-widget24__number">--}}
{{--																90%--}}
{{--															</span>--}}
{{--                                            </div>--}}
                                        </div>

                                        <!--end::New Users-->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
            {{--<script src="assets/js/demo10/pages/components/charts/amcharts/charts.js" type="text/javascript"></script>--}}
            <script src="{{ url('js/charts/amcharts.js') }}" type="text/javascript"></script>
            <script src="{{ url('js/charts/serial.js') }}" type="text/javascript"></script>
            <script src="{{ url('js/charts/radar.js') }}" type="text/javascript"></script>
            <script src="{{ url('js/charts/pie.js') }}" type="text/javascript"></script>
{{--            <script src="{{ url('js/charts/charts.js') }}" type="text/javascript"></script>--}}
{{--            <script src="{{ url('js/charts/animate.js') }}" type="text/javascript"></script>--}}
{{--            <script src="{{ url('js/charts/export.js') }}" type="text/javascript"></script>--}}
            <script src="{{ url('js/charts/polarScatter.min.js') }}" type="text/javascript"></script>
{{--            <script src="{{ url('js/charts/charts.js') }}" type="text/javascript"></script>--}}

            <script>


                $(document).ready(function (e) {
                    // createChart([]);
                    $.ajax({
                       url:'{{ url('product/getchartdata') }}',
                       type:'get',
                       success:function (data) {
                           createChart(data);
                       }
                    });
                });

                function createChart(myData) {
                    AmCharts.makeChart("kt_amcharts_2", {
                            rtl:KTUtil.isRTL(), type:"serial", addClassNames:!0, theme:"light", autoMargins:!1, marginLeft:30, marginRight:8, marginTop:10, marginBottom:26, balloon: {
                                adjustBorderColor: !1, horizontalPadding: 10, verticalPadding: 8, color: "#ffffff"
                            }
                            , dataProvider:myData,
                        valueAxes:[ {
                                axisAlpha: 0, position: "left"
                            }
                            ], startDuration:1, graphs:[ {
                                alphaField: "alpha", balloonText: "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>", fillAlphas: 1, title: "Income", type: "column", valueField: "income", dashLengthField: "dashLengthColumn"
                            }
                                , {
                                    id: "graph2", balloonText: "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>", bullet: "round", lineThickness: 3, bulletSize: 7, bulletBorderAlpha: 1, bulletColor: "#FFFFFF", useLineColorForBulletBorder: !0, bulletBorderThickness: 3, fillAlphas: 0, lineAlpha: 1, title: "Expenses", valueField: "expenses", dashLengthField: "dashLengthLine"
                                }
                            ], categoryField:"year", categoryAxis: {
                                gridPosition: "start", axisAlpha: 0, tickLength: 0
                            }
                            , export: {
                                enabled: !0
                            }
                        }
                    );
                }
            </script>

@endsection