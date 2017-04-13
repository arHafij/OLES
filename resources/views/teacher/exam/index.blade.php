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
                    <h4 class="panel-heading">
                       Exam List
                   </h4>

                    {{--Exam--}}
                    <div class="panel-body">
                        {{--Add Exam btn--}}
                        <div class="add-exam-btn text-right">
                            <a href="{{ route('exams.create',['lesson_id'=>$lesson->id]) }}" class="label label-default">Add Exam</a>
                        </div>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Question Quantity</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @if(count($exams) > 0)
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->id}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>{{ $examObj->getCalculateTotalQuestions($exam->id) }}</td>
                                        <td>
                                            <a href="{{ route('questions', ['lesson'=>$lesson->id,'exam'=>$exam->id]) }}" class="btn btn-sm btn-primary">view</a> |
                                            <a href="#" class="btn btn-info btn-sm">edit</a> |
                                            <a href="#" class="btn btn-danger btn-sm">delete</a>
                                            <a href="{{route('questions.create',['exam_id'=>$exam->id])}}" class="btn btn-success btn-sm">Add Question</a>
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
