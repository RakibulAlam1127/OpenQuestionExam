<div class="row">
    @csrf
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Question Name') }} <span class="text-danger">*</span> </label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                   placeholder="{{ __('Enter Question Title') }}" value="{{ old('name')??$question->name }}" />
            @error('name')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Question Type') }}<span class="text-danger">*</span></label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror"
                   placeholder="{{ __('Enter Question Type') }}"
                   value="{{ old('type')??$question->type }}" />
            @error('type')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label">{{ __('Question Required') }}<span class="text-danger">*</span></label>
    <input type="text" name="question_require" id="question_require" class="form-control @error('question_require') is-invalid @enderror"
           placeholder="{{ __('Question Required') }}" value="{{ old('question_require')??$question->question_required }}" />
    @error('question_require')
    <div class="form-control-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="control-label">{{ __('Select Date') }}<span class="text-danger">*</span></label>
    <input type="" name="date" id="date" class="form-control date-picker @error('date') is-invalid @enderror"
           placeholder="{{ __('Select Date') }}" value="{{ old('date')??$question->date}}" />
    @error('date')
    <div class="form-control-feedback">{{ $message }}</div>
    @enderror
</div>