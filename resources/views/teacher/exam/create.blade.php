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
                <h4 class="panel-heading">Create Lesson</h4>

                <div class="panel-body">
                    <form action="{{route('exam.store')}}" method="post" class="exam-form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Exam Name:</label>
                                <input type="text" class="form-control" name="exam__name-input">
                            </div>

                            <div class="form-group text-right">
                                <input type="submit" value="submit" class="btn btn-success">
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