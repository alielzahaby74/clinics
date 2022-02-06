@extends('layouts.master')

@section('title') @lang('doctor.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('doctor.add') @endslot
    @endcomponent
    @component('components.errors') @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('doctors.update', $id)}}">
                        @csrf
                        <div class="form-group">
                            <label for = "name">@lang('doctor.name')</label>
                            <input type="text" class="form-control" name="name" value="{{$doctor->name ?? ""}}">
                        </div>

                        <div class="form-group">
                            <label for = "username">@lang('doctor.username')</label>
                            <input type="text" class="form-control" name="username" value="{{$doctor->username ?? ""}}">
                        </div>

                        <div class="form-group">
                            <label for = "email">@lang('doctor.email')</label>
                            <input type="email" class="form-control" name="email" value="{{$doctor->email ?? ""}}">
                        </div>

                        <div class="form-group">
                            <label for = "password">@lang('doctor.password')</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for = "phone">@lang('doctor.phone')</label>
                            <input type="text" class="form-control" name="phone" value="{{$doctor->phone ?? ""}}">
                        </div>

                        <div class="form-group">
                            <label for="speciality">@lang('doctor.speciality')</label>
                            <select class="form-control" name="speciality">
                                <option value="" selected disabled>Choose Speciality</option>
                                @foreach($specialities as $speciality)
                                    <option @if($doctor->speciality_id == $speciality->id) selected @endif value="{{$speciality->id}}"> {{$speciality->name}} </option>
                                @endforeach
                            </select>
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
