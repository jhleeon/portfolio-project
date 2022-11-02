@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
        </ul>
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger m-2">{{ session('error') }}</div>
@endif


@if (session('success'))
    <div class="alert alert-success m-2">{{ session('success') }}</div>
@endif
