@extends('teacher.template')

@section('content')
<div class="container">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3">
           @include('teacher.partials.sidebar')
        </div>

        <!-- Main Content -->
         <div class="col-md-9">
            <div class="panel panel-default">
                <h4 class="panel-heading">Create Exam</h4>

                <div class="panel-body">
                    <form action="{{route('exams.store',$lesson->id)}}" method="post" class="exam-form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Exam Name:</label>
                            <input type="text" class="form-control" name="name">
                            <input type="hidden" value="{{ $lesson->id }}" name="lesson_id">
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Save
                            </button
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div><!--./row-->
</div><!--./container-->
@endsection

@section('script')

@endsection
