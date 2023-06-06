@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @csrf
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productlist" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td> Doctor Name</td>
                                <td>Gender</td>
                                <td>Email</td>
                                <td>DOB</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td> Qualification</td>
                                <td> Image</td>
                                <td> Start-Time</td>
                                <td> End-Time</td>
                                <td> Edit</td>
                                <td> Delete</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->id }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->gender }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->dob }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->address }}</td>
                                    <td>{{ $doctor->qualification }}</td>
                                    <td><img src="{{ asset($doctor->image) }}" height="100" width="100" /></td>
                                    <td>{{ $doctor->start_time }}</td>
                                    <td>{{ $doctor->end_time }}</td>
                                    <td>
                                        <button id="{{ $doctor->id }}" name="{{ $doctor->name }}"
                                            gender="{{ $doctor->gender }}" dob="{{ $doctor->dob }}"
                                            phone="{{ $doctor->phone }}" address="{{ $doctor->address }}"
                                            qualification="{{ $doctor->qualification }}"
                                            start_time="{{ $doctor->start_time }}"
                                            end_time="{{ $doctor->end_time }}"data-toggle="modal" data-target="#myModal"
                                            class="btn btn-info btn-sm rounded-pill editBtn">Edit</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill deleteBtn"
                                            data-toggle="modal" id="{{ $doctor->id }}"
                                            data-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form id="updateForm" action="{{ route('edit/doctor') }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input class="form-control" type="date" id="dob" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input class="form-control" type="text" id="phone" name="phone"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                        placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="qualification">Qualification</label>
                                    <input class="form-control" type="text" id="qualification" name="qualification"
                                        placeholder="Qualification">
                                </div>
                                <div class="form-group">
                                    <label for="start-time">start-time</label>
                                    <input class="form-control" type="text" id="start_time" name="start_time"
                                        placeholder="start-time">
                                </div>
                                <div class="form-group">
                                    <label for="end_time">start-time</label>
                                    <input class="form-control" type="text" id="end_time" name="end_time"
                                        placeholder="end-time">
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="submit"
                                    class="btn btn-info waves-effect waves-light rounded-pill">Update</button>
                                <button type="button" class="btn btn-danger waves-effect rounded-pill"
                                    data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                            Are you sure you want to delete this product?
                        </div> --}}
                <div class="modal-footer">
                    <form method="get">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger rounded-pill">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/asset/js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('admin/asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('.editBtn').click(function() {
                let id = this.id;
                let name = $(this).attr('name');
                let gender = $(this).attr('gender');
                let dob = $(this).attr('dob');
                let phone = $(this).attr('phone');
                let address = $(this).attr('address');
                let qualification = $(this).attr('qualification');
                let start_time = $(this).attr('start_time');
                let end_time = $(this).attr('end_time');

                $('#name').val(name);
                $('#id').val(id);
                $('#gender').val(gender);
                $('#dob').val(dob);
                $('#phone').val(phone);
                $('#address').val(address);
                $('#qualification').val(qualification);
                $('#start_time').val(start_time);
                $('#end_time').val(end_time);


            });
            $('.deleteBtn').click(function() {

                let id = this.id;
                $('#deleteModal form').attr('action', '{{ route('del_doctor', '') }}' + '/' + id);

            });

        });
    </script>
@endsection()
