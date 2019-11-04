@extends('admin.admin_layouts.app')
@section('content')
  @if(!empty($latest_answers))
      <div class="alert alert-success">
          <span class="lead">List the latest <strong>5</strong> answer and Email.</span>
      </div>
      <?php $i = 1;?>
        @foreach($latest_answers as $answer)
            <div class="tile mb-3 ">
                <div class="tile-body">
                    <span class="float-left text-success">{{$i++}}</span> <br>
                     <h4>-Question:</h4>
                     <p>{{$answer->question->question_require}}</p>
                     <h4>-Answer</h4>
                    <p>{{$answer->answer}}</p>
                    <h5>Who Submitted Answer</h5>
                    <p>{{$answer->user_name}}</p>
                    <p>Created At : {{$answer->created_at}}</p>
                </div>
            </div>
         @endforeach
      @else
      <div class="alert alert-danger">
          <span>Data Not Found</span>
      </div>
 @endif
@endsection