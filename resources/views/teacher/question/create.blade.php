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
                <h4 class="panel-heading">Create Question</h4>

                <div class="panel-body">
                    @include('teacher.partials.alert')
                    <form action="{{route('question.store')}}" method="post" class=question-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <label for="title">Question Description:</label>
                                <textarea type="text" class="form-control" name="name" rows="3"></textarea>
                            </div>
                        {{--Option a--}}
                        <div class="form-group">
                            <input class="form-control" name="opt_a" placeholder="Option a">
                        </div>
                        {{--Option b--}}
                        <div class="form-group">
                            <input class="form-control" name="opt_b" placeholder="Option b">
                        </div>
                        {{--Option c--}}
                        <div class="form-group">
                            <input class="form-control" name="opt_c" placeholder="Option c">
                        </div>
                        {{--Option d--}}
                        <div class="form-group">
                            <input class="form-control" name="opt_d" placeholder="Option d">
                        </div>
                        {{--Answer--}}
                        <div class="form-group">
                            <input class="form-control" name="answer" placeholder="Answer">
                        </div>
                        {{--Exam id--}}
                        <input type="hidden" value="{{ $exam->id }}" name="exam_id">
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