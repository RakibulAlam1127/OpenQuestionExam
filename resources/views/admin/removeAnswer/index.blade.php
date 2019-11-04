@extends('admin.admin_layouts.app')
@section('content')
  <div class="tile">
      <div class="tile-body">
          <h4 style="font-weight: lighter">Are You Want to Sure Remove 24 hours and soft deletes all question answers with an empty value from the past 24 hours.
          ?</h4>
          <br>
          <a href="{{route('admin.dashboard')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Back</a>
          <form action="{{route('remove.index')}}" method="POST"
                style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger ml-2"
                      onclick="return(confirm('are you sure to delete?'))">
                  <i class="fa fa-trash"></i> Remove
              </button>
          </form>

      </div>
  </div>
@endsection