@extends('student.template')

@section('style')
    .question__title{
        font-weight: bold;
    }
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>
                                    <a href="{{ route('student.lessons.show',$lesson->id) }}">{{ $lesson->lessons_title }}</a>
                                </h2>
                                <p class="exam-info">
                                    Exam : {{ $exam->name }}
                                    Total Questions : <span class="label label-primary">{{ $total_questions }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        @if(count($questions) > 0)
                            <form action="{{ route('result.store',['exam_id'=>$exam->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{--Question--}}
                                <div class="row">
                                    <div class="col-md-11 col-md-offset-1">
                                        @foreach($questions as $question)
                                            <div class="question-wrapper">
                                                <div class="question__title">{{++$counter}}. {{$question->name}}</div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="{{$question->id}}" value="opt_a"> {{$question->opt_a}}
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="{{$question->id}}" value="opt_b"> {{$question->opt_b}}
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="{{$question->id}}" value="opt_c"> {{$question->opt_c}}
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="{{$question->id}}" value="opt_d"> {{$question->opt_d}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{--End Question--}}

                                {{--Submit Button--}}
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary text-right">Submit</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p>No question</p>
                        @endif
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
