@extends('teacher.template')

@section('style')
    .add-exam-btn{
        padding-bottom: 20px;
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
                    <h2 class="panel-heading">
                       #Lessson : {{ $lesson->lessons_title }}
                    </h2>

                    {{--Exam--}}
                    <div class="panel-body">
                        {{--Add Exam btn--}}
                        <div class="add-exam-btn text-right">
                            <a href="{{ route('exams.create',['lesson_id'=>$lesson->id]) }}" class="btn btn-success">Add Exam</a>
                        </div>
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="4">Exam</td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Question Quantity</td>
                                <td>Action</td>
                            </tr>
                            @if(count($exams) > 0)
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->id}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>20</td>
                                        <td>
                                            <a href="{{ route('questions', ['lesson'=>$lesson->id,'exam'=>$exam->id]) }}" class="btn btn-default">view</a> |
                                            <a href="#" class="btn btn-success">edit</a> |
                                            <a href="#" class="btn btn-danger">delete</a>
                                            <a href="{{route('question.create',['exam_id'=>$exam->id])}}" class="btn btn-danger">Add Question</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No Exam</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div><!--./row-->
    </div><!--./container-->
@endsection

@section('script')

@endsection
