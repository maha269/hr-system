@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{--{{ __('Login') }}--}}
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('store_attendance') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="day" class="col-md-4 col-form-label text-md-right">day</label>

                                <div class="col-md-6">
                                    <input id="day" type="text" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" name="day" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="workingHours" class="col-md-4 col-form-label text-md-right">working hours</label>

                                <div class="col-md-6">
                                    <input id="workingHours" type="text" class="form-control{{ $errors->has('workingHours') ? ' is-invalid' : '' }}" name="working_hours" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <label for="user_id">select user </label>
                                        <select class="form-group" id="user_id" name="user_id">
                                            @foreach($users as $user)
                                                <option class="form-control" vlaue="{{$user->id}}">{{$user->id}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <label for="status_id">select status </label>

                                        <select class="form-group" name="status_id" id="status_id">
                                            @foreach($status as $stat)
                                                <option class="form-control" vlaue="{{$stat->id}}">{{$stat->id}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <button type="submit">add</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
