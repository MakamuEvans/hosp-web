@if (session('status'))
    <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Success!</strong> {{session('status')}}
    </div>
@endif
@if (session('error'))
    <div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Error!</strong> {{session('error')}}
    </div>
@endif
@if (count($errors) > 0)
    <div class="row" style="margin: 20px">
        <div class="alert alert-warning alert-dismissible">
            {{--
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            --}}
            </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif