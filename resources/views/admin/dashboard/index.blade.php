@extends('admin.admin_layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-question-circle fa-3x"></i>
                    <div class="info">
                        <h4>{{ __('Questions') }}</h4>
                        <p>
                            <b>{{$all_questions}}</b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon">
                    <i class="icon fa fa-book fa-3x"></i>
                    <div class="info">
                        <h4>{{ __('Answers') }}</h4>
                        <p>
                            <b>{{$all_answers}}</b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon">
                    <i class="icon fa fa-bars fa-3x"></i>
                    <div class="info">
                        <h4>{{ __('Filter Answer') }}</h4>
                        <p>
                            <b>{{$filter_answers}}</b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon">
                    <i class="icon fa fa-trash fa-3x"></i>
                    <div class="info">
                        <h4>{{ __('Others') }}</h4>
                        <p>
                            <b>0</b>
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
