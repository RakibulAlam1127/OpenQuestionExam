@extends('admin.admin_layouts.app')
@section('content')
    <div class="tile">
        <h3 class="tile-title"><i class="fa fa-list"></i>{{(__(' Question List'))}}</h3>
        <div class="tile-body">
              <table class="table  data-table">
                  <thead>
                     <tr>
                         <th>{{ __('#') }}</th>
                         <th>{{ __('Name') }}</th>
                          <th>{{(__('Type'))}}</th>
                         <th>{{ __('Question Require') }}</th>
                         <th>{{ __('Date') }}</th>
                         <th>{{__('Action')}}</th>
                     </tr>
                  </thead>
                  <tbody>
                  {{$i = 1}}
                  @foreach($all_questions  as $question)

                    <tr>
                         <td>{{$i++}}</td>
                        <td>{{$question->name}}</td>
                        <td>{{$question->type}}</td>
                        <td>{{$question->question_require}}</td>
                        <td>{{$question->date}}</td>
                        <td>
                            <a href="{{url('admin/question/'.$question->id.'/edit')}}" title="Edit Question" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                            <form action="{{url('admin/question/'.$question->id)}}" method="POST"
                                  style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mr-3"
                                        onclick="return(confirm('are you sure to delete?'))">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>

                  @endforeach
                  </tbody>
              </table>
        </div>

    </div>
@endsection
