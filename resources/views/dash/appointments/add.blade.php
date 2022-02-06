@extends('layouts.master')

@section('title') @lang('appointment.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('appointment.add') @endslot
    @endcomponent
    @component('components.errors')@endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('appointments.create')}}">
                        @csrf
                        <input type="hidden" name="patient_id" id="patient_id">
                        <div class="form-group">
                            <label for="doctors">@lang('appointment.doctor')</label>
                            <select class="form-control" name="doctor_id" id="doctors">
                                <option selected disabled>Select a Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shifts">@lang('appointment.shift')</label>
                            <select class="form-control" name="shift_id" id="shifts">
                                <option selected disabled>@lang('Select a shift')</option>
                            </select>
                        </div>
                        <div class="form-group d-flex">
                            <div class="w-25">
                                <label for="national_id">@lang('national_id')</label>
                                <input class="form-control" type="text" id="national_id">
                            </div>
                            <div class="w-25 mx-4">
                                <label style="opacity: 0">.</label>
                                <input class="form-control" type="text" readonly disabled id="patient_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('date')</label>
                            <input class="form-control" type="date" name="date">
                        </div>

                        <div class="form-control">
                            <button type="submit" class="btn btn-primary btn-lg btn-block w-100 my-2">@lang('submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#doctors').change(function(){
            var id = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{ route("appointments.getshifts") }}/" + id,
                //dont return an empty array
                success: function (shifts)
                {
                    $("#shifts").empty();
                    $("#shifts").append("<option selected disabled>@lang('Select a shift')</option>");
                    shifts.forEach(shift => {
                        $('#shifts').append(`<option value="${shift.id}">${shift.from} : ${shift.to}</option>`);
                    })
                }
            })
        });

        $("#national_id").on("change keyup paste", function (){
            var id = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{route('appointments.getPatient')}}/" + id ,
                success: function (patient){
                    $("#patient_name").val(patient[0].name);
                    $("#patient_id").val(patient[0].id);
                }
            })
        });
    </script>
@endsection

