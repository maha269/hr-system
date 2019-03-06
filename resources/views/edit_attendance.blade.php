@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">edit attendance</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{ url('update_attendance',['id'=> $attendance->id])}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="day" class="col-md-4 col-form-label text-md-right">day</label>

                                    <div class="col-md-6">
                                        <input id="day" type="text" class="form-control" name="day" required autofocus value="{{$attendance->day}}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="workingHours" class="col-md-4 col-form-label text-md-right">working hours</label>

                                    <div class="col-md-6">
                                        <input id="workingHours" type="text" class="form-control" name="working_hours" required value="{{$attendance->working_hours}}">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <label for="user_id">select user </label>
                                            <select class="form-group" id="user_id" name="user_id">
                                                @foreach($users as $user)
                                                    <option class="form-control" value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected="selected"' : '' }}>{{$user->id}}</option>
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
                                                    <option class="form-control" value="{{ $stat->id }}" {{ $attendance->status_id == $stat->id ? 'selected="selected"' : '' }}>{{$stat->id}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-success" >Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
