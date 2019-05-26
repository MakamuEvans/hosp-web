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
                            <a href="javascript;;" data-toggle="modal" data-target="#myModal" class="btn btn-success">Add
                                New</a>

                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <add-client></add-client>
                            </div><!-- /.modal -->
                        </div>
                        <h4 class="page-title">Clients</h4>
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
                                            <th data-priority="1">Names</th>
                                            <th data-priority="3">Gender</th>
                                            <th data-priority="3">DOB</th>
                                            <th data-priority="3">Contact</th>
                                            <th data-priority="1">Blood Type</th>
                                            <th data-priority="1">Remarks</th>
                                            <th data-priority="3">Created On</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $client)
                                            <tr>
                                                <th>{{$client->id}}</th>
                                                <td><span class="co-name">{{$client->names}}</span></td>
                                                <td>{{$client->formatted_gender}}</td>
                                                <td>{{$client->dob}}</td>
                                                <td>{{$client->phone_number}}</td>
                                                <td>{{$client->blood_type}}</td>
                                                <td>{{$client->remarks}}</td>
                                                <td>{{$client->formatted_date}}</td>
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