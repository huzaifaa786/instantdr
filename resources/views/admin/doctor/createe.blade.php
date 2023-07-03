@extends('admin.layout')
@section('content')
    <h1 class="text-center">Create Doctor</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.doctor.createe') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                            <label for="speciality" class="col-md-2 col-form-label">Speciality</label>
                            <div class="col-md-12">
                                <select class="form-control form-select-lg mb-3 rounded" name="speciality_id"
                                    aria-label=".form-select-lg example">
                                    <option value="" disabled selected>Select speciality</option>
                                    <tbody>
                                        @foreach ($specialities as $speciality)
                                            <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                        @endforeach
                                    </tbody>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <label for="speciality" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-12">
                                <select class="form-control form-select-lg mb-3 rounded" name="city_id"
                                    aria-label=".form-select-lg example">
                                    <option value="" disabled selected>Select city</option>
                                    <tbody>
                                        @foreach (App\Models\city::all() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}
                                        </option>
                                    @endforeach
                                    </tbody>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <label for="speciality" class="col-md-2 col-form-label">Hospital</label>
                            <div class="col-md-12">
                                <select class="form-control form-select-lg mb-3 rounded" name="hospital_id"
                                    aria-label=".form-select-lg example">
                                    <option value="" disabled selected>Select hospital</option>
                                    <tbody>
                                        @foreach (App\Models\Hospital::all() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}
                                        </option>
                                    @endforeach
                                    </tbody>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="doctorName" class="form-label">Doctor Name:</label>
                            <input type="text" name="name" class="form-control" id="doctorName" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctoremail" class="form-label">Doctor email:</label>
                            <input type="text" name="email" class="form-control" id="doctoremail" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="fee" class="form-label">DoctorFee:</label>
                            <input type="number" name="fee" class="form-control" id="fee" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="radio" name="gender" id="maleGender"
                                    value="male" required>
                                <label class="form-check-label" for="maleGender">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="radio" name="gender" id="femaleGender"
                                    value="female" required>
                                <label class="form-check-label" for="femaleGender">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="radio" name="gender" id="otherGender"
                                    value="other" required>
                                <label class="form-check-label" for="otherGender">Other</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="doctorDOB" class="form-label">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control" id="doctorDOB" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctorProfilePicture" class="form-label">Profile Picture:</label>
                            <input type="file" name="image" class="form-control" id="doctorProfilePicture"
                                accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctorPhone" class="form-label">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" id="doctorPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctorAddress" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" id="doctorAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="doctorQualifications" class="form-label">Qualifications:</label>
                            <textarea name="qualification" class="form-control" id="doctorQualifications" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="doctorTimings" class="form-label">Timings:</label>
                            <div class="row g-2">
                                <div class="col">
                                    <label for="startTime" class="form-label" name="start_time">Start Time:</label>
                                    <input type="time" name="start_time" class="form-control" id="startTime"
                                        required>
                                </div>
                                <div class="col">
                                    <label for="endTime" class="form-label" name="end_time">End Time:</label>
                                    <input type="time" name="end_time" class="form-control" id="endTime" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="doctorDays" class="form-label">Days:</label>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="monday"
                                    value="Monday">
                                <label class="form-check-label" for="monday">Monday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="tuesday"
                                    value="Tuesday">
                                <label class="form-check-label" for="tuesday">Tuesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="wednesday"
                                    value="Wednesday">
                                <label class="form-check-label" for="wednesday">Wednesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="thursday"
                                    value="Thursday">
                                <label class="form-check-label" for="thursday">Thursday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="friday"
                                    value="Friday">
                                <label class="form-check-label" for="friday">Friday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="saturday"
                                    value="Saturday">
                                <label class="form-check-label" for="friday">Saturday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" name="days[]" id="sunday"
                                    value="Sunday">
                                <label class="form-check-label" for="sunday">Sunday</label>
                            </div>
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
