@extends('student.template')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Content -->
            <div class="col-md-9">
                <div class="row student-search-box">
                    <div class="col-md-12">
                        <form class="student-search-form">
                            <div class="input-group">
                                <input type="text" class="form-control student-search-form__input" placeholder="Search for...">
                                <span class="input-group-btn">
                                     <button class="btn btn-default" type="submit">Go!</button>
                                </span>
                            </div>
                        </form>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="student-search-form__result">
                            </div>
                        </div>
                    </div>
                </div>
                @foreach( $lessons as $lesson )
                    <div class="row">
                        <div class="thumbnail" style="background:#fff;">
                            <div class="caption">
                                <h3>{{$lesson->lessons_title}}</h3>
                                <hr>
                                @if(strlen($lesson->lessons_body) < 250 )
                                    <p>
                                        {{$lesson->lessons_body}}
                                        <a href="{{ route('student.lessons.show',$lesson->id) }}"><strong>read
                                                more..</strong></a>
                                    </p>
                                @else
                                    <p>
                                        {{ substr($lesson->lessons_body,0,250) }}
                                        <a href="{{ route('student.lessons.show',$lesson->id) }}"><strong>read
                                                more..</strong></a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Sidebar-->
            <div class="col-md-3">
                @include('student.partials.sidebar')
            </div>

        </div><!--/.row-->
    </div><!--/.container-->
@endsection

@section('script')
    <script>
        $(".student-search-form").submit(function(event){
            event.preventDefault();
            var keyword = $(".student-search-form__input").val();
            var url = "{{ route('student.lessons.search') }}";
            var token = "{{ csrf_token() }}";
            var lesson_url = '/student/lessons/';
            if(keyword.length == 0){
                return $('.student-search-form__result p').hide();
            }
            $('.student-search-form__result a').remove();
            $.ajax({
                type: "get",
                url: url,
                data: {"q": keyword, _token: token },
                success: function (data) {
                    for(var i = 0;i<data.length;i++){
                        lesson_url = lesson_url+data[i].id;
                        $(".student-search-form__result").append("<p>Lessons <a href='"+lesson_url+"'>"+data[i].lessons_title+"</a></p>");
                    }
                },
                error: function(data){
                    alert("fail");
                }
            });
        });
    </script>
@endsection
