@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{--{{ __('Login') }}--}}
                    </div>
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        @if($attendance->count()>0)
                                            @foreach($attendance as $attend)
                                                <label for="user_attendance">User Name </label>
                                                <p>{{$attend->user['name']}}</p>
                                                <label for="user_attendance">Day </label>
                                                <p>{{$attend->day}}</p>
                                                <label for="user_attendance">Working Hours</label>
                                                <p>{{$attend->working_hours}}</p>
                                                <label for="user_attendance">Status</label>
                                                <p>{{$attend->status_id}}</p>
                                            @endforeach
                                        @else
                                            <p>No Data Found</p>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <a href="{{route('home')}}" type="submit">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
