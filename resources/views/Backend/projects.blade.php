@extends('Backend.dashboard')
@section('title')
Projects
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
=            Start Pricing Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects"><i class="fa fa-pencil"></i> Edit Your Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    id="pills-categories-tab" data-toggle="pill" href="#pills-categories" role="tab" aria-controls="pills-categories"><i class="fa fa-pencil"></i> Edit Your Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addproject-tab" data-toggle="pill" href="#pills-addproject" role="tab" aria-controls="pills-addproject"><i class="fa fa-plus"></i> Add New Project</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start PRoject Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Projects</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <th class="text-center">{{ $project->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.project', ['id'=>$project->id]) }}">Edit Project</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.project', ['id'=>$project->id]) }}" >Delete Project</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End PRoject Tab -->
                <!-- Start Cat Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade"
                    id="pills-categories" role="tabpanel" aria-labelledby="pills-categories-tab">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">


                    <p class="heading-title">List Of Categories</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Categories</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project_cats as $cat)
                            <tr>
                                <th class="text-center">{{ $cat->name }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.project-category', ['id'=>$cat->id]) }}">Edit Category</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete.project-category', ['id'=>$cat->id]) }}" >Delete Category</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="col-lg-5 col-md-12">
                    <p class="heading-title">Add New Category</p>
                    <form action="{{ route('add.project-category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Category Name</label>
                            <input type="text" name="name" placeholder="Enter Your category name.." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Save Informations</button>
                    </form>
                    </div>
                     </div>
                </div>
                <!-- End Cat Tab -->
                <!-- Start Add Project Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addproject" role="tabpanel" aria-labelledby="pills-addproject-tab">
                    <form action="{{ route('add.project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Project Name</label>
                            <input type="text" name="name" placeholder="Enter Your project name.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Project Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($project_cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Short Description</label>
                            <textarea name="short_description" class="form-control" placeholder="Enter short Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Long Description</label>
                            <textarea rows="5" name="long_description" class="form-control" placeholder="Enter Long Description ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Client Name</label>
                            <input type="text" name="client_name" placeholder="Enter Your client name .." class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Client feedback</label>
                            <textarea name="client_feedback" class="form-control" placeholder="Enter client feedback ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">End Date</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Upload An Image For Your Project</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Add Package Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
