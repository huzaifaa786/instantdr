@extends('admin.layout')
@section('content')
    <h1 class="text-center">Create City</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{route('city/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="hospitalName" class="form-label">City Name:</label>
                            <input type="text" name="name" class="form-control" id="hospitalName" required>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
