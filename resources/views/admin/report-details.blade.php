@extends('layouts.admin')
@section('content')
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                  
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Accented Table</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">Crime</th>
                                        <th scope="col">Crime Scene</th>
                                        <th scope="col">Crime Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                              


                                    <tr>
                                        <th scope="row"> </th>
                                        <td>{{$report->crime}}</td>
                                        <td>{{$report->crime_scene}}</td>
                                        <td>{{$report->crime_time}}</td>
                                        <td><a href="" class="btn btn-success">View</a>
</td>

                                    </tr>
                                 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                
                    
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            @endsection