@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">about</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.aboutpage.list') }}">about</a></li>
            <li class="breadcrumb-item active">list</li>
        </ol>
        @php
            $sn = 0;
        @endphp
        <div class="conatiner col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Title 1</th>
                        <th>Title 2</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($abouts) > 0)
                        @foreach ($abouts as $about)
                            <tr>
                                <td>{{ ++$sn }}</td>
                                <td>{{ $about->title1 }}</td>
                                <td>{{ $about->title2 }}</td>
                                <td>{{ Str::limit(strip_tags($about->description), 40) }}</td>
                                <td><img style="height: 8vh" src="{{ url($about->img) }}"></td>

                                <td>
                                    <a href="{{ route('admin.aboutpage.edit', $about->id) }}" class="btn btn-info" class="m-2">Edit</a>

                                    <form action="{{ route('admin.aboutpage.delete', $about->id) }}" method="post" class="m-2 d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>

    @endsection
