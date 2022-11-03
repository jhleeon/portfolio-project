@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.aboutpage.edit',$about->id) }}">About</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <form action="{{ route('admin.aboutpage.update',$about->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row col md-12">
                <div class="col-md-6">
                    <div class="form-group col-md-6 mt-3">
                        <h3>Image</h3>
                        <img style="height: 20vh" class="img-thumbnail" src="{{ url($about->img) }}">
                        <input class="mt-3" type="file" id="img" name="img">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3 col-md-12">
                        <label for="front_title">
                            <h4>Title-1</h4>
                        </label>
                        <input type="text" class="form-control" id="title1" name="title1" value="{{ $about->title1 }}">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="title2">
                            <h4>Title-2</h4>
                        </label>
                        <input type="text" class="form-control" id="title2" name="title2" value="{{ $about->title2 }}">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col-md-12">
                        <h4>Description</h4>
                        <textarea class="from-control" name="description" id="description" cols="60" rows="5">{{ $about->description }}</textarea>
                    </div>

                    <div class="col-md-3">
                        <input type="submit" value="update" name="update" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
