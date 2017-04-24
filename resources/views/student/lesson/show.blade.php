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
                        <h3>
                             {{$lesson->lessons_title}}
                        </h3>
                        <hr>
                        <p>
                            @if($lessonObj->isPaymentableLesson($lesson->id))
                            {{ $lessonObj->getHalfContentLessonById($lesson->id) }}
                            <a href="{{route('addmoney.paywithpaypal')}}">pay first</a>
                            @else
                            <p> {{$lesson->lessons_body}} </p>
                            @endif
                        </p>
                        <hr>
                        <p>
                            <a title="bookmarks" href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a> |
                            <small>5 </small><a title="Vote up" href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                            <a title="Vote down" href="#"><i class="fa fa-arrow-down" aria-hidden="true"></i></a> |
                            <small>3 </small><a title="like" href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> |
                            <small>0 </small><a title="like" href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Exams</h5>
                    </div>
                    <div class="panel-body">
                        @if(count($lesson->getAllExamsByLessonId($lesson->id)))
                            @foreach($lesson->getAllExamsByLessonId($lesson->id) as $exam)
                                <p><a href="{{route('student.exam.questions',$exam->id)}}">{{$exam->name}}</a></p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


            <!-- Sidebar-->
            <div class="col-md-3">
                @include('student.partials.sidebar')
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
@endsection
