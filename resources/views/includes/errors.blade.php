@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('attention'))
    <div class="alert alert-warning">
        {{ session('attention') }}
    </div>
@endif