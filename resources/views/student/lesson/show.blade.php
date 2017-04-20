@extends('student.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-md-9">
                <div class="thumbnail" style="background:#fff;">
                    <div class="caption">
                        <h3>{{$lesson->lessons_title}}</h3>
                        <hr>
                        <p>
                            @if($lessonObj->isPaymentableLesson($lesson->id))
                            {{ $lessonObj->getHalfContentLessonById($lesson->id) }}
                            <a href="#">pay first</a>
                            @else
                            <p> {{$lesson->lessons_body}} </p>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="student-exam-list">
                    @if(count($lesson->getAllExamsByLessonId($lesson->id)))
                        
                    @endif
                </div>
            </div>


            <!-- Sidebar-->
            <div class="col-md-3">
                @include('student.partials.sidebar')
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
@endsection
