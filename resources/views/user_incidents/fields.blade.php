<!-- User Data Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_data_id', 'User Data Id:') !!}
    {!! Form::number('user_data_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Incident Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('incident_id', 'Incident Id:') !!}
    {!! Form::number('incident_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::number('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::number('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userIncidents.index') !!}" class="btn btn-default">Cancel</a>
</div>
