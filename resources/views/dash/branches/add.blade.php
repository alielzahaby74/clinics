@extends('layouts.master')

@section('title') @lang('branch.add') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('branch.add') @endslot
    @endcomponent
    @component('components.errors')@endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('branches.create')}}">
                        @csrf
                        @component('components.branchAddEdit')
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


