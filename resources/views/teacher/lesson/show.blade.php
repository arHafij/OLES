@extends('teacher.template')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
                @include('teacher.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="lesson">
                    <h3 class="lesson__title">{{ $lesson->lessons_title }}</h3>
                    <div class="lesson__body">
                        {{$lesson->lessons_body}}
                    </div>
                </div>
            </div>
        </div><!--./row-->
    </div><!--./container-->
@endsection

@section('script')
    CKEDITOR.replace( 'lessons_body' );
@endsection