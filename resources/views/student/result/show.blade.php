@extends('student.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    {{--Result--}}
                    <div class="panel-body">
                       <div class="col-md-12">
                           <h3>Dear {{Auth::user()->first_name}}</h3>
                           <p>
                               You got <span class="label label-danger">{{$user_mark}}</span> mark in total <span class="label label-primary">{{$total_mark}}</span> mark.
                           </p>
                           <strong>This is <span class="label label-info">{{$comment}}</span></strong>
                       </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-3">
                @include('student.partials.sidebar')
            </div>
        </div><!--./row-->
    </div><!--./container-->
@endsection

@section('script')

@endsection
