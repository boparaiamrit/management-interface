@extends($viewNamespace . '::layouts.master')
@section('title', 'Hostnames - Dashboard')
@section('page-title', trans_choice('management-interface::hostname.hostname',2))
@section('page-subtitle', trans('management-interface::hostname.all-hostnames'))
@section('header-extras')
    {{-- Data Table Styles --}}
    <link href="{{ asset('vendor/laraflock/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            <table id="websites" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ trans_choice('management-interface::hostname.hostname', 1) }}</th>
                    <th>{{ trans_choice('management-interface::website.website', 1) }}</th>
                    <th>{{ trans_choice('management-interface::tenant.tenant', 1) }}</th>
                    <th class="datatable-nosort">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hostnames as $hostname)
                    <tr class="">
                        <td class="text-center col-xs-1">
                            <a href="{{ route('management-interface.website.read', $hostname->website->present()->urlArguments) }}">{{ $hostname->id }}</a>
                        </td>
                        <td>{{ $hostname->present()->name }}</td>
                        <td>
                            <a href="{{ route('management-interface.website.read', $hostname->website->present()->urlArguments) }}">
                                {{ $hostname->website->present()->name }}
                            </a>
                        </td>
                        <td>{{ $hostname->tenant->present()->name }}</td>
                        <td class="text-center col-xs-1">
{{--                            {!! BootForm::open()->delete()->action(route('management-interface::website.delete', ['id' => $website->id])) !!}--}}
{{--                            <a href="{{ route('management-interface.hostname.edit', $hostname->present()->urlArguments) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>--}}
                            <a href="{{ route('management-interface.website.read', $hostname->website->present()->urlArguments) }}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                            {{--                            {!! BootForm::submit('<i class="fa fa-trash"></i><span class="sr-only">Delete</span>')->addClass('btn btn-xs btn-danger')->removeClass('btn-default')->data('toggle', 'tooltip')->data('placement', 'top')->title('Delete') !!}--}}
                            {{--{!! BootForm::close() !!}--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('footer-extras')
    {{-- Data Table Scripts --}}
    <script src="{{ asset('vendor/laraflock/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/laraflock/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#websites').dataTable({
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false
                }]
            });
        });
    </script>
@stop