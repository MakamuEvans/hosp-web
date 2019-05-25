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
                        <div class="page-title-right">
                            <a href="{{route('check-ins.create')}}" class="btn btn-success">New Check In</a>

                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <new-check-in></new-check-in>
                            </div><!-- /.modal -->
                        </div>
                        <h4 class="page-title">Check Ins</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <div class="responsive-table-plugin">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th data-priority="1">Client</th>
                                            <th data-priority="3">Weight</th>
                                            <th data-priority="1">Temperature</th>
                                            <th data-priority="1">Assigned Doctor</th>
                                            <th data-priority="1">Status</th>
                                            <th data-priority="1">Dated</th>
                                            <th data-priority="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $appointment)
                                            <tr>
                                                <th>{{$appointment->id}}</th>
                                                <td><span class="co-name">{{$appointment->client->names}}</span></td>
                                                <td>{{$appointment->weight}}</td>
                                                <td>{{$appointment->temperature}}</td>
                                                <td>{{$appointment->doctor_diagnosis->doctor->name}}</td>
                                                <td>{{$appointment->decoded_progress}}</td>
                                                <td>{{$appointment->formatted_date}}</td>
                                                <td>
                                                    <a href="{{route('check-ins.show', [$appointment->id])}}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
@endsection