@extends('Backend.dashboard')
@section('title')
Counters
@endsection
@section('content')
<!--=====================================
=    Start Session & Errors Display     =
======================================-->
<!-- Session Alert Start -->
@if(Session::has('success'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
@if(Session::has('danger'))
<div class="row">
    <div class="col-10 offset-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
<!-- Session Alert End -->
<!-- Dislay Errors Start -->
@if(count($errors) > 0)
<div class="row">
    <div class="col-10 offset-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<!-- Dislay Errors End -->
<!--====  End of Section Sessions & Errors Display  ====-->
<!--=====================================
=            Start Counter Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features"><i class="fa fa-pencil"></i> Edit Your Counters</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Counter Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-features" role="tabpanel" aria-labelledby="pills-company-tab">
                    <a href="{{ route('add.counter') }}" class=" col-10 offset-1 btn btn-success btn-block">Add New Counter</a>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Counter Name</th>
                                <th class="text-center">Counter Number</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($counters as $counter)
                            <tr>
                                <th class="text-center p-4">{{ $counter->title }}</th>
                                <td class="text-center">{{ $counter->number }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit.counter', ['id'=>$counter->id]) }}" class="btn btn-primary btn-sm">Edit Counter</a>
                                    <a href="{{ route('delete.counter', ['id'=>$counter->id]) }}" class="btn btn-danger btn-sm">Delete Counter</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Counter Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section  ====-->
@endsection
