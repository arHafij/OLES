@extends('student.template')

@section('content')
<div class="container">
    <div class="row">
        
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar</div>

                <div class="panel-body">
                    <ul class="nav">
                        <li><a href="">Lesson</a></li>
                        <li><a href="">Recent Lesson</a></li>
                        <li><a href="">Poppular Lesson</a></li>
                        <li><a href="">History</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
         <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Student</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
