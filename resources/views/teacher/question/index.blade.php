@extends('teacher.template')

@section('style')
.add-question-btn{
    padding-bottom:20px;
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
                    <h2 class="panel-heading">#Lesson:{{ $lesson->lessons_title  }}</h2>

                    {{--Lesson--}}
                    <div class="panel-body">

                        <div class="add-question-btn text-right">
                            <a href="" class="btn btn-success">Add Question</a>
                        </div>

                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="7">{{$exam->name}} 's question</td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Question Name</td>
                                <td>Option a</td>
                                <td>Option b</td>
                                <td>Option c</td>
                                <td>Option c</td>
                                <td>Action</td>
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
                                            <a href="#" class="btn btn-success">edit</a> |
                                            <a href="#" class="btn btn-danger">delete</a>
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
        </div><!--./row-->
    </div><!--./container-->
@endsection

@section('script')

@endsection
