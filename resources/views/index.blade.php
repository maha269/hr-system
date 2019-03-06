@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    {{--@include('flash::message')--}}
                    {{--@if (\Session::has('success'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--<ul>--}}
                                {{--<li>{!! \Session::get('success') !!}</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    @if($errors->any())
                        <h4>{{$errors->first()}}</h4>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($employeeAttendance as $attendance)
                            user id is: {{$attendance->user_id}}
                            day : {{$attendance->day}}
                                hours : {{$attendance->working_hours}}

                                <a class="btn btn-danger" href="{{url('delete_attendance/'. $attendance->id)}}">Delete</a>
                                <a class="btn btn-primary" href="{{url('edit_attendance/'. $attendance->id)}}">Edit</a>
                            <hr>
                        @endforeach
                            <a type="submit" class="btn btn-success" href="{{route('create_attendance')}}" >Add Attendance</a>
                            <a class="btn btn-info" href="{{url('show_user_attendance/'. $attendance->user_id)}}">Show user attendance</a>
                            <a class="btn btn-info" href="{{url('show_attendance_report')}}">Show attendance report</a>

                            {{--<a href="{{ route('getJasperReportById', $id) }}" class='btn btn-default btn-xs'>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
