@extends('teacher.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-md-9">
                <div class="well">
                    <h4>{{$teacher->getUserName()}}</h4>
                    <p>
                        Email: {{$teacher->email}}
                    </p>
                </div>
            </div>

            <!-- Sidebar-->
            <div class="col-md-3">
                    @include('teacher.partials.sidebar')
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
@endsection
