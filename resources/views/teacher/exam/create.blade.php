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
                    <form action="{{route('lesson.store')}}" method="post" class=lesson-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="subject_name">Subject Name:</label>
                                <select class="form-control" name="lessons_subject_name">
                                    <option value="bangla">Bangla</option>
                                    <option value="English">English</option>
                                    <option value="mathematics">Math</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemestry">Chemestry</option>
                                    <option value="general Knowledge">General Knowledge</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Lesson Name:</label>
                                <input type="text" class="form-control" name="lessons_title">
                            </div>

                            <div class="form-group">
                                <label for="comment">Lesson content:</label>
                                <textarea class="form-control" rows="5"  name="lessons_body"></textarea>
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
        CKEDITOR.replace( 'lessons_body' );
@endsection