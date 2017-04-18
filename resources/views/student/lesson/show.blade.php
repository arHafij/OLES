@extends('student.template')

@section('style')

@endsection

@section('content')
    <main class="container">
        <div class="row">

            <!-- Sidebar-->
            <aside class="col-md-3">
                @include('student.partials.sidebar')
            </aside>
            <!-- Content -->
            <section class="col-md-9">
                <div class="panel panel-default">
                    <h4 class="panel-heading">{{$lesson->lessons_title}}</h4>
                    <div class="panel-body">
                        {{$lesson->lessons_body}}
                    </div>
                </div>
            </section>

        </div><!--/.row-->
    </main><!--/.container-->
@endsection
