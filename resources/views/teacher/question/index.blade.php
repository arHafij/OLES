@extends('teacher.template')

@section('style')
.add-question-btn{
    padding-bottom:20px;
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
                            <div class="col-md-12">
                                <h4>Questions List</h4>
                            </div>
                        </div>
                    </div>

                    {{--Lesson--}}
                    <div class="panel-body">

                        <div class="add-question-btn text-right">
                            <a href="{{ route('exams',$lesson->id) }}" class="btn btn-default btn-sm">All Exam</a>
                            <a href="{{ route('questions.create',$exam->id) }}" class="btn btn-default btn-sm">Add Question</a>
                        </div>

                        <table class="table table-stripped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Question Name</th>
                                <th class="text-center">Option a</th>
                                <th class="text-center">Option b</th>
                                <th class="text-center">Option c</th>
                                <th class="text-center">Option c</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @if(count($questions) > 0)
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{$question->id}}</td>
                                        <td>{{$question->name}}</td>
                                        <td>{{$question->opt_a}}</td>
                                        <td>{{$question->opt_b}}</td>
                                        <td>{{$question->opt_c}}</td>
                                        <td>{{$question->opt_c}}</td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-sm">edit</a> |
                                            <a href="#" class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No Question</td>
                                </tr>
                            @endif
                        </table>
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

@section('script')

@endsection
