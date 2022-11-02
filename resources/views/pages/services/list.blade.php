@extends('layouts.admin-layout')
@section('contents')
    <div class="container-fluid">
        <div class="container-fluid"></div>
        <h1 class="mt-4">Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.servicepage.create') }}">Service</a></li>
            <li class="breadcrumb-item active">list</li>
        </ol>
        @php
            $sn = 0;
        @endphp
        <div class="conatiner col-md-10 offset-md-1">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>icon</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($services) > 0)
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ ++$sn }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->icon }}</td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

        </div>

    @endsection
