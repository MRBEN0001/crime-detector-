@extends('layouts.admin')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="mb-5">
                    <h5> Crime Subject:</h5>
                    <div class="mt-3">{{$report->subject}}</div>
                </div>
                <div class="mb-5">
                    <h5> Crime Scene:</h5>
                    <div class="mt-3">{{$report->crime_scene}}</div>
                </div>
                <div class="mb-5">
                    <h5> Crime Description:</h5>
                    <div class="mt-3">{{$report->body}}</div>
                </div>
                <div class="mb-5">
                    <h5>Reported:</h5>
                    <div class="mt-3">{{$report->created_at->diffForHumans();}}</div>
                </div>
                <form action="/report/mobilize-team/{{$report->id}}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <h5 class="mb-3">Mobile Squad</h5>
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="squad">
                            @foreach(\App\Models\Squad::all() as $squad)
                            <option selected>{{$squad->squad_name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Mobilize" input>

                </form>

            </div>
        </div>




    </div>
</div>
</div>
</div>
</div>
<!-- Table End -->

@endsection