@extends('layouts.master')

@section('title') @lang('speciality.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('speciality.add') @endslot
    @endcomponent
    @component('components.errors')@endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('specialities.create')}}" enctype="multipart/form-data">
                        @csrf
                        @component('components.specialityAddEdit')@endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


