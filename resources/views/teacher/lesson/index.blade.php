@extends('teacher.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default">
                    <h4 class="panel-heading">My Lesson</h4>
                    {{--Lesson--}}
                    <div class="panel-body">
                        @if(count($lessons) > 0)
                        @foreach($lessons->chunk(2) as $chunk_lessons)
                        <div class="row">
                            @foreach($chunk_lessons as $lesson)
                            <div class="col-md-6 thumbnail-wrapper" data-id='{{$lesson->id}}'>
                                <div class="thumbnail" style="display:block;">
                                    <div class="caption">
                                        <h3>{{ $lesson->lessons_title }}</h3>
                                        @if( strlen($lesson->lessons_body) >= 150 )
                                        <p>{{ substr($lesson->lessons_body,0,150) }}</p>
                                        @else
                                        <p>{{ $lesson->lessons_body }}</p>
                                        @endif
                                        <hr>
                                        <p class="price-details text-center">
                                            @if($lesson->lessons_price > 0.00)
                                            $ {{$lesson->lessons_price}}
                                            @else
                                            Free
                                            @endif
                                        </p>
                                        <hr>
                                        <p class="lesson-action text-center" >
                                            <a title="view" href="{{ route('lessons.show',$lesson->id) }}" class="btn btn-default " role="button">
                                                <span  class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                            </a>
                                            <a title="edit" href="{{route('lessons.edit',$lesson->id)}}" class="btn btn-default " role="button">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a onclick="setDeleteLessonURLWithId( {{$lesson->id}} )" title="delete" href="#" class="btn btn-default lesson-action__delete-link" role="button" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <hr>
                                        <p class="text-center">
                                            <a href="{{route('exams',$lesson->id)}}" class="btn btn-default " role="button">
                                                Exams <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        @else
                        No Lesson
                        @endif
                        <a title="edit" href="{{route('lessons.create')}}" class="btn btn-default " role="button">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </div><!--./panel-body-->
                </div><!--./panel-->
            </div>
            <!-- Sidebar -->
            <div class="col-md-3">
               @include('teacher.partials.sidebar')
            </div>
        </div><!--./row-->
    </div><!--./container-->

<!-- Modal Area -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default modal-footer__yes-btn">
            <i class="fa fa-check" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')

    var lessonId;
    var url;
    var token;
    function setDeleteLessonURLWithId(lessonId){
        url = '/lessons/' + parseInt( lessonId );
    }

    $('#myModal').on('shown.bs.modal');

    $(".modal-footer__yes-btn").click(function(){
        token = "{{ csrf_token() }}";
        $.ajax({
            url: url,
            type: "post",
            data: {_token: token, _method: "delete"}
        })
        .done(function(lessons){
            location.reload();
            $('#myModal').modal('hide');
        });

    });

@endsection
