@extends('layouts.master')

@section('title') @lang('shift.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('shift.add') @endslot
    @endcomponent
    @component('components.errors')@endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form class="{{$shiftTypes['by_number']}}" method="POST" action="{{route('shifts.create')}}">
                        @csrf
                        <div class="form-group">
                            <label for="shift_type">@lang('shift.shift_type')</label>
                            <select class="form-control w-25" name="type" id = "shift_type">
                                <option value = "{{$shiftTypes['by_time']}}">@lang('by_time')</option>
                                <option value = "{{$shiftTypes['by_number']}}">@lang('by_number')</option>
                            </select>
                        </div>
                        <!--Branch ID-->
                        <div class="form-group">
                            <label for="branch_id">@lang('branch.name')</label>
                            <select class="form-control" name="branch_id">
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--Doctor ID-->
                        <div class="form-group">
                            <label for="doctor_id">@lang('doctor.name')</label>
                            <select class="form-control" name="doctor_id">
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--DAY OF WEEK-->
                        <div class="form-group">
                            <label for="day">@lang('day')</label>
                            <select class="form-control" name="day">
                                @foreach($daysOfWeek as $day)
                                    <option>{{$day}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!--FORM : TO-->
                        <div class="form-group d-flex flex-md-row">
                            <div class="d-flex flex-md-column w-25">
                                <label for="from">@lang('from')</label>
                                <input class="form-control" type="time" name="from">
                            </div>
                            <div class="d-flex flex-md-column w-25 mx-md-5">
                                <label for="to">@lang('to')</label>
                                <input class="form-control"type="time" name="to">
                            </div>
                        </div>

                        <!--Duration-->
                        <div class="form-group" id = "{{$shiftTypes['by_time']}}">
                            <label for="duration">@lang('duration')</label>
                            <input class="form-control w-25" type="text" name="duration">
                        </div>

                        <!--Reservation Number-->
                        <div class="form-group" id = "{{$shiftTypes['by_number']}}">
                            <label for="max_reservation">@lang('shift.reservation_number')</label>
                            <input type="text" class="form-control w-25" name="max_reservation">
                        </div>

                        <!--SUBMIT!!!-->
                        <div class="mt-md-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var reserv = $("#by_number");
        var time = $("#by_time");

        reserv.css({display: "none"});

        $("#shift_type").change(function(){
            if(this.value == "by_time")
            {
                time.css({display: "block"});
                reserv.css({display: "none"});
            }
            else
            {
                reserv.css({display: "block"});
                time.css({display: "none"});
            }
        });
    </script>
@endsection

