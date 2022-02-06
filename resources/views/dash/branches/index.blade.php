@extends('layouts.master')

@section('title') @lang('speciality.specialities') @endsection


@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('branch.branches') @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>@lang("Name")</th>
                                    <th>@lang("Address")</th>
                                    <th>@lang("Actions")</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{$branch->id}}</td>
                                        <td>{{$branch->name}}</td>
                                        <td>{{$branch->address}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{route('branches.edit', $branch->id)}}">
                                                <span class="mdi mdi-file-edit"></span>
                                                @lang('Edit')
                                            </a>
                                            <a  class="btn btn-danger" href="{{route('branches.delete', $branch->id)}}">
                                                <span class="mdi mdi-trash-can"></span>
                                                @lang('Delete')
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
                            {{ $branches ->links() }}
    </div> <!-- end row -->

@endsection
@section('script')
    <!-- Responsive Table js -->
    <script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js') }}"></script>
@endsection

