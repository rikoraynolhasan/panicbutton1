<div class="table-responsive">
    <table class="table" id="dataUsers-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>No Ktp</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Pekerjaan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dataUsers as $dataUsers)
            <tr>
                <td>{!! $dataUsers->nama !!}</td>
            <td>{!! $dataUsers->email !!}</td>
            <td>{!! $dataUsers->password !!}</td>
            <td>{!! $dataUsers->no_ktp !!}</td>
            <td>{!! $dataUsers->alamat !!}</td>
            <td>{!! $dataUsers->no_hp !!}</td>
            <td>{!! $dataUsers->pekerjaan !!}</td>
                <td>
                    {!! Form::open(['route' => ['dataUsers.destroy', $dataUsers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('dataUsers.show', [$dataUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('dataUsers.edit', [$dataUsers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
