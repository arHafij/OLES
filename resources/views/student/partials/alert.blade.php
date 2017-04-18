<div class="alert-wrapper">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('success'))
        <p class="alert alert-success">
            {{ Session::get('success') }}
        </p>
    @endif

    @if(Session::has('danger'))
        <p class="alert alert-danger">
            {{ Session::get('danger') }}
        </p>
    @endif
</div>
