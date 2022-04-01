{{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Error</h4>
                        <p class="mb-0">
                        {{ $error }}
                        </p>
                    </div>
                    @endforeach
@endif --}}

@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4>Sukses</h4>
        <strong class="mb-o">{{session()->get('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4>Error</h4>
        <strong class="mb-o">{{session()->get('error')}}</strong>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
@endif