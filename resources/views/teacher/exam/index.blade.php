@extends('teacher.template')

@section('style')

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
                    <h4 class="panel-heading">Exams</h4>

                    {{--Lesson--}}
                    <div class="panel-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td>#</td>
                                <td>Exam Name</td>
                                <td>Number of question</td>
                                <td>Action</td>
                            </tr>
                            @if(count($exams) > 0)
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{$exam->id}}</td>
                                        <td>{{$exam->name}}</td>
                                        <td>20</td>
                                        <td>
                                            <a href="{{ route('question.index',['exam_id'=>$exam->id]) }}" class="btn btn-default">view</a> |
                                            <a href="#" class="btn btn-success">edit</a> |
                                            <a href="#" class="btn btn-danger">delete</a>
                                            <a href="{{route('question.create',['exam_id'=>$exam->id])}}" class="btn btn-danger">add question</a>
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