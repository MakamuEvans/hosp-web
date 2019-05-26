@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Adminto</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">

                        <h4 class="header-title mt-0 mb-4">Clients</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="100" data-fgColor="#f05050 "
                                       data-bgColor="#F9B9B9" value="100"
                                       data-skin="tron" data-angleOffset="360" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$clients}} </h2>
                                <p class="text-muted mb-1">Clients Registered</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">

                        <h4 class="header-title mt-0 mb-3">Appointments</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-right">
{{--
                                <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
--}}
                                <h2 class="font-weight-normal mb-1"> {{$appointments}} </h2>
                                <p class="text-muted mb-3">Appointments Made</p>
                            </div>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success" role="progressbar"
                                     aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 77%;">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-4">Drugs</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                       data-bgColor="#FFE6BA" value="100"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{$drugs}} </h2>
                                <p class="text-muted mb-1">Drug Stock</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">

                        <h4 class="header-title mt-0 mb-3">Users</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-right">
                                <h2 class="font-weight-normal mb-1"> {{$users}} </h2>
                                <p class="text-muted mb-3">System Users</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar"
                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 77%;">
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
@endsection
