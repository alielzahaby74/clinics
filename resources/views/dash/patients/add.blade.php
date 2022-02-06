@extends('layouts.master')

@section('title') @lang('patient.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('patient.add') @endslot
    @endcomponent
    @component('components.errors') @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('patients.create')}}" enctype="multipart/form-data">
                        @csrf
                        <h3>@lang('personal_information')</h3>
                        <div class="form-group">
                            <label for = "name">@lang('name')</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for = "email">@lang('email')</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for = "password">@lang('password')</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for = "phone">@lang('phone')</label>
                            <input type="text" class="form-control" name="phone">
                        </div>>
                        <div>
                            <label for = "birthDate">@lang('birthDate')</label>
                            <input type="date" class="form-control" name="birthdate">
                        </div>

                        <div class="form-group">
                                <label for="national_id">@lang('national_id')</label>
                                <input class="form-control w-25" type="text" name = "nationalId" id="national_id">
                        </div>

                        <div class="form-group">
                            <label for="country">@lang('country')</label>
                            <select class="form-control" name = "country_id" id = "country">
                                <option disabled selected>@lang('select_a_country')</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">@lang('city')</label>
                            <select class="form-control" id = "city">
                                <option disabled selected>@lang('select_a_city')</option>
                            </select>
                        </div>

                        <h3>@lang('medical_information')</h3>
                        <div class="d-flex justify-content-around">
                            <div class="form-group w-25">
                                <label for="blood_groups">@lang('blood_groups')</label>
                                <select class="form-control" name = "blood_group" id = "blood_groups">
                                    <option disabled selected>@lang('select_a_blood_group')</option>
                                    @foreach($bloodGroups as $bloodGroup)
                                        <option value="{{$bloodGroup}}">{{$bloodGroup}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label for="rhesus_factor">@lang('rhesus_factor')</label>
                                <select class="form-control" name = "rhesus" id = "rhesus_factor">
                                    <option disabled selected>@lang('select_a_rhesus_factor')</option>
                                    @foreach($rhs as $rh)
                                        <option value="{{$rh}}">{{$rh}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="w-25">
                                <label>@lang('chronic_diseases')</label>
                                <textarea class="form-control" name="chronic_diseases" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="w-25">
                                <label>@lang('genetic_diseases')</label>
                                <textarea class="form-control" name="genetic_diseases" rows="5" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="w-25">
                                <label>@lang('surgical_history')</label>
                                <textarea class="form-control" name="surgical_history" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="w-25">
                                <label>@lang('allergies_history')</label>
                                <textarea class="form-control" name="allergies_history" rows="5" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>@lang('family_mecdical_history')</label>
                                <textarea class="form-control" name="family_mecdical_history" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="form-control">
                            <button type="submit" class="btn btn-primary btn-lg btn-block w-100 my-2">@lang('doctor.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $("#country").change(function(){
            var id = $(this).val();
            $.ajax({
                method: "GET",
                url: "{{route('patients.getCities')}}/" + id,
                success: function (cities){
                    $("#city").empty();
                    $("#city").append("<option disabled selected>@lang('select_a_city')</option>");
                    cities.forEach(city => {$("#city").append(`<option value = ${city.id}>${city.name}</option>`)});
                }
            })
        });
    </script>
@endsection
