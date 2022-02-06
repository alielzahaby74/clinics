@extends('layouts.master')

@section('title') @lang('branch.edit') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('branch.edit') {{$branch->name}} @endslot
    @endcomponent

        <form method="POST" action="{{route('branches.update', $id)}}">
            @csrf
            @component('components.branchAddEdit', ['branch' => $branch])

            @endcomponent
        </form>

@endsection


