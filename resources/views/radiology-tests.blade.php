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
                                <add-radiology-test></add-radiology-test>
                            </div><!-- /.modal -->
                        </div>
                        <h4 class="page-title">Radiology Tests</h4>
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
                                            <th data-priority="1">Name</th>
                                            <th data-priority="3">Rate</th>
                                            <th data-priority="1">Status</th>
                                            <th data-priority="3">Created On</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $drug)
                                            <tr>
                                                <th>{{$drug->id}}</th>
                                                <td><span class="co-name">{{$drug->name}}</span></td>
                                                <td>{{$drug->rate}} KES</td>
                                                <td>{{$drug->decoded_status}}</td>
                                                <td>{{$drug->formatted_date}}</td>
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