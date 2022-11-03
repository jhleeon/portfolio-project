@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.portfoliopage.edit',$portfolio->id) }}">Portfolio</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <form action="{{ route('admin.portfoliopage.update',$portfolio->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row col md-12">
                <div class="col-md-6">
                    <div class="form-group col-md-6 mt-3">
                        <h3>Inside Image</h3>
                        <img style="height: 30vh" class="img-thumbnail" src="{{ url($portfolio->big_img) }}">
                        <input class="mt-3" type="file" id="big_img" name="big_img">
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <h3>Front Image</h3>
                        <img style="height: 15vh" class="img-thumbnail" src="{{ url($portfolio->small_img) }}">
                        <input class="mt-3" type="file" id="small_img" name="small_img">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3 col-md-12">
                        <label for="front_title">
                            <h4>Front Title</h4>
                        </label>
                        <input type="text" class="form-control" id="front_title" name="front_title" value="{{ $portfolio->front_title }}">
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="front_sub_title">
                            <h4>Front Sub Title</h4>
                        </label>
                        <input type="text" class="form-control" id="front_sub_title" name="front_sub_title" value="{{ $portfolio->front_sub_title }}">
                    </div>

                    <div class="mb-5 col-md-12">
                        <label for="title">
                            <h4>Title</h4>
                        </label>
                        <input type="text" class="form-control" id="sub_title" name="title" value="{{ $portfolio->title }}">
                    </div>

                    <div class="mb-5 col-md-12">
                        <label for="sub_title">
                            <h4>Sub Title</h4>
                        </label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ $portfolio->sub_title }}">
                    </div>
                    <div class="mb-5 col-md-12">
                        <label for="client">
                            <h4>Client</h4>
                        </label>
                        <input type="text" class="form-control" id="client" name="client" value="{{ $portfolio->client }}">
                    </div>

                    <div class="mb-5 col-md-12">
                        <label for="category">
                            <h4>Category</h4>
                        </label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $portfolio->category }}">
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h4>Description</h4>
                <textarea class="from-control" name="description" id="description" cols="60" rows="5">{{ $portfolio->description }}</textarea>
            </div>

            <input type="submit" value="submit" name="update" class="btn btn-success">
        </form>
    </div>
@endsection
