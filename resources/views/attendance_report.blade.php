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


                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">user name</th>
                                <th scope="col">day</th>
                                <th scope="col">working hours</th>
                                <th scope="col">status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sum = 0;
                                $i=1;
                            @endphp

                            @foreach($attendance as $attend)
                                <tr>
                                    <td>{{$attend->user['name']}}</td>
                                    <td>{{$attend->day}}</td>
                                    <td>{{$attend->working_hours}}</td>
                                    <td>{{$attend->status_id }}</td>
                                    @php
                                        $sum+= $attend->working_hours;
                                        $i++;
                                    @endphp

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="#"
                           class="btn btn-primary btn-xs"
                           type="button"
                           data-toggle="modal"
                           id="showAverage"
                           data-target="#averageModal">
                           average working hours
                        </a>


                        <div class="modal fade" id="averageModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:200px">
                                    <div class="content modal-body" style="padding-left:20px">
                                        <div class="row form-control">
                                            <label for="" class="">average working hours : {{$sum / $i}} </label>
                                            <p class="" style="float: right" id="average" ></p>
                                            @if($sum / $i >= 8 )
                                                <div class="row ">
                                                    <h3>congratulations this is the employee of the month</h3><br>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <a href="{{route('home')}}" class="btn btn-primar" type="submit">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
