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
                        <form method="post" action="{{ url('display_report')}}"  enctype="multipart/form-data">
                            @csrf


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
                                <label for="day" class="col-md-4 col-form-label text-md-right">Select Day From</label>

                                <div class="col-md-6">
                                    <select name="dayFrom">
                                        @for($i=1 ; $i<=31 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="day" class="col-md-4 col-form-label text-md-right">Select Day to</label>

                                <div class="col-md-6">
                                    <select name="dayTo">
                                        @for($i=1 ; $i<=31 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <button type="submit">Show</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
