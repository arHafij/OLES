@extends('teacher.template')

@section('style')

h4{
    color:#000;
}

label{
    color:#999;
    font-weight:300;
    font-size:11px;
}

.currency {
    padding-left:20px;
    font-size:20px;
}

.currency-symbol {
  position:absolute;
  padding: 8px 10px;
}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-9">
            <div class="panel panel-default">
                <h4 class="panel-heading">Create Lesson</h4>
                <div class="panel-body secondry-color">
                    @include('teacher.partials.alert')
                    <form action="{{route('lessons.store')}}" method="post" class="lesson-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="subject_name">Subject</label>
                                <select class="form-control" name="lessons_subject_name">
                                    <option value="bangla">Bangla</option>
                                    <option value="English">English</option>
                                    <option value="mathematics">Math</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemestry">Chemestry</option>
                                    <option value="general Knowledge">General Knowledge</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="lessons_title">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="title">Price</label>
                                <input type="number" class="form-control currency" name="lessons_price"
                                min="0.00" max="2500.00" value="0.00">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <label for="leesons_body">Content Box</label>
                            <textarea class="form-control" rows="5"  name="lessons_body"></textarea>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> save
                                </button
                        </div>
                    </form>
                </div><!--./panel-body-->
            </div><!--./panel-->
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
    CKEDITOR.replace( 'lessons_body' );

    (function($) {
    $.fn.currencyInput = function() {
        this.each(function() {
          var wrapper = $("<div class='currency-input' />");
          $(this).wrap(wrapper);
          $(this).before("<span class='currency-symbol'>$</span>");
          $(this).change(function() {
            var min = parseFloat($(this).attr("min"));
            var max = parseFloat($(this).attr("max"));
            var value = this.valueAsNumber;
            if(value < min)
              value = min;
            else if(value > max)
              value = max;
            $(this).val(value.toFixed(2));
          });
        });
      };
    })(jQuery);

    $(document).ready(function() {
      $('input.currency').currencyInput();
    });
@endsection
