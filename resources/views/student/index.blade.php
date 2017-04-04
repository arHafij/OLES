@extends('student.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Sidebar</div>

                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="">Lesson</a></li>
                            <li><a href="">Recent Lesson</a></li>
                            <li><a href="">Poppular Lesson</a></li>
                            <li><a href="">History</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Lesson</div>

                    <div class="panel-body">
                        <section class="wrapper">
                            @foreach( $lessons->chunk(3) as $chunkLessons )
                                <div class="row">
                                    @foreach($chunkLessons as $lesson)
                                        <div class="col-md-4">
                                            <div class="carbox">
                                                <a class="img-carbox" href="#">
                                                    <img src="{{ asset('img/defaultLesson.jpg') }}"/>
                                                </a>

                                                <div class="carbox-content">
                                                    {{--card title--}}
                                                    <h5 class="carbox-title">
                                                        <a href="http://www.big.com/2016/03/bootstrap-3-carousel-fade-effect.html">
                                                            {{$lesson->lessons_title}}
                                                        </a>
                                                    </h5>
                                                    {{--card main content--}}
                                                    <p class="">
                                                        @if(strlen($lesson->lessons_body) >= 50 )
                                                            {{substr($lesson->lessons_body,0,50)}}
                                                        @else
                                                            {{$lesson->lessons_body}}
                                                        @endif
                                                        <strong>...</strong>
                                                    </p>
                                                </div>
                                                {{--read more btn--}}
                                                <div class="carbox-read-more">
                                                    <a href="" class="btn btn-link btn-block">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
