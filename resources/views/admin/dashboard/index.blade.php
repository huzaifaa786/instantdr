@extends('admin.layout')
@section('content')
    <div class="col-xl-5 d-flex grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Dashboard</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="session-by-channel-legend">
                                    <li>
                                        <div>Total Doctors</div>
                                        <div>10</div>
                                    </li>
                                    <li>
                                        <div>Total Ambulance</div>
                                        <div>12</div>
                                    </li>
                                    <li>
                                        <div>Total Hospitals</div>
                                        <div>5</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
