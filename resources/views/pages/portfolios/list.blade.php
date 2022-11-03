@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.portfoliopage.list') }}">portfolio</a></li>
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
                        <th>Front Title</th>
                        <th>Front Sub Title</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Description</th>
                        <th>Client</th>
                        <th>Category</th>
                        <th>Front Image</th>
                        <th>Inside Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($portfolios) > 0)
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>{{ ++$sn }}</td>
                                <td>{{ $portfolio->front_title }}</td>
                                <td>{{ $portfolio->front_sub_title }}</td>
                                <td>{{ $portfolio->title }}</td>
                                <td>{{ $portfolio->sub_title }}</td>
                                <td>{{ Str::limit(strip_tags($portfolio->description), 40) }}</td>
                                <td>{{ $portfolio->client }}</td>
                                <td>{{ $portfolio->category }}</td>
                                <td><img style="height: 8vh" src="{{ url($portfolio->small_img) }}"></td>
                                <td><img style="height: 8vh" src="{{ url($portfolio->big_img) }}"></td>

                                <td>
                                    <a href="{{ route('admin.portfoliopage.edit', $portfolio->id) }}" class="btn btn-info"
                                        class="m-2">Edit
                                    </a>

                                    <form action="{{ route('admin.portfoliopage.delete', $portfolio->id) }}" method="post" class="m-2 d-inline-block">
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
