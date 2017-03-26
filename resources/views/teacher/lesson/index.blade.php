@extends('teacher.template')

@section('style')

    .lesson-exam-wrapper{
        border-bottom: 1px solid #dddddd;
    }
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
               @include('teacher.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default row">

                    <h4 class="panel-heading">My Lesson</h4>

                    {{--Lesson and Exam --}}
                    @foreach($lessons as $lesson)
                    <div class="panel-body lesson-exam-wrapper">
                        {{--Lessons--}}
                        <div class="lesson-wrapper col-md-6">
                            <div class="lesson">
                               <div class="lesson__title">{{ $lesson->lessons_title }}</div>
                               <div class="lesson-action">
                                   <a href="{{ route('lesson.show',['lesson'=>$lesson->id]) }}">View</a> |
                                   <a href="#">Edit</a> |
                                   <a href="#">Delete</a> |
                                   <a href="#">New Exam</a>
                               </div>
                           </div>
                        </div>
                        {{--Exams--}}
                        <div class="exam-wrapper col-md-6">
                            <div class="exam">
                                <div class="exam__name">Exam-1</div>
                                <div class="exam-action">
                                    <a href="#">View</a> |
                                    <a href="#">Edit</a> |
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                            <div class="exam">
                                <div class="exam__name">Exam-1</div>
                                <div class="exam-action">
                                    <a href="#">View</a> |
                                    <a href="#">Edit</a> |
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!--./row-->
    </div><!--./container-->
@endsection

@section('script')
    CKEDITOR.replace( 'lessons_body' );
@endsection