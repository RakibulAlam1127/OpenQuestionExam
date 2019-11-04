@extends('admin.admin_layouts.app')
@section('content')
    @if($filter_answer_count>=1)
        <div class="alert alert-info">
            <span class="lead text-dark">Hey admin, In the past 48 hours, you received <strong>{{ $filter_answer_count }}</strong> answers to your text questions, that’s a lot to Read.</span>
        </div>
        <br>

        @else
        <div class="alert alert-danger">
            <span class="lead">Hey admin, In the past 48 hours, you received <strong>No</strong> answers to your text questions.</span>
        </div>
    @endif
    <br>

    <div class="tile">
        <div class="tile-body">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Question') }}</th>
                    <th>{{__('Answer')}}</th>
                    <th>{{__('Question Type')}}</th>
                    <th>{{__('Question Category')}}</th>
                    <th>{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>

                         <?php $i = 1; ?>
                         @foreach($filterAnswers as $answer)
                             <tr>
                            <td>{{$i++}}</td>
                            <td> {{$answer->question->question_require}}</td>
                             <td>{{$answer->answer}}</td>
                             <td>{{$answer->question->type}}</td>
                             <td>{{$answer->question->name}}</td>
                             <td>
                                <div class="row col-md-12">
                                    <div class="col-md-6">
                                        <a href="{{url('admin/filterAnswer/'.$answer->id)}}" class="btn btn-primary btn-sm" title="open item"><i class="fa fa-folder-open-o"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{url('admin/filterAnswer/'.$answer->id)}}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mr-3"
                                                    onclick="return(confirm('are you sure to delete?'))">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                             </td>
                             </tr>
                         @endforeach

                </tbody>
            </table>
        </div>
    </div>




@endsection