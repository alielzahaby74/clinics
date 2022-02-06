@extends('layouts.master')

@section('title') @lang('doctor.doctors') @endsection


@section('css')
    <!-- Responsive Table css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') @lang('doctor.doctors') @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="">@lang('filters')</h3>
                    <form class="w-100 d-flex align-items-center" method="GET" action="{{route('doctors.filter')}}">
                        <div class="form-group w-25">
                            <label for="filter_by">@lang('search_by')</label>
                            <select class="form-control" name="filter_by" id="filter_by">
                                <option value="name">@lang('by_name')</option>
                                <option value="email">@lang('by_email')</option>
                                <option value="phone">@lang('by_phone')</option>
                            </select>
                        </div>
                        <div class="form-group w-25">
                            <label for="filter_value">@lang('filter_value')</label>
                            <input class="form-control" type="text" name="filter_value" id="filter_value">
                        </div>

                        <div class="form-group">
                            <label style="opacity: 0;">.</label>
                            <button class=" form-control btn btn-primary btn-block text-center" type="submit">@lang('Search')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                                    <th>@lang("Email")</th>
                                    <th>@lang("Phone")</th>
                                    <th>@lang("Actions")</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->id}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->phone}}</td>
                                        <td>
                                            <a class="btn btn-secondary" href="{{route('doctors.edit', $doctor->id)}}">
                                                <span class="mdi mdi-file-edit"></span>
                                                @lang('edit')
                                            </a>
                                            <a  class="btn btn-danger" href="{{route('doctors.delete', $doctor->id)}}">
                                                <span class="mdi mdi-trash-can"></span>
                                                @lang('delete')
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
    </div> <!-- end row -->

@endsection
@section('script')
    <!-- Responsive Table js -->
    <script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js') }}"></script>
@endsection

