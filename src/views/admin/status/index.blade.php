@extends('master')

@section('page')
    Statuses Management
@stop

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h2> Manage Statuses
                {!! link_to_route(
                                    config('ticketit.admin_route').'.status.create',
                                    'Create new status', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
            </h2>
        </div>
        @include('Ticketit::shared.flash')

        @if ($statuses->isEmpty())
            <h3 class="text-center"> There are no statues,
                {!! link_to_route(config('ticketit.admin_route').'.status.create', 'create new status') !!}
            </h3>
        @else
            <div id="message"></div>
            <table class="table table-hover">
                <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td style="color: {{ $status->color }}; vertical-align: middle">
                            {{ $status->name }}
                        </td>
                        <td>
                            {!! link_to_route(
                                                    config('ticketit.admin_route').'.status.edit', 'Edit', $status->id,
                                                    ['class' => 'btn btn-info'] )
                                !!}

                                {!! link_to_route(
                                                    config('ticketit.admin_route').'.status.destroy', 'Delete', $status->id,
                                                    [
                                                    'class' => 'btn btn-danger deleteit',
                                                    'form' => "delete-$status->id",
                                                    "node" => $status->name
                                                    ])
                                !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => [
                                        config('ticketit.admin_route').'.status.destroy',
                                        $status->id
                                        ],
                            'id' => "delete-$status->id"
                            ])
            !!}
            {!! Form::close() !!}
        @endif
    </div>
    <script>
        $( ".deleteit" ).click(function( event ) {
            event.preventDefault();
            if (confirm("Are you sure you want to delete the status: " + $(this).attr("node") + " ?"))
            {
                $form = $(this).attr("form");
                $("#" + $form).submit();
            }

        });
    </script>
@stop