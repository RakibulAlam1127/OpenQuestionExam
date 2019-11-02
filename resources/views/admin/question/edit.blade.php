@extends('admin.admin_layouts.app')
@section('content')
    <div class="tile">
        <h3 class="tile-title"><i class="fa fa-plus-square-o"></i>{{(__(' Edit Question'))}}</h3>
        <div class="tile-body">
            <form action="{{url('admin/question/'.$question->id)}}" method="POST">
               @method('PATCH')
                {{--  include the form --}}
                @include('admin.question.form')

                <div class="tile-footer">
                    <button class="btn btn-primary mr-1" type="submit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>{{ __('Edit Question') }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route('question.index') }}">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>{{__('Back')}}
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection
