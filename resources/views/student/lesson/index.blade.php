@extends('student.template')

@section('style')
    footer{ position:relative; }
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-md-9">
                <h2>Recent Lesson</h2>
                <hr>
                @foreach( $lessonObj->getAllLessons() as $lesson )
                <div class="row">
                    <div class="thumbnail" style="background:#fff;">
                        <div class="caption">
                            <h3>{{$lesson->lessons_title}}</h3>
                            <hr>
                            @if(strlen($lesson->lessons_body) < 250 )
                                <p>
                                    {{$lesson->lessons_body}}
                                    <a href="{{ route('student.lessons.show',$lesson->id) }}"><strong>read more..</strong></a>
                                </p>
                            @else
                                <p>
                                    {{ substr($lesson->lessons_body,0,250) }}
                                    <a href="{{ route('student.lessons.show',$lesson->id) }}"><strong>read more..</strong></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Sidebar-->
            <div class="col-md-3">
                @include('student.partials.sidebar')
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
@endsection
