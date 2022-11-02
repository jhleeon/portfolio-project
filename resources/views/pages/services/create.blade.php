@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.servicepage.create') }}">Service</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>

        <form action="{{ route('admin.servicepage.create') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="form-group col-md-5 mt-3">
                <div class="mb-3">
                    <label for="icon">
                        <h4>Icon</h4>
                    </label>
                    <input type="text" class="form-control" id="icon" name="icon">
                </div>

                <div class="mb-3">
                    <label for="title">
                        <h4>Title</h4>
                    </label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-5">
                    <label for="description">
                        <h4>Description</h4>
                    </label>
                    <textarea name="description" id="description" cols="60" rows="10"></textarea>
                </div>

                <div>
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
@endsection
