<div class="table-responsive">
    <table class="table" id="userIncidents-table">
        <thead>
            <tr>
                <th>User Data Id</th>
        <th>Incident Id</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Tanggal</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userIncidents as $userIncident)
            <tr>
                <td>{!! $userIncident->user_data_id !!}</td>
            <td>{!! $userIncident->incident_id !!}</td>
            <td>{!! $userIncident->latitude !!}</td>
            <td>{!! $userIncident->longitude !!}</td>
            <td>{!! $userIncident->tanggal !!}</td>
                <td>
                    {!! Form::open(['route' => ['userIncidents.destroy', $userIncident->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('userIncidents.show', [$userIncident->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('userIncidents.edit', [$userIncident->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
