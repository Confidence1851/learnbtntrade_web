@if (session('success_msg'))
        <div class="alert alert-success" role="alert">
                {{ session('success_msg') }}
        </div>
@endif
    
@if (session('error_msg'))
        <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
        </div>
@endif