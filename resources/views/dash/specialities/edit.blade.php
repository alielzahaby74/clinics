@extends('layouts.master')

@section('title') @lang('speciality.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('speciality.add') @endslot
    @endcomponent
    <form method="POST" action="{{route('specialities.update', $id)}}" enctype="multipart/form-data">
        @csrf
        @component('components.specialityAddEdit', ['speciality' => $speciality])@endcomponent
    </form>

@endsection


