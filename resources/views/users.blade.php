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
                                <add-user></add-user>
                            </div><!-- /.modal -->
                        </div>
                        <h4 class="page-title">Users</h4>
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
                                            <th data-priority="1">Email</th>
                                            <th data-priority="3">User Type</th>
                                            <th data-priority="3">Status</th>
                                            <th data-priority="3">Created On</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $user)
                                            <tr>
                                                <th>{{$user->id}}</th>
                                                <td><span class="co-name">{{$user->name}}</span></td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->decoded_user_type}}</td>
                                                <td>{{$user->decoded_status}}</td>
                                                <td>{{$user->formatted_date}}</td>
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