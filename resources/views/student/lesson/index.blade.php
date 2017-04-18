@extends('student.template')

@section('style')
    footer{ position:relative; }
@endsection

@section('content')
    <main class="container">
        <div class="row">

            <!-- Sidebar-->
            <aside class="col-md-3">
                @include('student.partials.sidebar')
            </aside>
            <!-- Content -->
            <section class="col-md-9">
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
            </section>

        </div><!--/.row-->
    </main><!--/.container-->
@endsection
