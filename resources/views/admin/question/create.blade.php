@extends('admin.admin_layouts.app')
@section('content')
    <div class="tile">
        <h3 class="tile-title"><i class="fa fa-plus-square-o"></i>{{(__(' Add Question'))}}</h3>
        <div class="tile-body">
            <form action="{{ route('question.store') }}" method="POST">

                {{--  include the form --}}
                @include('admin.question.form')

                <div class="tile-footer">
                    <button class="btn btn-primary mr-1" type="submit">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ __('Add Question') }}
                    </button>
                    <a class="btn btn-secondary" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i>{{__('Back')}}
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection
