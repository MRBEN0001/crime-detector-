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
                                @foreach($reports as $report)


                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$report->crime}}</td>
                                        <td>{{$report->crime_scene}}</td>
                                        <td>{{$report->crime_time}}</td>
                                        <td><a href="/view/{{$report->id}}/details" class="btn btn-success">View</a>
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
            <!-- Table End -->

            @endsection