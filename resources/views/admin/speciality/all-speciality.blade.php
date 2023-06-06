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
                                <td> Specaility Name</td>
                                <td> Edit</td>
                                <td> Delete</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specialities as $speciality)
                                <tr>
                                    <td>{{ $speciality->id }}</td>
                                    <td>{{ $speciality->name }}</td>
                                    <td>
                                        <button id="{{ $speciality->id }}" name="{{ $speciality->name }}"
                                            data-toggle="modal" data-target="#myModal"
                                            class="btn btn-info btn-sm rounded-pill editBtn">Edit</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill deleteBtn"
                                            data-toggle="modal" id="{{ $speciality->id }}"
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
                    <form id="updateForm" action="{{route('edit/speciality')}}" method="POST"enctype="multipart/form-data">
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

                $('#name').val(name);
                $('#id').val(id);


            });
            $('.deleteBtn').click(function() {

                let id = this.id;
                $('#deleteModal form').attr('action', '{{ route('destroy_speciality', '') }}' + '/' + id);

            });

        });
    </script>
@endsection()
