@extends('teacher.template')

@section('content')
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-9">
            <div class="panel panel-default">
                <h4 class="panel-heading">Create Exam</h4>

                <div class="panel-body">
                    <form action="{{route('exams.store',$lesson->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name">
                            <input type="hidden" value="{{ $lesson->id }}" name="lesson_id">
                        </div>

                        <button type="submit" class="btn btn-default text-right">
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Save
                        </button
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

@section('script')

@endsection
