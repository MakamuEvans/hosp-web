@extends('layouts.master')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="javascript;;" data-toggle="modal" data-target="#myModal" class="btn btn-success">Add New</a>

                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Drug</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter NAme">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Rate</label>
                                                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Rate">
                                                    <small id="rateHelp" class="form-text text-muted">The Selling Price</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Remarks</label>
                                                    <textarea class="form-control"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <h4 class="page-title">Drug Stock</h4>
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
                                        <tr>
                                            <th>GOOG <span class="co-name">Google Inc.</span></th>
                                            <td>597.74</td>
                                            <td>12:12PM</td>
                                            <td>14.81 (2.54%)</td>
                                            <td>582.93</td>
                                        </tr>
                                        <tr>
                                            <th>AAPL <span class="co-name">Apple Inc.</span></th>
                                            <td>378.94</td>
                                            <td>12:22PM</td>
                                            <td>5.74 (1.54%)</td>
                                            <td>373.20</td>
                                        </tr>
                                        <tr>
                                            <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                                            <td>191.55</td>
                                            <td>12:23PM</td>
                                            <td>3.16 (1.68%)</td>
                                            <td>188.39</td>
                                        </tr>
                                        <tr>
                                            <th>ORCL <span class="co-name">Oracle Corporation</span></th>
                                            <td>31.15</td>
                                            <td>12:44PM</td>
                                            <td>1.41 (4.72%)</td>
                                            <td>29.74</td>
                                        </tr>
                                        <tr>
                                            <th>MSFT <span class="co-name">Microsoft Corporation</span></th>
                                            <td>25.50</td>
                                            <td>12:27PM</td>
                                            <td>0.66 (2.67%)</td>
                                            <td>24.84</td>
                                        </tr>
                                        <tr>
                                            <th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
                                            <td>18.65</td>
                                            <td>12:45PM</td>
                                            <td>0.97 (5.49%)</td>
                                            <td>17.68</td>
                                        </tr>
                                        <tr>
                                            <th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
                                            <td>15.81</td>
                                            <td>12:25PM</td>
                                            <td>0.11 (0.67%)</td>
                                            <td>15.70</td>
                                        </tr>
                                        <!-- Repeat -->
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