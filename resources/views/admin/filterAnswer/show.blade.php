@extends('admin.admin_layouts.app')
@section('content')
    <div class="tile">
        <div class="tile-body">
           <h3>Question:</h3>
            <p class="lead">-{{$filterAnswer->question->question_require}}</p>
            <h4>-Answer:</h4>
            <p>{{$filterAnswer->answer}}</p>
            <h4>Short Description :</h4>
            <p>{{$filterAnswer->description}}</p>
            <h4>-Question Type:</h4>
            <p>{{$filterAnswer->question->type}}</p>
            <h4>-Question Category:</h4>
            <p>{{$filterAnswer->question->name}}</p>
            <h4>-Who Submit Answer</h4>
            <p class="lead">{{$filterAnswer->user_name}}</p>
            <a href="{{route('answer.filter')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection