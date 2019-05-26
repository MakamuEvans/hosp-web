@extends('layouts.master')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper" id="app">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Check In: {{$checkIn->client->names}}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-8">
                    <div class="bg-picture card-box">
                        <div class="profile-info-name">
                            <img src="{{asset('assets/images/profile.jpg')}}"
                                 class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image">

                            <div class="profile-info-detail overflow-hidden">
                                <h4 class="m-0">{{$checkIn->client->names}}</h4>
                                <p class="text-muted"><i>DOB: {{$checkIn->client->dob}} |
                                        Gender: {{$checkIn->client->formatted_gender}} | Blood
                                        Group: {{$checkIn->client->blood_type}}</i></p>
                                <p class="text-muted"><i>Physical Checks: Weight{{$checkIn->weight}} | Body
                                        Temperature: {{$checkIn->temperature}}</i></p>
                                <p class="font-13">Notes: {{$checkIn->client->remarks}}</p>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--/ meta -->


                    <form method="post" action="{{route('doctor-diagnosis.update', [$checkIn->doctor_diagnosis->id])}}"
                          class="card-box">
                        <span class="input-icon icon-right">
                            @csrf
                            {{ method_field('PATCH') }}
                            <label>Doctor's Diagnosis</label>
                            <textarea rows="5" class="form-control" name="remarks"
                                      placeholder="Doctor's Diagnosis">{{$checkIn->doctor_diagnosis->remarks}}</textarea>
                        </span>
                        @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::DOCTOR)
                            <div class="pt-1">
                                <button type="submit"
                                        class="btn form-control btn-primary btn-sm waves-effect waves-light">Save
                                </button>
                            </div>
                        @endif
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row pull-right">
                                    <label style="margin-right: 20px">Lab Tests </label>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::DOCTOR)
                                        <a href="javascript;;" data-toggle="modal" data-target="#myModal"
                                           class="pull-right">Request Lab Test</a>
                                    @endif
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <lab-test :checkin="{{$checkIn}}"></lab-test>
                                    </div><!-- /.modal -->
                                </div>
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th data-priority="1">Test Name</th>
                                                    <th data-priority="3">Technician</th>
                                                    <th data-priority="3">Remarks</th>
                                                    <th data-priority="3">dated</th>
                                                    <th data-priority="3">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($checkIn->lab_diagnosis as $item)
                                                    <tr>
                                                        <th>{{$item->id}}</th>
                                                        <td><span class="co-name">{{$item->test->name}}</span></td>
                                                        <td>{{$item->technician->name ?? 'N/A'}}</td>
                                                        <td>{{$item->remarks}}</td>
                                                        <td>{{$item->formatted_date}}</td>
                                                        <td>
                                                            @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::LAB_TECHNICIAN)
                                                                <a href="javascript;;" title="Reply" data-toggle="modal"
                                                                   data-target="#lab_{{$item->id}}"><i
                                                                            class="fa fa-reply"></i> </a>
                                                                <div id="lab_{{$item->id}}" class="modal fade"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <lab-test :checkin="{{$checkIn}}"
                                                                              :test="{{$item}}"></lab-test>
                                                                </div><!-- /.modal -->
                                                            @else
                                                                Not Allowed
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row pull-right">
                                    <label style="margin-right: 20px">Radiology Tests </label>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::DOCTOR)
                                        <a href="javascript;;" data-toggle="modal" data-target="#myModal2"
                                           class="pull-right">Request Radiology Test</a>
                                    @endif
                                    <div id="myModal2" class="modal fade" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <radiology-test :checkin="{{$checkIn}}"></radiology-test>
                                    </div><!-- /.modal -->
                                </div>
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th data-priority="1">Test Name</th>
                                                    <th data-priority="3">Technician</th>
                                                    <th data-priority="3">Remarks</th>
                                                    <th data-priority="3">Dated</th>
                                                    <th data-priority="3">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($checkIn->radiology_diagnosis as $item)
                                                    <tr>
                                                        <th>{{$item->id}}</th>
                                                        <td><span class="co-name">{{$item->test->name}}</span></td>
                                                        <td>{{$item->technician->name ?? 'N/A'}}</td>
                                                        <td>{{$item->remarks}}</td>
                                                        <td>{{$item->formatted_date}}</td>
                                                        <td>
                                                            @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::RADIOLOGY_TECHNICIAN)
                                                                <a href="javascript;;" title="Reply" data-toggle="modal"
                                                                   data-target="#radiology_{{$item->id}}"><i
                                                                            class="fa fa-reply"></i> </a>
                                                                <div id="radiology_{{$item->id}}" class="modal fade"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <radiology-test :checkin="{{$checkIn}}"
                                                                                    :test="{{$item}}"></radiology-test>
                                                                </div><!-- /.modal -->
                                                            @else
                                                                Not Allowed
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row pull-right">
                                    <label style="margin-right: 20px">Medication</label>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::DOCTOR)
                                        <a href="javascript;;" data-toggle="modal" data-target="#myModal3"
                                           class="pull-right">Request Drugs</a>
                                    @endif
                                    <div id="myModal3" class="modal fade" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <medication :checkin="{{$checkIn}}"></medication>
                                    </div><!-- /.modal -->
                                </div>
                                <div class="responsive-table-plugin">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th data-priority="1">Drug</th>
                                                    <th data-priority="3">Chemist</th>
                                                    <th data-priority="3">Remarks</th>
                                                    <th data-priority="3">Dated</th>
                                                    <th data-priority="3">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($checkIn->medication as $item)
                                                    <tr>
                                                        <th>{{$item->id}}</th>
                                                        <td><span class="co-name">{{$item->drug->name}}</span></td>
                                                        <td>{{$item->chemist->name ?? 'N/A'}}</td>
                                                        <td>{{$item->remarks}}</td>
                                                        <td>{{$item->formatted_date}}</td>
                                                        <td>
                                                            @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::ADMIN || \Illuminate\Support\Facades\Auth::user()->user_type == \App\Helpers\Constants::CHEMIST)
                                                                <a href="javascript;;" title="Reply" data-toggle="modal"
                                                                   data-target="#chem_{{$item->id}}"><i
                                                                            class="fa fa-reply"></i> </a>
                                                                <div id="chem_{{$item->id}}" class="modal fade"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <medication :checkin="{{$checkIn}}"
                                                                                :medication="{{$item}}"></medication>
                                                                </div><!-- /.modal -->
                                                            @else
                                                                Not Allowed
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection