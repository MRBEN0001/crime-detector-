@extends('layouts.admin')
@section('content')

@if(session('success'))
<div style=" " class=" alert alert-success ">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif

@if(session('warning'))
<div style="" class=" alert alert-warning ">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif


<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4"></h6>

                <form method="POST" action="/store/crime">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Crime Subject</label>
                        <input type="text" class="form-control" id="" name="subject" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Crime Scene</label>
                        <input type="text" class="form-control" id="crimeScene" name="scene" aria-describedby="emailHelp" required>
                        @error('crimeScene')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Crime Description</label>
                        <!-- <input style=" background:white;" type="text" class="form-control" id="" name="squadName" aria-describedby="emailHelp" required> -->
                        <textarea name="body" id="crime" aria-describedby="emailHelp" class="form-control" cols="30" rows="5" required></textarea>
                        @error('crime')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Create Squad</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->


@endsection