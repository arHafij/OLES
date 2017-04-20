@extends('teacher.template')

@section('style')
    .add-exam-btn{
        padding-bottom: 20px;
    }
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <h4 class="panel-heading">
                       Exam List
                   </h4>

                    {{--Exam--}}
                    <div class="panel-body">
                            @if(count($exams) > 0)
                                @foreach($exams->chunk(3) as $chunk_exam)
                                <div class="row">
                                    @foreach($chunk_exam as $exam)
                                        <div class="col-md-4">
                                            <div class="thumbnail text-center">
                                                <h3>{{$exam->name}} <span class="badge">{{$examObj->getCalculateTotalQuestions($exam->id)}}</span></h3>
                                                <p>
                                                    <a title="view" href="{{ route('questions', ['lesson'=>$lesson->id,'exam'=>$exam->id]) }}" class="btn btn-default " role="button">
                                                        <span  class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    </a>
                                                    <a title="edit" href="#" class="btn btn-default " role="button">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                    <a title="delete" href="#" class="btn btn-default " role="button">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @endforeach
                            @else
                                NO EXAM
                            @endif
                            <p class="">
                                <a href="{{ route('exams.create',$lesson->id) }}" class="btn btn-default">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                            </p>
                    </div>
                </div><!--./panel-->
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
