@extends('admin.layout')
@section('content')
    <h1 class="text-center">Create Hospital</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{route('admin.hospital.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="hospitalName" class="form-label">Hospital Name:</label>
                            <input type="text" name="name" class="form-control" id="hospitalName" required>
                        </div>
                        <div class="mb-3">
                            <label for="hospitalAddress" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" id="hospitalAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="hospitalPhone" class="form-label">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" id="hospitalPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="hospitalImage" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control" id="hospitalImage" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-user rounded-pill">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
