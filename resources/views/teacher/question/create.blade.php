@extends('teacher.template')

@section('content')
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>
                                <a href="{{ route('lessons.show',['lesson'=>$lesson->id]) }}">{{ $lesson->lessons_title }}</a>
                            </h2>
                            <p class="exam-info">
                                Exam :  <a href="{{ route('questions',['lesson'=>$lesson->id,'exam'=>$exam->id]) }}">{{ $exam->name }}</a>
                                Total Questions : <span class="label label-primary">{{ $total_questions }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @include('teacher.partials.alert')
                    <form action="{{route('questions.store',$exam->id)}}" method="post" class="question-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="title">Question Description:</label>
                                <textarea type="text" class="form-control" name="name" rows="3"></textarea>
                            </div>
                        {{--Option a--}}
                        <div class="form-group">
                            <label for="opt_a">Option a:</label>
                            <input class="form-control" name="opt_a">
                        </div>
                        {{--Option b--}}
                        <div class="form-group">
                            <label for="opt_b">Option b:</label>
                            <input class="form-control" name="opt_b">
                        </div>
                        {{--Option c--}}
                        <div class="form-group">
                            <label for="opt_c">Option c:</label>
                            <input class="form-control" name="opt_c" >
                        </div>
                        {{--Option d--}}
                        <div class="form-group">
                            <label for="opt_d">Option d:</label>
                            <input class="form-control" name="opt_d">
                        </div>
                        {{--Answer--}}
                        <div class="form-group">
                            <label for="subject_name">Answer Option:</label>
                            <select class="form-control" name="answer">
                                <option value="opt_a">Option a</option>
                                <option value="opt_b">Option b</option>
                                <option value="opt_c">Option c</option>
                                <option value="opt_d">Option d</option>
                            </select>
                        </div>

                        <div class="form-group text-right">
                            <input type="submit" value="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-3">
           @include('teacher.partials.sidebar')
        </div>
    </div><!--./row-->
</div><!--./container-->
@endsection
