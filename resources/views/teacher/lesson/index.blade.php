@extends('teacher.template')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
               @include('teacher.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <h4 class="panel-heading">My Lesson</h4>

                    {{--Lesson--}}
                    <div class="panel-body">
                        <table class="table table-stripped text-center">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Lesson Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @if(count($lessons) > 0)
                                @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{$lesson->lessons_title}}</td>
                                    <td class="lesson-action" data-lesson-id="{{$lesson->id}}">
                                        <a href="{{route('lessons.show',$lesson->id)}}" class="btn btn-sm btn-primary">view</a> |
                                        <a href="{{route('lessons.edit',$lesson->id)}}" class="btn btn-sm btn-info">edit</a> |
                                        <a data-toggle="modal" data-target="#myModal" href="#"
                                           class="btn btn-sm btn-danger lesson-action__delete">delete</a> |
                                        <a href="{{ route('exams',['id'=>$lesson->id]) }}" class="btn btn-sm btn-success">exams</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>No Lesson</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                 </div>
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
        <button type="button" class="btn btn-lg btn-success modal-footer__yes-btn">Yes</button>
        <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">No</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')
    var url = '/lessons/' + $('.lesson-action').data('lesson-id');
    var token = "{{ csrf_token() }}";

    $('#myModal').on('shown.bs.modal');

    $(".lesson-action__delete").click(function(event){
        event.preventDefault();
    });

    $(".modal-footer__yes-btn").click(function(){
        $.ajax({
            url: url,
            type: "post",
            data: {_token: token, _method: "delete"},
            success: function(){
                location.reload();
                $('#myModal').modal('hide');
            }

        });

    });
@endsection
